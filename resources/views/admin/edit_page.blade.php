<!DOCTYPE html>
<html>
  <head> 

    <base href="/public">
    @include('admin.css')

    <style type="text/css">
    
        .post_title
        {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            /* background-color: white;  */
            color: black;
        }

        .div_center
        {
            text-align: center;
            padding: 30px;
        }

        .old-img
        {
            display: inline-block;
            width: 200px;
            text-align: center;
            color: black;
        }

        label
        {
            font-size: 18px;
            font-weight: bold;
            width: 200px;
            color: black;
            display: inline-block;
        }

        .img_deg
        {
            height: 150px;
            width: 250px;
            margin: auto;
        }

        .email_text 
        {
            width: 80%;
            margin: 0 auto;
            text-align: center;
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
            <div class="container">

            <h1 class="post_title">Update Post</h1>

                <div class="email_text">

                    @if(session()->has('message'))

                    <div class="alert alert-success">

                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                        {{ session()->get('message') }}


                    </div>

                    @endif


                    <form action="{{ url('update_post',$post->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <textarea id="summernote" placeholder="description" name="description" >{{ $post->description }}</textarea>
                            @error('description')
                               <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <input type="text" class="massage-bt" placeholder="title" name="title" value="{{ $post->title }}">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <textarea class="massage-bt" placeholder="Post Description" rows="5" name="description">{{ $post->description }}</textarea>
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> --}}

                        <div class="form-group">
                            <div class="massage-bt">
                                <label>Old</label>
                                <img class="img_deg" src="/postimage/{{ $post->image }}"/>
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="input-group mb-3 massage-bt">
                            <label>Update Old Cover Blog</label>
                            <input type="file" class="form-control" name="image" value="{{ $post->image }}">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                        <div class="div_center">

                            <input type="submit" value="Update" class="btn btn-primary">
        
                        </div>
                    </form>

                </div>
            </div>
        </div>
















        {{-- <div class="page-content">

            @if(session()->has('message'))

            <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                {{ session()->get('message') }}


            </div>

            @endif

            <h1 class="post_title">Update Post</h1>

            <form action="{{ url('update_post',$post->id) }}" method="POST" enctype="multipart/form-data">

                @csrf


                <div class="div_center">

                    <label>Post Title</label>

                    <input type="text" name="title" value="{{ $post->title }}">

                </div>

                <div class="div_center">

                    <label>Post Description</label>

                    <textarea name="description" >{{ $post->description }}</textarea>

                </div>

                <div class="div_center">
                    <label>Old</label>
                    <img style="margin:auto;" height="100px" width="105px" src="/postimage/{{ $post->image }}"/>
                </div>

                <div class="div_center">

                    <label>Update Old Image</label>

                    <input type="file" name="image" value="{{ $post->image }}">

                </div>

                <div class="div_center">

                    <input type="submit" value="Update" class="btn btn-primary">

                </div>
            </form>
        </div> --}}


    </div>



    <script>
        $('#summernote').summernote({
          placeholder: 'description..',
          tabsize: 2,
          height: 400,
          toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture']],
            ['view', ['fullscreen', 'codeview', 'help']]
          ]
        });
      </script>

@include('admin.footer')
  </body>
</html>
