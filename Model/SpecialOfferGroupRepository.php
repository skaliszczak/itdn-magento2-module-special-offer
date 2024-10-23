<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ITDN\SpecialOffer\Model;

use ITDN\SpecialOffer\Api\Data\SpecialOfferGroupInterface;
use ITDN\SpecialOffer\Api\Data\SpecialOfferGroupInterfaceFactory;
use ITDN\SpecialOffer\Api\Data\SpecialOfferGroupSearchResultsInterfaceFactory;
use ITDN\SpecialOffer\Api\SpecialOfferGroupRepositoryInterface;
use ITDN\SpecialOffer\Model\ResourceModel\SpecialOfferGroup as ResourceSpecialOfferGroup;
use ITDN\SpecialOffer\Model\ResourceModel\SpecialOfferGroup\CollectionFactory as SpecialOfferGroupCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class SpecialOfferGroupRepository implements SpecialOfferGroupRepositoryInterface
{

    /**
     * @var ResourceSpecialOfferGroup
     */
    protected $resource;

    /**
     * @var SpecialOfferGroupInterfaceFactory
     */
    protected $specialOfferGroupFactory;

    /**
     * @var SpecialOfferGroupCollectionFactory
     */
    protected $specialOfferGroupCollectionFactory;

    /**
     * @var SpecialOfferGroup
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;


    /**
     * @param ResourceSpecialOfferGroup $resource
     * @param SpecialOfferGroupInterfaceFactory $specialOfferGroupFactory
     * @param SpecialOfferGroupCollectionFactory $specialOfferGroupCollectionFactory
     * @param SpecialOfferGroupSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceSpecialOfferGroup $resource,
        SpecialOfferGroupInterfaceFactory $specialOfferGroupFactory,
        SpecialOfferGroupCollectionFactory $specialOfferGroupCollectionFactory,
        SpecialOfferGroupSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->specialOfferGroupFactory = $specialOfferGroupFactory;
        $this->specialOfferGroupCollectionFactory = $specialOfferGroupCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(
        SpecialOfferGroupInterface $specialOfferGroup
    ) {
        try {
            $this->resource->save($specialOfferGroup);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the specialOfferGroup: %1',
                $exception->getMessage()
            ));
        }
        return $specialOfferGroup;
    }

    /**
     * @inheritDoc
     */
    public function get($specialOfferGroupId)
    {
        $specialOfferGroup = $this->specialOfferGroupFactory->create();
        $this->resource->load($specialOfferGroup, $specialOfferGroupId);
        if (!$specialOfferGroup->getId()) {
            throw new NoSuchEntityException(__('SpecialOfferGroup with id "%1" does not exist.', $specialOfferGroupId));
        }
        return $specialOfferGroup;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->specialOfferGroupCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(
        SpecialOfferGroupInterface $specialOfferGroup
    ) {
        try {
            $specialOfferGroupModel = $this->specialOfferGroupFactory->create();
            $this->resource->load($specialOfferGroupModel, $specialOfferGroup->getSpecialoffergroupId());
            $this->resource->delete($specialOfferGroupModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the SpecialOfferGroup: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($specialOfferGroupId)
    {
        return $this->delete($this->get($specialOfferGroupId));
    }
}

