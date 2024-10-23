<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ITDN\SpecialOffer\Model;

use ITDN\SpecialOffer\Api\Data\SpecialOfferInterface;
use Magento\Framework\Model\AbstractModel;

class SpecialOffer extends AbstractModel implements SpecialOfferInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\ITDN\SpecialOffer\Model\ResourceModel\SpecialOffer::class);
    }

    /**
     * @inheritDoc
     */
    public function getSpecialofferId()
    {
        return $this->getData(self::SPECIALOFFER_ID);
    }

    /**
     * @inheritDoc
     */
    public function setSpecialofferId($specialofferId)
    {
        return $this->setData(self::SPECIALOFFER_ID, $specialofferId);
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

    /**
     * @inheritDoc
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * @inheritDoc
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }

    /**
     * @inheritDoc
     */
    public function getGroupId()
    {
        return $this->getData(self::GROUP_ID);
    }

    /**
     * @inheritDoc
     */
    public function setGroupId($groupId)
    {
        return $this->setData(self::GROUP_ID, $groupId);
    }
}

