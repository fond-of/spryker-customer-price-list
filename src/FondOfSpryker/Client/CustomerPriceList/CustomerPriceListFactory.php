<?php

namespace FondOfSpryker\Client\CustomerPriceList;

use FondOfSpryker\Client\CustomerPriceList\Dependency\Client\CustomerPriceListToZedRequestClientInterface;
use FondOfSpryker\Client\CustomerPriceList\Zed\CustomerPriceListStub;
use FondOfSpryker\Client\CustomerPriceList\Zed\CustomerPriceListStubInterface;
use Spryker\Client\Kernel\AbstractFactory;

class CustomerPriceListFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Client\CustomerPriceList\Zed\CustomerPriceListStubInterface
     */
    public function createZedStub(): CustomerPriceListStubInterface
    {
        return new CustomerPriceListStub($this->getZedRequestClient());
    }

    /**
     * @return \FondOfSpryker\Client\CustomerPriceList\Dependency\Client\CustomerPriceListToZedRequestClientInterface
     */
    protected function getZedRequestClient(): CustomerPriceListToZedRequestClientInterface
    {
        return $this->getProvidedDependency(CustomerPriceListDependencyProvider::CLIENT_ZED_REQUEST);
    }
}
