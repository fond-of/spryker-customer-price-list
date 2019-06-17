<?php

namespace FondOfSpryker\Client\CustomerPriceList\Zed;

use Generated\Shared\Transfer\CustomerTransfer;

interface CustomerPriceListStubInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomer(CustomerTransfer $customerTransfer): CustomerTransfer;
}
