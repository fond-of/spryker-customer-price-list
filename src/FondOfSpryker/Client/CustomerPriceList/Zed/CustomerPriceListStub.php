<?php

namespace FondOfSpryker\Client\CustomerPriceList\Zed;

use FondOfSpryker\Client\CustomerPriceList\Dependency\Client\CustomerPriceListToZedRequestClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class CustomerPriceListStub implements CustomerPriceListStubInterface
{
    /**
     * @var \FondOfSpryker\Client\CustomerPriceList\Dependency\Client\CustomerPriceListToZedRequestClientInterface
     */
    protected $zedRequestClient;

    /**
     * @param \FondOfSpryker\Client\CustomerPriceList\Dependency\Client\CustomerPriceListToZedRequestClientInterface $zedRequestClient
     */
    public function __construct(CustomerPriceListToZedRequestClientInterface $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomer(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        $url = '/customer-price-list/gateway/expand-customer';

        /** @var \Generated\Shared\Transfer\CustomerTransfer $customerTransfer */
        $customerTransfer = $this->zedRequestClient->call($url, $customerTransfer);

        return $customerTransfer;
    }
}
