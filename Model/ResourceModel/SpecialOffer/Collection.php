<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ITDN\SpecialOffer\Model\ResourceModel\SpecialOffer;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'specialoffer_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \ITDN\SpecialOffer\Model\SpecialOffer::class,
            \ITDN\SpecialOffer\Model\ResourceModel\SpecialOffer::class
        );
    }
}

