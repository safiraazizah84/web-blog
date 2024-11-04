<style>
   .custom-control {
       position: absolute;
       top: 50%;
       transform: translateY(-50%);
       background-color: rgba(0, 0, 0, 0.5); /* Semi-transparan */
       border: none;
       width: 50px;
       height: 50px;
       border-radius: 50%; /* Membuat tombol menjadi lingkaran */
       display: flex;
       justify-content: center;
       align-items: center;
       transition: background-color 0.3s ease;
       z-index: 10; /* Pastikan tombol di depan elemen lain */
   }

   .custom-control:hover {
       background-color: rgba(255, 255, 255, 0.445); /* Ubah background saat hover */
   }

   .custom-prev-icon, .custom-next-icon {
       font-size: 30px;
       color: white; /* Ikon berwarna putih */
       position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
   }

   .carousel-control-prev {
       left: 70px; /* Jarak tombol prev dari sisi kiri */
   }

   .carousel-control-next {
       right: 90px; /* Jarak tombol next dari sisi kanan */
   }

    /* Atur ulang ukuran layar kecil agar tidak terlalu dekat */
    @media (max-width: 576px) {
        .carousel-control-prev {
            left: 10px; /* Kurangi jarak pada layar kecil */
        }
        .carousel-control-next {
            right: 10px;
        }
    }

</style>



<div class="banner_section layout_padding">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel"  data-bs-interval= "9000">
       <div class="carousel-inner">
          <div class="carousel-item active">
             <div class="container">
                <h1 class="banner_taital">Jelajahi Ide & Cerita</h1>
                <p class="banner_text">Temukan artikel penuh wawasan, pengalaman pribadi, dan cerita kreatif dari berbagai sudut pandang. Mulai eksplorasi dan temukan konten terbaru kami!</p>
                <div class="read_bt"><a href="{{ url('/page_banner') }}">Baca Selengkapnya</a></div>
             </div>
          </div>
          <div class="carousel-item">
             <div class="container">
                <h1 class="banner_taital">Temukan Kreativitasmu</h1>
                <p class="banner_text">Dari tips menulis, desain, hingga inovasi, serta wawancara dengan para kreator, temukan inspirasi yang kamu butuhkan untuk menghidupkan semangat berkaryamu.</p>
                <div class="read_bt"><a href="#">Dapatkan Inspirasi</a></div>
             </div>
          </div>
          <div class="carousel-item">
             <div class="container">
                <h1 class="banner_taital">Bergabung dengan Komunitas Kami</h1>
                <p class="banner_text">Bergabunglah dengan komunitas pembaca dan kontributor yang memiliki visi serupa. Bagikan pemikiran, cerita, dan wawasanmu dengan dunia.</p>
                <div class="read_bt"><a href="#">Bergabung Sekarang</a></div>
             </div>
          </div>
       </div>

        <!-- Custom next/prev buttons -->
       <button class="carousel-control-prev custom-control" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
         <span class="custom-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
         <span class="visually-hidden">Previous</span>
      </button>

      <button class="carousel-control-next custom-control" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
         <span class="custom-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
         <span class="visually-hidden">Next</span>
      </button>

   </div>
 </div>