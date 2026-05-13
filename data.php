<?php
/**
 * data.php — Legacy compatibility shim.
 *
 * All product and category data has been migrated to the OOP class:
 *   includes/ProductCatalog.php
 *
 * This file is kept only in case any external script requires it directly.
 * Do NOT add new data here. Extend ProductCatalog::seedProducts() instead.
 */
require_once __DIR__ . '/includes/ProductCatalog.php';
