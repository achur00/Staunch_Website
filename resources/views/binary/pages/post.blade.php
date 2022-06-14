

<span><h1>Post</h1> 
     @if (count($posts)>1)
     @foreach ($posts as $post)
      <div class="container">
          <h1> {{ $post->title }}</h1>
         
     @endforeach
         
     @else 
         
     @endif 
      </span>

      

  
