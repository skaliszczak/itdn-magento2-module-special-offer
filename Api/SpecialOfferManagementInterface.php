<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ITDN\SpecialOffer\Api;

interface SpecialOfferManagementInterface
{

    /**
     * POST for SpecialOffer api
     * @param string $param
     * @return string
     */
    public function postSpecialOffer($param);

    /**
     * DELETE for SpecialOffer api
     * @param string $param
     * @return string
     */
    public function deleteSpecialOffer($param);
}

