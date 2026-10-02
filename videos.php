<?php
$page = "videos";
require_once "proxy/config.php";
require_once "proxy/api.php";
$galleryData = fetchApiData("api/pages/videos-page-bareilly");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($galleryData['data']['title'] ?? (ALLENKIDS_SITE_NAME . ' | Video Gallery')) ?></title>
    <?php include "includes/head.php" ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
</head>

<body>
    <!-- Header -->
    <?php include "includes/header.php"; ?>
    <!-- End -->

    <!-- Main Content -->
    <main>
        <!-- Breadcrumb -->
        <section class="about-brudcrumb md:h-[350px] bg-program-cover relative">
            <div class="text-center md:py-28 py-10 relative z-10">
                <h1 class="text-[42px] font-[400] text-white">Gallery</h1>
                <ul class="flex items-center gap-3 justify-center">
                    <li><a href="/" class="text-white flex items-center gap-2 sm:text-[16px] text-[12px]">Home </a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319" d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href="" class="text-[#FAB319] sm:text-[16px] text-[12px]">Video Gallery</a></li>
                </ul>
            </div>
        </section>
        <!-- End -->

        <!--==== START =====-->
        <section class="mt-7 relative mb-20">
            <div class="absolute md:left-10 left-2 md:top-[50px] top-0">
                <img src="assets/images/gallery/line-f.webp" alt="Left Background" class="md:w-[150px] w-[50px] " />
            </div>
            <div class="absolute  left-0   bottom-0">
                <img src="assets/images/gallery/brush.webp" alt="Left Background" class="md:w-[150px] w-[80px] " />
            </div>
            <div class="absolute right-0  bottom-0">
                <img src="assets/images/gallery/r-arrow.webp" alt="Left Background" class="md:w-[100px] w-[50px] " />
            </div>

            <div class="comman-container relative z-10 mb-10">
                <div class="absolute md:right-1 right-0 md:top-[50px] top-0">
                    <img src="assets/images/gallery/car.png" alt="Left Background" class="md:w-[150px] w-[50px] " />
                </div>

                <div class="text-center text-white pt-10">
                    <h2 class="text-[#F66] flex items-center gap-2 justify-center text-[18px]">
                        <svg width="77" height="31" viewBox="0 0 77 31" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="77" height="30" transform="matrix(-1 0 0 1 77 0.0800781)" fill="url(#pattern0_293_580)" />
                            <defs>
                                <pattern id="pattern0_293_580" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_293_580" transform="scale(0.012987 0.0333333)" />
                                </pattern>
                                <image id="image0_293_580" width="77" height="30" preserveAspectRatio="none" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEMUlEQVRoge2Ze4hVVRTGf46WMyWmZvkaNSWfST7I1EINyVQ0kSxsQiyS3JFo/lGhUQSCJokk5aONhijhHyGRkKTlI3JMFKQaBx2o1HS0klSs66ucGVl3vhOnw73XwblPnQ8OZ+acfc/e+zvr8a11mtXNmsUtDe8T79659sAVvP87eqvo1mYsJR4C9ica0ERaclQBfXFuSHREE2nJ4P0x4BzwdXREE2mp8S3QDucGhUc1kZYa23V3SXhUizxb5I3AXnxPYCDQG+gAtAk9x7Lfb8AvwA/AT0BtA+cJSBuDcyV4f4kCJu1OYAowERgLtA/dqwFiIus2oDVQErp/FtgGbNZxOeks3lfhXDVQCowDPqcASesDvA5MA1rJYvYA5TpbxjsO/Bv5nRHXD3gwbjX1RJcB53HuY+B9vK9OMucO4HlgUkBaocS07sBG4DAwU8TMBjoBo4A3gS1ywShhhr+AfcAakdURmCCLexU4gnPLcK5tgt9+o/PjwYV8J605MF9k2Wa/12YHAKuA0zf4XHPhrbLYXsB6YF58HuemRsaW69wd57qS56R1AXYC7wIWgF+QSrfN1qVtFu+P4v1LwOC4xcEmnFsbD/z1938GTmn0aPKYtMEqYcz1vgQekDWkj6wovK8ARgJv6QXtwrl7NWqfzo+Sp6Q9IlHZGVgKPAn8npWZva/B+0XA+HgJBd/hXGmoBjVLzzvSBsmyLDMuAN5Q/MkuvN8uq7tLieC45h+Acy0C0koiWicX6Kp41VrZcElOV+P9QckTE8rv6Gox0L9IWu0i8EEOl3iHNJCp+dUK/rlHPXFPAT1Ca+lnhF0FLENMllvEcrBYI2qIsuXcnJHl3N3xAr2+4ghQLUtbrP/7BhXBCmA5MB34KMtLfRmYAZwEntVLzDT6K2YNxLleCg3dIuVWMvQJ2t1Wo/0DnADu19/ZwMPAbiWkx1QKZQLN9fyp8qgujZhjTWBpVnrMAT6UMn4vC4TdExeScDvwWoYIs2e/Ld1VGrpeo2ripM4mXs8oNMVUdl1WrA9QF++SeP9r+MNKkSzMCBwKVGZgEwGK1XYxsfgZ8HSGhGsrJZVTittHJR/+/K89lOzDSgqEuxy1KhPKVfyOCJUP6YS5ygYRdlAdhEwp/Zg8KK2Iits9aoV0UwegY4YIe0auMTlH2bpRSFQRTNSGrJOwVz2sdMBE4hfAc3KPJ4BjhUHT/5GItCuq/2xD9wEHgFcaWXKZRVWopjuiQvxQOjaQCyQjwoLlcIlNE3orgR/lVi0buM4idUh3q61sWugrYJj6YwWLVO3uP7RpS68L5a6fKh1vEaGVGndVJHVQ0T1CPfVOetZptak3FDJZAa73jaBWFcInykIvSvyW6bgeqqT91qmReFOgoR9WYtI7dph7mbo2NW8xz6zLXPaCLMpczz6VWYvHSLu5AFwD7u/9V73LPFIAAAAASUVORK5CYII=" />
                            </defs>
                        </svg>
                        Video Gallery
                        <svg width="78" height="31" viewBox="0 0 78 31" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="77" height="30" transform="translate(0.681641 0.0800781)" fill="url(#pattern0_293_582)" />
                            <defs>
                                <pattern id="pattern0_293_582" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_293_582" transform="scale(0.012987 0.0333333)" />
                                </pattern>
                                <image id="image0_293_582" width="77" height="30" preserveAspectRatio="none" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEMUlEQVRoge2Ze4hVVRTGf46WMyWmZvkaNSWfST7I1EINyVQ0kSxsQiyS3JFo/lGhUQSCJokk5aONhijhHyGRkKTlI3JMFKQaBx2o1HS0klSs66ucGVl3vhOnw73XwblPnQ8OZ+acfc/e+zvr8a11mtXNmsUtDe8T79659sAVvP87eqvo1mYsJR4C9ica0ERaclQBfXFuSHREE2nJ4P0x4BzwdXREE2mp8S3QDucGhUc1kZYa23V3SXhUizxb5I3AXnxPYCDQG+gAtAk9x7Lfb8AvwA/AT0BtA+cJSBuDcyV4f4kCJu1OYAowERgLtA/dqwFiIus2oDVQErp/FtgGbNZxOeks3lfhXDVQCowDPqcASesDvA5MA1rJYvYA5TpbxjsO/Bv5nRHXD3gwbjX1RJcB53HuY+B9vK9OMucO4HlgUkBaocS07sBG4DAwU8TMBjoBo4A3gS1ywShhhr+AfcAakdURmCCLexU4gnPLcK5tgt9+o/PjwYV8J605MF9k2Wa/12YHAKuA0zf4XHPhrbLYXsB6YF58HuemRsaW69wd57qS56R1AXYC7wIWgF+QSrfN1qVtFu+P4v1LwOC4xcEmnFsbD/z1938GTmn0aPKYtMEqYcz1vgQekDWkj6wovK8ARgJv6QXtwrl7NWqfzo+Sp6Q9IlHZGVgKPAn8npWZva/B+0XA+HgJBd/hXGmoBjVLzzvSBsmyLDMuAN5Q/MkuvN8uq7tLieC45h+Acy0C0koiWicX6Kp41VrZcElOV+P9QckTE8rv6Gox0L9IWu0i8EEOl3iHNJCp+dUK/rlHPXFPAT1Ca+lnhF0FLENMllvEcrBYI2qIsuXcnJHl3N3xAr2+4ghQLUtbrP/7BhXBCmA5MB34KMtLfRmYAZwEntVLzDT6K2YNxLleCg3dIuVWMvQJ2t1Wo/0DnADu19/ZwMPAbiWkx1QKZQLN9fyp8qgujZhjTWBpVnrMAT6UMn4vC4TdExeScDvwWoYIs2e/Ld1VGrpeo2ripM4mXs8oNMVUdl1WrA9QF++SeP9r+MNKkSzMCBwKVGZgEwGK1XYxsfgZ8HSGhGsrJZVTittHJR/+/K89lOzDSgqEuxy1KhPKVfyOCJUP6YS5ygYRdlAdhEwp/Zg8KK2Iits9aoV0UwegY4YIe0auMTlH2bpRSFQRTNSGrJOwVz2sdMBE4hfAc3KPJ4BjhUHT/5GItCuq/2xD9wEHgFcaWXKZRVWopjuiQvxQOjaQCyQjwoLlcIlNE3orgR/lVi0buM4idUh3q61sWugrYJj6YwWLVO3uP7RpS68L5a6fKh1vEaGVGndVJHVQ0T1CPfVOetZptak3FDJZAa73jaBWFcInykIvSvyW6bgeqqT91qmReFOgoR9WYtI7dph7mbo2NW8xz6zLXPaCLMpczz6VWYvHSLu5AFwD7u/9V73LPFIAAAAASUVORK5CYII=" />
                            </defs>
                        </svg>
                    </h2>
                    <h2 class="md:text-[45px] md:leading-11 leading-9 text-[26px] mt-4 text-[#2C4073]">Explore Our Video Gallery</h2>
                </div>

                <?php
                // ────────────────────────────────────────────────
                //          SORT SECTIONS - newest first
                // ────────────────────────────────────────────────
                if (
                    !empty($galleryData['data']['sections']) &&
                    is_array($galleryData['data']['sections'])
                ) {
                    usort($galleryData['data']['sections'], function($a, $b) {
                        $itemA = $a['resolved_content'] ?? [];
                        $itemB = $b['resolved_content'] ?? [];

                        $dateA = !empty($itemA['date']) && $itemA['date'] !== '0000-00-00' && $itemA['date'] !== '0000-00-00 00:00:00'
                               ? $itemA['date']
                               : ($itemA['created_at'] ?? '1970-01-01 00:00:00');

                        $dateB = !empty($itemB['date']) && $itemB['date'] !== '0000-00-00' && $itemB['date'] !== '0000-00-00 00:00:00'
                               ? $itemB['date']
                               : ($itemB['created_at'] ?? '1970-01-01 00:00:00');

                        $timeA = strtotime($dateA);
                        $timeB = strtotime($dateB);

                        return $timeB <=> $timeA; // newest → oldest
                    });
                }
                // ────────────────────────────────────────────────

                $bgColors = ['#F69D48', '#BF45AA', '#F22F35'];
                $ribbonImages = [
                    'assets/images/gallery/g-red.webp',
                    'assets/images/gallery/g-green.webp',
                    'assets/images/gallery/g-orange.webp'
                ];

                $sectionCount = 0;
                $videoCards   = [];
                $hasVideos    = false;

                if (!empty($galleryData['data']['sections']) && is_array($galleryData['data']['sections'])) {
                    foreach ($galleryData['data']['sections'] as $section) {
                        if (
                            empty($section['layout']) ||
                            $section['layout'] !== 'video' ||
                            empty($section['resolved_content']) ||
                            empty($section['resolved_content']['media']) ||
                            !is_array($section['resolved_content']['media'])
                        ) {
                            continue;
                        }

                        $videoData  = $section['resolved_content'];
                        $mediaItems = $videoData['media'];

                        foreach ($mediaItems as $media) {
                            $mediaUrl = trim($media['media_url'] ?? '');
                            if ($mediaUrl === '') {
                                continue;
                            }

                            $embedUrl = '';
                            $urlParts = parse_url($mediaUrl);

                            if (!empty($urlParts['host'])) {
                                $host = strtolower($urlParts['host']);

                                if (in_array($host, ['www.youtube.com', 'youtube.com', 'm.youtube.com', 'youtu.be'], true)) {
                                    $videoId = '';

                                    if ($host === 'youtu.be') {
                                        $pathParts = explode('/', trim($urlParts['path'] ?? '', '/'));
                                        $videoId   = $pathParts[0] ?? '';
                                    } elseif (isset($urlParts['query'])) {
                                        parse_str($urlParts['query'], $query);
                                        $videoId = $query['v'] ?? '';
                                    }

                                    if ($videoId === '' && !empty($urlParts['path'])) {
                                        $path = trim($urlParts['path'], '/');

                                        if (str_starts_with($path, 'shorts/')) {
                                            $parts   = explode('/', $path);
                                            $videoId = $parts[1] ?? '';
                                        } elseif (str_starts_with($path, 'embed/')) {
                                            $parts   = explode('/', $path);
                                            $videoId = $parts[1] ?? '';
                                        }
                                    }

                                    if (preg_match('/^[a-zA-Z0-9_-]{10,12}$/', $videoId)) {
                                        $embedUrl = 'https://www.youtube.com/embed/' . $videoId;
                                    }
                                }
                            }

                            if ($embedUrl === '') {
                                continue;
                            }

                            $hasVideos = true;

                            $rawDate = !empty($videoData['date']) && $videoData['date'] !== '0000-00-00'
                                ? $videoData['date']
                                : ($videoData['created_at'] ?? '');
                            $dayMonth = $rawDate && strtotime($rawDate) ? date('d M', strtotime($rawDate)) : '-- --';
                            $year     = $rawDate && strtotime($rawDate) ? date('Y', strtotime($rawDate)) : '----';

                            $bgColor   = $bgColors[$sectionCount % count($bgColors)];
                            $ribbonImg = $ribbonImages[$sectionCount % count($ribbonImages)];
                            $sectionCount++;

                            $title    = trim($videoData['title'] ?? 'Untitled Video');
                            $category = 'Video';

                            ob_start();
                            ?>
                            <div class="relative mb-20">
                                <iframe class="w-full md:h-[400px] h-[280px] rounded-xl"
                                    src="<?= htmlspecialchars($embedUrl) ?>"
                                    title="YouTube video" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>

                                <div class="absolute bottom-[30px] left-0 right-0 p-4 text-white rounded-b-[10px] relative z-10"
                                     style="background: <?= htmlspecialchars($bgColor) ?>;">
                                    <div class="absolute top-[-51px] md:right-[20px] right-[5px]">
                                        <div class="relative">
                                            <img src="<?= htmlspecialchars($ribbonImg) ?>" alt="<?= htmlspecialchars($media['media_alt_text'] ?? '') ?>" class="md:w-[100px] w-[75px]" />
                                            <p class="absolute md:top-[28px] top-[22px] left-5 md:text-[19px] text-[15px] md:leading-[24px] leading-[18px] font-semibold text-center">
                                                <?= htmlspecialchars($dayMonth) ?><br><?= htmlspecialchars($year) ?>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-3 border-b-[1px] border-[#e7b78a] pb-[14px] flex-wrap">
                                        <div class="md:text-[16px] text-[14px] font-[400]">
                                            Category : <span class="font-[500]"><?= htmlspecialchars($category) ?></span>
                                        </div>
                                        <div class="md:text-[16px] text-[14px] font-[400]">
                                            Total Video(s) : <span class="font-[500]"><?= count($mediaItems) ?></span>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <h2 class="md:text-[24px] text-[22px] md:leading-7 leading-7 font-semibold">
                                            <?= htmlspecialchars($title) ?>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $videoCards[] = ob_get_clean();
                        }
                    }
                }

                if ($hasVideos && !empty($videoCards)) {
                    echo '<div class="grid 2xl:grid-cols-3 xl:grid-cols-3 lg:grid-cols-2 md:grid-cols-2 grid-cols-1 gap-5 md:mt-10 mt-5">';
                    foreach ($videoCards as $cardHtml) {
                        echo $cardHtml;
                    }
                    echo '</div>';
                } else {
                    echo '<p class="text-center text-gray-500 py-16 text-xl font-medium">No videos available at the moment.</p>';
                }
                ?>
            </div>
        </section>
        <!--==== END ====-->

        <!-- Footer -->
        <?php include "includes/footer.php" ?>
        <!-- End -->
    </main>

    <!-- Scripts -->
    <script src="assets/js/kids.js" async></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind('[data-fancybox="gallery"]', {
            //
        });
    </script>
</body>
</html>