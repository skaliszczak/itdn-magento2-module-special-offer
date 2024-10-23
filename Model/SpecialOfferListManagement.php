<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ITDN\SpecialOffer\Model;

class SpecialOfferListManagement implements \ITDN\SpecialOffer\Api\SpecialOfferListManagementInterface
{

    /**
     * {@inheritdoc}
     */
    public function getSpecialOfferList($param)
    {
        return 'hello api GET return the $param ' . $param;
    }
}

