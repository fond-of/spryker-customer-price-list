<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Communication\Plugin\Customer;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Zed\Customer\Dependency\Plugin\CustomerTransferExpanderPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\CustomerPriceList\Business\CustomerPriceListFacadeInterface getFacade()
 */
class PriceListCustomerTransferExpanderPlugin extends AbstractPlugin implements CustomerTransferExpanderPluginInterface
{
    /**
     * {@inheritdoc}
     *
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     * @api
     *
     */
    public function expandTransfer(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        return $this->getFacade()->expandCustomer($customerTransfer);
    }
}
