<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CustomerPriceList\Business\Model\CustomerExpanderInterface;
use FondOfSpryker\Zed\CustomerPriceList\Business\Model\CustomerPriceListReaderInterface;
use FondOfSpryker\Zed\CustomerPriceList\Persistence\CustomerPriceListRepository;

class CustomerPriceListBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CustomerPriceList\Business\CustomerPriceListBusinessFactory
     */
    protected $customerPriceListBusinessFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CustomerPriceList\Persistence\CustomerPriceListRepository
     */
    protected $customerPriceListRepositoryMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->customerPriceListRepositoryMock = $this->getMockBuilder(CustomerPriceListRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerPriceListBusinessFactory = new CustomerPriceListBusinessFactory();
        $this->customerPriceListBusinessFactory->setRepository($this->customerPriceListRepositoryMock);
    }

    /**
     * @return void
     */
    public function testCreateCustomerExpander(): void
    {
        $this->assertInstanceOf(
            CustomerExpanderInterface::class,
            $this->customerPriceListBusinessFactory->createCustomerExpander()
        );
    }

    /**
     * @return void
     */
    public function testCreateCustomerPriceListReader(): void
    {
        $this->assertInstanceOf(
            CustomerPriceListReaderInterface::class,
            $this->customerPriceListBusinessFactory->createCustomerPriceListReader()
        );
    }
}
