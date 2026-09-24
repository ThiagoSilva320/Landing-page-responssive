<?php
declare(strict_types=1);

/**
 * Configurações e dados globais da Clínica Odonto Master.
 */
$clinic = [
    'name' => 'Clínica Odonto Master',
    'location' => 'Aparecida de Goiânia - GO',
    'address' => [
        'street' => 'Av. Independência, Rua L, 7 - Qd. 8',
        'district' => 'Jardim Ipiranga',
        'city' => 'Aparecida de Goiânia - GO',
        'postal_code' => '74968-150',
    ],
    'phone' => [
        'label' => '(62) 3280-9836',
        'uri' => '+556232809836',
    ],
    'whatsapp' => [
        'label' => '(62) 99533-7295',
        'number' => '5562995337295',
    ],
    'instagram' => [
        'label' => '@odontomaster.oficial',
        'url' => 'https://www.instagram.com/odontomaster.oficial/',
    ],
    'google_maps_place_id' => 'ChIJt9twde37XpMRPdnKG4ZDX00',
    'tagline' => 'Você merece voltar a sorrir com confiança.',
    'experience' => 'Mais de 10 anos de atuação.',
];

/** Escapa conteúdo antes da exibição no HTML. */
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Retorna o caminho-base do projeto, inclusive quando instalado em subpasta. */
function base_path(): string
{
    $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '/index.php');
    $directory = str_replace('\\', '/', dirname($scriptName));
    $directory = rtrim($directory, '/.');

    return $directory === '' ? '' : $directory;
}

/** Monta uma URL interna a partir da raiz pública do projeto. */
function url(string $path = ''): string
{
    $normalizedPath = ltrim($path, '/');

    return base_path() . '/' . $normalizedPath;
}

/** Monta uma URL absoluta para metadados e canonical. */
function absolute_url(string $path = ''): string
{
    $isHttps = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
    $scheme = $isHttps ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';

    return $scheme . '://' . $host . url($path);
}

/** Informa se a página recebida é a página atual. */
function is_current_page(string $filename): bool
{
    return basename($_SERVER['SCRIPT_NAME'] ?? 'index.php') === $filename;
}
