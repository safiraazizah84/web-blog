<!DOCTYPE html>
<html>
  <head> 
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @include('admin.css')

    <style type="text/css">
    
        .title_deg
        {
            font-size: 24px;
            font-weight: bold;
            color: black;
            padding: 20px;
            text-align: center;
        }

        .table_deg
        {
            border: 1px solid white;
            width: 90%;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 20px;
            text-align: center;
            border-collapse: collapse; 
            
        }

        /* .th_title
        {
            text-align: center;

        } */

        /* .th_deg
        {
            background-color: black;
            text-align: center;
        } */

        .th_deg {
            background-color: #000;
            color: white;
            text-align: center;
        }

        .th_title td {
            padding: 8px;
            font-size: 14px;
        }

        .img_deg
        {
            height: 80px;
            width: 120px;
            padding: 5px;
        }

        .btn {
            font-size: 12px;
            padding: 5px 10px;
        }

        .table_deg td, .table_deg th {
            padding: 8px;
            font-size: 12px;
            border: 1px solid #ddd;
        }

        .table-color
        {
            background-color: #3e3e3e;
            color: white;
        }

        .alert {
            margin: 20px auto;
            width: 80%;
        }


        /* pagination */
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

    .search-form {
        max-width: 400px; 
        margin-left: 890px; 
        display: flex; 
        margin-bottom: 40px;
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
    }

    </style>
  </head>
  <body>
    @include('admin.header')
     
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      
      @include('admin.sidebar')

      <!-- Sidebar Navigation end-->

      <div class="page-content">

        @if(session()->has('message'))

        <div class="alert alert-danger">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

            {{ session()->get('message') }}


        </div>

        @endif

        <h1 class="title_deg">All Post</h1>

        {{-- <table class="table_deg">

            <tr class="th_deg">
                <th>Post title</th>

                <th>Description</th>

                <th>Post by</th>

                <th>Post Status</th>

                <th>UserType</th>

                <th>Image</th>
            </tr>

            @foreach ($post as $post)

            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td>{{ $post->name }}</td>
                <td>{{ $post->post_status }}</td>
                <td>{{ $post->usertype }}</td>
                <td>
                    <img class="img_deg" src="postimage/{{ $post->image }}">
                </td>
            </tr>

            @endforeach

        </table> --}}

        <form action="/admin/search" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search posts..." class="search-input" value="{{ isset($search) ? $search : ''}}">
            <button type="submit" class="search-button">Search</button>
        </form>

        @if(isset($search))
            <h3>Search results for: "{{ $search }}"</h3>
        @endif
        
        <table class="table table-color table_deg">
            <thead class="th_deg">
                <tr>
                    <th>No</th>

                    <th>Post title</th>
    
                    <th>Description</th>
    
                    <th>Post by</th>
    
                    <th>Post Status</th>
    
                    <th>UserType</th>
    
                    <th>Cover Blog</th>

                    <th>Delete</th>

                    <th>Edit</th>

                    <th>Status Accept</th>

                    <th>Status Reject</th>
                </tr>
            </thead>
            <tbody class="th_title">
                @foreach ($posts as $index => $post)

                <tr class="table-active">
                    <td>{{ ($posts->currentPage()-1) * $posts->perPage() + $index + 1 }}</td>
                    <td>{{ $post->title }}</td>
                    {{-- <td>{{ $post->description }}</td> --}}
                    

                    <td><a href="{{ url('post_details', $post->id) }}" class="btn btn-success">Upload Description Success</a></td>

                    <td>{{ $post->name }}</td>
                    <td>{{ $post->post_status }}</td>
                    <td>{{ $post->usertype }}</td>
                    
                    <td>
                        <img class="img_deg" src="postimage/{{ $post->image }}">
                    </td>

                    <td>
                        <a href="{{ url('delete_post',$post->id) }}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                    </td>

                    <td>
                        <a href="{{ url('edit_page', $post->id) }}" class="btn btn-success">Edit</a>
                    </td>

                    <td>
                        <a onclick="confirmation(accept)" href="{{ url('accept_post',$post->id) }}" class="btn btn-outline-secondary">Accept</a>
                        {{-- <a onclick="return confirm('are you sure to accept this post ?')" href="{{ url('accept_post',$post->id) }}" class="btn btn-outline-secondary">Accept</a> --}}
                    </td>

                    <td>
                        <a onclick="confirmation(reject)" href="{{ url('reject_post',$post->id) }}" class="btn btn-primary">Reject</a>
                        {{-- <a onclick="return confirm('are you sure to reject this post ?')" href="{{ url('reject_post',$post->id) }}" class="btn btn-primary">Reject</a> --}}
                    </td>
                
                </tr>
                @endforeach
            </tbody>
        </table>

        
       
          <!-- Menampilkan pagination -->
        <div class="pagination justify-content-center mt-4">
            {{ $posts->onEachSide(1)->links('pagination::bootstrap-5') }}
        </div>

      </div>

      @include('admin.footer')


      {{-- konfirmasi --}}
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
        <script type="text/javascript">
    
            function confirmation(event)
                {

                    event.preventDefault();

                    var urlToRedirect = event.currentTarget.getAttribute('href');

                    console.log(urlToRedirect);

                    swal({
                        title: "Are you Sure to delete this ?",
                        text: "You won't be able to revert this delete",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })

                    .then((willCancel) => {
                        if(willCancel)
                        {
                            window.location.href = urlToRedirect;
                        }

                    });
                }


        </script>

        <script>

            // function confirmation(accept) 
            // {

            //     accept.preventDefault(); 

            //     var urlToRedirect = accept.currentTarget.getAttribute('href'); 

            //     console.log(urlToRedirect); 

                
            //     swal({
            //         title: "Are you sure to accept this post?",
            //         text: "You won't be able to undo this action!",
            //         icon: "info", 
            //         buttons: true,
            //         dangerMode: true, 
            //     })
            //     .then((willAccept) => {
            //         if (willAccept) {
            //             window.location.href = urlToRedirect; 
            //         }
            //     });
            // }

        </script>

        





    

  </body>
</html>