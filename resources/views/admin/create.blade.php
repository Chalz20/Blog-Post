<x-admin-master>
    @section('content')
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                                <h4 class="m-0 font-weight-bold text-primary">Create a post</h4>
                        </div>
                        <div class="card-body">


            <form method="post" action="{{route('admin.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                            <label for="title" class="font-weight-bolder">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Title..">
                    </div>

                    <div class="form-group mt-3">
                            <label for="image" class="font-weight-bolder">Post Image</label>
                            <input type="file" name="image" class="form-control-file" id="post_image" >
                    </div>

                    <div class="form-group mt-3">
                            <label for="body" class="font-weight-bolder">Post Body</label>
                            <textarea name="body" class="form-control" placeholder="Type here ....." cols="30" rows="10"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
                </div>
    @endsection
</x-admin-master>
