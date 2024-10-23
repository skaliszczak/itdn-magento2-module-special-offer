<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ITDN\SpecialOffer\Model;

use ITDN\SpecialOffer\Api\Data\SpecialOfferGroupInterface;
use Magento\Framework\Model\AbstractModel;

class SpecialOfferGroup extends AbstractModel implements SpecialOfferGroupInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\ITDN\SpecialOffer\Model\ResourceModel\SpecialOfferGroup::class);
    }

    /**
     * @inheritDoc
     */
    public function getSpecialoffergroupId()
    {
        return $this->getData(self::SPECIALOFFERGROUP_ID);
    }

    /**
     * @inheritDoc
     */
    public function setSpecialoffergroupId($specialoffergroupId)
    {
        return $this->setData(self::SPECIALOFFERGROUP_ID, $specialoffergroupId);
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }
}

