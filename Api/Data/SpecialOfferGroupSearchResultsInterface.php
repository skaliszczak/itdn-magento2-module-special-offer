<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ITDN\SpecialOffer\Api\Data;

interface SpecialOfferGroupSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get SpecialOfferGroup list.
     * @return \ITDN\SpecialOffer\Api\Data\SpecialOfferGroupInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \ITDN\SpecialOffer\Api\Data\SpecialOfferGroupInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

