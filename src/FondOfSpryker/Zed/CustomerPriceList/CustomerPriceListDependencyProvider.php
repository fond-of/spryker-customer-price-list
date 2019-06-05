<?php

namespace FondOfSpryker\Zed\CustomerPriceList;

use Orm\Zed\PriceList\Persistence\FosPriceListQuery;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class CustomerPriceListDependencyProvider extends AbstractBundleDependencyProvider
{
    public const PROPEL_PRICE_LIST_QUERY = 'PROPEL_PRICE_LIST_QUERY';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function providePersistenceLayerDependencies(Container $container): Container
    {
        $container = parent::providePersistenceLayerDependencies($container);

        $container = $this->addPropelPriceListQuery($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addPropelPriceListQuery(Container $container): Container
    {
        $container[static::PROPEL_PRICE_LIST_QUERY] = function () {
            return FosPriceListQuery::create();
        };

        return $container;
    }
}
