<!DOCTYPE html>
<html lang="en">
   <head>
    <!-- basic -->
    @include('home.homecss')

    <style>
      .deg
      {
         background-color: white;
      }

      .banner_h1
      {
        width: 100%;
        float: left;
        font-size: 80px;
        color: #000000;
        font-weight: bold;
        text-align: center;
        text-transform: uppercase;
        font-family: 'Righteous', Regular;
      }

      .banner_p
      {
        width: 63%;
            margin: 0 auto;
            font-size: 16px;
            color: #000000;
            text-align: center;
      }

      .image-gallery {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            padding: 20px; /* Padding untuk galeri */
         }

         .image-item {
            flex: 1 1 calc(33% - 40px); /* 3 kolom dengan jarak antar kolom */
            margin: 10px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
         }

         .image-item img {
            max-width: 100%;
            height: auto;
         }

         .image-item p {
            padding: 10px;
            margin: 0;
         }

    </style>

   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
      </div>
      <!-- header section end -->

      <div class="deg">
        <h1 class="banner_h1">Jelajahi Ide & Cerita</h1>
         <p class="banner_p">Temukan artikel penuh wawasan, pengalaman pribadi, dan cerita kreatif dari berbagai sudut pandang. Mulai eksplorasi dan temukan konten terbaru kami!</p>
      </div>

      <main>
        <section class="image-gallery">
           <div class="image-item">
              <img src="images/blog-mobile-bg.png" alt="Gambar 1">
              <p>Deskripsi Gambar 1</p>
           </div>

           <div class="image-item">
              <img src="images/blog-mobile-bg.png" alt="Gambar 2">
              <p>Deskripsi Gambar 2</p>
           </div>

           <div class="image-item">
              <img src="images/blog-mobile-bg.png" alt="Gambar 3">
              <p>Deskripsi Gambar 3</p>
           </div>

            <div class="image-item">
                <img src="images/blog-mobile-bg.png" alt="Gambar 4">
                <p>Deskripsi Gambar 4</p>
            </div>

            <div class="image-item">
                <img src="images/blog-mobile-bg.png" alt="Gambar 5">
                <p>Deskripsi Gambar 5</p>
            </div>

            <div class="image-item">
                <img src="images/blog-mobile-bg.png" alt="Gambar 6">
                <p>Deskripsi Gambar 6</p>
            </div>
        </section>
     </main>
    
      
      
      <!-- footer section start -->
      @include('home.footer')    
   </body>
</html>