<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

$pageTitle = 'Contato | ' . $clinic['name'];
$pageDescription = 'Entre em contato com a ' . $clinic['name'] . ' em ' . $clinic['location'] . '.';
$pageCanonical = 'contato.php';

require __DIR__ . '/includes/header.php';
?>
<main id="conteudo">
    <section class="page-intro" aria-labelledby="contato-title">
        <div class="container">
            <h1 id="contato-title">Contato</h1>

            <address>
                <?= e($clinic['address']['street']) ?><br>
                <?= e($clinic['address']['district']) ?><br>
                <?= e($clinic['address']['city']) ?><br>
                CEP <?= e($clinic['address']['postal_code']) ?>
            </address>

            <p><a href="tel:<?= e($clinic['phone']['uri']) ?>"><?= e($clinic['phone']['label']) ?></a></p>
            <p>
                <a href="https://wa.me/<?= e($clinic['whatsapp']['number']) ?>" target="_blank" rel="noopener noreferrer">
                    WhatsApp: <?= e($clinic['whatsapp']['label']) ?>
                </a>
            </p>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>

