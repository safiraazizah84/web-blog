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
    </style>
   
   </head>
   <body>
      <!-- Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


      <!-- header section start -->
      <div class="header_section">

         @include('home.header')

         <!-- banner section start -->
         @include('home.banner')
         <!-- banner section end -->
      </div>
      <!-- header section end -->
      

      <!-- services section start -->
      @include('home.services')
      <!-- services section end -->

      <!-- about section start -->
      @include('home.about')
      <!-- about section end -->
      
      
      <!-- footer section start -->
      @include('home.footer')    

      
      
     
      
   </body>
</html>