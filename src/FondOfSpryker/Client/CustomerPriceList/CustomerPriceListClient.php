<?php

namespace FondOfSpryker\Client\CustomerPriceList;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \FondOfSpryker\Client\CustomerPriceList\CustomerPriceListFactory getFactory()
 */
class CustomerPriceListClient extends AbstractClient implements CustomerPriceListClientInterface
{
    /**
     * @api
     *
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomer(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        return $this->getFactory()->createZedStub()->expandCustomer($customerTransfer);
    }
}
