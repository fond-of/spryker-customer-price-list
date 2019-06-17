<?php

namespace FondOfSpryker\Glue\CustomerPriceList;

use FondOfSpryker\Glue\CustomerPriceList\Processor\Expander\CustomerExpander;
use FondOfSpryker\Glue\CustomerPriceList\Processor\Expander\CustomerExpanderInterface;
use Spryker\Glue\Kernel\AbstractFactory;

/**
 * @method \FondOfSpryker\Client\CustomerPriceList\CustomerPriceListClientInterface getClient()
 */
class CustomerPriceListFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Glue\CustomerPriceList\Processor\Expander\CustomerExpanderInterface
     */
    public function createCustomerExpander(): CustomerExpanderInterface
    {
        return new CustomerExpander($this->getClient());
    }
}
