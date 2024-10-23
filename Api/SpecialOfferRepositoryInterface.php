<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ITDN\SpecialOffer\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface SpecialOfferRepositoryInterface
{

    /**
     * Save SpecialOffer
     * @param \ITDN\SpecialOffer\Api\Data\SpecialOfferInterface $specialOffer
     * @return \ITDN\SpecialOffer\Api\Data\SpecialOfferInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \ITDN\SpecialOffer\Api\Data\SpecialOfferInterface $specialOffer
    );

    /**
     * Retrieve SpecialOffer
     * @param string $specialofferId
     * @return \ITDN\SpecialOffer\Api\Data\SpecialOfferInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($specialofferId);

    /**
     * Retrieve SpecialOffer matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \ITDN\SpecialOffer\Api\Data\SpecialOfferSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete SpecialOffer
     * @param \ITDN\SpecialOffer\Api\Data\SpecialOfferInterface $specialOffer
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \ITDN\SpecialOffer\Api\Data\SpecialOfferInterface $specialOffer
    );

    /**
     * Delete SpecialOffer by ID
     * @param string $specialofferId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($specialofferId);
}

