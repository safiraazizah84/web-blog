<!DOCTYPE html>
<html lang="en">
   <head>
    <!-- basic -->
    @include('home.homecss')

    <style type="text/css">
    
    .post_deg
    {
        padding: 30px;
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
      <!-- header section start -->
      <div class="header_section">
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

                            @foreach ($data as $item)

                            <div class="col-md-4" style="padding: 15px">

                                <div class="card">
                                    <img style="width: 100%;object-fit: cover;" class="card-img-top" src="/postimage/{{ $item->image }}">
                                </div>

                                <div class="card-body">

                                    <h4 class="card-title title_deg">{{ $item->title }}</h4>

                                    {{-- @if($data->post_status == 'active')

                                    <p style="color: green; font-weight: bold; margin-bottom: 20px; margin-right: 190px;">Published</p>

                                    @else

                                    <p style="color: red; font-weight: bold; margin-bottom: 20px; margin-right: 190px;">Not Published</p> 

                                    @endif --}}


                                    <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
                                        @if($item->post_status == 'active')
                                            <p style="color: green; font-weight: bold; margin-left: 40px;">Published</p>

                                            <p style="margin-right: 50px;">
                                                {{ \Carbon\Carbon::parse($item->accepted_at)->setTimezone('Asia/Jakarta')->format('d M Y H:i') ?? 'N/A' }}
                                            </p>

                                        @elseif($item->post_status == 'rejected')

                                            <p style="color: red; font-weight: bold; margin-left: 20px;">Not Published</p>

                                            <p style="margin-right: 45px;">
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

                        </div>

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