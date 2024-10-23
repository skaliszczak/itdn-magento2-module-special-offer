<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ITDN\SpecialOffer\Model;

use ITDN\SpecialOffer\Api\Data\SpecialOfferGroupLinkInterface;
use Magento\Framework\Model\AbstractModel;

class SpecialOfferGroupLink extends AbstractModel implements SpecialOfferGroupLinkInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\ITDN\SpecialOffer\Model\ResourceModel\SpecialOfferGroupLink::class);
    }

    /**
     * @inheritDoc
     */
    public function getSpecialoffergrouplinkId()
    {
        return $this->getData(self::SPECIALOFFERGROUPLINK_ID);
    }

    /**
     * @inheritDoc
     */
    public function setSpecialoffergrouplinkId($specialoffergrouplinkId)
    {
        return $this->setData(self::SPECIALOFFERGROUPLINK_ID, $specialoffergrouplinkId);
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
}

