@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Site Analysis</h4>

                        </div>
                    </div>
                    <div class="row">
                        <!-- column -->

                        <div class="col-lg-30">
                            <div class="row">
                                <div class="col">
                                    <div class="bg-dark p-10 text-white text-center">
                                        <i class="mdi mdi-account fs-3 mb-1 font-16"></i>
                                        <h5 class="mb-0 mt-1">{{$memberc}}</h5>
                                        <small class="font-light">Total Users</small>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="bg-dark p-10 text-white text-center">
                                        <i class="mdi mdi-pencil fs-3 font-16"></i>

                                        <h5 class="mb-0 mt-1">{{$categoryc}}</h5>
                                        <small class="font-light">Total Categories</small>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="bg-dark p-10 text-white text-center">
                                      <i class="mdi mdi-web fs-3 mb-1 font-16"></i>
                                        <h5 class="mb-0 mt-1">{{$placec}}</h5>
                                        <small class="font-light">Total Destination</small>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="bg-dark p-10 text-white text-center">
                                      <i class="mdi mdi-web fs-3 mb-1 font-16"></i>
                                        <h5 class="mb-0 mt-1">{{$tourc}}</h5>
                                        <small class="font-light">Total Tours</small>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="bg-dark p-10 text-white text-center">
                                      <i class="mdi mdi-calendar-check fs-3 mb-1 font-16"></i>
                                        <h5 class="mb-0 mt-1">{{$pgrequestc}}</h5>
                                        <small class="font-light">Private Guide Requests</small>
                                    </div>
                                </div>



                            </div>
                        </div>
                        <!-- column -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
