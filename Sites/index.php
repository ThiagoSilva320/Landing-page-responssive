<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

$pageTitle = $clinic['name'] . ' | ' . $clinic['location'];
$pageDescription = $clinic['tagline'] . ' ' . $clinic['experience'] . ' em ' . $clinic['location'];
$pageCanonical = 'index.php';
$heroImagePath = 'assets/img/clinica/hero-odontopediatria.png';
$hasHeroImage = is_file(__DIR__ . '/' . $heroImagePath);
$pageImage = $hasHeroImage ? $heroImagePath : null;
$treatments = require __DIR__ . '/data/tratamentos.php';
$showSiteFooter = false;
$showWhatsAppFloat = false;
$mapAddress = implode(', ', [
    $clinic['address']['street'],
    $clinic['address']['district'],
    $clinic['address']['city'],
    'CEP ' . $clinic['address']['postal_code'],
    'Brasil',
]);
$mapQuery = rawurlencode($mapAddress);
$mapPlaceId = $clinic['google_maps_place_id'];
$mapLocationQuery = rawurlencode('Clínica odontológica - Odonto Master, Jardim Ipiranga, Aparecida de Goiânia - GO');
$mapEmbedUrl = 'https://www.google.com/maps?q=' . $mapLocationQuery . '&z=18&output=embed';
$mapDirectionsUrl = 'https://www.google.com/maps/dir/?api=1&destination=' . $mapQuery . '&destination_place_id=' . rawurlencode($mapPlaceId);

require __DIR__ . '/includes/header.php';
?>
<main id="conteudo">
    <section class="hero" aria-labelledby="hero-title">
        <div class="container-wide hero__inner">
            <div class="hero__content">
                <p class="eyebrow">Odontologia completa em Aparecida de Goiânia</p>
                <h1 id="hero-title" class="hero__title">
                    <span class="hero__title-line">Você merece voltar</span>
                    <span class="hero__title-line">a sorrir com <em>confiança.</em></span>
                </h1>
                <p class="hero__description">
                    Na Clínica Odonto Master, oferecemos um atendimento completo, humanizado e de alta qualidade para cuidar do seu sorriso em todas as fases da vida.
                </p>
                <p class="hero__services">Implantes <span>|</span> Facetas <span>|</span> Ortodontia</p>

                <div class="hero__actions" aria-label="Ações principais">
                    <a class="btn btn-whatsapp" href="<?= e($whatsAppScheduleUrl) ?>" target="_blank" rel="noopener noreferrer">
                        Agendar pelo WhatsApp
                        <span aria-hidden="true">→</span>
                    </a>
                    <a class="btn btn-outline" href="<?= e(url('tratamentos.php')) ?>">
                        Conhecer tratamentos
                    </a>
                </div>
            </div>

            <figure class="hero-media<?= $hasHeroImage ? '' : ' hero-media--pending' ?>">
                <?php if ($hasHeroImage): ?>
                    <img
                        src="<?= e(url($heroImagePath)) ?>"
                        alt="Criança sorrindo durante atendimento odontológico acolhedor"
                        width="1774"
                        height="887"
                        fetchpriority="high"
                    >
                <?php else: ?>
                    <div class="hero-media__placeholder" role="img" aria-label="Espaço reservado para fotografia da Clínica Odonto Master">
                        <span>Fotografia da clínica</span>
                        <strong><?= e($clinic['location']) ?></strong>
                    </div>
                <?php endif; ?>
                <p class="hero-media__quote" aria-hidden="true">Sorrisos<br>que transformam<br>vidas ♡</p>
                <div class="hero-media__note">
                    <strong>Odontopediatria</strong>
                    <span>Cuidando do sorriso hoje e de um futuro mais feliz.</span>
                </div>
            </figure>

            <ul class="hero-trust" aria-label="Informações de confiança">
                <li>
                    <span class="hero-trust__icon hero-trust__icon--star" aria-hidden="true">★</span>
                    <div>
                        <strong>4,3 no Google</strong>
                        <span>236 avaliações</span>
                    </div>
                </li>
                <li>
                    <span class="hero-trust__icon" aria-hidden="true">
                        <svg viewBox="0 0 32 32" focusable="false"><circle cx="16" cy="9" r="4"></circle><circle cx="7.5" cy="12" r="3"></circle><circle cx="24.5" cy="12" r="3"></circle><path d="M8 25v-3c0-4.4 3.6-8 8-8s8 3.6 8 8v3"></path><path d="M2.5 24v-2c0-3 2.2-5.5 5.2-6M29.5 24v-2c0-3-2.2-5.5-5.2-6"></path></svg>
                    </span>
                    <div>
                        <strong>Mais de 10 anos</strong>
                        <span>transformando vidas através do sorriso</span>
                    </div>
                </li>
                <li>
                    <span class="hero-trust__icon" aria-hidden="true">
                        <svg viewBox="0 0 32 32" focusable="false"><path d="M16 29s10-9.4 10-18A10 10 0 1 0 6 11c0 8.6 10 18 10 18Z"></path><circle cx="16" cy="11" r="3.5"></circle></svg>
                    </span>
                    <div>
                        <strong><?= e($clinic['location']) ?></strong>
                        <span>Atendimento de excelência perto de você.</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section class="differentials" aria-label="Diferenciais da clínica">
        <div class="container-wide differentials__grid">
            <article><span aria-hidden="true">♡</span><div><strong>Atendimento humanizado</strong><small>Você em primeiro lugar</small></div></article>
            <article><span aria-hidden="true">♢</span><div><strong>Estrutura completa</strong><small>Tecnologia moderna</small></div></article>
            <article><span aria-hidden="true">♟</span><div><strong>Convênios aceitos</strong><small>Mais facilidade para você</small></div></article>
            <article><span aria-hidden="true">☺</span><div><strong>Atendimento infantil e adulto</strong><small>Sorriso para toda a família</small></div></article>
        </div>
    </section>

    <section class="home-treatments" aria-labelledby="treatments-title">
        <div class="container-wide">
            <header class="home-section-heading home-section-heading--center">
                <p class="eyebrow">Nossos tratamentos</p>
                <h2 id="treatments-title">Soluções completas para o seu sorriso</h2>
                <p>Do cuidado preventivo aos tratamentos mais avançados, tudo em um só lugar.</p>
            </header>

            <div class="home-treatment-grid">
                <?php foreach ($treatments as $treatment): ?>
                    <article class="home-treatment-card">
                        <div class="home-treatment-card__image">
                            <img src="<?= e(url($treatment['image'])) ?>" alt="<?= e($treatment['image_alt']) ?>" width="448" height="588" loading="lazy">
                        </div>
                        <div class="home-treatment-card__content">
                            <span class="home-treatment-card__icon" aria-hidden="true"><?= e($treatment['icon']) ?></span>
                            <h3><?= e($treatment['name']) ?></h3>
                            <p><?= e($treatment['summary']) ?></p>
                            <a href="<?= e(url('tratamentos.php')) ?>">Saiba mais <span aria-hidden="true">→</span></a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="clinic-story" aria-labelledby="clinic-story-title">
        <div class="container-wide clinic-story__grid">
            <div class="clinic-story__content">
                <p class="eyebrow">Sobre a clínica</p>
                <h2 id="clinic-story-title">Há mais de 10 anos<br>cuidando de sorrisos</h2>
                <p>A Clínica Odonto Master é referência em odontologia em Aparecida de Goiânia, unindo tecnologia, experiência e um atendimento verdadeiramente humanizado.</p>
                <p>Nosso propósito é transformar vidas através do sorriso, oferecendo tratamentos de alta qualidade em um ambiente acolhedor e seguro.</p>
                <a class="btn btn-whatsapp" href="<?= e(url('sobre.php')) ?>">Conheça nossa história <span aria-hidden="true">→</span></a>
            </div>

            <div class="clinic-gallery" aria-label="Galeria da Clínica Odonto Master">
                <figure class="clinic-gallery__large">
                    <img src="<?= e(url('assets/img/clinica/recepcao-sem-texto.png')) ?>" alt="Recepção da Clínica Odonto Master" width="1104" height="1440" loading="lazy">
                </figure>
                <figure>
                    <img src="<?= e(url('assets/img/clinica/concultorio.png')) ?>" alt="Consultório da Clínica Odonto Master" width="444" height="588" loading="lazy">
                </figure>
                <figure>
                    <img src="<?= e(url('assets/img/clinica/interior.png')) ?>" alt="Interior e corredor da Clínica Odonto Master" width="448" height="588" loading="lazy">
                </figure>
            </div>

            <aside class="clinic-story__note">
                <span aria-hidden="true">♡</span>
                <p>Mais<br>que dentes,<br><strong>cuidamos<br>de pessoas.</strong></p>
                <small>Equipe<br>Odonto Master</small>
            </aside>
        </div>
    </section>

    <section class="insurance" aria-labelledby="insurance-title">
        <div class="container-wide insurance__inner">
            <header>
                <p class="eyebrow">Convênios</p>
                <h2 id="insurance-title">Trabalhamos com os principais convênios</h2>
                <p>Mais acesso a um sorriso de qualidade.</p>
            </header>
            <div class="insurance__logos">
                <figure><img src="<?= e(url('assets/img/convenios/logo-clin.png')) ?>" alt="Clin Plano Odonto Digital" width="287" height="155" loading="lazy"></figure>
                <figure><img src="<?= e(url('assets/img/convenios/logo-unimed.png')) ?>" alt="Unimed Odonto" width="230" height="115" loading="lazy"></figure>
                <figure><img src="<?= e(url('assets/img/convenios/logo-sul-america.png')) ?>" alt="SulAmérica Odonto" width="260" height="120" loading="lazy"></figure>
                <figure><img src="<?= e(url('assets/img/convenios/logo-amil-dental.png')) ?>" alt="Amil Dental" width="250" height="100" loading="lazy"></figure>
                <figure><img src="<?= e(url('assets/img/convenios/logo-porto-seguro.png')) ?>" alt="Porto Seguro Odontológico" width="250" height="135" loading="lazy"></figure>
            </div>
        </div>
    </section>

    <section class="family-proof" aria-label="Odontopediatria e avaliações de pacientes">
        <div class="container-wide family-proof__grid">
            <article class="pediatric-promo">
                <img
                    src="<?= e(url('assets/img/referencia/crianca-odontopediatria.png')) ?>"
                    alt="Criança sorrindo durante atendimento odontológico"
                    width="345"
                    height="327"
                    loading="lazy"
                >
                <div class="pediatric-promo__content">
                    <p class="eyebrow">Odontopediatria</p>
                    <h2>Sorrisos pequenos,<br>grandes histórias.</h2>
                    <p>Atendimento lúdico, humanizado e especializado para que seu filho tenha uma experiência positiva e um sorriso saudável para o futuro.</p>
                    <a class="btn btn-outline" href="<?= e(url('tratamentos.php')) ?>">Saiba mais sobre Odontopediatria <span aria-hidden="true">→</span></a>
                </div>
            </article>

            <section class="patient-reviews" id="avaliacoes" aria-labelledby="reviews-title">
                <header class="patient-reviews__header">
                    <div>
                        <p class="eyebrow">O que nossos pacientes dizem</p>
                        <h2 id="reviews-title">Confiança que vem de sorrisos reais</h2>
                    </div>
                    <div class="google-rating" aria-label="4,3 no Google, 236 avaliações">
                        <span aria-hidden="true">★</span>
                        <div><strong>4,3 no Google</strong><small>236 avaliações</small></div>
                    </div>
                    <a class="reviews-link" href="https://www.google.com/search?q=Cl%C3%ADnica+Odonto+Master+Aparecida+de+Goi%C3%A2nia" target="_blank" rel="noopener noreferrer">Ver todas as avaliações <span aria-hidden="true">→</span></a>
                </header>

                <div class="review-grid">
                    <?php
                    $reviews = [
                        ['name' => 'Laura Vitória Cavalcante', 'image' => 'assets/img/avaliacoes/laura-vitoria-cavalcante.png', 'date' => '7 meses atrás', 'text' => 'Ótimo atendimento, lugar acolhedor, confortável! Atendimento rápido, educação 10/10, doutora Katia Laukkanen educada e uma profissional sensacional, recomendo o trabalho dela, maravilhoso e espetacular!'],
                        ['name' => 'Breno Backup', 'image' => 'assets/img/avaliacoes/breno-backup.png', 'date' => '5 meses atrás', 'text' => 'Queria deixar aqui um elogio pra clínica pelo excelente atendimento! O Eric, que atendeu minha vó, foi super educado, atencioso e prestativo do começo ao fim. Dá pra ver quando a pessoa realmente se importa com o que faz.'],
                        ['name' => 'Edilson Alves da Conceição', 'image' => 'assets/img/avaliacoes/edilson-alves-conceicao.png', 'date' => '7 meses atrás', 'text' => 'Gostaria de agradecer a toda equipe da Clínica Odontológica Odonto Master pelo excelente atendimento!'],
                    ];
                    ?>
                    <?php foreach ($reviews as $review): ?>
                        <article class="review-card">
                            <header>
                                <img class="review-card__avatar" src="<?= e(url($review['image'])) ?>" alt="" width="32" height="32" loading="lazy">
                                <div>
                                    <strong><?= e($review['name']) ?></strong>
                                    <span aria-label="5 estrelas">★★★★★</span>
                                    <small><?= e($review['date']) ?></small>
                                </div>
                                <b class="google-g" aria-label="Google">G</b>
                            </header>
                            <p>“<?= e($review['text']) ?>”</p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    </section>

    <section class="location" aria-labelledby="location-title">
        <div class="container-wide location__inner">
            <div class="location__content">
                <p class="eyebrow">Como chegar</p>
                <h2 id="location-title">Estamos perto de você</h2>
                <p class="location__intro">Venha cuidar do seu sorriso em um ambiente acolhedor e preparado para receber toda a família.</p>

                <address class="location__address">
                    <span class="location__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z" />
                            <circle cx="12" cy="10" r="2.5" />
                        </svg>
                    </span>
                    <span>
                        <strong><?= e($clinic['address']['street']) ?></strong><br>
                        <?= e($clinic['address']['district']) ?> · <?= e($clinic['address']['city']) ?><br>
                        CEP <?= e($clinic['address']['postal_code']) ?>
                    </span>
                </address>

                <a class="btn btn-whatsapp location__route" href="<?= e($mapDirectionsUrl) ?>" target="_blank" rel="noopener noreferrer">
                    Traçar rota no Google Maps <span aria-hidden="true">→</span>
                </a>
            </div>

            <div class="location__map">
                <iframe
                    src="<?= e($mapEmbedUrl) ?>"
                    title="Mapa com a localização da <?= e($clinic['name']) ?>"
                    width="600"
                    height="450"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen
                ></iframe>
            </div>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
