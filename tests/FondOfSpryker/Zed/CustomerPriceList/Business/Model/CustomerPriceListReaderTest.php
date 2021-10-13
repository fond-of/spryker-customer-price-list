<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Business\Model;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CustomerPriceList\Persistence\CustomerPriceListRepositoryInterface;
use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\PriceListCollectionTransfer;
use Generated\Shared\Transfer\PriceListRequestTransfer;

class CustomerPriceListReaderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CustomerPriceList\Business\Model\CustomerPriceListReader
     */
    protected $customerPriceListReader;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CustomerPriceList\Persistence\CustomerPriceListRepositoryInterface
     */
    protected $customerPriceListRepositoryInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyTransfer
     */
    protected $companyTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\PriceListRequestTransfer
     */
    protected $priceListRequestTransferMock;

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

        $this->companyTransferMock = $this->getMockBuilder(CompanyTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->idCustomer = 1;

        $this->priceListCollectionTransferMock = $this->getMockBuilder(PriceListCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceListRequestTransferMock = $this->getMockBuilder(PriceListRequestTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerPriceListReader = new CustomerPriceListReader(
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
            $this->customerPriceListReader->getPriceListCollectionByIdCustomer(
                $this->customerTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testGetPriceListsByIdCustomerAndCompanyUuid(): void
    {
        $this->priceListRequestTransferMock->expects($this->atLeastOnce())
            ->method('requireCustomer')
            ->willReturnSelf();
        $this->priceListRequestTransferMock->expects($this->atLeastOnce())
            ->method('requireCompany')
            ->willReturnSelf();

        $this->priceListRequestTransferMock->expects($this->atLeastOnce())
            ->method('getCustomer')
            ->willReturn($this->customerTransferMock);

        $this->priceListRequestTransferMock->expects($this->atLeastOnce())
            ->method('getCompany')
            ->willReturn($this->companyTransferMock);

        $this->customerPriceListRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('getPriceListsByIdCustomerAndCompanyUuid')
            ->with($this->customerTransferMock, $this->companyTransferMock)
            ->willReturn($this->priceListCollectionTransferMock);

        $this->assertInstanceOf(
            PriceListCollectionTransfer::class,
            $this->customerPriceListReader->getPriceListsByIdCustomerAndCompanyUuid(
                $this->priceListRequestTransferMock
            )
        );
    }
}
