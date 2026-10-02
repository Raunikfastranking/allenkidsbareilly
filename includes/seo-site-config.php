<?php

return [
    'default_host' => 'allenkidsbareilly.in',
    'defaults_fn'  => 'allenkids_site_og_defaults',
    'home_bootstrap' => function () {
        require_once dirname(__DIR__) . '/proxy/api.php';
        $GLOBALS['homePage'] = fetchApiData('api/pages/best-preschool-in-bareilly-your-childs-second-home');
        $GLOBALS['pageData'] = $GLOBALS['homePage'];
    },
    'admission_bootstrap' => function () {
        require_once dirname(__DIR__) . '/proxy/api.php';
        $GLOBALS['admission_data'] = fetchApiData('api/pages/admission-process-for-pre-primary-school-in-bareilly');
        $GLOBALS['pageData'] = $GLOBALS['admission_data'];
    },
    'blogs_bootstrap' => function () {
        $GLOBALS['ogMeta'] = [
            'title'       => 'Allen Kids Bareilly | Blogs',
            'description' => 'Latest blogs, news, events and updates from Allen Kids Bareilly preschool.',
            'url'         => 'https://allenkidsbareilly.in/blogs',
            'type'        => 'website',
        ];
    },
    'sample_blog' => function () {
        require_once dirname(__DIR__) . '/proxy/api.php';
        $blogData = fetchApiData('api/blogs/branch/5');
        return !empty($blogData['data'][0]) && is_array($blogData['data'][0]) ? $blogData['data'][0] : null;
    },
];
