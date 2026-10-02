   <div class="mt-10 comman-container">
       <div class="grid 2xl:grid-cols-3 xl:grid-cols-3 lg:grid-cols-2 md:grid-cols-2 grid-cols-1 gap-5 md:mt-10 mt-5">
           <?php
           //print_r($data);
            $rawDate = !empty($data['event_date'])
                ? $data['event_date']
                : $data['created_at'];

            $dayMonth = date("d M", strtotime($rawDate)); // 29 July
            $year     = date("Y", strtotime($rawDate));   // 2025
            $category = !empty($gallery['categories'][0]['name']) ? $gallery['categories'][0]['name'] : 'Gallery';
            ?>
           <div class="relative">
               <a>
                   <img src="<?= $data['resolved_content']['media'][0]['media_url'] ?? '' ?>" class="w-[100%] md:h-[275px] h-[250px] object-cover rounded-[10px]">
               </a>
               <div class="absolute bottom-[30px] left-0 right-0 p-4 text-white rounded-b-[10px] relative z-10" style="background: #F69D48;">
                   <div class="absolute top-[-51px] md:right-[20px] right-[5px]">
                       <div class="relative">
                           <img src="assets/images/gallery/g-red.webp" alt="Ribbon" class="md:w-[100px] w-[75px]">
                           <p class="absolute md:top-[28px] top-[22px] left-5 md:text-[19px] text-[15px] md:leading-[24px] leading-[18px] font-semibold text-center">
                              <?= $dayMonth ?> <br> <?= $year ?> </p>
                       </div>
                   </div>
                   <div class="flex items-center gap-3 border-b-[1px] border-[#e7b78a] pb-[14px]">
                       <div class="md:text-[16px] text-[14px] font-[400]">
                           Category : <span class="font-[500]">Gallery</span>
                       </div>
                       <div class="md:text-[16px] text-[14px] font-[400]">
                           Total Photo(s) : <span class="font-[500]"><?= htmlspecialchars($category) ?></span>
                       </div>
                   </div>
                    <?php
                    $mediaList = [];
                    if (!empty($data['resolved_content']['media'])) {
                        foreach ($data['resolved_content']['media'] as $m) {
                            $mediaList[] = [
                                'type' => $m['media_type'],
                                'url'  => $m['media_url']
                            ];
                        }
                    }
                    ?>
                   <div class="mt-3">
                       <h2 class="md:text-[24px] text-[22px] md:leading-7 leading-7">
                        <?= strip_tags($data['title']) ?? "No Title" ?></h2>
                       <button class="rounded-[20px] bg-[#F22F35] text-white w-[100%] block text-center h-[47px]  text-[17px] mt-[20px] transition-all hover:bg-[#c4171d] p-[10px] openGallery"
                        data-media='<?= json_encode($mediaList, JSON_HEX_APOS | JSON_HEX_QUOT) ?>'>
                           View More
                       </button>
                   </div>
               </div>
           </div>

       </div>
   </div>

   <div id="galleryModal" class="fixed inset-0 bg-black/70 hidden z-50 flex items-center justify-center">
       <div class="bg-white max-w-5xl w-full rounded-lg p-5 relative">
           <button id="closeModal" class="absolute top-3 right-4 text-2xl font-bold">
               ✕
           </button>
           <div id="modalGallery" class="grid grid-cols-2  gap-10 mt-6">
           </div>
       </div>
   </div>

 <div id="imagePreviewModal" class="fixed inset-0 bg-black/70 hidden z-[60] flex items-center justify-center">
    
    <div class="relative bg-black rounded-lg w-[80vw] max-w-5xl p-4 flex items-center justify-center">
        
        <button id="closePreview"
            class="absolute top-3 right-3 text-white text-2xl font-bold">
            ✕
        </button>

        <button id="prevImage"
            class="absolute left-3 text-white text-4xl font-bold">
            &#10094;
        </button>

        <img id="previewImage"
            src=""
            class="max-h-[75vh] max-w-full rounded-lg object-contain">

        <button id="nextImage"
            class="absolute right-3 text-white text-4xl font-bold">
            &#10095;
        </button>

    </div>
</div>



   <script>
let currentIndex = 0;
let currentImages = [];

/* OPEN GALLERY MODAL */
document.querySelectorAll('.openGallery').forEach(btn => {
    btn.addEventListener('click', function () {
        const media = JSON.parse(this.dataset.media || '[]');
        const modal = document.getElementById('galleryModal');
        const gallery = document.getElementById('modalGallery');

        gallery.innerHTML = '';
        currentImages = media.filter(m => m.type === 'image');

        currentImages.forEach((item, index) => {
            const img = document.createElement('img');
            img.src = item.url;
            img.className = 'w-full h-[180px] object-cover rounded-lg cursor-pointer';
            img.addEventListener('click', () => openPreview(index));
            gallery.appendChild(img);
        });

        modal.classList.remove('hidden');
    });
});

/* CLOSE GALLERY MODAL */
document.getElementById('closeModal').addEventListener('click', () => {
    document.getElementById('galleryModal').classList.add('hidden');
});

/* IMAGE PREVIEW */
function openPreview(index) {
    currentIndex = index;
    document.getElementById('previewImage').src = currentImages[currentIndex].url;
    document.getElementById('imagePreviewModal').classList.remove('hidden');
}

/* CLOSE PREVIEW */
document.getElementById('closePreview').addEventListener('click', () => {
    document.getElementById('imagePreviewModal').classList.add('hidden');
});

/* NEXT IMAGE */
document.getElementById('nextImage').addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % currentImages.length;
    document.getElementById('previewImage').src = currentImages[currentIndex].url;
});

/* PREVIOUS IMAGE */
document.getElementById('prevImage').addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + currentImages.length) % currentImages.length;
    document.getElementById('previewImage').src = currentImages[currentIndex].url;
});

/* CLOSE ON BACKGROUND CLICK */
document.getElementById('imagePreviewModal').addEventListener('click', e => {
    if (e.target.id === 'imagePreviewModal') {
        e.target.classList.add('hidden');
    }
});

/* ESC KEY SUPPORT */
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
        document.getElementById('imagePreviewModal').classList.add('hidden');
    }
});
</script>
