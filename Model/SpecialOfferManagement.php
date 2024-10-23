<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ITDN\SpecialOffer\Model;

class SpecialOfferManagement implements \ITDN\SpecialOffer\Api\SpecialOfferManagementInterface
{

    /**
     * {@inheritdoc}
     */
    public function postSpecialOffer($param)
    {
        return 'hello api POST return the $param ' . $param;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteSpecialOffer($param)
    {
        return 'hello api DELETE return the $param ' . $param;
    }
}

