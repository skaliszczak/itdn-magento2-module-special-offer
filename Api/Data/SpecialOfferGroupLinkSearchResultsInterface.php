<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ITDN\SpecialOffer\Api\Data;

interface SpecialOfferGroupLinkSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get SpecialOfferGroupLink list.
     * @return \ITDN\SpecialOffer\Api\Data\SpecialOfferGroupLinkInterface[]
     */
    public function getItems();

    /**
     * Set group_id list.
     * @param \ITDN\SpecialOffer\Api\Data\SpecialOfferGroupLinkInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

