<?php


// Set defaults for the button component properties
$buttonText = isset($buttonText) ? $buttonText : 'Button'; // The text to display inside the button
$buttonType = isset($buttonType) ? $buttonType : 'button'; // The HTML type attribute (e.g., 'submit', 'button')
$buttonClass = isset($buttonClass) ? $buttonClass : ''; // Optional extra Tailwind classes for customization
?>
<button type="<?= htmlspecialchars($buttonType) ?>" class="bg-fintek-blue hover:bg-fintek-blue-light text-white font-semibold py-2 px-6 rounded-lg transition-all duration-300 active:scale-98 shadow-md <?= htmlspecialchars($buttonClass) ?>">
    <?= htmlspecialchars($buttonText) ?>
</button>
