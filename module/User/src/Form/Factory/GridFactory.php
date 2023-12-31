<?php

declare(strict_types=1);

namespace User\Form\Factory;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;
use User\Form\Grid;

class GridFactory implements FactoryInterface
{
    /** @inheritDoc */
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null): Grid
    {
        if ($options !== null) {
            return new $requestedName(options: $options);
        }
        return new $requestedName();
    }
}
