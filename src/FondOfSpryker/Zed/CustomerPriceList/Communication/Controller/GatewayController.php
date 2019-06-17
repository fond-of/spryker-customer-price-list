<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Communication\Controller;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

/**
 * @method \FondOfSpryker\Zed\CustomerPriceList\Business\CustomerPriceListFacadeInterface getFacade()
 */
class GatewayController extends AbstractGatewayController
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerAction(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        return $this->getFacade()->expandCustomer($customerTransfer);
    }
}
