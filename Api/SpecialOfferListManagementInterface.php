<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ITDN\SpecialOffer\Api;

interface SpecialOfferListManagementInterface
{

    /**
     * GET for SpecialOfferList api
     * @param string $param
     * @return string
     */
    public function getSpecialOfferList($param);
}

