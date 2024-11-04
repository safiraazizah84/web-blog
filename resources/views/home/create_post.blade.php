<!DOCTYPE html>
<html lang="en">
   <head>
    <!-- basic -->
    
    @include('home.homecss')

    <style type="text/css">

   .post-page
    {
        background-color: rgb(250, 250, 250);
    }

    .div_deg 
    {
      text-align: center;
    }

    .title_deg
    {
        font-size: 30px;
        font-weight: bold;
        color: black;
        padding: 30px;
    }

    label
    {
        display: inline-block;
        width: 200px;
        color: black;
        font-weight: bold;
    }

    .field_deg
    {
        padding: 25px;
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
    {{-- tanda sudah memasukkan data --}}
      @include('sweetalert::alert')  

      <!-- Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
      

      <!-- header section start -->
      
      {{-- <div class="header_section">
      </div> --}}

         @include('home.header')

         <div class="contact_section layout_padding post-page">
            <div class="container">

               <h1 class="contact_taital">Add Post</h1>

               <div class="email_text">

                  @if (session()->has('message'))

                     <div class="alert alert-success">

                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                        {{ session()->get('message') }}
                     </div>
         
                  @endif

                  <form action="{{ url('user_post') }}" method="POST" enctype="multipart/form-data">

                     @csrf

                     <div class="form-group">
                        <textarea id="summernote" placeholder="description" name="description" >{{ old('description') }}</textarea>
                        @error('description')
                           <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>

                    

                     <div class="form-group">
                        <input type="text" class="massage-bt" placeholder="title" name="title" required value="{{ old('title') }}">
                        @error('title')
                           <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     
                     <div class="form-group">
                        <div class="input-group mb-3 massage-bt">
                           <label>Cover Blog</label>
                           <input type="file" class="form-control" name="image">
                           @error('image')
                              <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     

                     
                     {{-- deskripsi ori --}}

                     {{-- <div class="form-group">
                        <textarea id="description" class="massage-bt" placeholder="description" rows="5" name="description" >{{ old('description') }}</textarea>
                        @error('description')
                           <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div> --}}



                     

                     <div>
                        <input type="submit" value="Add Post" class="btn-color">
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

           
               <h3 class="title_deg">Add Post</h3>

               <form action="{{ url('user_post') }}" method="POST" enctype="multipart/form-data">

                     @csrf

                  <div class="field_deg">
                     <label>Title</label>
                     <input type="text" name="title" required value="{{ old('title') }}">
                     @error('title')
                           <div class="text-danger">{{ $message }}</div>
                     @enderror
                  </div>

                 

                  <div class="field_deg">
                     <label>Description</label>
                     <textarea name="description">{{ old('description') }}</textarea>
                     @error('description')
                           <div class="text-danger">{{ $message }}</div>
                     @enderror
                  </div>

                  <div class="field_deg">
                     <label>Add Image</label>
                     <input type="file" name="image">
                     @error('image')
                           <div class="text-danger">{{ $message }}</div>
                     @enderror
                  </div>

                  <div class="field_deg">
                     <input type="submit" value="Add Post" class="btn btn-outline-secondary">
                  </div>
               </form>
            </div> 
         </div> --}}


        
         
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