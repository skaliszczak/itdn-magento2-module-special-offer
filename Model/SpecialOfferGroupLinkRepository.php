<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ITDN\SpecialOffer\Model;

use ITDN\SpecialOffer\Api\Data\SpecialOfferGroupLinkInterface;
use ITDN\SpecialOffer\Api\Data\SpecialOfferGroupLinkInterfaceFactory;
use ITDN\SpecialOffer\Api\Data\SpecialOfferGroupLinkSearchResultsInterfaceFactory;
use ITDN\SpecialOffer\Api\SpecialOfferGroupLinkRepositoryInterface;
use ITDN\SpecialOffer\Model\ResourceModel\SpecialOfferGroupLink as ResourceSpecialOfferGroupLink;
use ITDN\SpecialOffer\Model\ResourceModel\SpecialOfferGroupLink\CollectionFactory as SpecialOfferGroupLinkCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class SpecialOfferGroupLinkRepository implements SpecialOfferGroupLinkRepositoryInterface
{

    /**
     * @var SpecialOfferGroupLink
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var ResourceSpecialOfferGroupLink
     */
    protected $resource;

    /**
     * @var SpecialOfferGroupLinkInterfaceFactory
     */
    protected $specialOfferGroupLinkFactory;

    /**
     * @var SpecialOfferGroupLinkCollectionFactory
     */
    protected $specialOfferGroupLinkCollectionFactory;


    /**
     * @param ResourceSpecialOfferGroupLink $resource
     * @param SpecialOfferGroupLinkInterfaceFactory $specialOfferGroupLinkFactory
     * @param SpecialOfferGroupLinkCollectionFactory $specialOfferGroupLinkCollectionFactory
     * @param SpecialOfferGroupLinkSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceSpecialOfferGroupLink $resource,
        SpecialOfferGroupLinkInterfaceFactory $specialOfferGroupLinkFactory,
        SpecialOfferGroupLinkCollectionFactory $specialOfferGroupLinkCollectionFactory,
        SpecialOfferGroupLinkSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->specialOfferGroupLinkFactory = $specialOfferGroupLinkFactory;
        $this->specialOfferGroupLinkCollectionFactory = $specialOfferGroupLinkCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(
        SpecialOfferGroupLinkInterface $specialOfferGroupLink
    ) {
        try {
            $this->resource->save($specialOfferGroupLink);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the specialOfferGroupLink: %1',
                $exception->getMessage()
            ));
        }
        return $specialOfferGroupLink;
    }

    /**
     * @inheritDoc
     */
    public function get($specialOfferGroupLinkId)
    {
        $specialOfferGroupLink = $this->specialOfferGroupLinkFactory->create();
        $this->resource->load($specialOfferGroupLink, $specialOfferGroupLinkId);
        if (!$specialOfferGroupLink->getId()) {
            throw new NoSuchEntityException(__('SpecialOfferGroupLink with id "%1" does not exist.', $specialOfferGroupLinkId));
        }
        return $specialOfferGroupLink;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->specialOfferGroupLinkCollectionFactory->create();
        
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
        SpecialOfferGroupLinkInterface $specialOfferGroupLink
    ) {
        try {
            $specialOfferGroupLinkModel = $this->specialOfferGroupLinkFactory->create();
            $this->resource->load($specialOfferGroupLinkModel, $specialOfferGroupLink->getSpecialoffergrouplinkId());
            $this->resource->delete($specialOfferGroupLinkModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the SpecialOfferGroupLink: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($specialOfferGroupLinkId)
    {
        return $this->delete($this->get($specialOfferGroupLinkId));
    }
}

