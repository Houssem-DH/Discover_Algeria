@extends('layouts.admin')


@section('title')
    Wilayas
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
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Create Wilaya
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Create Wilaya</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ url('dashboard/wilayas/create-wilaya/') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf


                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label for="">Number</label>
                                        <input type="number" class="form-control" placeholder="Enter Wilaya Number"
                                            name="number">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Wilaya Namer"
                                            name="name">
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </form>
                                </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-header">
                <h4>Wilayas</h4>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Wilaya</th>
                            <th>Number</th>
                            <th>action</th>


                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($wilayas as $item)
                            <tr>

                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->number }}</td>


                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModalCenter{{ $item->id }}">
                                        Edit Wilaya
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter{{ $item->id }}" tabindex="-1" role="dialog"
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

                                                    <form action="{{ url('dashboard/wilayas/update-wilaya/'. $item->id ) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')


                                                        <div class="row">

                                                            <div class="col-md-6 mb-3">
                                                                <label for="">Number</label>
                                                                <input type="number" class="form-control"
                                                                    value="{{ $item->number }}" name="number">
                                                            </div>

                                                            <div class="col-md-6 mb-3">
                                                                <label for="">Name</label>
                                                                <input type="text" class="form-control"
                                                                value="{{ $item->name }}" name="name">
                                                            </div>


                                                        </div>
                                                        <form class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Create</button>
                                                        </form>
                                                        </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </td>
                                <td><a href="{{ url('dashboard/wilayas/delete-wilaya/'.$item->id ) }}"
                                        class="btn btn-danger">Delete</a></td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{ $wilayas->links() }}
        </div>
    @endsection
