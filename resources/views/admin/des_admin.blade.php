<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
   

      <div class="page-content">

        <div>
           

           @foreach ($post as $post)
           

           <div class="cover-image">
              <img src="/postimage/{{ $post->image }}">
           </div>

           <h4 style="font-size: 40px; margin-top: 40px;"> <b>{{ $post->title }}</b> </h4>

           <p style="margin-bottom: 150px;">Post by <b>{{ $post->name }}</b> </p>

        

           <div class="post-description">
           {!! $post->description !!}
           </div>

           
           @endforeach
        </div>

     </div>

     
      
  </body>
</html>