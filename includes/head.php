 
<?php require_once __DIR__ . '/form-proxy-config.php'; ?>
<?php require_once __DIR__ . '/allen-site-root.php'; ?>
<base href="<?php echo ($AllenSiteRoot ? $AllenSiteRoot : '') . '/'; ?>">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/responsive.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<link rel="icon" type="image/x-icon" href="./assets/images/favi.png">

<?php
$__siteConfig = require __DIR__ . '/seo-site-config.php';
$__defaultHost = (is_array($__siteConfig) && !empty($__siteConfig['default_host'])) ? $__siteConfig['default_host'] : ($_SERVER['HTTP_HOST'] ?? 'localhost');
$__host = $_SERVER['HTTP_HOST'] ?? $__defaultHost;
$__host = preg_replace('/^www\./i', '', $__host);
$__localHosts = ['localhost', '127.0.0.1', '192.168.1.195'];
if (in_array($__host, $__localHosts, true) || preg_match('/\.localhost$/i', $__host)) {
    $__host = $__defaultHost;
}
$__canonical = $canonicalUrl ?? ($GLOBALS['canonicalUrl'] ?? null);
if (empty($__canonical)) {
    $__path = preg_replace('/\?.*$/', '', $_SERVER['REQUEST_URI'] ?? '/');
    $__path = preg_replace('/\.php$/i', '', $__path);
    $__path = preg_replace('/^\/index$/i', '/', $__path);
    $__path = preg_replace('/^\/home$/i', '/', $__path);
    if ($__path === '') {
        $__path = '/';
    }
    $__canonical = 'https://' . $__host . $__path;
} else {
    if (stripos($__canonical, 'http') !== 0) {
        $__canonical = 'https://' . $__host . (str_starts_with($__canonical, '/') ? $__canonical : '/' . $__canonical);
    }
    $__canonical = preg_replace('/^https?:\/\/www\./i', 'https://', $__canonical);
}
$__responseCode = http_response_code();
$__explicitNoindex = !empty($noindex) || !empty($GLOBALS['noindex']);
$__robots = ($__responseCode && $__responseCode !== 200) || $__explicitNoindex ? 'noindex, follow' : 'index, follow';
?>
<meta name="robots" content="<?= htmlspecialchars($__robots) ?>" />
<?php if (!empty($__canonical)): ?>
<link rel="canonical" href="<?= htmlspecialchars($__canonical, ENT_QUOTES, 'UTF-8') ?>" />
<?php endif; ?>
<meta name="google-site-verification" content="i_SJhMvPOKXNq88SbHhF06C_pChGkDJqyn0vEna5bOs" />

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M5FQK929');</script>


<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "@id": "https://allenkidsbareilly.in/#website",
  "url": "https://allenkidsbareilly.in/",
  "name": "Allen Kids Bareilly",
  "alternateName": "Allen Kids Preschool Bareilly",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://allenkidsbareilly.in/?s={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>


<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Preschool",
  "@id": "https://allenkidsbareilly.in/#preschool",
  "name": "Allen Kids Bareilly",
  "alternateName": "Allen Kids Preschool Bareilly",
  "url": "https://allenkidsbareilly.in/",
  "logo": "https://allenkids.allenhouseschools.com/upload/images/1757077386_logo_kids.png",
  "image": "https://lh3.googleusercontent.com/p/AF1QipPra2ikH8Cp52Y3in97R59hGuouqU8_1yPnDyWv=s680-w680-h510-rw",
  "telephone": "+91-9720010109",
  "email": "contact@allenkidsbareilly.in",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "1096, Viharman Nagla, Veersavarkar Nagar, 100 Foota Road",
    "addressLocality": "Bareilly",
    "addressRegion": "Uttar Pradesh",
    "postalCode": "243122",
    "addressCountry": "IN"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": "28.3889524",
    "longitude": "79.4410102"
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday", 
      "Saturday"
    ],
    "opens": "08:00",
    "closes": "16:00"
  },
  "sameAs": [
    "https://www.facebook.com/allenkidsbareilly.in/",
    "https://www.instagram.com/allenkidsbareilly/",
    "https://www.youtube.com/@allenkids9298"
  ]
}
</script>
<?php
require_once __DIR__ . '/seo.php';
allenkids_render_og_meta_tags();
?>
