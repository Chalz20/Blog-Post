<x-home-master>

@section('content')
    <div class="col-md-8">
      <h1 class="my-4">Recent__
        <small> {{date('D, d M Y')}}</small>
      </h1>

      @foreach($posts as $post)
      <!-- Blog Post -->
      <div class="card mb-4">
        <img class="card-img-top" src="{{asset($post->image)}}" alt="{{asset($post->image)}}">
        <div class="card-body">
          <h2 class="card-title">{{$post->title}}</h2>
          <p class="card-text">{{$post->body}}</p>
          <a href="{{route('post',$post->id)}}" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
          {{$post->created_at->diffForHumans()}}
        </div>
      </div>
      @endforeach

      <!-- Pagination -->
      <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
          <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
          <a class="page-link" href="#">Newer &rarr;</a>
        </li>
      </ul>

    </div>
@endsection
</x-home-master>