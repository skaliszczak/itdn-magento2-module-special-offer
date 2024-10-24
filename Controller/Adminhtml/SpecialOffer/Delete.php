<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ITDN\SpecialOffer\Controller\Adminhtml\SpecialOffer;

class Delete extends \ITDN\SpecialOffer\Controller\Adminhtml\SpecialOffer
{
    protected $specialOfferGroupLinkCollection;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \ITDN\SpecialOffer\Model\ResourceModel\SpecialOfferGroupLink\CollectionFactory $specialOfferGroupLinkCollectionFactory
    ) {
        $this->specialOfferGroupLinkCollection = $specialOfferGroupLinkCollectionFactory->create();
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('specialoffer_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\ITDN\SpecialOffer\Model\SpecialOffer::class);
                $model->load($id);
                $this->deleteLinks($id);
                $model->delete();

                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Specialoffer.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['specialoffer_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Specialoffer to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }

    /**
     * @param mixed $id
     * @return void
     */
    protected function deleteLinks(mixed $id)
    {
        $links = $this->specialOfferGroupLinkCollection
            ->addFieldToFilter('specialoffer_id', $id)
            ->getItems();

        foreach ($links as $link) {
            $link->delete();
        }
    }
}

