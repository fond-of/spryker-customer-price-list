<?php

namespace FondOfSpryker\Glue\CustomerPriceList\Plugin\CustomersRestApiExtension;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\CustomerPriceList\CustomerPriceListFactory;
use FondOfSpryker\Glue\CustomerPriceList\Processor\Expander\CustomerExpanderInterface;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class PriceListCustomerExpanderPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CustomerPriceList\Plugin\CustomersRestApiExtension\PriceListCustomerExpanderPlugin
     */
    protected $priceListCustomerExpanderPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\CustomerPriceList\CustomerPriceListFactory
     */
    protected $customerPriceListFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface
     */
    protected $restRequestInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\CustomerPriceList\Processor\Expander\CustomerExpanderInterface
     */
    protected $customerExpanderInterfaceMock;

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

        $this->restRequestInterfaceMock = $this->getMockBuilder(RestRequestInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerExpanderInterfaceMock = $this->getMockBuilder(CustomerExpanderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceListCustomerExpanderPlugin = new PriceListCustomerExpanderPlugin();
        $this->priceListCustomerExpanderPlugin->setFactory($this->customerPriceListFactoryMock);
    }

    /**
     * @return void
     */
    public function testExpand(): void
    {
        $this->customerPriceListFactoryMock->expects($this->atLeastOnce())
            ->method('createCustomerExpander')
            ->willReturn($this->customerExpanderInterfaceMock);

        $this->customerExpanderInterfaceMock->expects($this->atLeastOnce())
            ->method('expand')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertEquals(
            $this->customerTransferMock,
            $this->priceListCustomerExpanderPlugin->expand(
                $this->customerTransferMock,
                $this->restRequestInterfaceMock,
            ),
        );
    }
}
