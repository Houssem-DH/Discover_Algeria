@extends('layouts.admin')


@section('title')
    Tour Requests
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
            <h4>Tour Requests</h4>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Full Name</th>
                        <th>From</th>
                        <th>To</th>
                        <th>image</th>
                        <th>action</th>


                    </tr>
                </thead>
                <tbody>

                    @foreach ($tourrequest as $items)
                        <tr>

                            <td>{{ $items->id }}</td>
                            <td>{{ $items->fname }} {{ $items->lname }}</td>
                            <td>{{ $items->tour->from }}</td>
                            <td>{{ $items->tour->place->name }}</td>
                            

                            <td><img src="storage/places/{{ $items->tour->place->image }}" alt="{{ $items->tour->place->name }}" width="100px"
                                    height="50px"></td>




        </div>
@if ($items->status=='0' && $items->rejected=='0')
<td><a href="{{ url('dashboard/tourrequests/accept/' . $items->id) }}" class="btn btn-primary">Accept</a></td>
<td><a href="{{ url('dashboard/tourrequests/reject/' . $items->id) }}" class="btn btn-danger">Reject</a></td>

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

    {{ $tourrequest->links() }}
    </div>
@endsection
