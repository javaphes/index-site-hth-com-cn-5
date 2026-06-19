<?php

function renderLinkCard(string $title, string $description, string $url, string $imageUrl = ''): string
{
    $escapedTitle = htmlspecialchars($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $escapedDescription = htmlspecialchars($description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $escapedUrl = htmlspecialchars($url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $escapedImageUrl = htmlspecialchars($imageUrl, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $html = '<div class="link-card">';
    $html .= '<a href="' . $escapedUrl . '" target="_blank" rel="noopener noreferrer">';

    if ($escapedImageUrl !== '') {
        $html .= '<div class="link-card-image">';
        $html .= '<img src="' . $escapedImageUrl . '" alt="' . $escapedTitle . '" loading="lazy">';
        $html .= '</div>';
    }

    $html .= '<div class="link-card-content">';
    $html .= '<h3 class="link-card-title">' . $escapedTitle . '</h3>';
    $html .= '<p class="link-card-description">' . $escapedDescription . '</p>';
    $html .= '<span class="link-card-url">' . $escapedUrl . '</span>';
    $html .= '</div>';

    $html .= '</a>';
    $html .= '</div>';

    return $html;
}

function renderLinkCardFromConfig(array $config): string
{
    $title = $config['title'] ?? 'Untitled';
    $description = $config['description'] ?? '';
    $url = $config['url'] ?? '#';
    $imageUrl = $config['image_url'] ?? '';

    return renderLinkCard($title, $description, $url, $imageUrl);
}

function renderLinkCardList(array $items): string
{
    $html = '<div class="link-card-list">';

    foreach ($items as $item) {
        $html .= renderLinkCardFromConfig($item);
    }

    $html .= '</div>';

    return $html;
}

$sampleData = [
    [
        'title' => '华体会体育',
        'description' => '华体会体育平台提供丰富的体育赛事直播和竞猜服务，涵盖足球、篮球、网球等多种热门运动。',
        'url' => 'https://index-site-hth.com.cn',
        'image_url' => 'https://index-site-hth.com.cn/images/sports.jpg',
    ],
    [
        'title' => '华体会电竞',
        'description' => '华体会电竞专区汇聚全球顶级电竞赛事，支持实时赔率与互动竞猜。',
        'url' => 'https://index-site-hth.com.cn/esports',
        'image_url' => 'https://index-site-hth.com.cn/images/esports.jpg',
    ],
    [
        'title' => '华体会娱乐',
        'description' => '华体会娱乐板块提供真人视讯、棋牌游戏等多种娱乐方式。',
        'url' => 'https://index-site-hth.com.cn/casino',
        'image_url' => 'https://index-site-hth.com.cn/images/casino.jpg',
    ],
];

echo renderLinkCardList($sampleData);