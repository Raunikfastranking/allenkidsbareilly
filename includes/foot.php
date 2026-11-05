<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="assets/js/kids.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const BASE_URL = "<?= rtrim((isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'], '/') ?>";

        const hpopupOverlay = document.getElementById('HeaderenquiryPopup');
        const hopenBtn = document.getElementById('openEnquiryPopup');
        const hcloseBtn = document.getElementById('closeEnquiryPopup');

        function openPopup() {
            hpopupOverlay.classList.remove("hidden");
            document.body.style.overflow = 'hidden';
        }

        hopenBtn?.addEventListener('click', function(e) {
            e.preventDefault();
            openPopup();
        });

        hcloseBtn?.addEventListener('click', () => {
            hpopupOverlay.classList.add('hidden');
            document.body.style.overflow = '';
        });

        hpopupOverlay?.addEventListener('click', (e) => {
            if (e.target === hpopupOverlay) {
                hpopupOverlay.classList.add('hidden');
                document.body.style.overflow = '';
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !hpopupOverlay.classList.contains('hidden')) {
                hpopupOverlay.classList.add('hidden');
                document.body.style.overflow = '';
            }
        });

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
            if (!sessionStorage.getItem("hleadSource")) {
                sessionStorage.setItem("hleadSource", source);
            }

            var hfinalSource = sessionStorage.getItem("hleadSource");

            // Fill hidden field if it exists
            var hsourceInput = document.getElementById("hsource");
            if (hsourceInput) {
                hsourceInput.value = hfinalSource;
            }

            console.log("Captured Source:", hfinalSource);
        })();
    });
</script>
<?php include __DIR__ . "/ee-form-widget-loader.php"; ?>
