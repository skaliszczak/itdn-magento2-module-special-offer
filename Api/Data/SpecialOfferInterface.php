<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ITDN\SpecialOffer\Api\Data;

interface SpecialOfferInterface
{

    const UPDATED_AT = 'updated_at';
    const NAME = 'name';
    const GROUP_ID = 'group_id';
    const CREATED_AT = 'created_at';
    const SPECIALOFFER_ID = 'specialoffer_id';

    /**
     * Get specialoffer_id
     * @return string|null
     */
    public function getSpecialofferId();

    /**
     * Set specialoffer_id
     * @param string $specialofferId
     * @return \ITDN\SpecialOffer\SpecialOffer\Api\Data\SpecialOfferInterface
     */
    public function setSpecialofferId($specialofferId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \ITDN\SpecialOffer\SpecialOffer\Api\Data\SpecialOfferInterface
     */
    public function setName($name);

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \ITDN\SpecialOffer\SpecialOffer\Api\Data\SpecialOfferInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get updated_at
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set updated_at
     * @param string $updatedAt
     * @return \ITDN\SpecialOffer\SpecialOffer\Api\Data\SpecialOfferInterface
     */
    public function setUpdatedAt($updatedAt);

    /**
     * Get group_id
     * @return string|null
     */
    public function getGroupId();

    /**
     * Set group_id
     * @param string $groupId
     * @return \ITDN\SpecialOffer\SpecialOffer\Api\Data\SpecialOfferInterface
     */
    public function setGroupId($groupId);
}

