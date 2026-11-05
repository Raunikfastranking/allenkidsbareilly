<?php
// Dev router for PHP's built-in server — emulates the Apache .htaccess rewrite
// rules so clean URLs work locally. Run: php -S localhost:8000 router.php

$docroot = __DIR__;
chdir($docroot);

$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$path = trim(rawurldecode($uri), '/');
$query = [];
parse_str($_SERVER['QUERY_STRING'] ?? '', $query);

function dev_redirect(string $to, int $code = 301): void
{
    header('Location: ' . $to, true, $code);
    exit;
}

function dev_serve(string $file, array $params = []): void
{
    global $docroot, $query;
    $real = realpath($docroot . '/' . $file);
    if ($real === false || !is_file($real)) {
        http_response_code(404);
        echo 'Not found: ' . htmlspecialchars($file);
        return;
    }
    $_GET = array_merge($params, $query); // QSA
    $_SERVER['SCRIPT_NAME'] = '/' . str_replace('\\', '/', $file);
    $_SERVER['PHP_SELF'] = $_SERVER['SCRIPT_NAME'];
    $_SERVER['SCRIPT_FILENAME'] = $real;
    chdir(dirname($real));
    require $real;
}

// sitemap.xml -> sitemap.php
if (strcasecmp($path, 'sitemap.xml') === 0) {
    dev_serve('sitemap.php');
    return true;
}

// Legacy detail URLs -> clean URLs (301)
if (strcasecmp($path, 'blog-detail.php') === 0 && !empty($query['slug'])) {
    dev_redirect('/blog/' . rawurlencode((string) $query['slug']));
}
if (strcasecmp($path, 'event-detail.php') === 0 && !empty($query['id'])) {
    dev_redirect('/event/' . rawurlencode((string) $query['id']));
}
if (strcasecmp($path, 'gallery-detail.php') === 0 && !empty($query['id'])) {
    dev_redirect('/gallery/' . rawurlencode((string) $query['id']));
}
if (strcasecmp($path, 'photo-gallery.php') === 0) {
    dev_redirect('/photos');
}
if (strcasecmp($path, 'student-work-samples.php') === 0) {
    dev_redirect('/student-work-sample');
}

// .php -> clean URL (302 locally, mirrors .htaccess)
if (preg_match('#^(.*?)\.php$#i', $path, $m)) {
    $qs = $_SERVER['QUERY_STRING'] ?? '';
    dev_redirect('/' . $m[1] . ($qs !== '' ? '?' . $qs : ''), 302);
}

// Serve existing files and directories as-is
$fsPath = $docroot . '/' . $path;
if ($path !== '' && is_file($fsPath)) {
    return false; // let built-in server serve static files
}
if ($path !== '' && is_dir($fsPath)) {
    $dirIndex = $path . '/index.php';
    if (is_file($docroot . '/' . $dirIndex)) {
        dev_serve($dirIndex);
        return true;
    }
    return false;
}
if ($path === '') {
    dev_serve('index.php');
    return true;
}

// SEO slug redirects: old root slugs -> new nested slugs (301)
$seoRedirects = [
    'school-calendar' => '/parent-resources/school-calendar',
    'daily-routine' => '/parent-resources/daily-routine',
    'tips-for-parent' => '/parent-resources/tips-for-parents',
    'health-safety-policies' => '/parent-resources/health-safety-policies',
    'testimonial' => '/parent-resources/testimonials',
    'photos' => '/gallery/photos',
    'videos' => '/gallery/videos',
    'student-work-sample' => '/gallery/student-work-samples',
    'virtual-tour' => '/gallery/virtual-tour',
];
if (isset($seoRedirects[$path])) {
    dev_redirect($seoRedirects[$path]);
}

// Nested slugs -> page-template.php
$nestedPages = [
    'parent-resources/school-calendar' => 'school-calendar',
    'parent-resources/daily-routine' => 'daily-routine',
    'parent-resources/tips-for-parents' => 'tips-for-parent',
    'parent-resources/health-safety-policies' => 'health-safety-policies',
    'parent-resources/testimonials' => 'testimonial',
    'gallery/photos' => 'photos',
    'gallery/videos' => 'videos',
    'gallery/student-work-samples' => 'student-work-sample',
    'gallery/virtual-tour' => 'virtual-tour',
];
if (isset($nestedPages[$path])) {
    dev_serve('page-template.php', ['page' => $nestedPages[$path]]);
    return true;
}

// Program page slugs -> program-single.php
$programSlugs = [
    'programs/playgroup-1' => 'top-playgroup-school-in-bareilly-allen-kids',
    'programs/playgroup-2' => 'enroll-at-top-preschool-playgroup-near-bareilly-allen-kids',
    'programs/nursery' => 'best-nursery-school-near-bareilly-allen-kids-preschool',
    'programs/preparatory' => 'preparatory-program-for-kids-in-bareilly-allen-kids',
    'programs/class-1' => 'best-school-in-bareilly-for-class-1-allen-kids',
    'programs/class-2' => 'best-school-for-class-2-in-bareilly-allen-kids',
    'programs/class-3' => 'best-primary-school-for-class-3-in-bareilly-allen-kids',
    'programs/day-care' => 'best-daycare-school-in-bareilly-allen-kids',
];
if (isset($programSlugs[$path])) {
    dev_serve('program-single.php', ['slug' => $programSlugs[$path]]);
    return true;
}

// xxx -> xxx.php when the file exists
if (strpos($path, '..') === false && is_file($docroot . '/' . $path . '.php')) {
    dev_serve($path . '.php');
    return true;
}

// Friendly URL rewrites
if (preg_match('#^home/?$#i', $path)) {
    dev_serve('index.php');
    return true;
}
if (preg_match('#^newsletter/?$#i', $path)) {
    dev_serve('newsletters.php');
    return true;
}
if (preg_match('#^blog/([A-Za-z0-9-]+)/?$#i', $path, $m)) {
    dev_serve('blog-detail.php', ['slug' => $m[1]]);
    return true;
}
if (preg_match('#^view/([A-Za-z0-9-]+)/?$#i', $path, $m)) {
    dev_serve('detail-view.php', ['slug' => $m[1]]);
    return true;
}

// Blog / event / gallery clean URLs and legacy redirects
if (preg_match('#^blog-detail/([A-Za-z0-9-]+)/?$#i', $path, $m)) {
    dev_redirect('/blog/' . $m[1]);
}
if (preg_match('#^event-detail/([0-9]+)/?$#i', $path, $m)) {
    dev_redirect('/event/' . $m[1]);
}
if (preg_match('#^event/([0-9]+)/?$#i', $path, $m)) {
    dev_serve('event-detail.php', ['id' => $m[1]]);
    return true;
}
if (preg_match('#^gallery-detail/([0-9]+)/?$#i', $path, $m)) {
    dev_redirect('/gallery/' . $m[1]);
}
if (preg_match('#^gallery/?$#i', $path)) {
    dev_serve('gallery-list.php');
    return true;
}
if (preg_match('#^gallery/([0-9]+)/?$#i', $path, $m)) {
    dev_serve('gallery-detail.php', ['id' => $m[1]]);
    return true;
}
if (preg_match('#^photo-gallery/?$#i', $path)) {
    dev_redirect('/photos');
}
if (preg_match('#^student-work-samples/?$#i', $path)) {
    dev_redirect('/student-work-sample');
}

// CMS dynamic pages fallback (single-segment slugs)
if (preg_match('#^[^/]+/?$#', $path)) {
    dev_serve('page-template.php', ['page' => $path]);
    return true;
}

http_response_code(404);
if (is_file($docroot . '/404.php')) {
    dev_serve('404.php');
}
return true;
