<!DOCTYPE html>
<html>
  <head> 

    @include('admin.css')

    <style type="text/css">
    
        .post_title
        {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: black;
        }

        .div-content
        {
          background: rgb(255, 255, 255);
        }

        .div_center
        {
            text-align: center;
            padding: 30px;
            color :black;
        }

        label
        {
            font-size: 18px;
            font-weight: bold;
            width: 200px;
            color: black;
            display: inline-block;
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


      <div class="contact_section layout_padding page-content div-content">
        <div class="container">

           <h1 class="post_title">Add Post</h1>

           <div class="email_text">

            @if(session()->has('massage'))

            <div class="alert alert-success">
    
                <button type="button" class="close" data-dismiss="alert" aria-hideen="true">x</button>
    
                {{ session()->get('massage') }}
    
            </div>
                
            @endif

              <form action="{{ url('add_post') }}" method="POST" enctype="multipart/form-data">

                 @csrf

                 <div class="form-group">
                  <textarea id="summernote" placeholder="description" name="description" >{{ old('description') }}</textarea>
                  @error('description')
                     <div class="text-danger">{{ $message }}</div>
                  @enderror
                 </div>

              
                 <div class="form-group">
                    <input type="text" class="massage-bt" placeholder="Post Title" name="title" value="{{ old('title') }}">
                    @error('title')
                       <div class="text-danger">{{ $message }}</div>
                    @enderror
                 </div>

                 {{-- <div class="form-group">
                    <textarea class="massage-bt" placeholder="description" rows="5" name="description">{{ old('description') }}</textarea>
                    @error('description')
                       <div class="text-danger">{{ $message }}</div>
                    @enderror
                 </div> --}}

                 
                 <div class="form-group">
                    <div class="input-group mb-3 massage-bt">
                       <label>Cover Blog</label>
                       <input type="file" class="form-control" name="image">
                       @error('image')
                          <div class="text-danger">{{ $message }}</div>
                       @enderror
                    </div>
                 </div>

                 <div class="div_center">

                    <input type="submit" class="btn btn-primary">

                </div>

              </form>

           </div>
        </div>
     </div>












      {{-- <div class="page-content div-content">

        @if(session()->has('massage'))

        <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert" aria-hideen="true">x</button>

            {{ session()->get('massage') }}

        </div>
            
        @endif

        <h1 class="post_title">Add Post</h1>

        <div>

            <form action="{{ url('add_post') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="div_center">

                    <label>Post Title</label>

                    <input type="text" name="title" value="{{ old('title') }}">

                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="div_center">

                    <label>Post Description</label>

                    <textarea name="description">{{ old('description') }}</textarea>

                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="div_center">

                    <label>Add Image</label>

                    <input type="file" name="image" value="{{ old('image') }}">

                    @error('image')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="div_center">

                    <input type="submit" class="btn btn-primary">

                </div>

            </form>

        </div> --}}





    </div>

    <script>
      $('#summernote').summernote({
        placeholder: 'description..',
        tabsize: 2,
        height: 300,
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