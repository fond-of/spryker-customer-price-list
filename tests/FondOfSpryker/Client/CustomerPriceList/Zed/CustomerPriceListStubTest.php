<?php

namespace FondOfSpryker\Client\CustomerPriceList\Zed;

use Codeception\Test\Unit;
use FondOfSpryker\Client\CustomerPriceList\Dependency\Client\CustomerPriceListToZedRequestClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class CustomerPriceListStubTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\CustomerPriceList\Zed\CustomerPriceListStub
     */
    protected $customerPriceListStub;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\CustomerPriceList\Dependency\Client\CustomerPriceListToZedRequestClientInterface
     */
    protected $customerPriceListToZedRequestClientInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var string
     */
    protected $url;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->customerPriceListToZedRequestClientInterfaceMock = $this->getMockBuilder(CustomerPriceListToZedRequestClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->url = '/customer-price-list/gateway/expand-customer';

        $this->customerPriceListStub = new CustomerPriceListStub(
            $this->customerPriceListToZedRequestClientInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testExpandCustomer(): void
    {
        $this->customerPriceListToZedRequestClientInterfaceMock->expects($this->atLeastOnce())
            ->method('call')
            ->with($this->url, $this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->customerPriceListStub->expandCustomer(
                $this->customerTransferMock
            )
        );
    }
}
