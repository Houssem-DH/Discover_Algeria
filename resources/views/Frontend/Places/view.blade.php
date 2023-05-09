<x-app-layout>
    <!-- Add the Font Awesome CSS -->


    <!-- Add the Font Awesome JavaScript (if required) -->
    @if (session('status'))
        <script>
            swal("", "{{ session('status') }}", "success");
        </script>
    @endif



    <style>
        .rating {
            display: inline-block;
            font-size: 2rem;
        }

        .rating>input {
            display: none;
        }

        .rating>label {
            color: #ccc;
            cursor: pointer;
            transition: color 0.2s;
        }

        .rating>label:hover,
        .rating>label:hover~label,
        .rating>input:checked~label {
            color: #ffc600;
        }

        .link-muted {
            color: #aaa;
        }

        .link-muted:hover {
            color: #1266f1;
        }
    </style>












    <style>
        .mmi {
            width: 550px;
            height: 1000px;
        }

        .mmii {
            width: 550px !important;
            height: 500px !important;
        }
    </style>


    <section class="py-5 product_data">

        <div class="container mt-5 mb-5">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-6 border-end">
                        <div class="d-flex flex-column justify-content-center">
                            <div>
                                <div class="mmi"> <img class="mmii" src="storage/places/{{ $place->image }}"
                                        id="{{ $place->name }}">
                                    <div style="overflow:hidden;max-width:100%;width:550px;height:500px;">
                                        <div id="google-maps-display" style="height:100%; width:100%;max-width:100%;">
                                            <iframe style="height:100%;width:100%;border:0;" frameborder="0"
                                                src="{{ $place->google_map }}"></iframe>
                                        </div>
                                        <style>
                                            #google-maps-display img.text-marker {
                                                max-width: none !important;
                                                background: none !important;
                                            }

                                            img {
                                                max-width: none
                                            }
                                        </style>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 right-side">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2><b>{{ $place->name }} , {{ $place->wilaya->name }}</b></h2>
                            </div>
                            <div class="mt-2 pr-3 content">
                                <h3>{{ $place->descreption }}</h3>
                            </div>
                            <br>
                            <div class="mt-2 pr-3 content">
                                <h3>Nearby Hotels : <b>{{ $place->nearby_hotels }}</b></h3>
                            </div>
                            <br>
                            <div class="mt-2 pr-3 content">
                                <h3>Hotel Cost Per Night : <b>{{ $place->hotel_cost_per_night }} $</b></h3>
                            </div>
                            <br>
                            @if ($place->transport == 'yes')
                                <div class="mt-2 pr-3 content">
                                    <h3>Transport :<b> {{ $place->transport }}</b></h3>
                                </div>
                                <br>
                                <div class="mt-2 pr-3 content">
                                    <h3>Transport Cost :<b> {{ $place->transport_cost }} $</b></h3>
                                </div>
                                <br>
                            @endif

                            @if ($place->transport == 'no')
                                <div class="mt-2 pr-3 content">
                                    <h3>Transport :<b> {{ $place->transport }}</b></h3>
                                </div>
                                <br>
                            @endif


                            <div class="mt-2 pr-3 content">
                                <h3>Difficulty Degree :
                                    @if ($place->difficulty_degree <= 4)
                                        <b class="text-success">Low</b>
                                    @endif
                                    @if ($place->difficulty_degree > 4 && $place->difficulty_degree <= 7)
                                        <b class="text-warning">Medium</b>
                                    @endif
                                    @if ($place->difficulty_degree > 7)
                                        <b class="text-danger">High</b>
                                    @endif


                                </h3>
                            </div>
                            <br>
                            <div class="mt-2 pr-3 content">
                                <h3>Food Cost : <b>{{ $place->food_cost }} $</b></h3>
                            </div>
                            <br>
                            <div class="mt-2 pr-3 content">
                                <span>{{ $countr }} Reviews</span>
                            </div>


                            <div class="mt-5"> <span class="fw-bold">
                                    <h3>Private Guide Price : <b>{{ $place->pg_price }} $</b></h3>


                                </span>

                                @if (Auth::user())
                                    @if ($pgrequestc >= 1)
                                    <div class="mt-2 pr-3 content">
                                        <h3>
                                          
                                                <b class="text-warning">Wait For Confirmation</b>
                                           
        
        
                                        </h3>
                                    </div>
                                    @else
                                        
                                    
                                
                                <div class="colors">

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target=".bd-example-modal-xl">Request</button>






                                    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"
                                        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Request Private Guide</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="row">
                                                    <div class="col-75">
                                                        <div class="container cc">
                                                            <form method="POST" enctype="multipart/form-data"
                                                                action="{{ url('pgrequest/' . Auth::user()->id  . '/'. $place->id) }}">
                                                                @csrf
                                                               

                                                                <div class="row">
                                                                    <div class="col-50">
                                                                        <h3>Billing Address</h3>
                                                                        <label for="fname"><i
                                                                                class="fa fa-user"></i>First
                                                                            Name</label>
                                                                        <input type="text" id="fname"
                                                                            name="fname" value="">
                                                                        <label for="fname"><i class="fa fa-user"></i>
                                                                            Last
                                                                            Name</label>
                                                                        <input type="text" id="lname"
                                                                            name="lname" value="">
                                                                        <label for="adr"><i
                                                                                class="fa fa-address-card-o"></i>
                                                                            Address</label>
                                                                        <input type="text" id="adr"
                                                                            name="address" value="">
                                                                        <label for="city"><i
                                                                                class="fa fa-institution"></i>
                                                                            City</label>
                                                                        <input type="text" id="city"
                                                                            name="city" value="">

                                                                        <div class="row">
                                                                            <div class="col-50">
                                                                                <label for="state">State</label>
                                                                                <input type="text" id="state"
                                                                                    name="states" value="">
                                                                            </div>
                                                                            <div class="col-50">
                                                                                <label for="zip">Zip</label>
                                                                                <input type="text" id="zip"
                                                                                    name="zip" value="">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-50">
                                                                        <h3>Payment</h3>
                                                                        <label for="fname">Accepted
                                                                            Cards</label>
                                                                        <div class="icon-container">
                                                                            <i class="fa fa-cc-visa"
                                                                                style="color:navy;"></i>
                                                                            <i class="fa fa-cc-amex"
                                                                                style="color:blue;"></i>
                                                                            <i class="fa fa-cc-mastercard"
                                                                                style="color:red;"></i>
                                                                            <i class="fa fa-cc-discover"
                                                                                style="color:orange;"></i>
                                                                        </div>
                                                                        <label for="cname">Name on Card</label>
                                                                        @error('cname')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror

                                                                        <input type="text" id="cname"
                                                                            class="@error('cname') is-invalid @enderror"
                                                                            name="cname" value="">


                                                                        <label for="ccnum">Credit card
                                                                            number</label>
                                                                        @error('cnumber')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                        <input type="text" id="ccnum"
                                                                            class="@error('cnumber') is-invalid @enderror"
                                                                            name="cnumber" value="">



                                                                        <div class="row">
                                                                            <div class="col-50">
                                                                                <label for="expyear">Exp
                                                                                    Month</label>
                                                                                @error('mm')
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                                <input type="text" id="expmonth"
                                                                                    class="@error('mm') is-invalid @enderror"
                                                                                    name="mm" value="">


                                                                            </div>
                                                                            <div class="col-50">
                                                                                <label for="cvv">Exp
                                                                                    Year</label>
                                                                                @error('yy')
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                                <input type="text" id="expyear"
                                                                                    class="@error('yy') is-invalid @enderror"
                                                                                    name="yy" value="">

                                                                            </div>
                                                                        </div>
                                                                        <label for="expmonth">CVV</label>
                                                                        @error('cvv')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                        <input type="text" id="cvv"
                                                                            class="@error('cvv') is-invalid @enderror"
                                                                            name="cvv" value="">




                                                                    </div>

                                                                </div>

                                                                <input type="submit" value="Checkout"
                                                                    class="bb">
                                                            </form>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>





                                </div>
                                @endif
                                @endif
                            </div>
                        </div>



                    </div>



                </div>
            </div>
        </div>






    </section>















    <style>
        .nn {
            margin: 25px;
            width: 350px;
            height: 200px;
            margin: 25px;
            display: flex;
            justify-content: center;
        }
    </style>


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    @if (Auth::user())
        <div class="container ">
            <div class="row">
                <div class="col-md-12 border-end">
                    <div class="media g-mb-30 media-comment">
                        <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15"
                            src="storage/{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}">
                        <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                            <div class="g-mb-15">
                                <h5 class="h5 g-color-gray-dark-v1 mb-0">Review</h5>
                            </div>
                            <form action="{{ url('review-insert/' . Auth::user()->id . '/' . $place->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mt-3 d-flex flex-row align-items-center p-3 form-color">
                                    <textarea type="text" class="form-control" name="comment" placeholder="Enter your review..."></textarea>
                                </div>
                                <div class="mr-3" style="float: right;">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>


        </div>
    @endif




    <div class="container ">
        <div class="row">
            @foreach ($review as $item)
                <div class="col-md-12 border-end">
                    <div class="media g-mb-30 media-comment">
                        <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15"
                            src="storage/{{ $item->user->profile_photo_path }}" alt="Image Description">
                        <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                            <div class="g-mb-15">
                                <h5 class="h5 g-color-gray-dark-v1 mb-0">{{ $item->user->name }}</h5>
                                <span
                                    class="g-color-gray-dark-v4 g-font-size-12">{{ $item->created_at->diffForHumans() }}</span>
                            </div>

                            <p><b>{{ $item->comment }}</b></p>


                        </div>
                    </div>
                </div>
            @endforeach



        </div>
    </div>

    <br><br><br>
    <div class="nn" style=" margin: auto;"> {{ $review->links() }}</div>

    <br><br><br><br>
</x-app-layout>
