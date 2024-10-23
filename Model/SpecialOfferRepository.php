<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ITDN\SpecialOffer\Model;

use ITDN\SpecialOffer\Api\Data\SpecialOfferInterface;
use ITDN\SpecialOffer\Api\Data\SpecialOfferInterfaceFactory;
use ITDN\SpecialOffer\Api\Data\SpecialOfferSearchResultsInterfaceFactory;
use ITDN\SpecialOffer\Api\SpecialOfferRepositoryInterface;
use ITDN\SpecialOffer\Model\ResourceModel\SpecialOffer as ResourceSpecialOffer;
use ITDN\SpecialOffer\Model\ResourceModel\SpecialOffer\CollectionFactory as SpecialOfferCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class SpecialOfferRepository implements SpecialOfferRepositoryInterface
{

    /**
     * @var SpecialOfferCollectionFactory
     */
    protected $specialOfferCollectionFactory;

    /**
     * @var ResourceSpecialOffer
     */
    protected $resource;

    /**
     * @var SpecialOffer
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var SpecialOfferInterfaceFactory
     */
    protected $specialOfferFactory;


    /**
     * @param ResourceSpecialOffer $resource
     * @param SpecialOfferInterfaceFactory $specialOfferFactory
     * @param SpecialOfferCollectionFactory $specialOfferCollectionFactory
     * @param SpecialOfferSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceSpecialOffer $resource,
        SpecialOfferInterfaceFactory $specialOfferFactory,
        SpecialOfferCollectionFactory $specialOfferCollectionFactory,
        SpecialOfferSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->specialOfferFactory = $specialOfferFactory;
        $this->specialOfferCollectionFactory = $specialOfferCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(SpecialOfferInterface $specialOffer)
    {
        try {
            $this->resource->save($specialOffer);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the specialOffer: %1',
                $exception->getMessage()
            ));
        }
        return $specialOffer;
    }

    /**
     * @inheritDoc
     */
    public function get($specialOfferId)
    {
        $specialOffer = $this->specialOfferFactory->create();
        $this->resource->load($specialOffer, $specialOfferId);
        if (!$specialOffer->getId()) {
            throw new NoSuchEntityException(__('SpecialOffer with id "%1" does not exist.', $specialOfferId));
        }
        return $specialOffer;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->specialOfferCollectionFactory->create();
        
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
    public function delete(SpecialOfferInterface $specialOffer)
    {
        try {
            $specialOfferModel = $this->specialOfferFactory->create();
            $this->resource->load($specialOfferModel, $specialOffer->getSpecialofferId());
            $this->resource->delete($specialOfferModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the SpecialOffer: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($specialOfferId)
    {
        return $this->delete($this->get($specialOfferId));
    }
}

