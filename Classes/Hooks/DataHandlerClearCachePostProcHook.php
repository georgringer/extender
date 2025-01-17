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

namespace Evoweb\Extender\Hooks;

use Evoweb\Extender\Cache\CacheManager;

class DataHandlerClearCachePostProcHook
{
    protected CacheManager $cacheManager;

    public function __construct(CacheManager $cacheManager)
    {
        $this->cacheManager = $cacheManager;
    }

    public function clear(array $parameter): void
    {
        try {
            if (($parameter['cacheCmd'] ?? '') == 'all') {
                $this->cacheManager->createCache('extender')->flush();
            }
        } catch (\Exception $e) {}
    }
}
