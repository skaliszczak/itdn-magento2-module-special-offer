<?php

namespace ITDN\SpecialOffer\Model\Select\Source;

use ITDN\SpecialOffer\Model\ResourceModel\SpecialOfferGroup\CollectionFactory as SpecialOfferGroupCollectionFactory;
use Magento\Framework\Data\OptionSourceInterface;

class Options implements OptionSourceInterface
{
    /** @var SpecialOfferGroupCollectionFactory  */
    protected SpecialOfferGroupCollectionFactory $specialOfferGroupCollectionFactory;

    /**
     * @param SpecialOfferGroupCollectionFactory $specialOfferGroupCollectionFactory
     */
    public function __construct(
        SpecialOfferGroupCollectionFactory $specialOfferGroupCollectionFactory
    ) {
        $this->specialOfferGroupCollectionFactory = $specialOfferGroupCollectionFactory;
    }

    /**
     * @return array[]
     */
    public function toOptionArray(): array
    {
        $specialOfferCollection = $this->specialOfferGroupCollectionFactory->create();

        $options = [[
            'label' => __('None'),
            'value' => ''
        ]];

        if ($specialOfferCollection->getSize() > 0) {
            foreach ($specialOfferCollection as $specialOffer) {
                $options[] = [
                    'value' => $specialOffer->getId(),
                    'label' => $specialOffer->getName(),
                ];
            }
        }

        return $options;
    }
}
