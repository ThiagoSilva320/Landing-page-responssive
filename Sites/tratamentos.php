<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

$pageTitle = 'Tratamentos | ' . $clinic['name'];
$pageDescription = 'Conheça nossas opções de tratamentos odontológicos para cuidar da saúde e da estética do seu sorriso.';
$pageCanonical = 'tratamentos.php';
$pageImage = 'assets/img/tratamentos/aparelhos-ortodonticos.jpg';

$treatments = [
    [
        'name' => 'Aparelhos Ortodônticos',
        'description' => 'Soluções para corrigir o alinhamento dos dentes e a mordida, contribuindo para um sorriso mais harmonioso.',
        'message' => 'Olá! Gostaria de saber mais sobre os aparelhos ortodônticos.',
        'image' => 'assets/img/tratamentos/aparelhos-ortodonticos.jpg',
        'image_alt' => 'Paciente sorrindo com aparelho ortodôntico durante atendimento odontológico',
    ],
    [
        'name' => 'Implantes Dentários',
        'description' => 'Soluções para substituir dentes perdidos, recuperando a função mastigatória e a estética do sorriso.',
        'message' => 'Olá! Gostaria de saber mais sobre implantes dentários.',
        'image' => 'assets/img/tratamentos/implantes-dentarios.jpg',
        'image_alt' => 'Modelo odontológico demonstrando um implante dentário',
    ],
    [
        'name' => 'Próteses Dentárias',
        'description' => 'Alternativas para substituir dentes ausentes ou restaurar dentes comprometidos, promovendo conforto e funcionalidade.',
        'message' => 'Olá! Gostaria de saber mais sobre próteses dentárias.',
        'image' => 'assets/img/tratamentos/protese-dentaria.jpg',
        'image_alt' => 'Prótese dentária sobre bandeja em consultório odontológico',
    ],
    [
        'name' => 'Clareamento Dental',
        'description' => 'Procedimentos para melhorar a tonalidade dos dentes e valorizar a estética do sorriso.',
        'message' => 'Olá! Gostaria de saber mais sobre clareamento dental.',
        'image' => 'assets/img/tratamentos/clareamento-dental.jpg',
        'image_alt' => 'Paciente durante avaliação da tonalidade dos dentes',
    ],
    [
        'name' => 'Tratamentos Clínicos',
        'description' => 'Cuidados odontológicos voltados à prevenção, ao diagnóstico e à manutenção da saúde bucal.',
        'message' => 'Olá! Gostaria de saber mais sobre os tratamentos clínicos.',
        'image' => 'assets/img/tratamentos/tratamentos-clinicos.jpg',
        'image_alt' => 'Dentista realizando avaliação clínica em paciente adulto',
    ],
    [
        'name' => 'Facetas e Lentes de Contato Dental',
        'description' => 'Tratamentos estéticos que podem melhorar a aparência, o formato e a harmonia do sorriso.',
        'message' => 'Olá! Gostaria de saber mais sobre facetas e lentes de contato dental.',
        'image' => 'assets/img/tratamentos/facetas-lentes.jpg',
        'image_alt' => 'Avaliação estética de facetas odontológicas junto ao sorriso da paciente',
    ],
];

$whatsAppBaseUrl = 'https://wa.me/' . $clinic['whatsapp']['number'] . '?text=';
$evaluationMessage = 'Olá! Gostaria de agendar uma avaliação odontológica.';

require __DIR__ . '/includes/header.php';
?>
<link rel="stylesheet" href="<?= e(url('assets/css/tratamentos.css')) ?>">

<main id="conteudo" class="treatments-page">
    <section class="treatments-hero" aria-labelledby="tratamentos-title">
        <div class="container treatments-hero__inner">
            <p class="eyebrow">Tratamentos odontológicos</p>
            <h1 id="tratamentos-title">Tratamentos para cuidar do seu sorriso</h1>
            <p>Conheça nossas opções de tratamentos odontológicos e descubra como podemos ajudar você a cuidar da saúde e da estética do seu sorriso.</p>
        </div>
    </section>

    <section class="treatments-catalog" aria-label="Opções de tratamentos odontológicos">
        <div class="container">
            <div class="treatments-grid">
                <?php foreach ($treatments as $treatment): ?>
                    <?php $whatsAppUrl = $whatsAppBaseUrl . rawurlencode($treatment['message']); ?>
                    <article class="treatment-option-card">
                        <figure class="treatment-option-card__image">
                            <img
                                src="<?= e(url($treatment['image'])) ?>"
                                alt="<?= e($treatment['image_alt']) ?>"
                                width="1200"
                                height="800"
                                loading="lazy"
                                decoding="async"
                            >
                        </figure>

                        <div class="treatment-option-card__content">
                            <h2><?= e($treatment['name']) ?></h2>
                            <p><?= e($treatment['description']) ?></p>
                            <a
                                class="treatment-option-card__button"
                                href="<?= e($whatsAppUrl) ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                                aria-label="Saiba mais sobre <?= e($treatment['name']) ?> pelo WhatsApp"
                            >
                                <svg aria-hidden="true" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20.5 11.6a8.5 8.5 0 0 1-12.6 7.5L3.5 20.5l1.4-4.3a8.5 8.5 0 1 1 15.6-4.6Z" />
                                    <path d="M8.2 7.8c.2-.4.4-.4.7-.4h.5c.2 0 .4.1.5.5l.7 1.7c.1.3.1.5-.1.7l-.5.6c-.2.2-.1.4 0 .6.6 1.1 1.5 2 2.7 2.6.2.1.4.1.6-.1l.7-.8c.2-.2.4-.3.7-.2l1.8.8c.3.1.5.3.5.5 0 .4-.2 1.3-.6 1.7-.5.5-1.2.7-2 .7-1.1 0-2.8-.6-4.7-2.2-1.5-1.3-2.5-2.9-2.8-4-.3-1-.1-1.8.3-2.3Z" />
                                </svg>
                                <span>Saiba mais</span>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="treatments-cta" aria-labelledby="treatments-cta-title">
        <div class="container treatments-cta__inner">
            <div>
                <p class="eyebrow">Fale com a nossa equipe</p>
                <h2 id="treatments-cta-title">Tem dúvidas sobre qual tratamento é ideal para você?</h2>
                <p>Entre em contato com nossa equipe e agende uma avaliação para conhecer as opções disponíveis.</p>
            </div>

            <a
                class="btn btn-whatsapp treatments-cta__button"
                href="<?= e($whatsAppBaseUrl . rawurlencode($evaluationMessage)) ?>"
                target="_blank"
                rel="noopener noreferrer"
            >
                Agendar avaliação pelo WhatsApp
                <span aria-hidden="true">→</span>
            </a>
        </div>
    </section>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
