<?php
$page =  "beyond-curriculam.php";
require_once "proxy/api.php";
$curriculumData = fetchApiData("api/pages/beyond-curriculum-activities-allen-kids-bareilly-preschool");
require_once "layouts/layout-function.php";
$pageData = $curriculumData;
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $curriculumData['data']['title'] ?></title>
    <meta name="description" content="<?php echo  $curriculumData['data']['meta_description'] ?>">
    <meta name="keywords" content="<?php echo  $curriculumData['data']['meta_keywords'] ?>">
    <?php include "includes/head.php" ?>
</head>

<body>
    <!-- Header -->
    <?php include "includes/header.php"; ?>
    <!-- End -->

    <!-- Main Content -->
    <main>
        <!-- Bradcrumb -->
        <section class="about-brudcrumb md:h-[350px] bg-program-cover relative">
            <div class="text-center md:py-28 py-10 relative z-10">
                <h1 class="md:text-[42px] text-[28px] font-[400] text-white">Beyond Curriculum</h1>
                <ul class="flex items-center gap-3 justify-center">
                    <li><a href="/" class="text-white flex items-center gap-2 sm:text-[16px] text-[12px]">Home </a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319" d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href="" class="text-[#FAB319] sm:text-[16px] text-[12px]">Beyond Curriculum</a></li>
                </ul>
            </div>
        </section>
        <!-- End -->

        <!--==== START ====-->
        <section class="mt-15">
            <div class="comman-container-1280">
                <div>
                    <h3 class="text-[#70747F] md:text-[20px] mt-3"><?php echo $curriculumData['data']['sections'][1]['content'] ?? "" ?></h3>
                </div>
                <div class="md:flex items-center gap-12 mt-8">
                    <div class="md:w-[50%] relative">
                        <div class="absolute right-10 top-10 z-10 animate-bounce">
                            <img src="assets/images/beyond-carriculum/drum.webp" class="md:w-[100%] w-[80px]" alt="animation Two">
                        </div>
                        <div data-aos="fade-right">
                            <img src="<?php echo $curriculumData['data']['sections'][1]['columns'][0]['image_url'] ?? "assets/images/beyond-carriculum/clay-modelling.webp" ?>" alt="<?= htmlspecialchars($curriculumData['data']['sections'][1]['columns'][0]['image_alt']) ?? "" ?>">
                        </div>
                        <div class="absolute bottom-10 left-10 z-10 animate-scale-loop">
                            <img src="assets/images/beyond-carriculum/flower.webp" class="md:w-[100%] w-[60px]" alt="animation Two">
                        </div>
                        <div class="absolute bottom-3 right-3 z-10 animate-scale-loop">
                            <img src="assets/images/beyond-carriculum/Vector.webp" class="md:w-[100%] w-[50px]" alt="animation Two">
                        </div>
                    </div>
                    <div class="md:w-[50%] md:mt-0 mt-6">
                        <div>
                            <p class="text-[#70747F] md:text-[20px] mt-3"><?php echo $curriculumData['data']['sections'][1]['columns'][1]['content'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--==== START ====-->
        <section class="mt-15">
            <div class="md:bg-[url('assets/images/beyond-carriculum/border-vector.webp')] md:h-[80px]" style="background-size: 100% 100%;"></div>
            <div class="bg-[#FF454A] md:py-1 py-5">
                <div class="comman-container-1280  relative">
                    <div class="md:flex items-center md:py-15 py-3 gap-12">
                        <div class="md:w-[50%] md:mt-0 mt-6">
                            <div>
                                <p class="text-[#fff] md:text-[20px] mt-3"><?php echo $curriculumData['data']['sections'][2]['columns'][0]['content'] ?></p>
                            </div>
                        </div>
                        <div class="md:w-[50%] relative md:mt-0 mt-6">
                            <div data-aos="fade-right">
                                <img src="<?php echo $curriculumData['data']['sections'][2]['columns'][1]['image_url'] ?? "assets/images/beyond-carriculum/fun-sports.webp" ?>" alt="<?= htmlspecialchars($curriculumData['data']['sections'][2]['columns'][1]['image_alt']) ?? "" ?> ?>">
                            </div>
                        </div>
                    </div>
                    <div class="absolute md:left-10 left-0 md:bottom-[-80px] bottom-[-50px]">
                        <img src="assets/images/beyond-carriculum/pa-left.webp" class="md:w-[200px] w-[80px]" alt="PA Left">
                    </div>
                    <div class="absolute md:right-10 right-0 bottom-[-40px]">
                        <img src="assets/images/beyond-carriculum/play-group.webp" class="md:w-[300px] w-[150px]" alt="PA Left">
                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--==== START ====-->
        <section class="md:mt-20 mt-10 py-10">
            <div class="comman-container-1280  relative">
                <div class="md:flex items-center gap-10">
                    <div class="md:w-[50%] relative">
                        <div class="absolute right-10 top-10 z-10 animate-bounce">
                            <img src="assets/images/beyond-carriculum/art-vector.webp" class="md:w-[100%] w-[80px]" alt="animation Two">
                        </div>
                        <div data-aos="fade-right">
                            <?php echo $curriculumData['data']['sections'][3]['columns'][0]['content'] ?? ""; ?>
                        </div>
                        <div class="absolute md:bottom-30 bottom-20 left-10 z-10 animate-scale-loop">
                            <img src="assets/images/beyond-carriculum/art-pot.webp" class="md:w-[100px] w-[60px]" alt="animation Two">
                        </div>
                    </div>
                    <div class="md:w-[50%] md:mt-0 mt-6">
                        <div>
                            <p class="text-[#70747F] md:text-[20px] mt-3"><?php echo $curriculumData['data']['sections'][3]['columns'][1]['content'] ?? "" ?></p>
                        </div>
                    </div>
                </div>
                <div class="absolute md:bottom-[-150px] left-0 z-10 animate-scale-loop">
                    <img src="assets/images/beyond-carriculum/pen-book.webp" class="md:w-[100%] w-[100px]" alt="animation Two">
                </div>
                <div class="absolute md:bottom-[-50px] right-0 z-10 animate-scale-loop">
                    <img src="assets/images/beyond-carriculum/drum-2.webp" class="md:w-[100%] w-[100px]" alt="Drum Two">
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--==== START ====-->
        <section class="mt-15 relative">
            <div class="md:bg-[url('assets/images/beyond-carriculum/yellow-vector.webp')] md:h-[80px]" style="background-size: 100% 100%;"></div>
            <div class="bg-[#F0A047] md:py-1 py-5">
                <div class="comman-container-1280  relative">
                    <div class="md:flex items-center py-2 md:pb-15 pb-10 gap-12">
                        <div class="md:w-[50%] md:mt-0 mt-6 relative">
                            <div class="absolute md:left-[-130px] left-[-30px] top-[-40px]">
                                <img src="assets/images/beyond-carriculum/c-g.webp" class="md:w-[120px] w-[60px]" alt="Yoga">
                            </div>
                            <div class="relative z-10">
                                <p class="text-[#fff] md:text-[20px] mt-3"><?php echo $curriculumData['data']['sections'][4]['columns'][0]['content'] ?? "" ?></p>
                            </div>
                        </div>
                        <div class="md:w-[50%] relative md:mt-0 mt-8">
                            <div data-aos="fade-right">
                                <!-- <img src="assets/images/beyond-carriculum/yoga.webp" alt="Yoga"> -->
                                <?php echo $curriculumData['data']['sections'][4]['columns'][1]['content'] ?? ""; ?>
                            </div>
                        </div>
                    </div>
                    <div class="absolute md:left-10 left-0 md:bottom-[-10px] bottom-[-50px] animate-left-to-right">
                        <img src="assets/images/beyond-carriculum/cg-g.webp" class="md:w-[200px] w-[130px]" alt="PA Left">
                    </div>
                    <div class="absolute md:right-5 right-0 md:bottom-[-10px] bottom-[-50px] animate-scale-loop">
                        <img src="assets/images/beyond-carriculum/cg-book.webp" class="md:w-[160px] w-[80px]" alt="PA Left">
                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--==== START ====-->

        <section class="md:mt-20 mt-10 py-10 relative">
            <div class="comman-container-1280  relative">
                <div class="md:flex items-center gap-10">
                    <div class="md:w-[50%] relative">

                        <div data-aos="fade-right">
                            <img src="<?php echo $curriculumData['data']['sections'][5]['columns'][1]['image_path'] ?? ""; ?>" alt="<?= htmlspecialchars($curriculumData['data']['sections'][5]['columns'][1]['image_alt']) ?? "" ?>">
                        </div>
                        <div class="absolute md:bottom-30 bottom-10 left-10 z-10 animate-scale-loop">
                            <img src="assets/images/beyond-carriculum/art-pot.webp" class="md:w-[100px] w-[60px]" alt="animation Two">
                        </div>
                        <div class="absolute md:bottom-[-30px] right-0 z-10 animate-round">
                            <img src="assets/images/beyond-carriculum/ball.webp" class="md:w-[100%] w-[70px]" alt="Ball Animate">
                        </div>
                    </div>
                    <div class="md:w-[50%] md:mt-0 mt-6">
                        <div>
                            <p class="text-[#70747F] md:text-[20px] mt-3"><?php echo $curriculumData['data']['sections'][5]['columns'][0]['content'] ?? "" ?></p>
                        </div>
                    </div>
                </div>
                <div class="absolute md:bottom-[-150px] left-0 z-10 animate-scale-loop-5s">
                    <img src="assets/images/beyond-carriculum/pen-book.webp" class="md:w-[100%] w-[75px]" alt="animation Two">
                </div>
            </div>
            <div class="absolute md:bottom-[-50px] md:right-20 right-1 z-10 animate-scale-loop-5s">
                <img src="assets/images/beyond-carriculum/mind-jump.webp" class="md:w-[100%] w-[85px]" alt="Drum Two">
            </div>
        </section>
        <!--==== END ====-->

        <!--==== START ====-->
        <section class="mt-15">
            <div class="md:bg-[url('assets/images/beyond-carriculum/border-vector.webp')] md:h-[80px]" style="background-size: 100% 100%;"></div>
            <div class="bg-[#FF454A] md:py-1 py-5">
                <div class="comman-container-1280  relative">
                    <div class="md:flex items-center md:py-2 md:mb-15 py-3 gap-12">
                        <div class="md:w-[50%] md:mt-0 mt-6">
                            <div>
                                <h2 class="text-[32px] text-[#fff] md:leading-10 leading-10">Music</h2>
                                <p class="text-[#fff] md:text-[20px] mt-3">Music plays a vital role in early childhood development, offering a joyful way for children to explore sound, rhythm, and language</p>
                            </div>
                        </div>
                        <div class="md:w-[50%] relative md:mt-0 mt-6">
                            <div data-aos="fade-right">
                                <img src="assets/images/beyond-carriculum/music.webp" alt="Music">
                            </div>
                        </div>
                    </div>
                    <div class="absolute md:left-10 left-0 md:bottom-[-130px] bottom-[-50px] animate-scale-loop-5s">
                        <img src="assets/images/beyond-carriculum/children-group.webp" class="md:w-[100%] w-[150px]" alt="PA Left">
                    </div>
                    <div class="absolute md:right-2 right-0 md:bottom-[-90px] bottom-[-50px] animate-scale-loop-5s">
                        <img src="assets/images/beyond-carriculum/magic-box.webp" class="md:w-[150px] w-[70px]" alt="PA Left">
                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!-- Registration Start -->
        <?php include "includes/online-registration.php" ?>
        <!-- End -->
        <!--==== Dynamic Section ====-->
        <?php
        renderDynamicSections($pageData, $api_url);
        ?>
        <!--==== End ====-->
        <!-- Footer -->
        <?php include "includes/footer.php" ?>
        <!-- End -->
    </main>
    <!-- End -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/kids.js" async></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>