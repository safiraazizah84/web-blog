<!DOCTYPE html>
<html lang="en">
   <head>
    <!-- basic -->
    @include('home.homecss')

    <style type="text/css">
      .deg
      {
         background-color: white;
      }

      

      /* paginasi */
      .pagination {
         display: flex;
         justify-content: center;
         padding: 10px;
      }

      .page-item.active .page-link {
         background-color: #007bff;
         border-color: #007bff;
         color: white;
      }

      .page-link {
         color: #007bff;
      }

      .page-link:hover {
         background-color: #e9ecef;
      }


       /* serach */
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

   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
      </div>
      <!-- header section end -->

      <div class="services_section layout_padding">
        <div class="container">
           <h1 class="services_taital">Blog</h1>
           <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>

           <div class="services_section_2">

            {{-- search --}}
            
            {{-- <form id="searchForm" action="{{ route('search') }}" method="GET" class="search-form">
               <input type="text" name="query" placeholder="Search posts..." class="search-input" value="{{ request('query') }}">
               <button type="submit" class="search-button">Search</button>
             </form> --}}
     
             {{-- @if(isset($query))
               <h3>Search results for: "{{ $query }}"</h3>
             @endif --}}

              <div class="row">
    
                @foreach ($posts as $post)
                
                 <div class="col-md-4" style="padding: 50px">
                    <div>
                      <img style="margin-bottom: 20px; height: 200px"  src="/postimage/{{ $post->image }}">
                    </div>
                    
                    <h4>{{ $post->title }}</h4>
    
                    <p>Post by <b>{{ $post->name }}</b> </p>

                    <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
                     @if($post->post_status == 'active')
                         <p style="color: green; font-weight: bold; margin-right: 20px;">Published</p>

                         <p style="margin-right: 100px;">
                           {{ \Carbon\Carbon::parse($post->accepted_at)->setTimezone('Asia/Jakarta')->format('d M Y H:i') ?? 'N/A' }}
                         </p>
                     @endif
                   </div>
    
                    <div class="btn_main"><a href="{{ url('post_details',$post->id) }}">Read More</a></div>
                 </div>
    
                @endforeach

                  <!-- Menampilkan pagination -->
                  <div class="pagination justify-content-center mt-4">
                     {{ $posts->onEachSide(1)->links('pagination::bootstrap-5') }}
                  </div>
                 
                </div>
              </div>
           </div>
        </div>
     </div>
      
      <!-- footer section start -->
      @include('home.footer')    
   </body>
</html>