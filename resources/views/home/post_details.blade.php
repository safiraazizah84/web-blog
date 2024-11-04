<!DOCTYPE html>
<html lang="en">
   <head>
    <!-- basic -->
    <base href="/public">
    @include('home.homecss')

    <style>
      .deg
      {
         background-color: white;
         margin-top: 90px;
      }

      .cover-image img {
         width: 100%;           /* Gambar akan menyesuaikan dengan lebar kontainer */
         height: auto;           /* Tinggi otomatis untuk mempertahankan rasio gambar */
         max-height: 400px;      /* Atur tinggi maksimum jika ingin batas tinggi tertentu */
         object-fit: cover;      /* Memotong gambar jika terlalu besar */
         border-radius: 8px;     /* Opsional: Membuat sudut sedikit melengkung */
         margin-top: 60px;
         
      }


      @media (max-width: 768px) {
         .container {
            margin-bottom: 40px; /* Jarak lebih kecil untuk layar mobile */
         }
      }

      @media (min-width: 769px) {
         .container {
            margin-bottom: 80px; /* Jarak lebih besar untuk layar yang lebih besar */
         }
      }

      /* Gaya untuk konten yang dihasilkan oleh Summernote */
      .post-description {
         line-height: 1.6; /* Atur jarak antar baris */
         margin-bottom: 20px; /* Jarak bawah antar paragraf */
         word-wrap: break-word;
      }


      /* Mengatur heading di dalam deskripsi */
      .post-description h1,
      .post-description h2,
      .post-description h3 {
         margin-top: 20px;
         margin-bottom: 10px;
         font-weight: bold;
      }

      /* Mengatur list (ul, ol) */
      .post-description ul,
      .post-description ol {
         margin-left: 20px;
         padding-left: 20px;
         margin-bottom: 20px;
      }

      /* Mengatur jarak untuk paragraph */
      .post-description p {
         margin-bottom: 20px;
      }

      /* Mengatur styling untuk image jika ada dalam konten */
      .post-description img {
         max-width: 100%;
         height: auto;
         display: block;
         margin: auto;
         margin-bottom: 100px;
      }

      /* publish */
      .status-info {
         display: flex;
         justify-content: flex-start;
         gap: 10px;
         margin-bottom: 50px;
         align-items: center;
      }


    </style>
      
   </head>
   <body>
      
      <!-- header section start -->
      {{-- <div class="header_section">
      </div> --}}


       @include('home.header')

      <!-- header section end -->

      {{-- <div style="text-align: center;" class="col-md-12">
         <div class="service_img">
             <img style="padding: 20px; height:400px; width: 600px; margin: auto;" src="/postimage/{{ $post->image }}">
         </div>
         
         
         <h3> <b>{{ $post->title }}</b> </h3>
         
         <h4>{{ $post->description }}</h4>
         
         <p>Post by <b>{{ $post->name }}</b> </p>
         
      </div> --}}

      <div class="deg">
         <div class="container">
            <div class="row">

               <div style="text-align: center;" class="col-md-12">
                  {{-- <div class="service_img">
                     <img style="padding: 20px; height:400px; width: 600px; margin: auto;" src="/postimage/{{ $post->image }}">
                  </div> --}}


                  <div class="cover-image">
                     <img src="/postimage/{{ $post->image }}" alt="Post Cover">
                  </div>

                  <h4 style="font-size: 40px; margin-top: 40px;"> <b>{{ $post->title }}</b> </h4>

                  <p style="margin-bottom: 10px;">Post by <b>{{ $post->name }}</b> </p>

                  <div class="status-info d-flex justify-content-start mb-4">
                     @if($post->post_status == 'active')
                         <p class="text-success fw-bold me-2">Published</p>

                         <p>
                           {{ \Carbon\Carbon::parse($post->accepted_at)->setTimezone('Asia/Jakarta')->format('d M Y H:i') ?? 'N/A' }}
                         </p>

                     @elseif($post->post_status == 'rejected')

                         <p class="text-danger fw-bold me-2">Not Published</p>

                         <p>
                           {{ \Carbon\Carbon::parse($post->rejected_at)->setTimezone('Asia/Jakarta')->format('d M Y H:i') ?? 'N/A' }}
                         </p>
                     @endif
                 </div>


                  <div class="post-description">
                     {!! $post->description !!}
                 </div>
   
                  
               </div>

            </div>
         </div>
     </div>

     {{-- coba update --}}
     
      
      <!-- footer section start -->
      @include('home.footer')    
   </body>
</html>