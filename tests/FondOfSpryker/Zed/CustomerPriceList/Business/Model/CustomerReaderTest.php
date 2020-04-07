<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Business\Model;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CustomerPriceList\Persistence\CustomerPriceListRepositoryInterface;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\PriceListCollectionTransfer;

class CustomerReaderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CustomerPriceList\Business\Model\CustomerReader
     */
    protected $customerReader;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CustomerPriceList\Persistence\CustomerPriceListRepositoryInterface
     */
    protected $customerPriceListRepositoryInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var int
     */
    protected $idCustomer;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\PriceListCollectionTransfer
     */
    protected $priceListCollectionTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->customerPriceListRepositoryInterfaceMock = $this->getMockBuilder(CustomerPriceListRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->idCustomer = 1;

        $this->priceListCollectionTransferMock = $this->getMockBuilder(PriceListCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerReader = new CustomerReader(
            $this->customerPriceListRepositoryInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testGetPriceListCollectionByIdCustomer(): void
    {
        $this->customerTransferMock->expects($this->atLeastOnce())
            ->method('requireIdCustomer')
            ->willReturnSelf();

        $this->customerTransferMock->expects($this->atLeastOnce())
            ->method('getIdCustomer')
            ->willReturn($this->idCustomer);

        $this->customerPriceListRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('getPriceListCollectionByIdCustomer')
            ->with($this->idCustomer)
            ->willReturn($this->priceListCollectionTransferMock);

        $this->assertInstanceOf(
            PriceListCollectionTransfer::class,
            $this->customerReader->getPriceListCollectionByIdCustomer(
                $this->customerTransferMock
            )
        );
    }
}
