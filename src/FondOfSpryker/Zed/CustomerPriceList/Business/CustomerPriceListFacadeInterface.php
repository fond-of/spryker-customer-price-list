<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Business;

use Generated\Shared\Transfer\CustomerTransfer;

interface CustomerPriceListFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function hydrateCustomer(CustomerTransfer $customerTransfer): CustomerTransfer;
}
