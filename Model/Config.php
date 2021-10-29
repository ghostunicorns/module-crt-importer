<?php
/*
  * Copyright © Ghost Unicorns snc. All rights reserved.
 * See LICENSE for license details.
 */

declare(strict_types=1);

namespace GhostUnicorns\CrtImporter\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Config
{
    const IMPORT_IS_ENABLED_CONFIG_PATH = 'crt_importer/general/enabled';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @var \GhostUnicorns\CrtBase\Model\Config
     */
    private $baseConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig,
        \GhostUnicorns\CrtBase\Model\Config $baseConfig
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->baseConfig = $baseConfig;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->baseConfig->isEnabled() && $this->scopeConfig->isSetFlag(
            self::IMPORT_IS_ENABLED_CONFIG_PATH,
            ScopeInterface::SCOPE_STORE
        );
    }
}
