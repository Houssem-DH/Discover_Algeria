@extends('layouts.admin')


@section('title')
    Categories
@endsection

@section('content')
    <br>
    <br><br><br>
    @if (session('status'))
        <script>
            swal("", "{{ session('status') }}", "success");
        </script>
    @endif
    @if (session('status1'))
        <script>
            swal("", "{{ session('status1') }}", "success");
        </script>
    @endif




    <div class="card container">
        <div class="card container">
            <div class="card container">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Create Category
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Create Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form action="{{ url('/dashboard/categories/create-category') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">

                                        <div class="col-md-6 mb-3">
                                            <label for="">Name</label>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Slug</label>
                                            @error('slug')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                                name="slug" value="{{ old('slug') }}">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Descreption</label>
                                            @error('descreption')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <textarea name="descreption" rows="3" class="form-control @error('descreption') is-invalid @enderror">{{ old('descreption') }}</textarea>
                                        </div>



                                        <div class="col-md-12 mb-3">
                                            <label for="">Meta Title</label>
                                            <input type="text" class="form-control" name="meta_title">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Meta Keywords</label>
                                            <textarea name="meta_keywords" rows="3" class="form-control"></textarea>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Meta Descreption</label>
                                            <textarea name="meta_description" rows="3" class="form-control"></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                                name="image">
                                        </div>










                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Create</button>
                                </form>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="card-header">
            <h4>Categories</h4>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>image</th>
                        <th>action</th>


                    </tr>
                </thead>
                <tbody>

                    @foreach ($category as $item)
                        <tr>

                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->slug }}</td>
                            <td><img src="storage/categories/{{ $item->image }}" alt="{{ $item->name }}" width="100px"
                                    height="50px"></td>


                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModalCenter2">
                                    Edit Category
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Create Wilaya</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="{{ url('dashboard/categories/update-category/' . $item->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')


                                                    <div class="row">

                                                        <div class="col-md-6 mb-3">
                                                            <label for="">Name</label>
                                                            @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <input type="text"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                name="name" value="{{ $item->name}}">
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <label for="">Slug</label>
                                                            @error('slug')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <input type="text"
                                                                class="form-control @error('slug') is-invalid @enderror"
                                                                name="slug" value="{{$item->slug }}">
                                                        </div>

                                                        <div class="col-md-12 mb-3">
                                                            <label for="">Descreption</label>
                                                            @error('descreption')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <textarea name="descreption" rows="3" class="form-control @error('descreption') is-invalid @enderror">{{ $item->descreption }}</textarea>
                                                        </div>



                                                        <div class="col-md-12 mb-3">
                                                            <label for="">Meta Title</label>
                                                            <input type="text" class="form-control" value="{{ $item->meta_title }}" name="meta_title">
                                                        </div>

                                                        <div class="col-md-12 mb-3">
                                                            <label for="">Meta Keywords</label>
                                                            <textarea name="meta_keywords" rows="3" class="form-control">{{ $item->meta_keywords }}</textarea>
                                                        </div>

                                                        <div class="col-md-12 mb-3">
                                                            <label for="">Meta Descreption</label>
                                                            <textarea name="meta_description" rows="3" class="form-control">{{ $item->meta_description }}</textarea>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <img src="storage/categories/{{ $item->image }}" alt="{{ $item->name }}" width="100px"
                                    height="50px">
                                                            @error('image')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <input type="file"
                                                                class="form-control @error('image') is-invalid @enderror"
                                                                name="image">
                                                        </div>



                                                    </div>
                                                    <form class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
        </div>

        </td>
        <td><a href="{{ url('dashboard/categories/delete-category/' . $item->id) }}" class="btn btn-danger">Delete</a></td>

        </tr>
        @endforeach
        </tbody>
        </table>
    </div>

    {{ $category->links() }}
    </div>
@endsection
