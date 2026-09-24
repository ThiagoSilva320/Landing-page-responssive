<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';
?>
<a
    class="whatsapp-float"
    href="https://wa.me/<?= e($clinic['whatsapp']['number']) ?>"
    target="_blank"
    rel="noopener noreferrer"
    aria-label="Conversar com a <?= e($clinic['name']) ?> pelo WhatsApp"
>
    WhatsApp
</a>

