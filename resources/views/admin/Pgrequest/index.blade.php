@extends('layouts.admin')


@section('title')
    Private Guide Requests
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

        </div>
        <div class="card-header">
            <h4>Private Guide Requests</h4>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Full Name</th>
                        <th>Place</th>
                        <th>image</th>
                        <th>action</th>


                    </tr>
                </thead>
                <tbody>

                    @foreach ($pgrequest as $items)
                        <tr>

                            <td>{{ $items->id }}</td>
                            <td>{{ $items->fname }} {{ $items->lname }}</td>
                            <td>{{ $items->place->name }}</td>

                            <td><img src="storage/places/{{ $items->place->image }}" alt="{{ $items->place->name }}" width="100px"
                                    height="50px"></td>




        </div>
@if ($items->status=='0' && $items->rejected=='0')
<td><a href="{{ url('dashboard/pgrequests/accept/' . $items->id) }}" class="btn btn-primary">Accept</a></td>
<td><a href="{{ url('dashboard/pgrequests/reject/' . $items->id) }}" class="btn btn-danger">Reject</a></td>

@else
    @if($items->status=='1' && $items->rejected=='0')
    <td>Accepted</td>
    @endif
    @if($items->status=='0' && $items->rejected=='1')
    <td>Refused</td>
    @endif

@endif
        
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>

    {{ $pgrequest->links() }}
    </div>
@endsection
