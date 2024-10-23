<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ITDN\SpecialOffer\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface SpecialOfferGroupLinkRepositoryInterface
{

    /**
     * Save SpecialOfferGroupLink
     * @param \ITDN\SpecialOffer\Api\Data\SpecialOfferGroupLinkInterface $specialOfferGroupLink
     * @return \ITDN\SpecialOffer\Api\Data\SpecialOfferGroupLinkInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \ITDN\SpecialOffer\Api\Data\SpecialOfferGroupLinkInterface $specialOfferGroupLink
    );

    /**
     * Retrieve SpecialOfferGroupLink
     * @param string $specialoffergrouplinkId
     * @return \ITDN\SpecialOffer\Api\Data\SpecialOfferGroupLinkInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($specialoffergrouplinkId);

    /**
     * Retrieve SpecialOfferGroupLink matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \ITDN\SpecialOffer\Api\Data\SpecialOfferGroupLinkSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete SpecialOfferGroupLink
     * @param \ITDN\SpecialOffer\Api\Data\SpecialOfferGroupLinkInterface $specialOfferGroupLink
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \ITDN\SpecialOffer\Api\Data\SpecialOfferGroupLinkInterface $specialOfferGroupLink
    );

    /**
     * Delete SpecialOfferGroupLink by ID
     * @param string $specialoffergrouplinkId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($specialoffergrouplinkId);
}

