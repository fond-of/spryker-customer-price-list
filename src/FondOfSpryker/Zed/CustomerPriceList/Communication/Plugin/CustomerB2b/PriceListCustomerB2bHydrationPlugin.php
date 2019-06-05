<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Communication\Plugin\CustomerB2b;

use FondOfSpryker\Zed\CustomerB2b\Dependency\Plugin\CustomerB2bHydrationPluginInterface;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\CustomerPriceList\Business\CustomerPriceListFacadeInterface getFacade()
 */
class PriceListCustomerB2bHydrationPlugin extends AbstractPlugin implements CustomerB2bHydrationPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function hydrate(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        return $this->getFacade()->hydrateCustomer($customerTransfer);
    }
}
