<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

$pageTitle = 'Sobre | ' . $clinic['name'];
$pageDescription = $clinic['experience'] . ' em ' . $clinic['location'] . '. Conheça a ' . $clinic['name'] . '.';
$pageCanonical = 'sobre.php';

require __DIR__ . '/includes/header.php';
?>
<main id="conteudo">
    <section class="page-intro" aria-labelledby="sobre-title">
        <div class="container">
            <h1 id="sobre-title">Sobre a <?= e($clinic['name']) ?></h1>
            <p><?= e($clinic['experience']) ?></p>
            <p><?= e($clinic['tagline']) ?></p>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>

