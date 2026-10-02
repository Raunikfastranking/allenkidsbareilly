<?php
$page = "programs";
require_once 'proxy/api.php';
require_once __DIR__ . '/includes/program-config.php';
allenkids_redirect_legacy_program_id();
$slug = allenkids_resolve_program_slug();
$legacyId = $slug ? allenkids_program_legacy_id_for_slug($slug) : null;

// Default meta values
$metaTitle = "Allen Kids Bareilly";
$metaDescription = "Welcome to Allen Kids Bareilly — where little seeds grow!";
$metaKeywords = "preschool, playgroup, nursery, daycare, allen kids, Bareilly";
$contentData = "No Data";

$program = null;

// Fetch API data by CMS SEO slug
if ($slug) {
    $program = fetchApiData('api/pages/' . $slug);
}
// If API gives meta, use it
if ($program && isset($program['data'])) {
    $metaTitle = $program['data']['title'] ?? $metaTitle;
    $metaDescription = $program['data']['meta_description'] ?? $metaDescription;
    $metaKeywords = $program['data']['meta_keywords'] ?? $metaKeywords;
    $contentData  = $program['data']['sections'][1] ?? $contentData;
}
$canonicalUrl = $slug ? allenkids_program_canonical_url($slug) : null;
$GLOBALS['canonicalUrl'] = $canonicalUrl;
$ogMeta = [
    'title' => $metaTitle,
    'description' => $metaDescription,
    'url' => $canonicalUrl,
    'type' => 'website',
];
$GLOBALS['ogMeta'] = $ogMeta;

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($metaTitle) ?></title>
    <meta name="description" content="<?= htmlspecialchars($metaDescription) ?>">
    <meta name="keywords" content="<?= htmlspecialchars($metaKeywords) ?>">
    <?php include "includes/head.php" ?>
</head>

<body>
    <!--==== Header ====-->
    <?php include "includes/header.php"; ?>
    <!--==== End ====-->
    <?php
    $programs = [
        "playgroup-1" => [
            "title" => "Playgroup 1 (2 to 3 years)",
            "description" => "",
            "list_1" => "1 We practice integrated thematic study which aims at enhancing development and education of children through play.",
            "list_2" => "2 Our specially designed curriculum encourages children to develop self- confidence and self -esteem to feel valued as individuals.",
            "list_3" => "3 Circle time is a great time for children to learn social skills of being together as a large group and to learn more about the theme",
            "list_4" => "4	It continues to be a fun time for them to sing, count, listen to stories, discuss their daily routine and participate in simple demonstrations and observations.",
            "image" => "assets/images/our-class/pg-11.webp",

            "p_image" => "assets/images/our-class/pg-1.webp",
            "url" => allenkids_program_slug_for_id('playgroup-1')
        ],
        "playgroup-2" => [
            "title" => "Playgroup 2 (3 to 4 years)",
            "description" => "",
            "list_1" => "•	Playing quiz games enhance their knowledge in an interesting and interactive manner.",
            "list_2" => "•	Various class activities which involve the sharing of ideas and information, help children develop children’s linguistic abilities.",
            "list_3" => "•	They learn to recognize, trace and write letters and numbers,",
            "list_4" => "•	learn words with beginning sound of each letter.",
            "list_5" => "•	They develop motor skills through planned indoor and outdoor activities",
            "list_6" => "•	Story sessions enhances their language, vocabulary and imagination.",
            "list_7" => "•	Music and dance activities help the children learn the sound beats and rhythm. It also makes them aware of new words and their meanings.",
            "list_8" => "•	Art and craft activities also helps in improving fine motor skills and enhances their creativity and imagination.",
            "image" => "assets/images/our-class/pg-22.webp",

            "p_image" => "assets/images/our-class/pg-2.webp",
            "url" => allenkids_program_slug_for_id('playgroup-2')
        ],
        "nursery" => [
            "title" => "Nursery (4  to 5 years)",
            "description" => "",
            "list_1" => "•	Nursery provides early education and child care to children aged between 4-5 years.",
            "list_2" => "•	Children learn different skills like communication and language including listening, speaking and understanding.",
            "list_3" => "•	Different activities are framed in such a way which enhances their logical thinking and problem solving.",
            "list_4" => "•	Circle time promotes structure and routine. The children learn to listen, speak within a group and sit still while enjoying a variety of songs and stories, pertinent to the day’s discussion.",
            "image" => "assets/images/our-class/nursery-2.webp",

            "p_image" => "assets/images/our-class/nursery.webp",
            "url" => allenkids_program_slug_for_id('nursery')
        ],

        "preparatory" => [
            "title" => "Preparatory (5 to 6 years)",
            "description" => "A preparatory year is a programme designed to prepare the students for the primary classes. The curriculum of our Preparatory classes is a holistic, child centered program that nurtures each child by offering focused meaningful instruction which is appropriate for their development. This classroom provides opportunities to develop independence, self-discipline, peer cooperation through edusports and freeplay. Social emotional development is addressed everyday through positive reinforcement, interactive activities and engaging them to build interpersonal skills.  ",
            "image" => "assets/images/our-class/prep2.webp",

            "p_image" => "assets/images/our-class/prep.webp",
            "url" => allenkids_program_slug_for_id('preparatory'),
            "para_" => "Children learn to develop all necessary skills to leave Allen Kids as confident, responsible and independent individuals, ready for their primary school.",
            "li_list" => [
                "• Among the programme and lessons, we offer this to age group are:",
                "o	Circle time is a big feature to share ideas and experiences and to revise topics covered in the class. Plenty of opportunities are given to share favourite stories and songs.",
                "o	Reading and language lessons are focused on language acquisitions which include oral language development and vocabulary.",
                "o	Technology skills are incorporated each week with the use during computer time.",
                "o	This group also partakes in yoga, skating, adventure sports etc to foster confidence, self- awareness, self -esteem & well- being.",
                "o	Leaders are appointed to give children authority as well as responsibility. They learn to accept challenges.",
                "o	Art and craft activities also help in improving fine motor skills and enhance their creativity and imagination.",
                "o	Music and dance activities help the children learn the sound beats and rhythm. It also makes them aware of new words and their meanings.",
            ],
        ],
        "class-1" => [
            "title" => "Class 1 (6 to 7 years)",
            "description" => " ",
            "image" => "assets/images/our-class/class-11.webp",

            "p_image" => "assets/images/our-class/class-1.webp",
            "url" => allenkids_program_slug_for_id('class-1')
        ],
        "class-2" => [
            "title" => "Class 2 (7 to 8 years)",
            "description" => "",
            "image" => "assets/images/our-class/class-22.webp",

            "p_image" => "assets/images/our-class/class-2.webp",
            "url" => allenkids_program_slug_for_id('class-2')
        ],
        "class-3" => [
            "title" => "Class 3 (8 to 9 years)",
            "description" => " ",
            "image" => "assets/images/our-class/class-33.webp",

            "p_image" => "assets/images/our-class/class-3.webp",
            "url" => allenkids_program_slug_for_id('class-3')
        ],
        "day-care" => [
            "title" => "Day Care ",
            "description" => "We are dedicated to providing a safe, nurturing, and stimulating environment where children can grow, learn, and thrive. Our experienced team of caregivers is passionate about fostering each child's emotional, social, and intellectual development. At Allen Kids, we believe that early childhood is a time for exploration and creativity, and we aim to create an environment where children feel safe, valued, and encouraged to express themselves.
We believe in the power of play to stimulate creativity, encourage social interactions, and build a foundation for lifelong learning. Our philosophy centers on respect for each child's individuality, a commitment to positive guidance, and providing a stimulating environment that encourages exploration and curiosity.
 ",
            "image" => "https://akidsk.superhouseerp.com/Uploads/Site/AKIDSK/ContentImages/202512422354853IMG-20241108-WA0013.jpg",

            "p_image" => "https://akidsk.superhouseerp.com/Uploads/Site/AKIDSK/ContentImages/202512422354853IMG-20241108-WA0013.jpg",
            "url" => allenkids_program_slug_for_id('day-care')
        ],

    ];

    $program = null;
    if ($legacyId && isset($programs[$legacyId])) {
        $program = $programs[$legacyId];
    }
    ?>
    <!--==== Main Content ====-->
    <main>
        <!--==== Bradcrumb ====-->
        <section class="about-brudcrumb md:h-[350px] bg-program-cover relative">
            <div class="text-center md:py-28 py-10 relative z-10">
                <h1 class="md:text-[42px] text-[28px] font-[400] text-white"><?php echo $program['title']; ?></h1>
                <ul class="flex items-center gap-3 justify-center">
                    <li><a href="/"
                            class="text-white flex items-center gap-2 md:text-[16px] text-[13px] sm:text-[16px] text-[12px]">Home
                        </a>
                    </li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319"
                                    d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href=""
                            class="text-[#fff] md:text-[16px] text-[13px] sm:text-[16px] text-[12px]">Program</a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319"
                                    d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href=""
                            class="text-[#FAB319] md:text-[16px] text-[13px] sm:text-[16px] text-[12px]"><?php echo $program['title']; ?></a>
                    </li>
                </ul>
            </div>
        </section>
        <!--==== End ====-->

        <!--==== START ====-->
        <section class="mt-10 mb-10">
            <div class="comman-container-1280">
                <div id="psuccessPopup" class="relative mt-3  bg-green-500 text-white px-4 py-4 rounded mb-5 hidden" style="z-index:999"> Form submitted successfully!
                </div>
                <h1 class="text-[#2B3C6B] md:text-[42px] text-[32px] leading-10 hidden"><?php echo $program['title']; ?></h1>

                <div class="md:flex gap-10 mt-5">
                    <div class="md:w-[70%]">
                        <div>
                            <?= $contentData['columns'][0]['content'] ?? "" ?>
                        </div>
                    </div>

                    <div class="md:w-[30%] md:mt-0 mt-10">
                        <!-- INFORMATION -->
                        <div class="bg-[#DD5AC4]">
                            <div class="flex gap-4 p-3 items-center">
                                <img src="assets/images/program/book.png" class="w-[35px]" alt="Book">
                                <h2 class="text-[22px] text-white">Informations</h2>
                            </div>
                        </div>
                        <div class="border-[2px] border-[#DBDBDB]">
                            <ul class="mt-2">
                                <li class="flex justify-between items-center border-b-[1px] border-[#E8EBF0] p-5">
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 24 24">
                                            <path fill="#2C4073"
                                                d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10s10-4.5 10-10S17.5 2 12 2m0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8s8 3.59 8 8s-3.59 8-8 8m.5-13H11v6l5.2 3.2l.8-1.3l-4.5-2.7z" />
                                        </svg>
                                        <h3 class="text-[18px] text-[#2C4073]">Class Time</h3>
                                    </div>
                                    <?= $contentData['columns'][1]['content'] ?>
                                </li>
                                <li class="flex justify-between items-center border-b-[1px] border-[#E8EBF0] p-5">
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 1024 1024">
                                            <path fill="#2C4073"
                                                d="m960 95.888l-256.224.001V32.113c0-17.68-14.32-32-32-32s-32 14.32-32 32v63.76h-256v-63.76c0-17.68-14.32-32-32-32s-32 14.32-32 32v63.76H64c-35.344 0-64 28.656-64 64v800c0 35.343 28.656 64 64 64h896c35.344 0 64-28.657 64-64v-800c0-35.329-28.656-63.985-64-63.985m0 863.985H64v-800h255.776v32.24c0 17.679 14.32 32 32 32s32-14.321 32-32v-32.224h256v32.24c0 17.68 14.32 32 32 32s32-14.32 32-32v-32.24H960zM736 511.888h64c17.664 0 32-14.336 32-32v-64c0-17.664-14.336-32-32-32h-64c-17.664 0-32 14.336-32 32v64c0 17.664 14.336 32 32 32m0 255.984h64c17.664 0 32-14.32 32-32v-64c0-17.664-14.336-32-32-32h-64c-17.664 0-32 14.336-32 32v64c0 17.696 14.336 32 32 32m-192-128h-64c-17.664 0-32 14.336-32 32v64c0 17.68 14.336 32 32 32h64c17.664 0 32-14.32 32-32v-64c0-17.648-14.336-32-32-32m0-255.984h-64c-17.664 0-32 14.336-32 32v64c0 17.664 14.336 32 32 32h64c17.664 0 32-14.336 32-32v-64c0-17.68-14.336-32-32-32m-256 0h-64c-17.664 0-32 14.336-32 32v64c0 17.664 14.336 32 32 32h64c17.664 0 32-14.336 32-32v-64c0-17.68-14.336-32-32-32m0 255.984h-64c-17.664 0-32 14.336-32 32v64c0 17.68 14.336 32 32 32h64c17.664 0 32-14.32 32-32v-64c0-17.648-14.336-32-32-32" />
                                        </svg>
                                        <h3 class="text-[18px] text-[#2C4073]">Days</h3>
                                    </div>
                                    <?= $contentData['columns'][1]['content_heading'] ?>
                                </li>
                            </ul>

                            <div class="my-8">
                                <a href="javascript:void(0)" onclick="openModal()"
                                    class="mx-auto bg-[#FF454A] transition-all hover:translate-x-1 text-white w-[250px] flex justify-between items-center px-3 h-[50px] rounded-[10px] text-[18px] uppercase">
                                    Enroll Now
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="#fff" fill-rule="evenodd"
                                            d="M18.5 12.214a1 1 0 0 0-1-1H5a1 1 0 1 0 0 2h12.5a1 1 0 0 0 1-1"
                                            clip-rule="evenodd"></path>
                                        <path fill="#fff" fill-rule="evenodd"
                                            d="M20 12.214a1 1 0 0 0-.293-.707l-4.5-4.5a1 1 0 1 0-1.414 1.414l3.793 3.793l-3.793 3.793a1 1 0 0 0 1.414 1.415l4.5-4.5a1 1 0 0 0 .293-.708"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- PROGRAM -->
                        <div class="bg-[#FF972D] mt-8">
                            <div class="flex gap-4 p-3 items-center">
                                <img src="assets/images/program/book.png" alt="Book">
                                <h2 class="text-[22px] text-white">Our Program</h2>
                            </div>
                        </div>
                        <div class="border-[2px] border-[#DBDBDB]">
                            <ul class="mt-2">
                                <?php foreach ($programs as $program): ?>
                                    <?php if (!isset($program["p_image"])) continue; ?>
                                    <li class="border-b-[1px] border-[#E8EBF0] p-5">
                                        <a href="<?= htmlspecialchars(allenkids_program_public_path($program['url'])) ?>">
                                            <div class="flex gap-4 items-center">
                                                <img src="<?php echo $program["p_image"]; ?>" alt="Image One"
                                                    class="w-[100px] h-[75px] object-cover">
                                                <div>
                                                    <h2 class="text-[#1AB9FF] text-[18px]"><?php echo $program["title"]; ?>
                                                    </h2>
                                                    <h3 class="text-[20px] text-[#2C4073]"></h3>
                                                    <!-- <h4 class="text-[#F66]"><span class="text-[#70747F]">By</span> Alka Ghosh</h4> -->
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--==== START US ====-->
        <section class="mt-10 bg-[#FCF9F4] relative hidden">
            <div class="absolute left-5 animate-top-to-bottom top-40">
                <img src="assets/images/program/cc.png" class="md:w-[100%] w-[100px]" alt="Books">
            </div>
            <div class="absolute right-3 animate-top-to-bottom top-40">
                <img src="assets/images/program/huou.png" class="md:w-[100%] w-[100px]" alt="Books">
            </div>
            <div class="2xl:w-[1500px] xl:w-[1280px] lg:w-[1080px] sm:mx-auto mx-4">
                <div class="text-center text-white pt-10">
                    <h2 class="text-[#F66] flex items-center gap-2 justify-center text-[18px]">
                        <svg width="77" height="31" viewBox="0 0 77 31" fill="none" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="77" height="30" transform="matrix(-1 0 0 1 77 0.0800781)"
                                fill="url(#pattern0_293_580)"></rect>
                            <defs>
                                <pattern id="pattern0_293_580" patternContentUnits="objectBoundingBox" width="1"
                                    height="1">
                                    <use xlink:href="#image0_293_580" transform="scale(0.012987 0.0333333)"></use>
                                </pattern>
                                <image id="image0_293_580" width="77" height="30" preserveAspectRatio="none"
                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEMUlEQVRoge2Ze4hVVRTGf46WMyWmZvkaNSWfST7I1EINyVQ0kSxsQiyS3JFo/lGhUQSCJokk5aONhijhHyGRkKTlI3JMFKQaBx2o1HS0klSs66ucGVl3vhOnw73XwblPnQ8OZ+acfc/e+zvr8a11mtXNmsUtDe8T79659sAVvP87eqvo1mYsJR4C9ica0ERaclQBfXFuSHREE2nJ4P0x4BzwdXREE2mp8S3QDucGhUc1kZYa23V3SXhUizxb5I3AXnxPYCDQG+gAtAk9x7Lfb8AvwA/AT0BtA+cJSBuDcyV4f4kCJu1OYAowERgLtA/dqwFiIus2oDVQErp/FtgGbNZxOeks3lfhXDVQCowDPqcASesDvA5MA1rJYvYA5TpbxjsO/Bv5nRHXD3gwbjX1RJcB53HuY+B9vK9OMucO4HlgUkBaocS07sBG4DAwU8TMBjoBo4A3gS1ywShhhr+AfcAakdURmCCLexU4gnPLcK5tgt9+o/PjwYV8J605MF9k2Wa/12YHAKuA0zf4XHPhrbLYXsB6YF58HuemRsaW69wd57qS56R1AXYC7wIWgF+QSrfN1qVtFu+P4v1LwOC4xcEmnFsbD/z1938GTmn0aPKYtMEqYcz1vgQekDWkj6wovK8ARgJv6QXtwrl7NWqfzo+Sp6Q9IlHZGVgKPAn8npWZva/B+0XA+HgJBd/hXGmoBjVLzzvSBsmyLDMuAN5Q/MkuvN8uq7tLieC45h+Acy0C0koiWicX6Kp41VrZcElOV+P9QckTE8rv6Gox0L9IWu0i8EEOl3iHNJCp+dUK/rlHPXFPAT1Ca+lnhF0FLENMllvEcrBYI2qIsuXcnJHl3N3xAr2+4ghQLUtbrP/7BhXBCmA5MB34KMtLfRmYAZwEntVLzDT6K2YNxLleCg3dIuVWMvQJ2t1Wo/0DnADu19/ZwMPAbiWkx1QKZQLN9fyp8qgujZhjTWBpVnrMAT6UMn4vC4TdExeScDvwWoYIs2e/Ld1VGrpeo2ripM4mXs8oNMVUdl1WrA9QF++SeP9r+MNKkSzMCBwKVGZgEwGK1XYxsfgZ8HSGhGsrJZVTittHJR/+/K89lOzDSgqEuxy1KhPKVfyOCJUP6YS5ygYRdlAdhEwp/Zg8KK2Iits9aoV0UwegY4YIe0auMTlH2bpRSFQRTNSGrJOwVz2sdMBE4hfAc3KPJ4BjhUHT/5GItCuq/2xD9wEHgFcaWXKZRVWopjuiQvxQOjaQCyQjwoLlcIlNE3orgR/lVi0buM4idUh3q61sWugrYJj6YwWLVO3uP7RpS68L5a6fKh1vEaGVGndVJHVQ0T1CPfVOetZptak3FDJZAa73jaBWFcInykIvSvyW6bgeqqT91qmReFOgoR9WYtI7dph7mbo2NW8xz6zLXPaCLMpczz6VWYvHSLu5AFwD7u/9V73LPFIAAAAASUVORK5CYII=">
                                </image>
                            </defs>
                        </svg>
                        Latest Classes
                        <svg width="78" height="31" viewBox="0 0 78 31" fill="none" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="77" height="30" transform="translate(0.681641 0.0800781)"
                                fill="url(#pattern0_293_582)"></rect>
                            <defs>
                                <pattern id="pattern0_293_582" patternContentUnits="objectBoundingBox" width="1"
                                    height="1">
                                    <use xlink:href="#image0_293_582" transform="scale(0.012987 0.0333333)"></use>
                                </pattern>
                                <image id="image0_293_582" width="77" height="30" preserveAspectRatio="none"
                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEMUlEQVRoge2Ze4hVVRTGf46WMyWmZvkaNSWfST7I1EINyVQ0kSxsQiyS3JFo/lGhUQSCJokk5aONhijhHyGRkKTlI3JMFKQaBx2o1HS0klSs66ucGVl3vhOnw73XwblPnQ8OZ+acfc/e+zvr8a11mtXNmsUtDe8T79659sAVvP87eqvo1mYsJR4C9ica0ERaclQBfXFuSHREE2nJ4P0x4BzwdXREE2mp8S3QDucGhUc1kZYa23V3SXhUizxb5I3AXnxPYCDQG+gAtAk9x7Lfb8AvwA/AT0BtA+cJSBuDcyV4f4kCJu1OYAowERgLtA/dqwFiIus2oDVQErp/FtgGbNZxOeks3lfhXDVQCowDPqcASesDvA5MA1rJYvYA5TpbxjsO/Bv5nRHXD3gwbjX1RJcB53HuY+B9vK9OMucO4HlgUkBaocS07sBG4DAwU8TMBjoBo4A3gS1ywShhhr+AfcAakdURmCCLexU4gnPLcK5tgt9+o/PjwYV8J605MF9k2Wa/12YHAKuA0zf4XHPhrbLYXsB6YF58HuemRsaW69wd57qS56R1AXYC7wIWgF+QSrfN1qVtFu+P4v1LwOC4xcEmnFsbD/z1938GTmn0aPKYtMEqYcz1vgQekDWkj6wovK8ARgJv6QXtwrl7NWqfzo+Sp6Q9IlHZGVgKPAn8npWZva/B+0XA+HgJBd/hXGmoBjVLzzvSBsmyLDMuAN5Q/MkuvN8uq7tLieC45h+Acy0C0koiWicX6Kp41VrZcElOV+P9QckTE8rv6Gox0L9IWu0i8EEOl3iHNJCp+dUK/rlHPXFPAT1Ca+lnhF0FLENMllvEcrBYI2qIsuXcnJHl3N3xAr2+4ghQLUtbrP/7BhXBCmA5MB34KMtLfRmYAZwEntVLzDT6K2YNxLleCg3dIuVWMvQJ2t1Wo/0DnADu19/ZwMPAbiWkx1QKZQLN9fyp8qgujZhjTWBpVnrMAT6UMn4vC4TdExeScDvwWoYIs2e/Ld1VGrpeo2ripM4mXs8oNMVUdl1WrA9QF++SeP9r+MNKkSzMCBwKVGZgEwGK1XYxsfgZ8HSGhGsrJZVTittHJR/+/K89lOzDSgqEuxy1KhPKVfyOCJUP6YS5ygYRdlAdhEwp/Zg8KK2Iits9aoV0UwegY4YIe0auMTlH2bpRSFQRTNSGrJOwVz2sdMBE4hfAc3KPJ4BjhUHT/5GItCuq/2xD9wEHgFcaWXKZRVWopjuiQvxQOjaQCyQjwoLlcIlNE3orgR/lVi0buM4idUh3q61sWugrYJj6YwWLVO3uP7RpS68L5a6fKh1vEaGVGndVJHVQ0T1CPfVOetZptak3FDJZAa73jaBWFcInykIvSvyW6bgeqqT91qmReFOgoR9WYtI7dph7mbo2NW8xz6zLXPaCLMpczz6VWYvHSLu5AFwD7u/9V73LPFIAAAAASUVORK5CYII=">
                                </image>
                            </defs>
                        </svg>
                    </h2>
                    <h2 class="text-[45px] leading-12 mt-4 text-[#2C4073]">We Provide Awesome Program To <br> Build
                        Bright Future</h2>
                </div>
                <div class="mt-10">
                    <div class="grid md:grid-cols-3 grid-cols-1 md:gap-10 gap-1">
                        <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="300">
                            <img src="assets/images/our-class/pg-1.webp" class="w-[100%]" alt="PG - 1" />
                            <div class="p-5 bg-white text-center w-[300px] mx-auto relative top-[-40px]">
                                <h2 class="text-[28px] text-[#2C4073]">PG - 1</h2>
                                <h3 class="text-[22px]">(2-3 Years)</h3>
                                <p class="text-[18px] text-[#70747F] mt-2">We practice an integrated thematic study
                                    which aims at enhancing the development and education of children through play.</p>
                                <div class="mt-3">
                                    <a
                                        class="text-[#2C4073] text-[16px] uppercase flex gap-2 items-center justify-center transition-all hover:text-[#A32CFF]">
                                        Read More
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 24 24">
                                            <path fill="#2C4073" fill-rule="evenodd"
                                                d="M13.483 4.47a.75.75 0 0 1 1.06 0l6.988 7a.75.75 0 0 1 0 1.06l-6.988 7a.75.75 0 0 1-1.061-1.06l5.709-5.719L3 12.762a.75.75 0 0 1-.002-1.5l16.194-.01l-5.711-5.722a.75.75 0 0 1 0-1.06"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="300">
                            <img src="assets/images/our-class/img.png" class="w-[100%]" alt="PG - 1" />
                            <div class="p-5 bg-white text-center w-[300px] mx-auto relative top-[-40px]">
                                <h2 class="text-[28px] text-[#2C4073]">PG - 2</h2>
                                <h3 class="text-[22px]">(2-3 Years)</h3>
                                <p class="text-[18px] text-[#70747F] mt-2">We practice an integrated thematic study
                                    which aims at enhancing the development and education of children through play.</p>
                                <div class="mt-3">
                                    <a
                                        class="text-[#2C4073] text-[16px] uppercase flex gap-2 items-center justify-center transition-all hover:text-[#A32CFF]">
                                        Read More
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 24 24">
                                            <path fill="#2C4073" fill-rule="evenodd"
                                                d="M13.483 4.47a.75.75 0 0 1 1.06 0l6.988 7a.75.75 0 0 1 0 1.06l-6.988 7a.75.75 0 0 1-1.061-1.06l5.709-5.719L3 12.762a.75.75 0 0 1-.002-1.5l16.194-.01l-5.711-5.722a.75.75 0 0 1 0-1.06"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="300">
                            <img src="assets/images/our-class/img.png" class="w-[100%]" alt="PG - 1" />
                            <div class="p-5 bg-white text-center w-[300px] mx-auto relative top-[-40px]">
                                <h2 class="text-[28px] text-[#2C4073]">PG - 1</h2>
                                <h3 class="text-[22px]">(2-3 Years)</h3>
                                <p class="text-[18px] text-[#70747F] mt-2">We practice an integrated thematic study
                                    which aims at enhancing the development and education of children through play.</p>
                                <div class="mt-3">
                                    <a href="<?= htmlspecialchars(allenkids_program_public_path(allenkids_program_slug_for_id('playgroup-1'))) ?>"
                                        class="text-[#2C4073] text-[16px] uppercase flex gap-2 items-center justify-center transition-all hover:text-[#A32CFF]">
                                        Read More
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 24 24">
                                            <path fill="#2C4073" fill-rule="evenodd"
                                                d="M13.483 4.47a.75.75 0 0 1 1.06 0l6.988 7a.75.75 0 0 1 0 1.06l-6.988 7a.75.75 0 0 1-1.061-1.06l5.709-5.719L3 12.762a.75.75 0 0 1-.002-1.5l16.194-.01l-5.711-5.722a.75.75 0 0 1 0-1.06"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->
        <!-- Modal -->
        <?php require_once __DIR__ . '/includes/session-api.php'; $sessions = allenkids_fetch_sessions(); ?>
        <div id="penquiryModal" class="fixed inset-0 bg-white/30 flex items-center justify-center z-[999] hidden">
            <!-- Modal Container -->
            <div class="bg-[#2C4073] p-6 rounded-[10px]  relative">
                <!-- Close Button -->
                <button onclick="closeModal()" class="absolute top-2 right-2 text-white text-2xl">&times;</button>
                <div class="md:w-[400px] md:mx-auto mx-4">
                    <div>
                        <h2 class="text-[32px] font-[500] text-white text-center">Enquiry For Session</h2>
                        <div>
                            <form id="pcontactForm" class="mt-6">
                                <div class="gap-4">
                                    <div>
                                        <select name="session"
                                            class="bg-white h-[45px] rounded-[6px] w-[100%] text-gray-500 pl-2"
                                            id="ayears" required>
                                            <option value="" disabled>Enquiry For Session</option>
                                            <?php foreach ($sessions as $item): ?>
                                                <?php $sessionName = trim($item['session'] ?? $item['Session'] ?? ''); ?>
                                                <?php if ($sessionName !== ''): ?>
                                                    <option value="<?= htmlspecialchars($sessionName) ?>"><?= htmlspecialchars($sessionName) ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mt-5">
                                        <select id="agrade"
                                            class="bg-white h-[45px] rounded-[6px] bg-white w-[100%] text-gray-500 pl-2" id="grade" required>
                                            <option value="">Choose Grade</option>
                                            <?php include 'includes/grade-api.php'; ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- Child + Guardian Names -->
                                <div class="gap-4 mt-5">
                                    <div>
                                        <input type="text" id="achildname"
                                            class="bg-white h-[45px] rounded-[6px] w-[100%] text-gray-500 pl-2"
                                            placeholder="Enter Child's Name" maxlength="30">
                                        <span id="achildname-error"
                                            class="text-red-500 text-sm mt-1 hidden text-[15px]">Only letters and spaces
                                            allowed.</span>
                                    </div>
                                    <div class="mt-5">
                                        <input type="text" id="afmgname"
                                            class="bg-white h-[45px] rounded-[6px] w-[100%] text-gray-500 pl-2"
                                            placeholder="Father / Mother / Guardian Name" maxlength="30">
                                        <span id="afmgname-error" class="text-red-500 text-sm mt-1 hidden text-[15px]">Only
                                            letters and spaces allowed.</span>
                                    </div>
                                </div>

                                <!-- Mobile + Email -->
                                <div class="gap-4 mt-5">
                                    <div>
                                        <input type="text" id="amobile"
                                            class="bg-white h-[45px] rounded-[6px] w-[100%] text-gray-500 pl-2"
                                            placeholder="Enter Your Mobile No">
                                        <div id="amobile-error" class="text-red-500 text-sm mt-1 hidden text-[15px]">Please
                                            enter valid phone number</div>
                                    </div>
                                    <div class="mt-5">
                                        <input type="text" id="aemail"
                                            class="bg-white h-[45px] rounded-[6px] w-[100%] text-gray-600 pl-2"
                                            placeholder="Enter Your Email">
                                        <span id="aemail-error" class="text-red-500 text-sm mt-1 hidden text-[15px]">Please
                                            enter a valid email address.</span>
                                    </div>
                                </div>
                                <input type="hidden" id="asource" value="">
                                <div class="mt-5">
                                    <button type="submit" id="pcontactSubmitBtn"
                                        class="w-[100%] h-[55px] text-white rounded-[8px] bg-red-500 text-[17px] uppercase flex items-center justify-center gap-1 cursor-pointer transition-all hover:transform-y-5">
                                        Submit
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path fill="none" stroke="#fff" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5"
                                                d="M4.5 12h15m0 0l-5.625-6m5.625 6l-5.625 6" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--==== START ====-->
        <?php include "includes/legacy.php"; ?>
        <!--==== END ====-->

        <script>
            function openModal() {
                document.getElementById("penquiryModal").classList.remove("hidden");
            }

            function closeModal() {
                document.getElementById("penquiryModal").classList.add("hidden");
            }

            // Optional: Close modal when clicking outside the modal content
            window.addEventListener("click", function(e) {
                const modal = document.getElementById("penquiryModal");
                if (e.target === modal) {
                    closeModal();
                }
            });
        </script>
        <script>
            (function() {
                function getParam(name) {
                    const urlParams = new URLSearchParams(window.location.search);
                    return urlParams.get(name);
                }

                // Capture source: UTM > referrer > Direct
                var source = getParam("utm_source") || document.referrer || "Website";
                console.log("Initial Source:", source);

                // Normalize known sources
                if (source.includes("google.")) {
                    source = "Google-Ads by Agency";
                    console.log("Referrer is Google, setting source to 'Google'");
                } else if (source.includes("facebook.")) {
                    source = "Facebook by Agency";
                } else if (source.includes("instagram.")) {
                    source = "Instagram by Agency";
                }

                // Save in cookie (first touch only)
                if (!sessionStorage.getItem("aleadSource")) {
                    sessionStorage.setItem("aleadSource", source);
                }

                var afinalSource = sessionStorage.getItem("aleadSource");

                // Fill hidden field if it exists
                var sourceInput = document.getElementById("asource");
                if (sourceInput) {
                    sourceInput.value = afinalSource;
                }
            })();
            // Regex patterns
            const anameRegexs = /^[A-Za-z\s]+$/;
            const amobileRegexs = /^[6-9]\d{9}$/;
            const aemailRegexs = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            // DOM elements
            const achildnameInput = document.getElementById("achildname");
            const afmgnameInput = document.getElementById("afmgname");
            const amobileInput = document.getElementById("amobile");
            const aemailInput = document.getElementById("aemail");

            // Error spans
            const achildnameError = document.getElementById("achildname-error");
            const afmgnameError = document.getElementById("afmgname-error");
            const amobileErrorss = document.getElementById("amobile-error");
            const aemailErrorss = document.getElementById("aemail-error");


            // Child name validation
            if (achildnameInput) {
                achildnameInput.addEventListener("input", function() {
                    achildnameError?.classList.toggle(
                        "hidden",
                        !this.value || anameRegexs.test(this.value)
                    );
                });
            }

            // FMG name validation
            if (afmgnameInput) {
                afmgnameInput.addEventListener("input", function() {
                    afmgnameError?.classList.toggle(
                        "hidden",
                        !this.value || anameRegexs.test(this.value)
                    );
                });
            }

            // Mobile validation
            if (amobileInput) {
                amobileInput.addEventListener("input", function() {
                    this.value = this.value.replace(/\D/g, '').slice(0, 10);
                    amobileErrorss?.classList.toggle(
                        "hidden",
                        !this.value || amobileRegexs.test(this.value)
                    );
                });
            }

            // Email validation
            if (aemailInput) {
                aemailInput.addEventListener("input", function() {
                    this.value = this.value.toLowerCase();
                    aemailErrorss?.classList.toggle(
                        "hidden",
                        !this.value || aemailRegexs.test(this.value)
                    );
                });
            }

            // Form submission
            document.getElementById("pcontactForm").addEventListener("submit", function(e) {
                e.preventDefault();
                const psubmitBtn = document.getElementById("pcontactSubmitBtn");
                psubmitBtn.disabled = true;
                psubmitBtn.textContent = "Submitting...";

                // Inputs
                const ayears = document.getElementById("ayears")?.value.trim() || "";
                const agrade = document.getElementById("agrade")?.value.trim() || "";
                const achildname = achildnameInput.value.trim();
                const afmgname = afmgnameInput.value.trim();
                const amobile = amobileInput.value.trim();
                const aemail = aemailInput.value.trim();
                const asource = sessionStorage.getItem("aleadSource") || "Website";

                let isValid = true;
                // Child name validation
                if (!anameRegexs.test(achildname)) {
                    achildnameError.classList.remove("hidden");
                    isValid = false;
                } else {
                    achildnameError.classList.add("hidden");
                }

                // FMG name validation
                if (!anameRegexs.test(afmgname)) {
                    afmgnameError.classList.remove("hidden");
                    isValid = false;
                } else {
                    afmgnameError.classList.add("hidden");
                }

                // Mobile validation
                if (!amobileRegexs.test(amobile)) {
                    amobileErrorss.classList.remove("hidden");
                    isValid = false;
                } else {
                    amobileErrorss.classList.add("hidden");
                }

                // Email validation
                if (!aemailRegexs.test(aemail)) {
                    aemailErrorss.classList.remove("hidden");
                    isValid = false;
                } else {
                    aemailErrorss.classList.add("hidden");
                }

                if (!isValid) {
                    psubmitBtn.disabled = false;
                    psubmitBtn.textContent = "Submit";
                    return;
                }

                // API Payload
                const payload = {
                    name: achildname,
                    years: ayears,
                    grade: agrade,
                    student_name: achildname,
                    parent_name: afmgname,
                    phone: amobile,
                    email: aemail,
                    source: asource,
                    source_type: "Website",
                    enquiry_type: "Digital",
                    message: "This Message From Allen Kids Bareilly",
                    subject: "Admission Enquiry",
                    branch_id: 5,
                    school_id: 2,
                    language_id: 1
                };
                fetch(allenProxyUrl("admission-proxy"), {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(payload)
                    })
                    .then(response => {
                        if (!response.ok) throw new Error("Network error");
                        return response.json();
                    })
                    .then(() => {
                        const ppopup = document.getElementById("psuccessPopup");
                        ppopup.classList.remove("hidden");
                        document.getElementById("penquiryModal").style.display = "none";
                        setTimeout(() => ppopup.classList.add("hidden"), 5000);
                        document.getElementById("pcontactForm").reset();
                    })
                    .catch(() => {
                        alert("Error submitting the form. Please try again.");
                    })
                    .finally(() => {
                        psubmitBtn.disabled = false;
                        psubmitBtn.textContent = "Submit Message";
                    });
            });
        </script>
        <!--==== Footer ====-->
        <?php include "includes/footer.php" ?>
        <!--==== End ====-->
    </main>
    <!--==== End ====-->


    <!-- End -->
    <?php include "includes/foot.php" ?>
    <!-- Scripts -->
</body>

</html>