<?php

namespace FondOfSpryker\Client\CustomerPriceList;

use Codeception\Test\Unit;
use FondOfSpryker\Client\CustomerPriceList\Zed\CustomerPriceListStubInterface;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\PriceListCollectionTransfer;

class CustomerPriceListClientTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\CustomerPriceList\CustomerPriceListClient
     */
    protected $customerPriceListClient;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\CustomerPriceList\CustomerPriceListFactory
     */
    protected $customerPriceListFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\CustomerPriceList\Zed\CustomerPriceListStubInterface
     */
    protected $customerPriceListStubInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\PriceListCollectionTransfer
     */
    protected $priceListCollectionTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->customerPriceListFactoryMock = $this->getMockBuilder(CustomerPriceListFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerPriceListStubInterfaceMock = $this->getMockBuilder(CustomerPriceListStubInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceListCollectionTransferMock = $this->getMockBuilder(PriceListCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerPriceListClient = new CustomerPriceListClient();
        $this->customerPriceListClient->setFactory($this->customerPriceListFactoryMock);
    }

    /**
     * @return void
     */
    public function testExpandCustomer(): void
    {
        $this->customerPriceListFactoryMock->expects($this->atLeastOnce())
            ->method('createZedStub')
            ->willReturn($this->customerPriceListStubInterfaceMock);

        $this->customerPriceListStubInterfaceMock->expects($this->atLeastOnce())
            ->method('expandCustomer')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->customerPriceListClient->expandCustomer(
                $this->customerTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testGetPriceListCollectionByIdCustomer(): void
    {
        $this->customerPriceListFactoryMock->expects($this->atLeastOnce())
            ->method('createZedStub')
            ->willReturn($this->customerPriceListStubInterfaceMock);

        $this->customerPriceListStubInterfaceMock->expects($this->atLeastOnce())
            ->method('getPriceListCollectionByIdCustomer')
            ->with($this->customerTransferMock)
            ->willReturn($this->priceListCollectionTransferMock);

        $this->assertInstanceOf(
            PriceListCollectionTransfer::class,
            $this->customerPriceListClient->getPriceListCollectionByIdCustomer(
                $this->customerTransferMock
            )
        );
    }
}
