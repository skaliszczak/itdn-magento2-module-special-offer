<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ITDN\SpecialOffer\Controller\Adminhtml\SpecialOffer;

use ITDN\SpecialOffer\Model\ResourceModel\SpecialOfferGroupLink\CollectionFactory as SpecialOfferGroupLinkCollectionFactory;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{

    protected $dataPersistor;

    protected $specialOfferGroupLinkRepository;
    protected $specialOfferGroupLinkFactory;
    protected $specialOfferGroupLinkCollection;


    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor,
        \ITDN\SpecialOffer\Api\SpecialOfferGroupLinkRepositoryInterface $specialOfferGroupLinkRepository,
        \ITDN\SpecialOffer\Api\Data\SpecialOfferGroupLinkInterfaceFactory $specialOfferGroupLinkFactory,
        \ITDN\SpecialOffer\Model\ResourceModel\SpecialOfferGroupLink\CollectionFactory $specialOfferGroupLinkCollectionFactory
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->specialOfferGroupLinkRepository = $specialOfferGroupLinkRepository;
        $this->specialOfferGroupLinkFactory = $specialOfferGroupLinkFactory;
        $this->specialOfferGroupLinkCollection = $specialOfferGroupLinkCollectionFactory->create();

        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        echo 'SAVE<br>';
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();

        if ($data) {
            $id = $this->getRequest()->getParam('specialoffer_id');
            $model = $this->_objectManager->create(\ITDN\SpecialOffer\Model\SpecialOffer::class)->load($id);

            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Specialoffer no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

            $model->setData($data);

            try {
                $model->save();
                $this->saveGroups($model->getId(), $data['group_ids'] ?? []);

                $this->messageManager->addSuccessMessage(__('You saved the Special offer.'));
                $this->dataPersistor->clear('itdn_specialoffer_specialoffer');

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['specialoffer_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                var_dump($e->getMessage());
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Specialoffer.' . $e->getMessage()));
            }

            $this->dataPersistor->set('itdn_specialoffer_specialoffer', $data);
            die;
            return $resultRedirect->setPath('*/*/edit', ['specialoffer_id' => $this->getRequest()->getParam('specialoffer_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }

    /**
     * @param mixed $id
     * @param $group_ids
     * @return void
     */
    private function saveGroups($spacialofferId, $groupIds)
    {
        $groupIdsAffected = $groupIds;
        $groupIdsLoadedRefs = [];

        $this->specialOfferGroupLinkCollection->addFieldToFilter('specialoffer_id', $spacialofferId);

        if ($this->specialOfferGroupLinkCollection->getSize() > 0) {
            foreach ($this->specialOfferGroupLinkCollection as $link) {
                $groupIdsLoadedRefs[$link->getGroupId()] = $link;
                if (!in_array($link->getGroupId(), $groupIdsAffected)) {
                    $groupIdsAffected[] = $link->getGroupId();
                }
            }
        }

        foreach ($groupIdsAffected as $groupId) {
            if (!array_key_exists($groupId, $groupIdsLoadedRefs) && in_array($groupId, $groupIds)) {
                echo "Group $groupId to be added" . PHP_EOL;
                $specialOfferGroupLink = $this->specialOfferGroupLinkFactory->create();
                $specialOfferGroupLink->setData([
                   'specialoffer_id' => $spacialofferId,
                   'group_id' => $groupId
                ]);
                try {
                    $this->specialOfferGroupLinkRepository->save($specialOfferGroupLink);
                } catch (\Exception $exception) {
                    $this->messageManager->addErrorMessage( __('Something went wrong while saving the Special offer links.'));
                }
            } elseif (array_key_exists($groupId, $groupIdsLoadedRefs) && !in_array($groupId, $groupIds)) {
                $groupIdsLoadedRefs[$groupId]->delete();
            } else {
                /* This should not happen */
            }
        }
    }
}

