<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Persistence\Propel\Mapper;

use Generated\Shared\Transfer\PriceListCollectionTransfer;
use Generated\Shared\Transfer\PriceListTransfer;
use Orm\Zed\PriceList\Persistence\FosPriceList;
use Propel\Runtime\Collection\ObjectCollection;

class PriceListMapper implements PriceListMapperInterface
{
    /**
     * @param \Propel\Runtime\Collection\ObjectCollection $fosPriceListCollection
     * @param \Generated\Shared\Transfer\PriceListCollectionTransfer $priceListCollectionTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListCollectionTransfer
     */
    public function mapEntityCollectionToTransfer(ObjectCollection $fosPriceListCollection, PriceListCollectionTransfer $priceListCollectionTransfer): PriceListCollectionTransfer
    {
        foreach ($fosPriceListCollection as $fosPriceList) {
            $priceListTransfer = new PriceListTransfer();
            $priceListTransfer = $this->mapEntityToTransfer($fosPriceList, $priceListTransfer);

            $priceListCollectionTransfer->addPriceList($priceListTransfer);
        }

        return $priceListCollectionTransfer;
    }

    /**
     * @param \Orm\Zed\PriceList\Persistence\FosPriceList $fosPriceList
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer
     */
    public function mapEntityToTransfer(FosPriceList $fosPriceList, PriceListTransfer $priceListTransfer): PriceListTransfer
    {
        return $priceListTransfer->fromArray(
            $fosPriceList->toArray(),
            true
        );
    }
}
