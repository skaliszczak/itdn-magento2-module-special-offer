<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ITDN\SpecialOffer\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface SpecialOfferGroupRepositoryInterface
{

    /**
     * Save SpecialOfferGroup
     * @param \ITDN\SpecialOffer\Api\Data\SpecialOfferGroupInterface $specialOfferGroup
     * @return \ITDN\SpecialOffer\Api\Data\SpecialOfferGroupInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \ITDN\SpecialOffer\Api\Data\SpecialOfferGroupInterface $specialOfferGroup
    );

    /**
     * Retrieve SpecialOfferGroup
     * @param string $specialoffergroupId
     * @return \ITDN\SpecialOffer\Api\Data\SpecialOfferGroupInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($specialoffergroupId);

    /**
     * Retrieve SpecialOfferGroup matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \ITDN\SpecialOffer\Api\Data\SpecialOfferGroupSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete SpecialOfferGroup
     * @param \ITDN\SpecialOffer\Api\Data\SpecialOfferGroupInterface $specialOfferGroup
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \ITDN\SpecialOffer\Api\Data\SpecialOfferGroupInterface $specialOfferGroup
    );

    /**
     * Delete SpecialOfferGroup by ID
     * @param string $specialoffergroupId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($specialoffergroupId);
}

