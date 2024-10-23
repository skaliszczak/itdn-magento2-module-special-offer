<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ITDN\SpecialOffer\Api\Data;

interface SpecialOfferGroupInterface
{

    const NAME = 'name';
    const SPECIALOFFERGROUP_ID = 'specialoffergroup_id';

    /**
     * Get specialoffergroup_id
     * @return string|null
     */
    public function getSpecialoffergroupId();

    /**
     * Set specialoffergroup_id
     * @param string $specialoffergroupId
     * @return \ITDN\SpecialOffer\SpecialOfferGroup\Api\Data\SpecialOfferGroupInterface
     */
    public function setSpecialoffergroupId($specialoffergroupId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \ITDN\SpecialOffer\SpecialOfferGroup\Api\Data\SpecialOfferGroupInterface
     */
    public function setName($name);
}

