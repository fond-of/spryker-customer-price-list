<?php

namespace FondOfSpryker\Glue\CustomerPriceList\Processor\Expander;

use FondOfSpryker\Client\CustomerPriceList\CustomerPriceListClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class CustomerExpander implements CustomerExpanderInterface
{
    /**
     * @var \FondOfSpryker\Client\CustomerPriceList\CustomerPriceListClientInterface
     */
    protected $customerPriceListClient;

    /**
     * @param \FondOfSpryker\Client\CustomerPriceList\CustomerPriceListClientInterface $customerPriceListClient
     */
    public function __construct(CustomerPriceListClientInterface $customerPriceListClient)
    {
        $this->customerPriceListClient = $customerPriceListClient;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expand(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        return $this->customerPriceListClient->expandCustomer($customerTransfer);
    }
}
