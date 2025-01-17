<?php

declare(strict_types=1);

/*
 * This file is part of the "extender" Extension for TYPO3 CMS.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Evoweb\Extender\Event;

use Evoweb\Extender\Utility\ClassLoader;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\EventDispatcher\StoppableEventInterface;

class RegisterAutoloaderEvent implements StoppableEventInterface
{
    public function __construct(ContainerInterface $container)
    {
        try {
            spl_autoload_register([$container->get(ClassLoader::class), 'loadClass'], true, true);
        } catch (ContainerExceptionInterface $e) {}
    }

    public function isPropagationStopped(): bool
    {
        return true;
    }
}
