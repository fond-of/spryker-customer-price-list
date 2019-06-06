<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Business;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\CustomerPriceList\Persistence\CustomerPriceListRepositoryInterface getRepository()
 * @method \FondOfSpryker\Zed\CustomerPriceList\Business\CustomerPriceListBusinessFactory getFactory()
 */
class CustomerPriceListFacade extends AbstractFacade implements CustomerPriceListFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function hydrateCustomer(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        return $this->getFactory()->createCustomerHydrator()->hydrate($customerTransfer);
    }
}
