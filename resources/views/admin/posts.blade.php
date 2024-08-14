<x-admin-master>
    @section('content')


      @if(Session::has('message'))
            <div class="alert alert-danger">{{Session::get('message')}}</div>

            @elseif(session('create-message'))
                  <div class="alert alert-success">{{session('create-message')}}</div>
            @elseif(session('update-message'))
                <div class="alert alert-success">{{session('update-message')}}</div>

            @endif

            <div class="card shadow mb-4">
                  <div class="card-header py-3">
                        <h4 class="m-0 font-weight-bold text-primary">All Posts</h4>
                  </div>
                  <div class="card-body">
                        <div class="table-responsive">
                              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                          <th>Id</th>
                                          <th>Title</th>
                                          <th>Image</th>
                                          <th>Posted by</th>
                                          <th>Created At</th>
                                          <th>Updated At</th>
                                          <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                       @foreach($posts as $post)
                                          <tr>
                                                <td>{{$post->id}}</td>
                                                <td>{{$post->title}}</td>
                                                <td>
                                                      <img height="50px" src="{{asset($post->image)}}" alt="{{asset($post->image)}}">
                                                </td>
                                                <td>{{$post->user->name}}</td>
                                                <td>{{$post->created_at}}</td>
                                                <td>{{$post->updated_at}}</td>
                                                <td>

                                                    @can('view' , $post)
                                                     <div class="d-flex">
                                                      <form method="post" action="{{route('admin.delete',$post->id)}}" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                      </form>


                                                            <a class="mx-2" href="{{route('admin.edit', $post->id)}}">
                                                                  <button type="" class="btn btn-primary">Edit</button>
                                                            </a>
                                                     </div>
                                                    @endcan

                                                </td>
                                          </tr>
                                       @endforeach
                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>

    @endsection


    @section('scripts')
                <!-- Page level plugins -->
                <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
                <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

                <!-- Page level custom scripts -->
                <script src="{{asset('build/assets/datatables-demo.js')}}"></script>
    @endsection
</x-admin-master>
