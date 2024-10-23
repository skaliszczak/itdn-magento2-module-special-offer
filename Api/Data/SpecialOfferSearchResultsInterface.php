<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ITDN\SpecialOffer\Api\Data;

interface SpecialOfferSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get SpecialOffer list.
     * @return \ITDN\SpecialOffer\Api\Data\SpecialOfferInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \ITDN\SpecialOffer\Api\Data\SpecialOfferInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

