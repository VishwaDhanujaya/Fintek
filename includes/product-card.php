<?php
// includes/product-card.php
// Expected variables:
// - $product: Product object
// - $catalog: ProductCatalog object
// - $extraClasses: string (optional class names)
// - $dataAttrs: array of key => value (optional dataset values)
// - $delay: int/string (optional animation delay)

$cat = isset($catalog) ? $catalog->getCategoryById($product->getCategoryId()) : null;
$delayAttr = isset($delay) ? ' data-aos="fade-up" data-aos-delay="' . htmlspecialchars($delay) . '"' : '';

$attributesStr = '';
if (isset($dataAttrs) && is_array($dataAttrs)) {
    foreach ($dataAttrs as $key => $val) {
        $attributesStr .= ' data-' . htmlspecialchars($key) . '="' . htmlspecialchars($val) . '"';
    }
}
$extraClassesStr = isset($extraClasses) ? ' ' . $extraClasses : '';
?>
<div onclick="window.location.href='<?= BASE_URL ?>product/<?= urlencode($product->getId()) ?>'"
     class="card-product group<?= $extraClassesStr ?>"<?= $delayAttr ?><?= $attributesStr ?>>
    <div class="relative h-48 bg-gray-50 p-6 flex items-center justify-center overflow-hidden">
        <?php if ($product->isNew()): ?>
            <span class="absolute top-4 left-4 bg-fintek-blue text-white text-[10px] font-bold tracking-wider px-2.5 py-1 rounded-full z-10 shadow-sm">NEW</span>
        <?php endif; ?>
        <img src="<?= BASE_URL . htmlspecialchars($product->getImage()) ?>"
             alt="<?= htmlspecialchars($product->getName()) ?>"
             class="max-h-full object-contain blur-load group-hover:scale-110 transition-transform duration-500"
             data-src="<?= BASE_URL . htmlspecialchars($product->getImage()) ?>"
             onerror="this.src='https://placehold.co/400x300/f8fafc/94a3b8?text=Product+Image'">
    </div>
    <div class="p-6 flex-grow flex flex-col">
        <div class="text-[10px] text-gray-400 mb-2 uppercase tracking-widest font-semibold">
            <?= htmlspecialchars($cat ? $cat->getName() : 'General') ?>
        </div>
        <h3 class="text-base font-bold text-gray-900 mb-2 group-hover:text-fintek-blue transition-colors leading-snug">
            <?= htmlspecialchars($product->getName()) ?>
        </h3>
        <p class="text-xs text-gray-500 mb-4 flex-grow line-clamp-2 leading-relaxed">
            <?= htmlspecialchars($product->getShortDesc()) ?>
        </p>

        <a href="<?= BASE_URL ?>contact-us?product=<?= urlencode($product->getName()) ?>"
           onclick="event.stopPropagation();"
           class="mt-auto w-full btn-primary text-xs !py-2 !px-4">
            Get Quote
        </a>
    </div>
</div>
