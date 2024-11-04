<!DOCTYPE html>
<html lang="en">
   <head>
    <!-- basic -->
    <base href="/public">
    @include('home.homecss')

    <style type="text/css">

        .post-page
        {
            background-color: white;
        }

        .div_deg
        {
            text-align: center;
        }

        .img_deg
        {
            height: 150px;
            width: 250px;
            margin: auto;
        }

        label
        {
            font-size: 18px;
            font-weight: bold;
            width: 200px;
            /* color: white; */
            color: black;
        }
    
        .input_deg
        {
            padding: 30px;

        }

        .title_deg
        {
            padding: 30px;
            font-size: 30px;
            font-weight: bold;
            color: white;
        }

        /* warna button */
        .btn-color
        {
        cursor: pointer;
        border-radius: 20px;
        border: 2px solid black;
        color: black;

        padding: .375rem .75rem;
        font-size: 1rem;

        }
    </style>

   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">

         @include('home.header')

         <div class="contact_section layout_padding post-page">
            <div class="container">

               <h1 class="contact_taital">Update Post</h1>

               <div class="email_text">

                  @if (session()->has('message'))

                     <div class="alert alert-success">

                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                        {{ session()->get('message') }}
                     </div>
         
                  @endif

                  <form action="{{ url('update_post_data',$data->id) }}" method="POST" enctype="multipart/form-data">

                     @csrf

                     <div class="form-group">
                        <textarea id="summernote" placeholder="description" name="description" >{{ old('description', $data->description) }}</textarea>
                        @error('description')
                           <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                  
                     <div class="form-group">
                        <input type="text" class="massage-bt" placeholder="title" name="title" value="{{ old('title', $data->title) }}">
                        @error('title')
                           <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>

                     {{-- <div class="form-group">
                        <textarea class="massage-bt" placeholder="description" rows="5" name="description">{{ old('description', $data->description) }}</textarea>
                        @error('description')
                           <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div> --}}

                     <div class="form-group">
                        <div class="massage-bt">
                        <label>Old</label>
                        <img class="img_deg" src="/postimage/{{ $data->image }}" >
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="input-group mb-3 massage-bt">
                           <label>Update Old Cover Blog</label>
                           <input type="file" class="form-control" name="image">
                           @error('image')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div>
                        <input type="submit" value="Kirim" class="btn-color">
                     </div>
                  </form>

               </div>
            </div>
         </div>









        {{-- <div class="div_deg">

            @if (session()->has('message'))
        
                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                    {{ session()->get('message') }}
                </div>
             
            @endif

            <h1 class="title_deg">Update Post</h1>
            
            <form action="{{ url('update_post_data',$data->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                
                <div class="input_deg">
                    <label>Title</label>
                    <input type="text" name="title" value="{{ old('title', $data->title) }}">
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                

                <div class="input_deg">
                    <label>description</label>
                    <textarea name="description">{{ old('description', $data->description) }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input_deg">
                    <label>Current Image</label>
                    <img class="img_deg" src="/postimage/{{ $data->image }}" >
                </div>

                <div class="input_deg">
                    <label>Change Current Image</label>
                    <input type="file" name="image">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input_deg">
                    <input type="submit" class="btn btn-outline-secondary">
                </div>
            </form>
            
        </div> --}}


      {{-- </div> --}}


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

      <!-- footer section start -->
      @include('home.footer')    
   </body>
</html>