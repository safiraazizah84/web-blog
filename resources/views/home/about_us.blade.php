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
      <!-- header section start -->
      
      {{-- <div class="header_section">
      </div> --}}

       @include('home.header')

      <!-- header section end -->

      <!-- about section start -->
      @include('home.about')
      <!-- about section end -->
      
      
      <!-- footer section start -->
      @include('home.footer')    
   </body>
</html>