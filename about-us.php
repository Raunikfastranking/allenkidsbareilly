<?php
$page =  "about-us.php";
require_once "proxy/api.php";
require_once "layouts/layout-function.php";
$about_data = fetchApiData("api/pages/about-allen-kids-top-preschool-in-bareilly");
$pageData = $about_data;

// print_r($about_data['data']['sections'][1]);
$about_us = $about_data['data']['sections'][1] ?? [];
$m_v_data = $about_data['data']['sections'][2] ?? [];
$legacy_data = $about_data['data']['sections'][3] ?? [];
$chairman_message = $about_data['data']['sections'][4] ?? [];
// $principal_message = $about_data['data']['sections'][5] ?? [];
$our_teachers = $about_data['data']['sections'][5] ?? [];
$history_years = $about_data['data']['sections'][6] ?? [];
$register_data = $about_data['data']['sections'][7] ?? [];
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $about_data['data']['title'] ?></title>
    <meta name="description" content="<?php echo  $about_data['data']['meta_description'] ?>">
    <meta name="keywords" content="<?php echo  $about_data['data']['meta_keywords'] ?>">
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "https://allenkidsbareilly.in/"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "About Us",
      "item": "https://allenkidsbareilly.in/about-us"
    }
  ]
}
</script>
    <?php include "includes/head.php"; ?>
</head>

<body>
    <!--==== Header ====-->
    <?php include "includes/header.php"; ?>
    <!--==== End ====-->

    <!--==== Main Content ====-->
    <main>
        <!--==== Bradcrumb ====-->
        <section class="about-brudcrumb md:h-[400px] bg-cover h-[200px]">
            <div class="text-center md:pt-30 pt-12">
                <h1 class="text-[42px] font-[400] text-white">About</h1>
                <ul class="flex items-center gap-3 justify-center">
                    <li><a href="/" class="text-white flex items-center gap-2 sm:text-[16px] text-[12px]">Home </a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319"
                                    d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href="" class="text-[#FAB319] sm:text-[16px] text-[12px]">About</a></li>
                </ul>
            </div>
        </section>
        <!--==== End ====-->
        <!--==== ABOUT US ====-->
        <section class="md:mt-20 mt-10">
            <div class="comman-container">
                <div class="md:flex gap-5">
                    <div class="md:w-[50%]">
                        <div class="relative">
                             <?= $about_us['columns'][0]['content'] ?? ''; ?>
                        </div>
                    </div>
                    <div class="md:w-[50%] md:mt-0 mt-7">
                         <?= $about_us['columns'][1]['content'] ?? ''; ?>
                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--==== OUR MISSION & VISSION ====-->
        <section class="about-mv-bg relative md:mt-20 mt-10 pb-15">
            <div class="absolute left-0 top-40 animate-left-to-right">
                <img src="assets/images/leaf.png" class="md:w-[100%] w-[80px]" alt="Leaf">
            </div>
            <div class="absolute right-5 z-100 bottom-0 animate-scale-loop">
                <img src="assets/images/bullets-circle.png" class="md:w-[100%] w-[80px]" alt="Bullet Rainbow">
            </div>
            <div class="comman-container-1050">
                <div class="text-center text-white pt-20">
                    <h3 class="flex justify-center gap-3 text-[20px] font-[400]"><img
                            src="assets/images/icon-arrow-02.png" alt="">Our Mission & Vision <img
                            src="assets/images/icon-arrow-1.png" alt=""></h3>
                    <h2 class="text-[45px] leading-11 mt-4">At Allen Kids</h2>
                </div>
                <div class="md:flex gap-10 mt-10">
                    <div>
                        <p class="text-[18px] text-white mt-3"><?= $m_v_data['columns'][0]['content'] ?? ''; ?></p>
                    </div>
                    <div>
                        <p class="text-[18px] text-white mt-3"> <?= $m_v_data['columns'][1]['content'] ?? ''; ?> </p>
                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--==== LEGACY ====-->
        <section class="md:mt-20 mt-10">
            <div class="comman-container">
                <div class="md:flex gap-12">
                    <div class="md:w-[50%]">
                        <div class="mt-5">
                            <div data-aos="zoom-in-right" data-aos-duration="1000">
                                <img src="<?= $legacy_data['columns'][0]['image_path'] ?? ''; ?>" class="w-[100%]" alt="<?= htmlspecialchars($legacy_data['columns'][0]['image_alt']); ?>">
                             </div>
                        </div>
                    </div>
                    <div class="md:w-[50%] mt-10">
                        <div>
                              <div class="overflow-description">
                                <p class="text-[#70747F] text-[20px] mt-6">
                                    <?= $legacy_data['columns'][1]['content'] ?? ''; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--==== CHAIRMAN DESK ====-->
         <section class="md:mt-20 mt-10">
            <div class="comman-container">
                <div class="md:flex gap-12">

                    <div class="md:w-[50%] mt-5">
                        <div>
                            <div class="overflow-description">
                                <p class="text-[#70747F] text-[20px] mt-2"><?= $chairman_message['columns'][0]['content'] ?? ''; ?></p>
                            </div>
                         </div>

                    </div>
                    <div class="md:w-[50%]">
                        <div>
                            <div data-aos="zoom-in-right" data-aos-duration="1000">
                                <img src="<?= $chairman_message['columns'][1]['image_url'] ?? ''; ?>" class="w-[100%]" alt="<?= htmlspecialchars($chairman_message['columns'][1]['image_alt']) ?? ''; ?>"></div>
                            <p class="text-[#70747F] text-[20px] mt-2 font-[700]">M. Amin</p>
                            <p class="text-[#70747F] text-[20px] mt-1 font-[700]">Chairman</p>
                        </div>
                    </div>

                </div>
                <!-- <div>
                    <p class="text-[#70747F] text-[20px] mt-2">Academic excellence along with co-curricular activities
                        and extra co-curricular activities completes the process of education. It gives me great
                        satisfaction that Allen Kids is progressing in all its endeavours towards the overall grooming
                        and development of the personality of the students.</p>

                    <p class="text-[#70747F] text-[20px] mt-2">Parents are important stakeholders of any school system.
                        I extend my gratitude for the unstinted support we have received from them at all times.</p>
                    <p class="text-[#70747F] text-[20px] mt-2 font-[700]">Best Wishes!</p>
                </div> -->
            </div>
        </section>
        <!--==== END ====-->

        <!--==== OUR TEACHER ====-->
        <section class="md:mt-20 mt-10">
            <div class="comman-container-1050">
                <div class="text-center text-white">
                    <h2 class="text-[#F66] flex items-center gap-2 justify-center text-[18px]">
                        <svg width="77" height="31" viewBox="0 0 77 31" fill="none" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="77" height="30" transform="matrix(-1 0 0 1 77 0.0800781)"
                                fill="url(#pattern0_293_580)" />
                            <defs>
                                <pattern id="pattern0_293_580" patternContentUnits="objectBoundingBox" width="1"
                                    height="1">
                                    <use xlink:href="#image0_293_580" transform="scale(0.012987 0.0333333)" />
                                </pattern>
                                <image id="image0_293_580" width="77" height="30" preserveAspectRatio="none"
                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEMUlEQVRoge2Ze4hVVRTGf46WMyWmZvkaNSWfST7I1EINyVQ0kSxsQiyS3JFo/lGhUQSCJokk5aONhijhHyGRkKTlI3JMFKQaBx2o1HS0klSs66ucGVl3vhOnw73XwblPnQ8OZ+acfc/e+zvr8a11mtXNmsUtDe8T79659sAVvP87eqvo1mYsJR4C9ica0ERaclQBfXFuSHREE2nJ4P0x4BzwdXREE2mp8S3QDucGhUc1kZYa23V3SXhUizxb5I3AXnxPYCDQG+gAtAk9x7Lfb8AvwA/AT0BtA+cJSBuDcyV4f4kCJu1OYAowERgLtA/dqwFiIus2oDVQErp/FtgGbNZxOeks3lfhXDVQCowDPqcASesDvA5MA1rJYvYA5TpbxjsO/Bv5nRHXD3gwbjX1RJcB53HuY+B9vK9OMucO4HlgUkBaocS07sBG4DAwU8TMBjoBo4A3gS1ywShhhr+AfcAakdURmCCLexU4gnPLcK5tgt9+o/PjwYV8J605MF9k2Wa/12YHAKuA0zf4XHPhrbLYXsB6YF58HuemRsaW69wd57qS56R1AXYC7wIWgF+QSrfN1qVtFu+P4v1LwOC4xcEmnFsbD/z1938GTmn0aPKYtMEqYcz1vgQekDWkj6wovK8ARgJv6QXtwrl7NWqfzo+Sp6Q9IlHZGVgKPAn8npWZva/B+0XA+HgJBd/hXGmoBjVLzzvSBsmyLDMuAN5Q/MkuvN8uq7tLieC45h+Acy0C0koiWicX6Kp41VrZcElOV+P9QckTE8rv6Gox0L9IWu0i8EEOl3iHNJCp+dUK/rlHPXFPAT1Ca+lnhF0FLENMllvEcrBYI2qIsuXcnJHl3N3xAr2+4ghQLUtbrP/7BhXBCmA5MB34KMtLfRmYAZwEntVLzDT6K2YNxLleCg3dIuVWMvQJ2t1Wo/0DnADu19/ZwMPAbiWkx1QKZQLN9fyp8qgujZhjTWBpVnrMAT6UMn4vC4TdExeScDvwWoYIs2e/Ld1VGrpeo2ripM4mXs8oNMVUdl1WrA9QF++SeP9r+MNKkSzMCBwKVGZgEwGK1XYxsfgZ8HSGhGsrJZVTittHJR/+/K89lOzDSgqEuxy1KhPKVfyOCJUP6YS5ygYRdlAdhEwp/Zg8KK2Iits9aoV0UwegY4YIe0auMTlH2bpRSFQRTNSGrJOwVz2sdMBE4hfAc3KPJ4BjhUHT/5GItCuq/2xD9wEHgFcaWXKZRVWopjuiQvxQOjaQCyQjwoLlcIlNE3orgR/lVi0buM4idUh3q61sWugrYJj6YwWLVO3uP7RpS68L5a6fKh1vEaGVGndVJHVQ0T1CPfVOetZptak3FDJZAa73jaBWFcInykIvSvyW6bgeqqT91qmReFOgoR9WYtI7dph7mbo2NW8xz6zLXPaCLMpczz6VWYvHSLu5AFwD7u/9V73LPFIAAAAASUVORK5CYII=" />
                            </defs>
                        </svg>
                        Meet Our Teacher
                        <svg width="78" height="31" viewBox="0 0 78 31" fill="none" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="77" height="30" transform="translate(0.681641 0.0800781)"
                                fill="url(#pattern0_293_582)" />
                            <defs>
                                <pattern id="pattern0_293_582" patternContentUnits="objectBoundingBox" width="1"
                                    height="1">
                                    <use xlink:href="#image0_293_582" transform="scale(0.012987 0.0333333)" />
                                </pattern>
                                <image id="image0_293_582" width="77" height="30" preserveAspectRatio="none"
                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEMUlEQVRoge2Ze4hVVRTGf46WMyWmZvkaNSWfST7I1EINyVQ0kSxsQiyS3JFo/lGhUQSCJokk5aONhijhHyGRkKTlI3JMFKQaBx2o1HS0klSs66ucGVl3vhOnw73XwblPnQ8OZ+acfc/e+zvr8a11mtXNmsUtDe8T79659sAVvP87eqvo1mYsJR4C9ica0ERaclQBfXFuSHREE2nJ4P0x4BzwdXREE2mp8S3QDucGhUc1kZYa23V3SXhUizxb5I3AXnxPYCDQG+gAtAk9x7Lfb8AvwA/AT0BtA+cJSBuDcyV4f4kCJu1OYAowERgLtA/dqwFiIus2oDVQErp/FtgGbNZxOeks3lfhXDVQCowDPqcASesDvA5MA1rJYvYA5TpbxjsO/Bv5nRHXD3gwbjX1RJcB53HuY+B9vK9OMucO4HlgUkBaocS07sBG4DAwU8TMBjoBo4A3gS1ywShhhr+AfcAakdURmCCLexU4gnPLcK5tgt9+o/PjwYV8J605MF9k2Wa/12YHAKuA0zf4XHPhrbLYXsB6YF58HuemRsaW69wd57qS56R1AXYC7wIWgF+QSrfN1qVtFu+P4v1LwOC4xcEmnFsbD/z1938GTmn0aPKYtMEqYcz1vgQekDWkj6wovK8ARgJv6QXtwrl7NWqfzo+Sp6Q9IlHZGVgKPAn8npWZva/B+0XA+HgJBd/hXGmoBjVLzzvSBsmyLDMuAN5Q/MkuvN8uq7tLieC45h+Acy0C0koiWicX6Kp41VrZcElOV+P9QckTE8rv6Gox0L9IWu0i8EEOl3iHNJCp+dUK/rlHPXFPAT1Ca+lnhF0FLENMllvEcrBYI2qIsuXcnJHl3N3xAr2+4ghQLUtbrP/7BhXBCmA5MB34KMtLfRmYAZwEntVLzDT6K2YNxLleCg3dIuVWMvQJ2t1Wo/0DnADu19/ZwMPAbiWkx1QKZQLN9fyp8qgujZhjTWBpVnrMAT6UMn4vC4TdExeScDvwWoYIs2e/Ld1VGrpeo2ripM4mXs8oNMVUdl1WrA9QF++SeP9r+MNKkSzMCBwKVGZgEwGK1XYxsfgZ8HSGhGsrJZVTittHJR/+/K89lOzDSgqEuxy1KhPKVfyOCJUP6YS5ygYRdlAdhEwp/Zg8KK2Iits9aoV0UwegY4YIe0auMTlH2bpRSFQRTNSGrJOwVz2sdMBE4hfAc3KPJ4BjhUHT/5GItCuq/2xD9wEHgFcaWXKZRVWopjuiQvxQOjaQCyQjwoLlcIlNE3orgR/lVi0buM4idUh3q61sWugrYJj6YwWLVO3uP7RpS68L5a6fKh1vEaGVGndVJHVQ0T1CPfVOetZptak3FDJZAa73jaBWFcInykIvSvyW6bgeqqT91qmReFOgoR9WYtI7dph7mbo2NW8xz6zLXPaCLMpczz6VWYvHSLu5AFwD7u/9V73LPFIAAAAASUVORK5CYII=" />
                            </defs>
                        </svg>
                    </h2>
                    <h2 class="text-[45px] leading-12 mt-4 text-[#2C4073]">We Have Lot’s Of Experience Teacher <br> To
                        Teach The Students</h2>
                </div>
                <div class="swiper carousel3 mt-10">
                    <div class="swiper-wrapper">
                         <?php foreach ($our_teachers['resolved_content']['items'] as $teacher) { ?>
                            <div class="swiper-slide">
                                <div data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                                    <img src="https://genericcms-ms.fastranking.cloud/<?php echo $teacher['image_url'] ?? "assets/images/our-teacher/Gunjan-Gupta.webp" ?>"
                                        class="w-[80%] mx-auto relative z-90" alt="<?= htmlspecialchars($teacher['image_alt']) ?? ''; ?>" />
                                    <div class="bg-[#FC477E] text-center mx-auto pt-20 pb-3 relative top-[-65px]">
                                        <h2 class="text-[20px] text-white"><?php echo $teacher['title'] ?? "" ?></h2>
                                        <p class="text-[16px] text-white leading-[19px]">Teacher</p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!--==== End ====-->

        <!--==== ACCREDITATION & QUALITY ASSURANCE ====-->
        <section class="ab-child-bg py-20">
            <div class="comman-container-1050">
                <div class="md:flex">
                    <div class="md:w-[50%]">
                        <div class="bg-white p-12">
                            <!-- <div>
                                <h3 class="text-[#F66] text-[19px] flex items-center gap-2">Accreditation & Quality
                                    Assurance
                                    <svg width="78" height="30" viewBox="0 0 78 30" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <rect width="77" height="30" transform="translate(0.146484)"
                                            fill="url(#pattern0_293_200)"></rect>
                                        <defs>
                                            <pattern id="pattern0_293_200" patternContentUnits="objectBoundingBox"
                                                width="1" height="1">
                                                <use xlink:href="#image0_293_200" transform="scale(0.012987 0.0333333)">
                                                </use>
                                            </pattern>
                                            <image id="image0_293_200" width="77" height="30" preserveAspectRatio="none"
                                                xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEMUlEQVRoge2Ze4hVVRTGf46WMyWmZvkaNSWfST7I1EINyVQ0kSxsQiyS3JFo/lGhUQSCJokk5aONhijhHyGRkKTlI3JMFKQaBx2o1HS0klSs66ucGVl3vhOnw73XwblPnQ8OZ+acfc/e+zvr8a11mtXNmsUtDe8T79659sAVvP87eqvo1mYsJR4C9ica0ERaclQBfXFuSHREE2nJ4P0x4BzwdXREE2mp8S3QDucGhUc1kZYa23V3SXhUizxb5I3AXnxPYCDQG+gAtAk9x7Lfb8AvwA/AT0BtA+cJSBuDcyV4f4kCJu1OYAowERgLtA/dqwFiIus2oDVQErp/FtgGbNZxOeks3lfhXDVQCowDPqcASesDvA5MA1rJYvYA5TpbxjsO/Bv5nRHXD3gwbjX1RJcB53HuY+B9vK9OMucO4HlgUkBaocS07sBG4DAwU8TMBjoBo4A3gS1ywShhhr+AfcAakdURmCCLexU4gnPLcK5tgt9+o/PjwYV8J605MF9k2Wa/12YHAKuA0zf4XHPhrbLYXsB6YF58HuemRsaW69wd57qS56R1AXYC7wIWgF+QSrfN1qVtFu+P4v1LwOC4xcEmnFsbD/z1938GTmn0aPKYtMEqYcz1vgQekDWkj6wovK8ARgJv6QXtwrl7NWqfzo+Sp6Q9IlHZGVgKPAn8npWZva/B+0XA+HgJBd/hXGmoBjVLzzvSBsmyLDMuAN5Q/MkuvN8uq7tLieC45h+Acy0C0koiWicX6Kp41VrZcElOV+P9QckTE8rv6Gox0L9IWu0i8EEOl3iHNJCp+dUK/rlHPXFPAT1Ca+lnhF0FLENMllvEcrBYI2qIsuXcnJHl3N3xAr2+4ghQLUtbrP/7BhXBCmA5MB34KMtLfRmYAZwEntVLzDT6K2YNxLleCg3dIuVWMvQJ2t1Wo/0DnADu19/ZwMPAbiWkx1QKZQLN9fyp8qgujZhjTWBpVnrMAT6UMn4vC4TdExeScDvwWoYIs2e/Ld1VGrpeo2ripM4mXs8oNMVUdl1WrA9QF++SeP9r+MNKkSzMCBwKVGZgEwGK1XYxsfgZ8HSGhGsrJZVTittHJR/+/K89lOzDSgqEuxy1KhPKVfyOCJUP6YS5ygYRdlAdhEwp/Zg8KK2Iits9aoV0UwegY4YIe0auMTlH2bpRSFQRTNSGrJOwVz2sdMBE4hfAc3KPJ4BjhUHT/5GItCuq/2xD9wEHgFcaWXKZRVWopjuiQvxQOjaQCyQjwoLlcIlNE3orgR/lVi0buM4idUh3q61sWugrYJj6YwWLVO3uP7RpS68L5a6fKh1vEaGVGndVJHVQ0T1CPfVOetZptak3FDJZAa73jaBWFcInykIvSvyW6bgeqqT91qmReFOgoR9WYtI7dph7mbo2NW8xz6zLXPaCLMpczz6VWYvHSLu5AFwD7u/9V73LPFIAAAAASUVORK5CYII=">
                                            </image>
                                        </defs>
                                    </svg>
                                </h3>
                                <h2 class="text-[#2C4073] text-[42px] leading-12 mt-5"></h2>
                                <div class="mt-7">
                                    <ul class="mt-5">
                                        <li class="mb-5">
                                            <div>
                                                <h3
                                                    class="text-[#2C4073] font-[500] text-[20px] flex items-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 48 48">
                                                        <defs>
                                                            <mask id="ipSCheckOne0">
                                                                <g fill="none" stroke-linejoin="round" stroke-width="4">
                                                                    <path fill="#fff" stroke="#fff"
                                                                        d="M24 44a19.94 19.94 0 0 0 14.142-5.858A19.94 19.94 0 0 0 44 24a19.94 19.94 0 0 0-5.858-14.142A19.94 19.94 0 0 0 24 4A19.94 19.94 0 0 0 9.858 9.858A19.94 19.94 0 0 0 4 24a19.94 19.94 0 0 0 5.858 14.142A19.94 19.94 0 0 0 24 44Z" />
                                                                    <path stroke="#000" stroke-linecap="round"
                                                                        d="m16 24l6 6l12-12" />
                                                                </g>
                                                            </mask>
                                                        </defs>
                                                        <path fill="#FC477E" d="M0 0h48v48H0z"
                                                            mask="url(#ipSCheckOne0)" />
                                                    </svg>
                                                    Trusted Excellence
                                                </h3>
                                                <p class="text-[#70747F] text-[17px] mt-2">Allen Kids Bareilly meets
                                                    recognized education standards to deliver high-quality learning
                                                    experiences.</p>
                                            </div>
                                        </li>
                                        <li class="mb-5">
                                            <div>
                                                <h3
                                                    class="text-[#2C4073] font-[500] text-[20px] flex items-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 48 48">
                                                        <defs>
                                                            <mask id="ipSCheckOne0">
                                                                <g fill="none" stroke-linejoin="round" stroke-width="4">
                                                                    <path fill="#fff" stroke="#fff"
                                                                        d="M24 44a19.94 19.94 0 0 0 14.142-5.858A19.94 19.94 0 0 0 44 24a19.94 19.94 0 0 0-5.858-14.142A19.94 19.94 0 0 0 24 4A19.94 19.94 0 0 0 9.858 9.858A19.94 19.94 0 0 0 4 24a19.94 19.94 0 0 0 5.858 14.142A19.94 19.94 0 0 0 24 44Z" />
                                                                    <path stroke="#000" stroke-linecap="round"
                                                                        d="m16 24l6 6l12-12" />
                                                                </g>
                                                            </mask>
                                                        </defs>
                                                        <path fill="#1AB9FF" d="M0 0h48v48H0z"
                                                            mask="url(#ipSCheckOne0)" />
                                                    </svg>
                                                    Certified Programs
                                                </h3>
                                                <p class="text-[#70747F] text-[17px] mt-2">Allen Kids Bareilly meets
                                                    recognized education standards to deliver high-quality learning
                                                    experiences.</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                            <?= $history_years['columns'][0]['content'] ?? "" ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--==== START ====-->
        <?php include "includes/legacy.php" ?>
        <!--==== END ====-->

        <!--==== Registration Start ====-->
        <?php include "includes/online-registration.php" ?>
        <!--==== End ====-->
        <!--==== Dynamic Sections ====-->
        <?php
           renderDynamicSections($pageData, $api_url);
        ?>
        <!--==== End ====-->
        <!--==== Footer ====-->
        <?php include "includes/footer.php" ?>
        <!--==== End ====-->
    </main>
    <!--==== End ====-->

    <!--==== Scripts ====-->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/kids.js" async></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>