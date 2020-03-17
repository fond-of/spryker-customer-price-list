<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Communication\Plugin\CustomerB2b;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CustomerPriceList\Business\CustomerPriceListFacade;
use Generated\Shared\Transfer\CustomerTransfer;

class PriceListCustomerB2bHydrationPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CustomerPriceList\Communication\Plugin\CustomerB2b\PriceListCustomerB2bHydrationPlugin
     */
    protected $priceListCustomerB2bHydrationPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CustomerPriceList\Business\CustomerPriceListFacade
     */
    protected $customerPriceListFacadeMock;

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

        $this->priceListCustomerB2bHydrationPlugin = new PriceListCustomerB2bHydrationPlugin();
        $this->priceListCustomerB2bHydrationPlugin->setFacade($this->customerPriceListFacadeMock);
    }

    /**
     * @return void
     */
    public function testHydrate(): void
    {
        $this->customerPriceListFacadeMock->expects($this->atLeastOnce())
            ->method('expandCustomer')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->priceListCustomerB2bHydrationPlugin->hydrate($this->customerTransferMock)
        );
    }
}
