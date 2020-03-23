<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CustomerPriceList\Business\Model\CustomerExpanderInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class CustomerPriceListFacadeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CustomerPriceList\Business\CustomerPriceListFacade
     */
    protected $customerPriceListFacade;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CustomerPriceList\Business\CustomerPriceListBusinessFactory
     */
    protected $customerPriceListBusinessFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CustomerPriceList\Business\Model\CustomerExpanderInterface
     */
    protected $customerExpanderInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->customerPriceListBusinessFactoryMock = $this->getMockBuilder(CustomerPriceListBusinessFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerExpanderInterfaceMock = $this->getMockBuilder(CustomerExpanderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerPriceListFacade = new CustomerPriceListFacade();
        $this->customerPriceListFacade->setFactory($this->customerPriceListBusinessFactoryMock);
    }

    /**
     * @return void
     */
    public function testExpandCustomer(): void
    {
        $this->customerPriceListBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createCustomerExpander')
            ->willReturn($this->customerExpanderInterfaceMock);

        $this->customerExpanderInterfaceMock->expects($this->atLeastOnce())
            ->method('expand')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->customerPriceListFacade->expandCustomer($this->customerTransferMock)
        );
    }
}
