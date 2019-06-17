<?php

namespace FondOfSpryker\Client\CustomerPriceList;

use Generated\Shared\Transfer\CustomerTransfer;

interface CustomerPriceListClientInterface
{
    /**
     * @api
     *
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomer(CustomerTransfer $customerTransfer): CustomerTransfer;
}
