<?php
$page = "virtual-tour";
include_once "proxy/api.php";
$virtual_data = fetchApiData("api/pages/virtual-tour-bareilly");
require_once "layouts/layout-function.php";
$pageData = $virtual_data;
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $virtual_data['data']['title'] ?></title>
    <meta name="description" content="<?php echo $virtual_data['data']['meta_description'] ?>">
    <meta name="keywords" content="<?php echo $virtual_data['data']['meta_keywords'] ?>">
    <?php include "includes/head.php" ?>
</head>

<body>
    <!--==== Header ====-->
    <?php include "includes/header.php"; ?>
    <!--==== End ====-->
    <!--==== Main Content ====-->
    <main>
        <!--==== Bradcrumb ====-->
        <section class="about-brudcrumb md:h-[350px] bg-program-cover relative">
            <div class="text-center md:py-28 py-10 relative z-10">
                <h1 class="text-[42px] font-[400] text-white">Virtual Tour</h1>
                <ul class="flex items-center gap-3 justify-center">
                    <li><a href="/" class="text-white flex items-center gap-2 sm:text-[16px] text-[12px]">Home </a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319"
                                    d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href="" class="text-[#fff] sm:text-[16px] text-[12px]">Gallery</a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319"
                                    d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href="https://allenkid.fastranking.tech/virtual-tour.php" class="text-[#FAB319] sm:text-[16px] text-[12px]">Virtual
                            Tour</a></li>
                </ul>
            </div>
        </section>
        <!--==== End ====-->

        <!--==== START =====-->
        <section class="mt-7">
            <div class="comman-container-1050 mx-4">
                <div class="text-center text-white pt-10">
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
                        Virtual Tour
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
                    <h2 class="text-[45px] leading-11 mt-4 text-[#2C4073]">Experience the Best of Allenkids Through Our
                        Virtual
                        Tour </h2>
                </div>
                <!-- <div>
                    <div class="grid grid-cols-4 gap-2 mt-10">
                        <div class="col-span-2 row-span-2">
                            <a data-fancybox="gallery" data-src="assets/images/gl6.png">
                                <img src="assets/images/gl6.png" class="w-full h-full object-cover" />
                            </a>
                        </div>
                        <div>
                            <a data-fancybox="gallery" data-src="assets/images/gl6.png">
                                <img src="assets/images/gl6.png" class="w-full h-full object-cover" />
                            </a>
                        </div>
                        <div>
                            <a data-fancybox="gallery" data-src="assets/images/gl6.png">
                                <img src="assets/images/gl6.png" class="w-full h-full object-cover" />
                            </a>
                        </div>
                        <div>
                            <a data-fancybox="gallery" data-src="assets/images/gl6.png">
                                <img src="assets/images/gl6.png" class="w-full h-full object-cover" />
                            </a>
                        </div>
                        <div>
                            <a data-fancybox="gallery" data-src="assets/images/gl6.png">
                                <img src="assets/images/gl6.png" class="w-full h-full object-cover" />
                            </a>
                        </div>
                    </div>
                    <div class="mt-10">
                        <h3 class="text-black text-[24px] mt-5">Class UKG (Tour location)</h3>
                        <p class="text-gray-500 text-[18px]  flex  gap-2 items-baseline mt-2">Graduation Day is a
                            special milestone event celebrating the achievements and growth of
                            young children as they prepare to move forward in their educational journey.
                            It is a joyful occasion filled with pride and excitement for both the students and their
                            families.</p>

                        <div class="grid grid-cols-4 gap-2 mt-10">
                            <div>
                                <a data-fancybox="gallery" data-src="assets/images/gl6.png">
                                    <img src="assets/images/gl6.png" class="w-full h-full object-cover" />
                                </a>
                            </div>

                            <div>
                                <a data-fancybox="gallery" data-src="assets/images/gl6.png">
                                    <img src="assets/images/gl6.png" class="w-full h-full object-cover" />
                                </a>
                            </div>
                            <div>
                                <a data-fancybox="gallery" data-src="assets/images/gl6.png">
                                    <img src="assets/images/gl6.png" class="w-full h-full object-cover" />
                                </a>
                            </div>
                            <div>
                                <a data-fancybox="gallery" data-src="assets/images/gl6.png">
                                    <img src="assets/images/gl6.png" class="w-full h-full object-cover" />
                                </a>
                            </div>
                            <div class="col-span-2 row-span-2">
                                <a data-fancybox="gallery" data-src="assets/images/gl6.png">
                                    <img src="assets/images/gl6.png" class="w-full h-full object-cover" />
                                </a>
                            </div>
                            <div class="col-span-2 row-span-2">
                                <a data-fancybox="gallery" data-src="assets/images/gl6.png">
                                    <img src="assets/images/gl6.png" class="w-full h-full object-cover" />
                                </a>
                            </div>
                        </div>
                        </grid>
                    </div>
                    <div class="mt-10">
                        <h3 class="text-black text-[24px] mt-5">Class UKG (Tour location)</h3>
                        <p class="text-gray-500 text-[18px]  flex  gap-2 items-baseline mt-2">Graduation Day is a
                            special milestone event celebrating the achievements and growth of
                            young children as they prepare to move forward in their educational journey.
                            It is a joyful occasion filled with pride and excitement for both the students and their
                            families.</p>
                        <div class="grid grid-cols-4 gap-2 mt-10">
                            <div class="col-span-2 row-span-2">
                                <a data-fancybox="gallery" data-src="assets/images/gl6.png">
                                    <img src="assets/images/gl6.png" class="w-full h-full object-cover" />
                                </a>
                            </div>
                            <div>
                                <a data-fancybox="gallery" data-src="assets/images/gl6.png">
                                    <img src="assets/images/gl6.png" class="w-full h-full object-cover" />
                                </a>
                            </div>
                            <div>
                                <a data-fancybox="gallery" data-src="assets/images/gl6.png">
                                    <img src="assets/images/gl6.png" class="w-full h-full object-cover" />
                                </a>
                            </div>
                            <div>
                                <a data-fancybox="gallery" data-src="assets/images/gl6.png">
                                    <img src="assets/images/gl6.png" class="w-full h-full object-cover" />
                                </a>
                            </div>
                            <div>
                                <a data-fancybox="gallery" data-src="assets/images/gl6.png">
                                    <img src="assets/images/gl6.png" class="w-full h-full object-cover" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div>
                    <iframe class="w-[100%] md:h-[70%] h-[300px] mt-10" src="https://www.youtube.com/embed/jXXG-9OrVFI"
                        title="Explore Allen Kids Bareilly: Virtual Tour" frameborder="0"
                        allow="accelerometer; autoplay; clipboard‑write; encrypted‑media; gyroscope; picture‑in‑picture"
                        allowfullscreen>
                    </iframe>
                </div>
        </section>
        <!--==== END ====-->


        <!--==== NEWSLETTER START =====-->
        <?php include "includes/newsletter.php" ?>
        <!--==== END ====-->

        <!--==== Dynamic Section ====-->
        <?php
        renderDynamicSections($pageData, $api_url);
        ?>
        <!--==== End ====-->

        <!--==== Footer ====-->
        <?php include "includes/footer.php" ?>
        <!-- End -->
    </main>
    <!-- End -->

    <!-- Scripts -->
    <script src="assets/js/kids.js" async></script>
</body>

</html>