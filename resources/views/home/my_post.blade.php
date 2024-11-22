<!DOCTYPE html>
<html lang="en">
   <head>
    <!-- basic -->
    @include('home.homecss')

    <style type="text/css">
    
    .post_deg
    {
        margin-top: 120px;
        text-align: center;
        background-color: rgb(255, 255, 255);
    }

    .title_deg
    {
        font-size: 30px;
        font-weight: bold;
        padding: 15px;
        color: black;
        margin-bottom: 10px;
    }

    .des-deg
    {
        font-size: 18px;
        font-weight: bold;
        padding: 15px;
        color: black;
    }

    .img_deg
    {
        height: 200px;
        width: 300px;
        padding: 30px;
        margin: auto;
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

    
    </style>

   </head>
   <body>
      <!-- Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>  

      <!-- header section start -->
      {{-- <div class="header_section">
      </div> --}}

         @include('home.header')

         @if (session()->has('message'))
        
         <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

            {{ session()->get('message') }}
         </div>
             
         @endif


        {{-- <div class="post_deg">

                    <img class="img_deg" src="/postimage/{{ $data->image }}">
                    <h4 class="title_deg">{{ $data->title }}</h4>
                    <p class="des-deg">{{ $data->description }}</p>

                    <a href="{{ url('my_post_del',$data->id) }}" class="btn btn-danger" onclick="return confirm('are you sure to delete this ?')">Delete</a>

                    <a href="{{ url('post_update_page',$data->id) }}" class="btn btn-primary">Update</a>
                
                </div> --}}


                <div class="post_deg">
                    <div class="container">
                        <div class="row">
                            @if($data->isEmpty())
                            <div class="col-md-12 text-center" style="margin-top: 210px; margin-bottom: 250px;">
                                <h3 style="margin-bottom: 50px;">No posts available</h3>
                                <p style="margin-bottom: 10px;">You haven't uploaded any posts yet. Start by uploading a post to see it here!</p>
                                <a href="{{ url('create_post') }}" class="btn btn-primary">Upload Your First Post</a>
                            </div>

                            @else

                            @foreach ($data as $item)

                            <div class="col-md-4" style="padding: 15px">

                                <div class="card">
                                    <img style="width: 100%;object-fit: cover;" class="card-img-top" src="/postimage/{{ $item->image }}">
                                </div>

                                <div class="card-body">

                                    <h4 class="card-title title_deg">{{ $item->title }}</h4>




                                    <div style="display:inherit; justify-content:center; margin-bottom: 20px;">
                                        @if($item->post_status == 'active')
                                            <p style="color: green; font-weight: bold; ">Published</p>

                                            <p>
                                                {{ \Carbon\Carbon::parse($item->accepted_at)->setTimezone('Asia/Jakarta')->format('d M Y H:i') ?? 'N/A' }}
                                            </p>

                                        @elseif($item->post_status == 'rejected')

                                            <p style="color: red; font-weight: bold;">Not Published</p>

                                            <p>
                                                {{ \Carbon\Carbon::parse($item->rejected_at)->setTimezone('Asia/Jakarta')->format('d M Y H:i') ?? 'N/A' }}
                                            </p>
                                            </p>
                                        @endif
                                    </div>

                                    {{-- <p class="card-text des-deg">{{ $data->description }}</p> --}}

                                    <a href="{{ url('my_post_del',$item->id) }}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>

                                    <a href="{{ url('post_update_page',$item->id) }}" class="btn btn-primary">Update</a>

                                    <a href="{{ url('post_details',$item->id) }}" class="btn btn-primary">Post Details</a>

                                </div>
                            </div>

                            @endforeach

                            <div class="pagination justify-content-center mt-4">
                                {{ $data->onEachSide(1)->links('pagination::bootstrap-5') }}
                            </div>

                            @endif
                        </div>

                    </div>

        
                
        
         
             

      <!-- footer section start -->
      @include('home.footer')    


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

    

   </body>
</html>