@extends('layouts.admin')


@section('title')
    Places
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
                    Create Place
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Create Place</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form action="{{ url('/dashboard/places/create-place') }}" method="POST"
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


                                        <label for="">Slug</label>
                                        @error('slug')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                            name="slug" value="{{ old('slug') }}">
                                    </div>

                                    <div class="col-md-6 mb-3">

                                        <select class="form-select mt-5" name='cate_id' aria-label="Default select example">
                                            <option selected>Select Category</option>
                                            @foreach ($category as $itemc)
                                                <option value="{{ $itemc->id }}">{{ $itemc->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">

                                        <select class="form-select mt-5" name='wil_id' aria-label="Default select example">
                                            <option selected>Select Wilaya</option>
                                            @foreach ($wilaya as $itemw)
                                                <option value="{{ $itemw->id }}">{{ $itemw->name }}</option>
                                            @endforeach

                                        </select>
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
                                        <label for="">Google map</label>
                                        @error('google_map')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input type="text" class="form-control @error('google_map') is-invalid @enderror"
                                            name="google_map" value="{{ old('google_map') }}">
                                    </div>


                                    <div class="col-md-12 mb-3">
                                        <label for="">Nearby Hotels</label>
                                        @error('nearby_hotels')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input type="text" class="form-control @error('nearby_hotels') is-invalid @enderror"
                                            name="nearby_hotels" value="{{ old('nearby_hotels') }}">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="">Hotel Cost Per Night</label>
                                        @error('hotel_cost_per_night')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input type="number" class="form-control @error('hotel_cost_per_night') is-invalid @enderror"
                                            name="hotel_cost_per_night" value="{{ old('hotel_cost_per_night') }}">
                                    </div>

                                    <div class="col-md-6 mb-3">

                                        <select class="form-select mt-5" name='transport' aria-label="Default select example">
                                            <option selected>Tranport</option>
                                            
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            

                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Transport Cost</label>
                                        @error('transport_cost')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input type="number" class="form-control @error('transport_cost') is-invalid @enderror"
                                            name="transport_cost" value="{{ old('transport_cost') }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Diffuclty Degree</label>
                                        @error('difficulty_degree')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input type="number" class="form-control @error('difficulty_degree') is-invalid @enderror"
                                            name="difficulty_degree" value="{{ old('difficulty_degree') }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Food Cost</label>
                                        @error('food_cost')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input type="number" class="form-control @error('food_cost') is-invalid @enderror"
                                            name="food_cost" value="{{ old('food_cost') }}">
                                    </div>

                                    


                                    

                                    

                                    <div class="col-md-6 mb-3">
                                        <label for="">Private Guide Price</label>
                                        @error('pg_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input type="number" class="form-control @error('pg_price') is-invalid @enderror"
                                            name="pg_price" value="{{ old('pg_price') }}">
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
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            <h4>Places</h4>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Category</th>
                        <th>Wilaya</th>
                        <th>image</th>
                        <th>action</th>


                    </tr>
                </thead>
                <tbody>

                    @foreach ($place as $items)
                        <tr>

                            <td>{{ $items->id }}</td>
                            <td>{{ $items->name }}</td>
                            <td>{{ $items->slug }}</td>
                            <td>{{ $items->category->name }}</td>
                            <td>{{ $items->wilaya->name }}</td>
                            <td><img src="storage/places/{{ $items->image }}" alt="{{ $items->name }}" width="100px"
                                    height="50px"></td>


                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModalCenter{{ $items->id }}">
                                    Edit Place
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter{{ $items->id }}" tabindex="-1" role="dialog"
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

                                                <form action="{{ url('dashboard/places/update-place/' . $items->id) }}"
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
                                                                name="name" value="{{ $items->name }}">
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
                                                                name="slug" value="{{ $items->slug }}">
                                                        </div>

                                                        <div class="col-md-6 mb-3">

                                                            <select class="form-select mt-5" name='cate_id'
                                                                aria-label="Default select example">
                                                                <option value="{{ $items->cate_id }}" selected>Select
                                                                    Category</option>
                                                                @foreach ($category as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>

                                                        <div class="col-md-6 mb-3">

                                                            <select class="form-select mt-5" name='wil_id'
                                                                aria-label="Default select example">
                                                                <option value="{{ $items->wil_id }}" selected>Select Wilaya</option>
                                                                @foreach ($wilaya as $itemw)
                                                                    <option value="{{ $itemw->id }}">
                                                                        {{ $itemw->name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>


                                                        <div class="col-md-12 mb-3">
                                                            <label for="">Descreption</label>
                                                            @error('descreption')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <textarea name="descreption" rows="3" class="form-control @error('descreption') is-invalid @enderror">{{ $items->descreption }}</textarea>
                                                        </div>



                                                        <div class="col-md-12 mb-3">
                                                            <label for="">Google map</label>
                                                            @error('google_map')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <input type="text" class="form-control @error('google_map') is-invalid @enderror"
                                                                name="google_map" value="{{ old('google_map') }}">
                                                        </div>
                    
                    
                                                        <div class="col-md-12 mb-3">
                                                            <label for="">Nearby Hotels</label>
                                                            @error('nearby_hotels')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <input type="text" class="form-control @error('nearby_hotels') is-invalid @enderror"
                                                                name="nearby_hotels" value="{{ $items->nearby_hotels }}">
                                                        </div>
                    
                                                        <div class="col-md-12 mb-3">
                                                            <label for="">Hotel Cost Per Night</label>
                                                            @error('hotel_cost_per_night')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <input type="number" class="form-control @error('hotel_cost_per_night') is-invalid @enderror"
                                                                name="hotel_cost_per_night" value="{{ $items->hotel_cost_per_night }}">
                                                        </div>
                    
                                                        <div class="col-md-6 mb-3">
                    
                                                            <select class="form-select mt-5" name='transport' aria-label="Default select example">
                                                                <option selected>Tranport</option>
                                                                
                                                                    <option value="yes">Yes</option>
                                                                    <option value="no">No</option>
                                                                
                    
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="">Transport Cost</label>
                                                            @error('transport_cost')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <input type="number" class="form-control @error('transport_cost') is-invalid @enderror"
                                                                name="transport_cost" value="{{ $items->transport_cost }}">
                                                        </div>
                    
                                                        <div class="col-md-6 mb-3">
                                                            <label for="">Diffuclty Degree</label>
                                                            @error('difficulty_degree')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <input type="number" class="form-control @error('difficulty_degree') is-invalid @enderror"
                                                                name="difficulty_degree" value="{{ $items->difficulty_degree }}">
                                                        </div>
                    
                                                        <div class="col-md-6 mb-3">
                                                            <label for="">Food Cost</label>
                                                            @error('food_cost')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <input type="number" class="form-control @error('food_cost') is-invalid @enderror"
                                                                name="food_cost" value="{{ $items->food_cost }}">
                                                        </div>





                                                        <div class="col-md-6 mb-3">
                                                            <label for="">Private Guide Price</label>
                                                            @error('pg_price')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <input type="number"
                                                                class="form-control @error('pg_price') is-invalid @enderror"
                                                                name="pg_price" value="{{ $items->pg_price }}">
                                                        </div>



                                                        <div class="col-md-12 mb-3">
                                                            <label for="">Meta Title</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $items->meta_title }}" name="meta_title">
                                                        </div>

                                                        <div class="col-md-12 mb-3">
                                                            <label for="">Meta Keywords</label>
                                                            <textarea name="meta_keywords" rows="3" class="form-control">{{ $items->meta_keywords }}</textarea>
                                                        </div>

                                                        <div class="col-md-12 mb-3">
                                                            <label for="">Meta Descreption</label>
                                                            <textarea name="meta_description" rows="3" class="form-control">{{ $items->meta_description }}</textarea>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <img src="storage/places/{{ $items->image }}"
                                                                alt="{{ $item->name }}" width="100px" height="50px">
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
        <td><a href="{{ url('dashboard/places/delete-place/' . $items->id) }}" class="btn btn-danger">Delete</a></td>

        </tr>
        @endforeach
        </tbody>
        </table>
    </div>

    {{ $place->links() }}
    </div>
@endsection
