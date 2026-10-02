<?php
$page = "newsletters";
require_once "proxy/api.php";
$newsData = fetchApiData("api/pages/newsletters-page-bareilly");
require_once "layouts/layout-function.php";
$pageData = $news_data ?? [];

// ────────────────────────────────────────────────
// Reverse sections order → newest (last added) first
// ────────────────────────────────────────────────
if (!empty($newsData['data']['sections']) && is_array($newsData['data']['sections'])) {
    $newsData['data']['sections'] = array_reverse($newsData['data']['sections']);
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $newsData['data']['title'] ?? "Newsletters - Allen Kids Bareilly"; ?></title>
    <?php include "includes/head.php" ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
    <!--==== Header ====-->
    <?php include "includes/header.php"; ?>
    <!--==== End ====-->

    <!--==== Main Content ====-->
    <main>
        <!--==== Breadcrumb ====-->
        <section class="about-brudcrumb md:h-[350px] bg-program-cover relative">
            <div class="text-center md:py-28 py-10 relative z-10">
                <h1 class="text-[42px] font-[400] text-white">Newsletters</h1>
                <ul class="flex items-center gap-3 justify-center">
                    <li><a href="/" class="text-white flex items-center gap-2 sm:text-[16px] text-[12px]">Home </a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319"
                                    d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href="" class="text-white sm:text-[16px] text-[12px]">News and Updates</a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319"
                                    d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href="/newsletters"
                            class="text-[#FAB319] sm:text-[16px] text-[12px]">Newsletters</a></li>
                </ul>
            </div>
        </section>
        <!--==== End ====-->

        <!--==== START =====-->
        <section class="mt-7 mb-5">
            <div class="comman-container-1050">
                <div class="text-center text-white pt-10">
                    <h2 class="text-[#F66] flex items-center gap-2 justify-center text-[18px]">
                        <svg width="77" height="31" viewBox="0 0 77 31" fill="none" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <!-- SVG content unchanged -->
                        </svg>
                        <?php echo $newsData['data']['sections'][0]['content_heading'] ?? "Latest Newsletters" ?>
                        <svg width="78" height="31" viewBox="0 0 78 31" fill="none" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <!-- SVG content unchanged -->
                        </svg>
                    </h2>
                    <?php echo $newsData['data']['sections'][0]['content'] ?? "" ?>
                </div>

                <div class="mt-10">
                    <?php
                    // We now use reversed sections
                    foreach ($newsData['data']['sections'] as $index => $section) {
                        // Skip intro section (already shown above)
                        if ($index === 0) continue;

                        // Handle different section layouts based on your structure
                        if (isset($section['columns']) && is_array($section['columns']) && count($section['columns']) >= 2) {
                            $col1 = $section['columns'][0];
                            $col2 = $section['columns'][1];

                            // Alternate layout direction every other section
                            $isEven = ($index % 2 === 0);
                            $imgFirst = $isEven ? $col1 : $col2;
                            $textFirst = $isEven ? $col2 : $col1;
                    ?>
                            <div class="bg-[#FCF9F4] rounded-[16px] md:py-10 md:px-12 py-8 px-3 
                                        <?php echo $isEven ? 'md:flex' : 'flex flex-col-reverse md:flex-row'; ?> 
                                        items-center gap-12 <?php echo $index > 1 ? 'mt-10' : ''; ?>">
                                <div>
                                    <img src="<?php echo $imgFirst['image_url'] ?? ''; ?>" alt="<?= htmlspecialchars($imgFirst['image_alt'] ?? '') ?>" class="w-full">
                                </div>
                                <div>
                                    <h3 class="text-black text-[20px] mt-5">
                                        <?php echo $textFirst['content_heading'] ?? ''; ?>
                                    </h3>
                                    <p class="text-black text-[18px] flex gap-2 items-baseline mt-2">
                                        <?php echo $textFirst['content'] ?? ''; ?>
                                    </p>
                                </div>
                            </div>
                    <?php
                        } elseif (isset($section['image_url'])) {
                            // Full-width image sections
                    ?>
                            <div class="mt-12 mx-auto">
                                
                                <img src="<?php echo $section['image_url'] ?? ''; ?>" alt="<?= htmlspecialchars($section['image_alt'] ?? '') ?>" class="w-full">
                            </div>
                    <?php
                        } elseif (isset($section['content_heading'])) {
                            // Text-only centered sections
                    ?>
                            <div class="mt-10 text-center">
                                <h3 class="text-black text-[20px] mt-5">
                                    <?php echo $section['content_heading'] ?? ''; ?>
                                </h3>
                                <p class="text-center text-gray-500 text-[18px] mx-auto mt-2 md:w-[60%]">
                                    <?php echo $section['content'] ?? ''; ?>
                                </p>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--==== Footer ====-->
        <?php include "includes/footer.php" ?>
        <!--==== End ====-->
    </main>
    <!--==== End ====-->

    <!--==== Scripts ====-->
    <script src="assets/js/kids.js" async></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        function scrollCarousel(direction) {
            const container = document.getElementById("carousel");
            const scrollAmount = 320;
            container.scrollBy({
                left: direction * scrollAmount,
                behavior: 'smooth'
            });
        }
    </script>
</body>

</html>