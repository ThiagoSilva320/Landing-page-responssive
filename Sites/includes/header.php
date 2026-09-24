<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';

$pageTitle = $pageTitle ?? $clinic['name'];
$pageDescription = $pageDescription ?? $clinic['tagline'];
$pageCanonical = $pageCanonical ?? basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');
$pageImage = $pageImage ?? null;
$canonicalUrl = absolute_url($pageCanonical);
$whatsAppScheduleMessage = rawurlencode('Olá! Gostaria de agendar uma avaliação na Odonto Master.');
$whatsAppScheduleUrl = 'https://wa.me/' . $clinic['whatsapp']['number'] . '?text=' . $whatsAppScheduleMessage;
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($pageDescription) ?>">
    <link rel="canonical" href="<?= e($canonicalUrl) ?>">

    <meta property="og:locale" content="pt_BR">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= e($clinic['name']) ?>">
    <meta property="og:title" content="<?= e($pageTitle) ?>">
    <meta property="og:description" content="<?= e($pageDescription) ?>">
    <meta property="og:url" content="<?= e($canonicalUrl) ?>">
    <?php if (is_string($pageImage) && $pageImage !== ''): ?>
        <meta property="og:image" content="<?= e(absolute_url($pageImage)) ?>">
    <?php endif; ?>

    <link rel="icon" href="<?= e(url('assets/img/logo/470797000_3914761888797373_8084947227469881276_n.jpg')) ?>" type="image/jpeg">
    <link rel="stylesheet" href="<?= e(url('assets/css/style.css')) ?>">
    <link rel="stylesheet" href="<?= e(url('assets/css/components.css')) ?>">
    <link rel="stylesheet" href="<?= e(url('assets/css/responsive.css')) ?>">
    <script src="<?= e(url('assets/js/main.js')) ?>" defer></script>
</head>
<body>
    <a class="skip-link" href="#conteudo">Ir para o conteúdo</a>

    <header class="site-header" data-site-header>
        <div class="container-wide site-header__inner">
            <a class="site-brand" href="<?= e(url('index.php')) ?>" aria-label="Página inicial da <?= e($clinic['name']) ?>">
                <img
                    class="site-brand__logo"
                    src="<?= e(url('assets/img/logo/logo-odonto-master.png')) ?>"
                    alt="<?= e($clinic['name']) ?>"
                    width="1640"
                    height="512"
                >
            </a>

            <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="main-navigation" aria-label="Abrir menu de navegação" data-menu-toggle>
                <span class="menu-toggle__icon" aria-hidden="true">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>

            <nav id="main-navigation" class="main-navigation" aria-label="Navegação principal" data-navigation>
                <ul>
                    <li><a href="<?= e(url('index.php')) ?>"<?= is_current_page('index.php') ? ' aria-current="page"' : '' ?>>Início</a></li>
                    <li><a href="<?= e(url('tratamentos.php')) ?>"<?= is_current_page('tratamentos.php') ? ' aria-current="page"' : '' ?>>Tratamentos</a></li>
                    <li><a href="<?= e(url('sobre.php')) ?>"<?= is_current_page('sobre.php') ? ' aria-current="page"' : '' ?>>A Clínica</a></li>
                    <li><a href="<?= e(url('convenios.php')) ?>"<?= is_current_page('convenios.php') ? ' aria-current="page"' : '' ?>>Convênios</a></li>
                    <li><a href="<?= e(url('contato.php')) ?>"<?= is_current_page('contato.php') ? ' aria-current="page"' : '' ?>>Contato</a></li>
                </ul>

                <a class="btn btn-secondary header-cta" href="<?= e($whatsAppScheduleUrl) ?>" target="_blank" rel="noopener noreferrer">
                    <span class="header-cta__calendar" aria-hidden="true"></span>
                    Agendar avaliação
                </a>
            </nav>
        </div>
    </header>
