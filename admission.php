<?php
$page = "admission.php";
require_once "proxy/api.php";
$admission_data = fetchApiData("api/pages/admission-process-for-pre-primary-school-in-bareilly");
$faq_data = fetchApiData("api/accordions/branch/5");
require_once __DIR__ . '/includes/session-api.php'; $sessions = allenkids_fetch_sessions();
require_once "layouts/layout-function.php";
$pageData = $admission_data;
// print_r($admission_data['data']['sections'][3]['resolved_content']['columns']);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $admission_data['data']['title'] ?? "" ?></title>
    <meta name="description" content="<?= $admission_data['data']['meta_description'] ?? "" ?>">
    <meta name="keywords" content="<?= $admission_data['data']['meta_keywords'] ?? "" ?>">
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
      "name": "Admissions",
      "item": "https://allenkidsbareilly.in/admission"
    }
  ]
}
</script>

    <?php include "includes/head.php" ?>
</head>

<body>
    <!-- Header -->
    <?php include "includes/header.php"; ?>
    <!-- End -->
    <!-- Main Content -->
    <main>
        <!-- Bradcrumb -->
        <section class="about-brudcrumb md:h-[400px] h-[200px] bg-program-cover relative">
            <div class="text-center md:pt-30 pt-12 relative z-10">
                <h1 class="text-[42px] font-[400] text-white">Admission</h1>
                <ul class="flex items-center gap-3 justify-center">
                    <li><a href="/" class="text-white flex items-center gap-2 sm:text-[16px] text-[12px]">Home </a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319"
                                    d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href="admission" class="text-[#FAB319] sm:text-[16px] text-[12px]">Admission</a></li>
                </ul>
            </div>
        </section>
        <!-- End -->

        <!--==== ENQUIRY ====-->
        <section
            class="mt-20 py-8 md:pb-15 pb-24 bg-[url('assets/images/admission/admission-bg.webp')] bg-cover bg-center">
            <div class="comman-container-1050">
                <div>
                    <h2 class="text-[32px] font-[500] text-white text-center">Enquiry For Session</h2>
                    <div id="successPopup" class="relative mt-3  bg-green-500 text-white px-4 py-2 rounded mb-5 hidden"
                        style="z-index:999"> Form submitted successfully!
                    </div>
                    <div>
                        <form id="contactForm" class="mt-6">
                            <div class="md:flex gap-4">
                                <div class="md:w-[50%]">
                                    <select name="session"
        class="bg-white h-[45px] rounded-[6px] w-[100%] text-gray-500 pl-2" id="years"
        required>
    <option value="" disabled selected>Enquiry For Session</option>  <!-- added selected for better UX -->
    <?php 
    if (!empty($sessions)):
        foreach ($sessions as $item): 
            $sessionName = trim($item['session'] ?? '');
            if ($sessionName !== ''):
    ?>
                <option value="<?= htmlspecialchars($sessionName) ?>">
                    <?= htmlspecialchars($sessionName) ?>
                </option>
    <?php 
            endif;
        endforeach; 
    else: ?>
        <option value="">No sessions available</option>
    <?php endif; ?>
</select>
                                </div>
                               <div class="md:w-[50%] md:mt-0 mt-5">
            <select name="grade"  
                    class="bg-white h-[45px] rounded-[6px] w-[100%] text-gray-500 pl-2"
                    id="grade" required>
                <option value="">Choose Grade</option>
                <?php include 'includes/grade-api.php'; ?>
            </select>
        </div>
    </div>
                            </div>
                            <div class="md:flex gap-4 mt-5">
                                <div class="md:w-[50%]">
                                    <input type="text"
                                        class="bg-white h-[45px] rounded-[6px] bg-white w-[100%] text-gray-500 pl-2"
                                        id="childname" placeholder="Enter Child's Name" maxlength="30">
                                    <span id="childname-error" class="text-black text-sm mt-1 hidden text-[15px]">Only
                                        letters and spaces allowed.</span>
                                </div>
                                <div class="md:w-[50%] md:mt-0 mt-5">
                                    <input type="text"
                                        class="bg-white h-[45px] rounded-[6px] bg-white w-[100%] text-gray-500 pl-2"
                                        id="fmgname" placeholder="Father / Mother / Guardian Name" maxlength="30">
                                    <span id="fmgname-error" class="text-black text-sm mt-1 hidden text-[15px]">Only
                                        letters and spaces allowed.</span>
                                </div>
                            </div>
                            <div class="md:flex gap-4 mt-5">
                                <div class="md:w-[50%] md:mt-0 mt-5">
                                    <input type="text"
                                        class="bg-white h-[45px] rounded-[6px] bg-white w-[100%] text-gray-500 pl-2"
                                        id="mobile" placeholder="Enter Your Mobile No">
                                    <div id="mobile-error" class="text-black text-sm mt-1 hidden text-[15px]">Please
                                        enter valid phone number</div>
                                </div>

                                <div class="md:w-[50%] md:mt-0 mt-5">
                                    <input type="text"
                                        class="bg-white h-[45px] rounded-[6px] bg-white w-[100%] text-gray-600 pl-2"
                                        id="email" placeholder="Enter Your Email">
                                    <span id="email-error" class="text-black text-sm mt-1 hidden text-[15px]">Please
                                        enter a valid email address.</span>
                                </div>
                            </div>
                            <!-- <div class="md:w-[50%] md:mt-0 mt-5">
                                 <input type="text"
                                     class="bg-white h-[45px] rounded-[6px] bg-white w-[100%] text-gray-500 pl-2"
                                     placeholder="Your Message (optional)" required>
                             </div> -->
                    </div>
                    <input type="hidden" id="source" value="">
                    <div class="mt-5">
                        <button type="submit" id="contactSubmitBtn"
                            class="w-[100%] h-[55px] text-white rounded-[8px] bg-[#2C4073] text-[17px] uppercase flex items-center justify-center gap-1 cursor-pointer transition-all hover:transform-y-5">
                            Sumbit
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5" d="M4.5 12h15m0 0l-5.625-6m5.625 6l-5.625 6" />
                            </svg>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--==== ENTROLL PROCESS ====-->
        <section class="py-10 md:px-10 px-5">
            <div class="comman-container-1280">
                <div class="md:flex">
                    <div class="md:w-[60%]">
                        <?php echo $admission_data['data']['sections'][2]['columns'][0]['content'] ?? "" ?>
                    </div>
                    <div class="md:w-[40%] md:mt-0 mt-8">
                        <div>
                            <img src="<?php echo $admission_data['data']['sections'][2]['columns'][1]['image_url'] ?? "" ?>"
                                class="w-[100%] object-contain md:h-[500px]" alt="<?= htmlspecialchars($admission_data['data']['sections'][2]['columns'][1]['image_alt']); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--==== START ====-->
        <section
            class="mt-20 py-10 md:pb-15 pb-24 bg-[url('assets/images/admission/admission-2-bg.webp')] bg-cover bg-center px-4">
            <div class="comman-container-1280 ">
                <div class="md:flex gap-10">
                    <div class="md:w-[50%]">
                        <h2 class="text-[#2B3C6B] text-[28px] font-[500]">Important Admission Dates</h2>
                        <p class="text-gray-500 text-[18px]">To ensure a seamless admission process, here are the key
                            <br> dates to note:
                        </p>
                        <div class="mt-6">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full text-left border border-separate rounded border-slate-200"
                                    cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <?php
                                            foreach ($admission_data['data']['sections'][3]['resolved_content']['columns'] as $column) {
                                            ?>
                                                <th scope="col"
                                                    class="h-12 px-6 text-[18px] font-medium border-l first:border-l-0 stroke-[#4A6CC3] text-white bg-[#2C4073] text-center">
                                                    <?= $column['title'] ?? "NA" ?>
                                                </th>
                                            <?php } ?>
                                        </tr>

                                        <?php foreach ($admission_data['data']['sections'][3]['resolved_content']['data'] as $row_data): ?>
                                            <tr class="bg-[#FFFFFF]">
                                                <?php foreach ($row_data as $cell): ?>
                                                    <td
                                                        class="h-12 px-6  transition duration-300 border-t border-l first:border-l-0 border-[#4A6CC3]  text-black text-center">
                                                        <?= $cell !== null && $cell !== "" ? htmlspecialchars($cell) : "NA" ?>
                                                    </td>
                                                <?php endforeach; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-[50%] md:mt-0 mt-5">
                        <h2 class="text-[#2B3C6B] text-[28px] font-[500]">Fee Structure & Payment Details</h2>
                        <p class="text-gray-500 text-[18px]">Our fee structure is designed to be transparent and
                            inclusive.</p>
                        <div class="mt-8">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full text-left border border-separate rounded border-slate-200"
                                    cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <?php
                                            foreach ($admission_data['data']['sections'][4]['resolved_content']['columns'] as $column) {
                                            ?>
                                                <th scope="col" class="h-12 px-6 text-[18px] font-medium border-l first:border-l-0 stroke-[#FF94EB] text-white bg-[#FF94EB] text-center">
                                                    <?= $column['title'] ?? "NA" ?>
                                                </th>
                                            <?php } ?>
                                        </tr>
                                        <?php foreach ($admission_data['data']['sections'][4]['resolved_content']['data'] as $row_data): ?>
                                            <tr class="bg-[#FFFFFF]">
                                                <?php foreach ($row_data as $cell): ?>
                                                    <td
                                                        class="h-12 px-6  transition duration-300 border-t border-l first:border-l-0 border-[#FF94EB]  text-black text-center">
                                                        <?= $cell !== null && $cell !== "" ? htmlspecialchars($cell) : "NA" ?>
                                                    </td>
                                                <?php endforeach; ?>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>

                                <div class="mt-5">
                                    <h3 class="text-[#2B3C6B] text-[28px] font-[500]">Bank Detail
                                    </h3>
                                    <table class="w-full text-left border border-separate rounded border-slate-200 mt-5"
                                        cellspacing="0">
                                        <tbody>

                                            <?php foreach ($admission_data['data']['sections'][5]['resolved_content']['data'] as $row_data): ?>
                                                <tr class="bg-[#FFFFFF]">
                                                    <?php foreach ($row_data as $cell): ?>
                                                        <td
                                                            class="h-12 px-6  transition duration-300 border-t border-l first:border-l-0 border-[#FF972D]  text-black text-center">
                                                            <?= $cell !== null && $cell !== "" ? htmlspecialchars($cell) : "NA" ?>
                                                        </td>
                                                    <?php endforeach; ?>
                                                </tr>
                                            <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                    <p class="text-[#000] text-[18px] mt-1 font-[600] font-[600] mt-3">Note: <span
                                            class="font-[500] text-[14px] text-gray-500">Please mention Student
                                            Name/Student Id in remark column.</span></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--==== Documents ====-->
        <section class="py-10 md:px-10 px-5">
            <div class="comman-container-1280">
                <div class="md:flex gap-10">
                    <div class="md:w-[50%]">
                        <div>
                            <img src="<?php echo $admission_data['data']['sections'][6]['columns'][0]['image_url'] ?? "" ?>"
                                class="w-[100%]" alt="<?= htmlspecialchars($admission_data['data']['sections'][6]['columns'][0]['image_alt']) ?>">
                        </div>
                    </div>
                    <div class="md:w-[40%] md:mt-18 mt-8">
                        <div>
                            <?php echo $admission_data['data']['sections'][6]['columns'][1]['content'] ?? "" ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->
        <!--==== Registration Fee - Rs. 600/- ====-->
        <!-- <section class="py-1 md:px-10 px-5">
            <div class="xl:w-[1280px] lg:w-[1080px] mx-auto mx-4">
                <div class="md:flex gap-10">
                    
                      </div>
                </div>
            </div>
        </section> -->
        <!--==== END ====-->

        <!--==== FAQ ====-->
        <section class=" py-10 md:pb-15 pb-24 bg-[url('assets/images/admission/faq.webp')] bg-cover bg-center px-4">
            <div class="comman-container-1280 ">
                <div class="mb-5">
                    <h4 class="text-[#F66] text-[18px] font-[300] flex items-center gap-2">
                        FAQ
                        <svg width="50" height="22" viewBox="0 0 78 30" fill="none" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="77" height="30" transform="translate(0.146484)"
                                fill="url(#pattern0_293_200)" />
                            <defs>
                                <pattern id="pattern0_293_200" patternContentUnits="objectBoundingBox" width="1"
                                    height="1">
                                    <use xlink:href="#image0_293_200" transform="scale(0.012987 0.0333333)" />
                                </pattern>
                                <image id="image0_293_200" width="77" height="30" preserveAspectRatio="none"
                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEMUlEQVRoge2Ze4hVVRTGf46WMyWmZvkaNSWfST7I1EINyVQ0kSxsQiyS3JFo/lGhUQSCJokk5aONhijhHyGRkKTlI3JMFKQaBx2o1HS0klSs66ucGVl3vhOnw73XwblPnQ8OZ+acfc/e+zvr8a11mtXNmsUtDe8T79659sAVvP87eqvo1mYsJR4C9ica0ERaclQBfXFuSHREE2nJ4P0x4BzwdXREE2mp8S3QDucGhUc1kZYa23V3SXhUizxb5I3AXnxPYCDQG+gAtAk9x7Lfb8AvwA/AT0BtA+cJSBuDcyV4f4kCJu1OYAowERgLtA/dqwFiIus2oDVQErp/FtgGbNZxOeks3lfhXDVQCowDPqcASesDvA5MA1rJYvYA5TpbxjsO/Bv5nRHXD3gwbjX1RJcB53HuY+B9vK9OMucO4HlgUkBaocS07sBG4DAwU8TMBjoBo4A3gS1ywShhhr+AfcAakdURmCCLexU4gnPLcK5tgt9+o/PjwYV8J605MF9k2Wa/12YHAKuA0zf4XHPhrbLYXsB6YF58HuemRsaW69wd57qS56R1AXYC7wIWgF+QSrfN1qVtFu+P4v1LwOC4xcEmnFsbD/z1938GTmn0aPKYtMEqYcz1vgQekDWkj6wovK8ARgJv6QXtwrl7NWqfzo+Sp6Q9IlHZGVgKPAn8npWZva/B+0XA+HgJBd/hXGmoBjVLzzvSBsmyLDMuAN5Q/MkuvN8uq7tLieC45h+Acy0C0koiWicX6Kp41VrZcElOV+P9QckTE8rv6Gox0L9IWu0i8EEOl3iHNJCp+dUK/rlHPXFPAT1Ca+lnhF0FLENMllvEcrBYI2qIsuXcnJHl3N3xAr2+4ghQLUtbrP/7BhXBCmA5MB34KMtLfRmYAZwEntVLzDT6K2YNxLleCg3dIuVWMvQJ2t1Wo/0DnADu19/ZwMPAbiWkx1QKZQLN9fyp8qgujZhjTWBpVnrMAT6UMn4vC4TdExeScDvwWoYIs2e/Ld1VGrpeo2ripM4mXs8oNMVUdl1WrA9QF++SeP9r+MNKkSzMCBwKVGZgEwGK1XYxsfgZ8HSGhGsrJZVTittHJR/+/K89lOzDSgqEuxy1KhPKVfyOCJUP6YS5ygYRdlAdhEwp/Zg8KK2Iits9aoV0UwegY4YIe0auMTlH2bpRSFQRTNSGrJOwVz2sdMBE4hfAc3KPJ4BjhUHT/5GItCuq/2xD9wEHgFcaWXKZRVWopjuiQvxQOjaQCyQjwoLlcIlNE3orgR/lVi0buM4idUh3q61sWugrYJj6YwWLVO3uP7RpS68L5a6fKh1vEaGVGndVJHVQ0T1CPfVOetZptak3FDJZAa73jaBWFcInykIvSvyW6bgeqqT91qmReFOgoR9WYtI7dph7mbo2NW8xz6zLXPaCLMpczz6VWYvHSLu5AFwD7u/9V73LPFIAAAAASUVORK5CYII=" />
                            </defs>
                        </svg>
                    </h4>
                    <h2 class="text-[28px] text-white mt-[100px] sm:mt-[60px]">Frequently Asked Questions</h2>

                    <?php foreach ($faq_data[1]['items'] as $item) { ?>
                        <details class="p-2 mb-5 group">
                            <summary
                                class="[&::-webkit-details-marker]:hidden relative pr-8 font-medium list-none cursor-pointer text-white focus-visible:outline-none transition-colors duration-300 group-hover:text-slate-300 text-white text-[20px]">
                                <?php echo $item['title'] ?>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="absolute right-0 w-4 h-4 transition duration-300 top-1 stroke-white shrink-0 group-open:rotate-45"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"
                                    aria-labelledby="title-ac02 desc-ac02">
                                    <title id="title-ac02">Open icon</title>
                                    <desc id="desc-ac02">icon that represents the state of the summary</desc>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg>
                            </summary>
                            <?php echo $item['content'] ?>

                        </details>
                    <?php } ?>

                </div>
        </section>
        <!--==== END ====-->

        <!--==== Dynamic Section ====-->
        <?php
        renderDynamicSections($pageData, $api_url);
        ?>
        <!--==== End ====-->

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
                if (!sessionStorage.getItem("leadSource")) {
                    sessionStorage.setItem("leadSource", source);
                }

                var finalSource = sessionStorage.getItem("leadSource");

                // Fill hidden field if it exists
                var sourceInput = document.getElementById("source");
                if (sourceInput) {
                    sourceInput.value = finalSource;
                }
                console.log("Captured Source:", finalSource);
            })();
            // Regex patterns
            const nameRegexs = /^[A-Za-z\s]+$/;
            const mobileRegexs = /^[6-9]\d{9}$/;
            const emailRegexs = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            // DOM elements
            const childnameInput = document.getElementById("childname");
            const fmgnameInput = document.getElementById("fmgname");
            const mobileInput = document.getElementById("mobile");
            const emailInput = document.getElementById("email");

            // Error spans
            const childnameError = document.getElementById("childname-error");
            const fmgnameError = document.getElementById("fmgname-error");
            const mobileErrorss = document.getElementById("mobile-error");
            const emailErrorss = document.getElementById("email-error");

            // Child name validation
            childnameInput.addEventListener("input", function() {
                childnameError.classList.toggle("hidden", !this.value || nameRegexs.test(this.value));
            });

            // FMG name validation
            fmgnameInput.addEventListener("input", function() {
                fmgnameError.classList.toggle("hidden", !this.value || nameRegexs.test(this.value));
            });

            // Mobile validation
            mobileInput.addEventListener("input", function() {
                this.value = this.value.replace(/\D/g, '').slice(0, 10); // digits only
                mobileErrorss.classList.toggle("hidden", !this.value || mobileRegexs.test(this.value));
            });

            // Email validation
            emailInput.addEventListener("input", function() {
                this.value = this.value.toLowerCase();
                emailErrorss.classList.toggle("hidden", !this.value || emailRegexs.test(this.value));
            });

            // Form submission
            document.getElementById("contactForm").addEventListener("submit", function(e) {
                e.preventDefault();

                const submitBtn = document.getElementById("contactSubmitBtn");
                submitBtn.disabled = true;
                submitBtn.textContent = "Submitting...";

                // Inputs
                const years = document.getElementById("years")?.value.trim() || "";
                const grade = document.getElementById("grade")?.value.trim() || "";
                const childname = childnameInput.value.trim();
                const fmgname = fmgnameInput.value.trim();
                const mobile = mobileInput.value.trim();
                const email = emailInput.value.trim();
                const source = sessionStorage.getItem("leadSource") || "Website";

                let isValid = true;

                // Child name validation
                if (!nameRegexs.test(childname)) {
                    childnameError.classList.remove("hidden");
                    isValid = false;
                } else {
                    childnameError.classList.add("hidden");
                }

                // FMG name validation
                if (!nameRegexs.test(fmgname)) {
                    fmgnameError.classList.remove("hidden");
                    isValid = false;
                } else {
                    fmgnameError.classList.add("hidden");
                }

                // Mobile validation
                if (!mobileRegexs.test(mobile)) {
                    mobileErrorss.classList.remove("hidden");
                    isValid = false;
                } else {
                    mobileErrorss.classList.add("hidden");
                }

                // Email validation
                if (!emailRegexs.test(email)) {
                    emailErrorss.classList.remove("hidden");
                    isValid = false;
                } else {
                    emailErrorss.classList.add("hidden");
                }

                if (!isValid) {
                    submitBtn.disabled = false;
                    submitBtn.textContent = "Submit";
                    return;
                }

                // API Payload
                const payload = {
                    name: childname,
                    years: years,
                    grade: grade,
                    student_name: childname,
                    parent_name: fmgname,
                    phone: mobile,
                    email: email,
                    source: source,
                    source_type: "Website",
                    enquiry_type: "Digital",
                    message: "This Message From Allen Kids Admission Enquiry Form",
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
                        const popup = document.getElementById("successPopup");
                        popup.classList.remove("hidden");
                        setTimeout(() => popup.classList.add("hidden"), 3000);
                        document.getElementById("contactForm").reset();
                    })
                    .catch(() => {
                        alert("Error submitting the form. Please try again.");
                    })
                    .finally(() => {
                        submitBtn.disabled = false;
                        submitBtn.textContent = "Submit Message";
                    });
            });
        </script>

        <!-- Footer -->
        <?php include "includes/footer.php" ?>
        <!-- End -->
    </main>
    <!-- End -->
    <?php include "includes/foot.php" ?>
    <!-- Scripts -->

</body>

</html>