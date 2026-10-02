<section class="mt-20 youtube-bg py-30 bg-cover" style="background-image: url(assets/images/youtube-bg.png);">
    <div>
        <img src="assets/images/youtube-icon.png" class="w-[70px] mx-auto cursor-pointer blink" alt="Youtube Icon" onclick="openVideoModal('https://www.youtube.com/watch?v=LV7-mZqAuKc&list=RDLV7-mZqAuKc&start_radio=1&ab_channel=EvergreenSongs')">
    </div>
</section>

<div id="videoModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 hidden">
    <div class="relative w-full max-w-3xl px-4">
        <div class="bg-white rounded-lg overflow-hidden shadow-lg">
            <div class="relative pb-[56.25%] h-0">
                <iframe id="youtubeIframe" class="absolute top-0 left-0 w-full h-full" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
            <button onclick="closeVideoModal()" class="absolute top-2 right-2 text-white bg-red-500 hover:bg-red-600 px-3 py-1 rounded-full text-sm">✕</button>
        </div>
    </div>
</div>


<script>
    function openVideoModal(videoUrl) {
        const modal = document.getElementById("videoModal");
        const iframe = document.getElementById("youtubeIframe");
        iframe.src = videoUrl + "?autoplay=1"; // Autoplay when opened
        modal.classList.remove("hidden");
    }

    function closeVideoModal() {
        const modal = document.getElementById("videoModal");
        const iframe = document.getElementById("youtubeIframe");
        iframe.src = ""; // Stop video
        modal.classList.add("hidden");
    }
</script>