<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ITDN\SpecialOffer\Model\ResourceModel\SpecialOfferGroupLink;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'specialoffergrouplink_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \ITDN\SpecialOffer\Model\SpecialOfferGroupLink::class,
            \ITDN\SpecialOffer\Model\ResourceModel\SpecialOfferGroupLink::class
        );
    }
}

