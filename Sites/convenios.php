<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

$pageTitle = 'Convênios | ' . $clinic['name'];
$pageDescription = 'Conheça os convênios atendidos pela ' . $clinic['name'] . ' e consulte a cobertura do seu plano odontológico.';
$pageCanonical = 'convenios.php';
$pageImage = 'assets/img/convenios/logo-clin.png';

$plans = [
    [
        'name' => 'Clin Plano Odonto Digital',
        'logo' => 'assets/img/convenios/logo-clin.png',
        'width' => 287,
        'height' => 155,
    ],
    [
        'name' => 'Unimed Odonto',
        'logo' => 'assets/img/convenios/logo-unimed.png',
        'width' => 230,
        'height' => 115,
    ],
    [
        'name' => 'SulAmérica Odonto',
        'logo' => 'assets/img/convenios/logo-sul-america.png',
        'width' => 260,
        'height' => 120,
    ],
    [
        'name' => 'Amil Dental',
        'logo' => 'assets/img/convenios/logo-amil-dental.png',
        'width' => 250,
        'height' => 100,
    ],
    [
        'name' => 'Porto Seguro Odontológico',
        'logo' => 'assets/img/convenios/logo-porto-seguro.png',
        'width' => 250,
        'height' => 135,
    ],
];

$whatsAppBaseUrl = 'https://wa.me/' . $clinic['whatsapp']['number'] . '?text=';
$generalConsultationUrl = $whatsAppBaseUrl . rawurlencode('Olá! Gostaria de saber se meu plano odontológico é aceito pela clínica.');
$unlistedPlanUrl = $whatsAppBaseUrl . rawurlencode('Olá! Não encontrei meu convênio no site. Gostaria de verificar se ele é aceito pela clínica.');

require __DIR__ . '/includes/header.php';
?>
<link rel="stylesheet" href="<?= e(url('assets/css/convenios.css')) ?>">

<main id="conteudo" class="plans-page">
    <section class="plans-hero" aria-labelledby="plans-title">
        <div class="container plans-hero__content">
            <span class="eyebrow">Planos odontológicos</span>
            <h1 id="plans-title">Seu sorriso merece o melhor cuidado</h1>
            <p>Conheça os convênios atendidos pela nossa clínica e entre em contato para verificar a cobertura do seu plano.</p>
            <a class="btn btn-whatsapp plans-hero__button" href="<?= e($generalConsultationUrl) ?>" target="_blank" rel="noopener noreferrer">
                Consultar meu convênio
                <span aria-hidden="true">→</span>
            </a>
        </div>
    </section>

    <section class="plans-list" aria-labelledby="plans-list-title">
        <div class="container">
            <div class="plans-section-heading">
                <span class="eyebrow">Atendimento por convênio</span>
                <h2 id="plans-list-title">Convênios atendidos</h2>
                <p>Confira os planos atendidos pela nossa clínica. A cobertura dos procedimentos depende das condições do seu convênio.</p>
            </div>

            <div class="plans-grid" role="list">
                <?php foreach ($plans as $plan): ?>
                    <?php
                    $coverageMessage = 'Olá! Tenho o convênio ' . $plan['name'] . ' e gostaria de saber quais tratamentos são atendidos pela clínica.';
                    $coverageUrl = $whatsAppBaseUrl . rawurlencode($coverageMessage);
                    ?>
                    <article class="plan-card" role="listitem">
                        <div class="plan-card__logo">
                            <img
                                src="<?= e(url($plan['logo'])) ?>"
                                alt="Logotipo <?= e($plan['name']) ?>"
                                width="<?= e((string) $plan['width']) ?>"
                                height="<?= e((string) $plan['height']) ?>"
                                loading="lazy"
                                decoding="async"
                            >
                        </div>
                        <div class="plan-card__content">
                            <h3><?= e($plan['name']) ?></h3>
                            <a class="btn btn-outline plan-card__button" href="<?= e($coverageUrl) ?>" target="_blank" rel="noopener noreferrer">
                                Consultar cobertura
                                <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="plans-missing" aria-labelledby="plans-missing-title">
        <div class="container">
            <div class="plans-missing__content">
                <div>
                    <span class="eyebrow">Outros planos</span>
                    <h2 id="plans-missing-title">Não encontrou seu convênio?</h2>
                    <p>Fale com nossa equipe para verificar se o seu plano é atendido pela clínica.</p>
                </div>
                <a class="btn btn-secondary plans-missing__button" href="<?= e($unlistedPlanUrl) ?>" target="_blank" rel="noopener noreferrer">
                    Verificar meu plano pelo WhatsApp
                    <span aria-hidden="true">→</span>
                </a>
            </div>
        </div>
    </section>

    <section class="plans-faq" aria-labelledby="plans-faq-title">
        <div class="container plans-faq__layout">
            <div class="plans-faq__heading">
                <span class="eyebrow">Informações importantes</span>
                <h2 id="plans-faq-title">Dúvidas frequentes</h2>
                <p>Veja orientações rápidas sobre convênios e atendimento.</p>
            </div>

            <div class="plans-faq__items">
                <details>
                    <summary>Como saber se meu convênio é aceito?</summary>
                    <p>Entre em contato com nossa equipe pelo WhatsApp e informe o nome do seu plano.</p>
                </details>
                <details>
                    <summary>Todos os tratamentos são cobertos pelo convênio?</summary>
                    <p>A cobertura depende do plano contratado e das condições da operadora. Consulte nossa equipe para verificar as informações.</p>
                </details>
                <details>
                    <summary>Preciso apresentar a carteirinha do convênio?</summary>
                    <p>Os documentos necessários podem variar conforme a operadora. Nossa equipe poderá orientar você antes do atendimento.</p>
                </details>
                <details>
                    <summary>Como agendar uma avaliação?</summary>
                    <p>Entre em contato pelo WhatsApp para consultar a disponibilidade de horários e as condições de atendimento.</p>
                </details>
            </div>
        </div>
    </section>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
