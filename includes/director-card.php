<?php
// includes/director-card.php
// Expected variables:
// - $name: string
// - $image: string (filename in assets/images/)
// - $role: string
// - $delay: int

?>
<div class="card-director group" data-aos="fade-up" data-aos-delay="<?= (int)$delay ?>">
    <div class="card-director-image">
        <img src="<?= BASE_URL ?>assets/images/<?= htmlspecialchars($image) ?>" alt="<?= htmlspecialchars($name) ?>" class="w-full h-full object-cover">
    </div>
    <h4 class="text-sm font-semibold text-gray-900 tracking-tight"><?= htmlspecialchars($name) ?></h4>
    <p class="text-[10px] uppercase tracking-[0.2em] text-gray-400 mt-1"><?= htmlspecialchars($role) ?></p>
</div>
