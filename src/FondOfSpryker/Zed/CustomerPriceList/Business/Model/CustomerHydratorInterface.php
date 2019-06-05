<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Business\Model;

use Generated\Shared\Transfer\CustomerTransfer;

interface CustomerHydratorInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function hydrate(CustomerTransfer $customerTransfer): CustomerTransfer;
}
