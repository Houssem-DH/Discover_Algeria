@extends('layouts.admin')


@section('title')
    Images Options
@endsection

@section('content')
    <br>
    <br>
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
    @if (session('status2'))
        <script>
            swal("", "{{ session('status2') }}", "success");
        </script>
    @endif



    <br><br>
    <div class="card container">

        <div class="card-header">
            <h4>Logos</h4>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>Image</th>
                        <th>Add</th>
                        <th>Action</th>



                    </tr>
                </thead>
                <tbody>


                    <tr>
                        <form action="{{ route('update_logo') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <td>Logo Image</td>

                            <td><img src="storage/sitemanagement/logo/{{ $images->logo }}" alt="image here" width="200px"
                                    height="200px"></td>
                            <td> <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image" value="{{ old('image') }}"></td>
                            <td> <button type="submit" class="btn btn-primary">Update</button></td>

                        </form>

                    </tr>
                    <tr>
                        <form action="{{ route('update_hero_banner') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <td>Hero Banner</td>

                            <td><img src="storage/sitemanagement/hero_banner/{{ $images->hero_banner }}" alt="image here"
                                    width="320" height="240" class=""></td>
                            <td> <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image" value="{{ old('image') }}"></td>
                            <td> <button type="submit" class="btn btn-primary">Update</button></td>

                        </form>

                    </tr>
                    <tr>
                        <form action="{{ route('update_hero_video') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <td>Hero Video</td>

                            <td>


                                <iframe src="{{ $images->hero_video }}" width="320" height="240" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>

                            
                            </td>
                            <td>

                                <div class="col-md-6 mb-3">
                                   
                                    @error('hero_video')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input type="text"
                                        class="form-control @error('hero_video') is-invalid @enderror"
                                        name="hero_video" value="{{ $images->hero_video }}">
                                </div>
                            </td>
                            <td> <button type="submit" class="btn btn-primary">Update</button></td>

                        </form>

                    </tr>

                </tbody>
            </table>
        </div>


    </div>
    <br><br><br>
@endsection
