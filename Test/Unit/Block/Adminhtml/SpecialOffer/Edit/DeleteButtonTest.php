<?php

namespace ITDN\SpecialOffer\Test\Unit\Block\Adminhtml\SpecialOffer\Edit;

use ITDN\SpecialOffer\Block\Adminhtml\SpecialOffer\Edit\DeleteButton;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\TestCase;

class DeleteButtonTest extends TestCase
{
    protected \ITDN\SpecialOffer\Block\Adminhtml\SpecialOffer\Edit\DeleteButton $deleteButton;

    protected function setUp(): void
    {
        $objectManager = new ObjectManager($this);
        $this->deleteButton = $objectManager->getObject(DeleteButton::class);

        parent::setUp();
    }
    public function testDeleteButtonBasics()
    {
        $this->assertEquals(
            get_class($this->deleteButton),
            DeleteButton::class,
            'Delete button should be a DeleteButton class'
        );
    }
}
