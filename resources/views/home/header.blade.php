<style type="text/css">
   .dev_deg
   {
      background-color: white;
   }

   /* search */
   /* .search-form {
        max-width: 400px; 
        margin-left: auto; 
        display: flex; 
    }

    .search-input {
        border: 1px solid #ddd;
        padding: 8px 12px; 
        border-radius: 50px 0 0 50px; 
        outline: none;
        transition: all 0.3s ease;
        flex: 1; 
    }

    .search-input:focus {
        border-color: #007BFF; 
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
    }

    .search-button {
        border: none; 
        border-radius: 0 50px 50px 0; 
        padding: 8px 15px; 
        font-weight: bold;
        background-color: #007BFF; 
        color: white; 
        transition: background-color 0.3s ease;
    }

    .search-button:hover {
        background-color: #0056b3; 
    } */

    

</style>

{{-- <div class="mobile_menu">
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="logo_mobile"><a href="index.html"><img src="images/logo.png"></a></div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav">
                <li class="nav-item">
                   <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="services.html">Services</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link " href="blog.html">Blog</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link " href="contact.html">Contact</a>
                </li>
             </ul>
          </div>
       </nav>

      </div> --}}
      
<div class="header_main">

   <div class="container-fluid">

      <nav class="navbar navbar-expand-lg fixed-top" style="background: rgb(17, 92, 79)" >
         <div class="container-fluid">

           <a class="navbar-brand me-auto" href="{{ url('/homepage') }}" >
            <img src="images/logo2.png" alt="Logo" width="80" height="24" class="d-inline-block align-text-top">
           </a>

           {{-- button offcanvas --}}
          
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"  aria-labelledby="offcanvasNavbarLabel" style="background: rgb(17, 92, 79)">
               <div class="offcanvas-header">

                  <a class="navbar-brand" href="{{ url('/homepage') }}" >
                     <img src="images/logo2.png" alt="Logo" width="80" height="24" class="d-inline-block align-text-top">
                  </a>

                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
               </div>

             

               <div class="offcanvas-body">

                  <ul class="navbar-nav justify-content-center fs-6 flex-grow-1 pe-3">

                  <li class="nav-item">
                     <a class="nav-link mx-lg-2" href="{{ url('/homepage') }}">Home</a>
                  </li>

                  <li class="nav-item">
                     <a class="nav-link mx-lg-2" href="{{ url('about_us') }}">About</a>
                  </li>

                  <li class="nav-item">
                     <a class="nav-link mx-lg-2" href="{{ url('blog') }}">Blog</a>
                  </li>

                  @if (Route::has('login'))

                  @auth

                  <li class="nav-item">
                     <a class="nav-link mx-lg-2"  href="{{ url('my_post') }}">My Post</a>
                  </li>

                  <li class="nav-item">
                     <a class="nav-link mx-lg-2" href="{{ url('create_post') }}">Create Post</a>
                  </li>

                  </ul>
                   
               </div>
               
               
            </div>

                 <div class="d-flex justify-content-center align-items-center gap-3">
                     <a style="left:50px;"> 
                        <x-app-layout>
                        </x-app-layout>
                     </a>
                  </div>
                  

                  @endauth
                  @endif

                  {{-- <a href="#" class="login-button">Login</a> --}}

                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
         </div>
       </nav>
      

       
      {{-- <div class="menu_main">
         <div class="logo">
                     <a href="{{ url('/homepage') }}">
                        <img src="images/logo2.png">
                     </a>
                  </div>

         <ul>

            <li class="navlist"><a href="{{ url('/homepage') }}">Home</a></li>

            <li class="navlist"><a href="{{ url('about_us') }}">About</a></li>
            
            <li class="navlist"><a href="{{ url('blog') }}">Blog</a></li>

            @if (Route::has('login'))

            @auth

            <li class="navlist"><a href="{{ url('my_post') }}">My Post</a></li>

            <li class="navlist"><a href="{{ url('create_post') }}">Create Post</a></li>

            <li class="navlist"> 
            <x-app-layout>
            </x-app-layout>
            </li>

            @else
            <li><a href="{{ route('login') }}">Login</a></li>

            <li><a href="{{ route('register') }}">Register</a></li>
            @endauth

            @endif

            
         </ul>
      </div> --}}

   </div>

   
 </div>

