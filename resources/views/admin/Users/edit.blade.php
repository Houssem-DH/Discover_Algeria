@extends('layouts.admin')


@section('title')
 Edit Member
@endsection

@section('content')

<div class="card container">

    <div class="card-header">
        <h4>Edit Member</h4>
    </div>

    <div class="card-body">

        <form action="{{ url('dashboard/members/update-member/'.$users->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

<div class="row">

    <div class="col-md-6 mb-3">
        <label for="">UserName</label>
        <input type="text" class="form-control" value="{{ $users->name }}" name="name">
    </div>

    <div class="col-md-6 mb-3">
        <label for="">Email</label>
        <input type="text" class="form-control"  value="{{ $users->email }}"name="email">
    </div>



    <div class="col-md-6 mb-3">
        <label for="">Admin</label>
        <input type="checkbox"  {{ $users->isAdmin==1 ? 'checked':'' }} name="isAdmin">
    </div>




    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>


@endsection
