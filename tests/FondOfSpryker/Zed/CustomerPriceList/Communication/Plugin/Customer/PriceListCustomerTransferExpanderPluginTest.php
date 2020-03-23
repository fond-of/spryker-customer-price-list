<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Communication\Plugin\Customer;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CustomerPriceList\Business\CustomerPriceListFacade;
use Generated\Shared\Transfer\CustomerTransfer;

class PriceListCustomerTransferExpanderPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CustomerPriceList\Communication\Plugin\Customer\PriceListCustomerTransferExpanderPlugin
     */
    protected $priceListCustomerTransferExpanderPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CustomerPriceList\Business\CustomerPriceListFacade
     */
    protected $customerPriceListFacadeMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->customerPriceListFacadeMock = $this->getMockBuilder(CustomerPriceListFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceListCustomerTransferExpanderPlugin = new PriceListCustomerTransferExpanderPlugin();
        $this->priceListCustomerTransferExpanderPlugin->setFacade($this->customerPriceListFacadeMock);
    }

    /**
     * @return void
     */
    public function testExpandTransfer(): void
    {
        $this->customerPriceListFacadeMock->expects($this->atLeastOnce())
            ->method('expandCustomer')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->priceListCustomerTransferExpanderPlugin->expandTransfer($this->customerTransferMock)
        );
    }
}
