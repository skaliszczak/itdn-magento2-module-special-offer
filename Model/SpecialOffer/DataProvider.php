<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ITDN\SpecialOffer\Model\SpecialOffer;

use ITDN\SpecialOffer\Model\ResourceModel\SpecialOffer\CollectionFactory;
use ITDN\SpecialOffer\Model\ResourceModel\SpecialOfferGroupLink\CollectionFactory as CollectionGroupLinkFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;

class DataProvider extends AbstractDataProvider
{

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var array
     */
    protected $loadedData;
    /**
     * @inheritDoc
     */
    protected $collection;
    protected $collectionGroupLink;


    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        CollectionGroupLinkFactory $collectionGroupLinkFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        $this->collectionGroupLink = $collectionGroupLinkFactory->create();

        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();

        foreach ($items as $model) {
            $this->loadedData[$model->getId()] = $model->getData();
            $collectionGroupLink = $this->collectionGroupLink->addFieldToFilter('specialoffer_id', $model->getId());

            foreach ($collectionGroupLink as $link) {
                $this->loadedData[$model->getId()]['group_ids'][] = $link->getGroupId();
            }

        }
        $data = $this->dataPersistor->get('itdn_specialoffer_specialoffer');

        if (!empty($data)) {
            $model = $this->collection->getNewEmptyItem();
            $model->setData($data);

            $this->loadedData[$model->getId()] = $model->getData();
            $this->dataPersistor->clear('itdn_specialoffer_specialoffer');
        }

        return $this->loadedData;
    }
}

