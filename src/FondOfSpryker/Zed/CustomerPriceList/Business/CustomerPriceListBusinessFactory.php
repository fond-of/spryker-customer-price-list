<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Business;

use FondOfSpryker\Zed\CustomerPriceList\Business\Model\CustomerHydrator;
use FondOfSpryker\Zed\CustomerPriceList\Business\Model\CustomerHydratorInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\CustomerPriceList\Persistence\CustomerPriceListRepositoryInterface getRepository()
 */
class CustomerPriceListBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\CustomerPriceList\Business\Model\CustomerHydratorInterface
     */
    public function createCustomerHydrator(): CustomerHydratorInterface
    {
        return new CustomerHydrator();
    }
}
