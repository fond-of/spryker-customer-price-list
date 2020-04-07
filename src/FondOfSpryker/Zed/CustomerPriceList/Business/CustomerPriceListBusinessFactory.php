<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Business;

use FondOfSpryker\Zed\CustomerPriceList\Business\Model\CustomerExpander;
use FondOfSpryker\Zed\CustomerPriceList\Business\Model\CustomerExpanderInterface;
use FondOfSpryker\Zed\CustomerPriceList\Business\Model\CustomerReader;
use FondOfSpryker\Zed\CustomerPriceList\Business\Model\CustomerReaderInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\CustomerPriceList\Persistence\CustomerPriceListRepositoryInterface getRepository()
 */
class CustomerPriceListBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\CustomerPriceList\Business\Model\CustomerExpanderInterface
     */
    public function createCustomerExpander(): CustomerExpanderInterface
    {
        return new CustomerExpander($this->getRepository());
    }

    /**
     * @return \FondOfSpryker\Zed\CustomerPriceList\Business\Model\CustomerReaderInterface
     */
    public function createCustomerReader(): CustomerReaderInterface
    {
        return new CustomerReader($this->getRepository());
    }
}
