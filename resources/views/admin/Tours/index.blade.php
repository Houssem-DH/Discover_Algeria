@extends('layouts.admin')


@section('title')
    Tours
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
                    Create Tour
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Create Tour</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form action="{{ url('/dashboard/tours/create-tour') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">



                                        <div class="col-md-6 mb-3">

                                            <select class="form-select mt-5" name='place_id'
                                                aria-label="Default select example">
                                                <option selected>Select Place</option>
                                                @foreach ($place as $itemc)
                                                    <option value="{{ $itemc->id }}">{{ $itemc->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>



                                        <div class="col-md-6 mb-3">

                                            <label for="date">Start date</label>

                                            <input type="date" id="date" name="date" max="2033-12-31">
                                        </div>
                                        <div class="col-md-6 mb-3">

                                            <label for="exp_date">Request Experation date</label>

                                            <input type="date" id="exp_date" name="exp_date" max="2033-12-31">
                                        </div>



                                        <div class="col-md-6 mb-3">
                                            <label for="">Places</label>
                                            @error('n_place')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <input type="number"
                                                class="form-control @error('n_place') is-invalid @enderror" name="n_place"
                                                value="{{ old('n_place') }}">
                                        </div>



                                        <div class="col-md-6 mb-3">
                                            <label for="">Price</label>
                                            @error('pg_price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <input type="number" class="form-control @error('price') is-invalid @enderror"
                                                name="price" value="{{ old('price') }}">
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
            <h4>Places</h4>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Place</th>
                        <th>Wilaya</th>
                        <th>Start Date</th>
                        <th>Experation date</th>
                        <th>Price</th>
                        <th>Empty Places</th>
                        <th>image</th>
                        <th>Status</th>
                        <th>action</th>



                    </tr>
                </thead>
                <tbody>

                    @foreach ($tour as $items)
                        <tr>

                            <td>{{ $items->id }}</td>
                            <td>{{ $items->place->name }}</td>
                            <td>{{ $items->place->wilaya->name }}</td>
                            <td>{{ $items->date }}</td>
                            <td>{{ $items->exp_date }}</td>
                            <td>{{ $items->price }} $</td>
                            <td>{{ $items->n_place-$items->n_client }}</td>

                            <td><img src="storage/places/{{ $items->place->image }}" alt="{{ $items->place->name }}"
                                    width="100px" height="50px"></td>

                            @if ($items->expired == 1)
                                <td>Expired</td>
                            @else
                                <td>Not Expired</td>
                            @endif

                            <!-- Button trigger modal -->
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModalCenter{{ $items->id }}">
                                    Edit Tour
                                </button>
                            </td>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter{{ $items->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Tour</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form action="{{ url('dashboard/tours/update-tour/' . $items->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')


                                                <div class="row">



                                                    <div class="col-md-6 mb-3">

                                                        <select class="form-select mt-5" name='place_id'
                                                            aria-label="Default select example">
                                                            <option selected>Select Place</option>
                                                            @foreach ($place as $itemc)
                                                                <option value="{{ $itemc->id }}">{{ $itemc->name }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>



                                                    <div class="col-md-6 mb-3">

                                                        <label for="date">Start date</label>

                                                        <input type="date" id="date" value="{{$items->date}}" name="date"
                                                            max="2033-12-31">
                                                    </div>
                                                    <div class="col-md-6 mb-3">

                                                        <label for="exp_date">Request Experation date</label>

                                                        <input type="date" id="exp_date" value="{{$items->exp_date}}" name="exp_date"
                                                            max="2033-12-31">
                                                    </div>



                                                    <div class="col-md-6 mb-3">
                                                        <label for="">Places</label>
                                                        @error('n_place')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <input type="number"
                                                            class="form-control @error('n_place') is-invalid @enderror"
                                                            name="n_place" value="{{$items->n_place}}">
                                                    </div>



                                                    <div class="col-md-6 mb-3">
                                                        <label for="">Price</label>
                                                        @error('pg_price')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <input type="number"
                                                            class="form-control @error('price') is-invalid @enderror"
                                                            name="price" value="{{$items->price}}">
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
        <td><a href="{{ url('dashboard/tours/delete-tour/' . $items->id) }}" class="btn btn-danger">Delete</a></td>

        </tr>
        @endforeach
        </tbody>
        </table>
    </div>

    {{ $tour->links() }}
    </div>
@endsection
