<?php

namespace FondOfSpryker\Zed\CustomerPriceList\Persistence\Propel\Mapper;

use Generated\Shared\Transfer\PriceListCollectionTransfer;
use Generated\Shared\Transfer\PriceListTransfer;
use Orm\Zed\PriceList\Persistence\FosPriceList;
use Propel\Runtime\Collection\ObjectCollection;

interface PriceListMapperInterface
{
    /**
     * @param \Propel\Runtime\Collection\ObjectCollection $fosPriceListCollection
     * @param \Generated\Shared\Transfer\PriceListCollectionTransfer $priceListCollectionTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListCollectionTransfer
     */
    public function mapEntityCollectionToTransfer(
        ObjectCollection $fosPriceListCollection,
        PriceListCollectionTransfer $priceListCollectionTransfer
    ): PriceListCollectionTransfer;

    /**
     * @param \Orm\Zed\PriceList\Persistence\FosPriceList $fosPriceList
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer
     */
    public function mapEntityToTransfer(FosPriceList $fosPriceList, PriceListTransfer $priceListTransfer): PriceListTransfer;
}
