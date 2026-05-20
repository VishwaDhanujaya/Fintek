<?php
// includes/brands.php
// Reusable partner brands section used in index.php and contact.php.

$brands = [
    ['name' => 'Sharp', 'logo' => BASE_URL . 'assets/images/brand-sharp.jpg', 'link' => 'https://global.sharp/'],
    ['name' => 'Vivitek', 'logo' => BASE_URL . 'assets/images/brand-vivitec.jpg', 'link' => 'https://vivitek.eu/'],
    ['name' => 'Scan Coin', 'logo' => BASE_URL . 'assets/images/brand-scancoin.jpg', 'link' => 'https://paycomplete.com/scancoin/'],
    ['name' => 'MIB', 'logo' => BASE_URL . 'assets/images/brand-mib.jpg', 'link' => 'https://hyundaimib.com/'],
    ['name' => 'Doculine', 'logo' => BASE_URL . 'assets/images/brand-doculine.jpg', 'link' => 'https://doculine.eu/'],
    ['name' => 'Posmart', 'logo' => BASE_URL . 'assets/images/brand-posmart.jpg', 'link' => 'https://posmart.lk/'],
];
?>
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 items-center">
    <?php foreach ($brands as $brand): ?>
        <a href="<?= $brand['link'] ?>" target="_blank" rel="noopener noreferrer" class="card-brand hover:scale-105 transform">
            <img src="<?= $brand['logo'] ?>" alt="<?= htmlspecialchars($brand['name']) ?>" class="max-h-12 w-auto object-contain transition-transform duration-300">
        </a>
    <?php endforeach; ?>
</div>
