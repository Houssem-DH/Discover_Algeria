<x-app-layout>
    <!-- Add the Font Awesome CSS -->


    <!-- Add the Font Awesome JavaScript (if required) -->
    @if (session('status'))
        <script>
            swal("", "{{ session('status') }}", "success");
        </script>
    @endif

<br><br>
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
                        <th>State</th>


                    </tr>
                </thead>
                <tbody>

                    @foreach ($pgrequest as $items)
                        <tr>

                            <td>{{ $items->id }}</td>
                            <td>{{ $items->fname }} {{ $items->lname }}</td>
                            <td>{{ $items->place->name }}</td>
                           

                            <td><img src="storage/places/{{ $items->place->image }}"
                                    alt="{{ $items->place->name }}" width="100px" height="50px"></td>




        </div>

        @if ($items->status == '1' && $items->rejected == '0')
            <td>Accepted</td>
        @endif
        @if ($items->status == '0' && $items->rejected == '1')
            <td>Refused</td>
        @endif


        </tr>
        @endforeach
        </tbody>
        </table>
    </div>

    {{ $pgrequest->links() }}
    </div>

    <br><br><br><br>


    <br>
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
                        <th>State</th>


                    </tr>
                </thead>
                <tbody>

                    @foreach ($tourrequest as $items)
                        <tr>

                            <td>{{ $items->id }}</td>
                            <td>{{ $items->fname }} {{ $items->lname }}</td>
                            <td>{{ $items->tour->from }}</td>
                            <td>{{ $items->tour->place->name }}</td>


                            <td><img src="storage/places/{{ $items->tour->place->image }}"
                                    alt="{{ $items->tour->place->name }}" width="100px" height="50px"></td>




        </div>

        @if ($items->status == '1' && $items->rejected == '0')
            <td>Accepted</td>
        @endif
        @if ($items->status == '0' && $items->rejected == '1')
            <td>Refused</td>
        @endif


        </tr>
        @endforeach
        </tbody>
        </table>
    </div>

    {{ $tourrequest->links() }}
    </div>
    <br><br><br><br>

</x-app-layout>
