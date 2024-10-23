<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ITDN\SpecialOffer\Api\Data;

interface SpecialOfferGroupLinkInterface
{

    const SPECIALOFFERGROUPLINK_ID = 'specialoffergrouplink_id';
    const SPECIALOFFER_ID = 'specialoffer_id';
    const GROUP_ID = 'group_id';

    /**
     * Get specialoffergrouplink_id
     * @return string|null
     */
    public function getSpecialoffergrouplinkId();

    /**
     * Set specialoffergrouplink_id
     * @param string $specialoffergrouplinkId
     * @return \ITDN\SpecialOffer\SpecialOfferGroupLink\Api\Data\SpecialOfferGroupLinkInterface
     */
    public function setSpecialoffergrouplinkId($specialoffergrouplinkId);

    /**
     * Get group_id
     * @return string|null
     */
    public function getGroupId();

    /**
     * Set group_id
     * @param string $groupId
     * @return \ITDN\SpecialOffer\SpecialOfferGroupLink\Api\Data\SpecialOfferGroupLinkInterface
     */
    public function setGroupId($groupId);

    /**
     * Get specialoffer_id
     * @return string|null
     */
    public function getSpecialofferId();

    /**
     * Set specialoffer_id
     * @param string $specialofferId
     * @return \ITDN\SpecialOffer\SpecialOfferGroupLink\Api\Data\SpecialOfferGroupLinkInterface
     */
    public function setSpecialofferId($specialofferId);
}

