<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';
?>
    <?php if (($showSiteFooter ?? true) === true): ?>
    <footer class="site-footer">
        <div class="container site-footer__inner">
            <div>
                <strong><?= e($clinic['name']) ?></strong>
                <address>
                    <?= e($clinic['address']['street']) ?><br>
                    <?= e($clinic['address']['district']) ?><br>
                    <?= e($clinic['address']['city']) ?><br>
                    CEP <?= e($clinic['address']['postal_code']) ?>
                </address>
            </div>

            <div>
                <a href="tel:<?= e($clinic['phone']['uri']) ?>"><?= e($clinic['phone']['label']) ?></a><br>
                <a href="https://wa.me/<?= e($clinic['whatsapp']['number']) ?>" target="_blank" rel="noopener noreferrer">WhatsApp: <?= e($clinic['whatsapp']['label']) ?></a><br>
                <a href="<?= e($clinic['instagram']['url']) ?>" target="_blank" rel="noopener noreferrer"><?= e($clinic['instagram']['label']) ?></a>
            </div>
        </div>

        <div class="container site-footer__legal">
            <small>&copy; <?= date('Y') ?> <?= e($clinic['name']) ?>.</small>
        </div>
    </footer>
    <?php endif; ?>

    <?php if (($showWhatsAppFloat ?? true) === true): ?>
        <?php require __DIR__ . '/whatsapp-float.php'; ?>
    <?php endif; ?>
</body>
</html>
