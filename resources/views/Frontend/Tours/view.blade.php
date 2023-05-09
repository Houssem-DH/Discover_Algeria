<x-app-layout>



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
            height: 550px;
        }

        .mmii {
            width: 550px !important;
            height: 550px !important;
        }

        .mmiii {
            width: 1500px !important;
            height: 500px !important;
        }
    </style>

    <br>

    <div class="row justify-content-center pb-4">
        <div class="col-md-12 heading-section text-center ftco-animate">

            <h2 class="mb-4">{{ $tour->place->name }} Tour</h2>
        </div>
    </div>


    <section class="py-5 product_data">

        <div class="container mt-5 mb-5">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-6 border-end">
                        <div class="d-flex flex-column justify-content-center">
                            <div>
                                <div class="mmi"> <img class="mmii" src="storage/places/{{ $tour->place->image }}"
                                        id="{{ $tour->place->name }}">

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 right-side">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2><b><a
                                            href="{{ url('places/' . $tour->place->slug) }}">{{ $tour->place->name }}</b></a>
                                </h2>
                            </div>
                            <div class="mt-2 pr-3 content">
                                <h3>{{ $tour->place->descreption }}</h3>
                            </div>
                            <br>
                            <div class="mt-2 pr-3 content">
                                <h3>From : <b>{{ $tour->from }}</b></h3>
                            </div>

                            <div class="mt-2 pr-3 content">
                                <h3>Rgisteration Experation Date : <b>{{ date('D', strtotime($tour->exp_date)) }}
                                        {{ date('M', strtotime($tour->exp_date)) }}
                                        {{ date('Y', strtotime($tour->exp_date)) }}</b></h3>
                            </div>
                            <div class="mt-2 pr-3 content">
                                <h3>Starting Date : <b>{{ date('D', strtotime($tour->date)) }}
                                        {{ date('M', strtotime($tour->date)) }}
                                        {{ date('Y', strtotime($tour->date)) }}</b></h3>
                            </div>
                            <div class="mt-2 pr-3 content">
                                <h3>Transport : <b>{{ $tour->transport }} </b></h3>
                            </div>

                            <div class="mt-2 pr-3 content">
                                <h3>Food : <b>{{ $tour->food }} </b></h3>
                            </div>
                            <div class="mt-2 pr-3 content">
                                <h3>Places: <b>{{ $tour->n_place - $tour->n_client }} </b></h3>
                            </div>



                            @if ($tour->n_place - $tour->n_client != 0)
                                <div class="mt-5"> <span class="fw-bold">
                                        <h3>Price :<span> {{ $tour->price }} $</span></h3>



                                        @if (Auth::user())
                                            @if ($tourrequestc >= 1)
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






                                                    <div class="modal fade bd-example-modal-xl" tabindex="-1"
                                                        role="dialog" aria-labelledby="myExtraLargeModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">

                                                            <div class="modal-content">
                                                                
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Join The Tour</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-75">
                                                                        <div class="container cc">
                                                                            <form method="POST"
                                                                                enctype="multipart/form-data"
                                                                                action="{{ url('tourrequest/' . Auth::user()->id . '/' . $tour->id) }}">
                                                                                @csrf


                                                                                <div class="row">
                                                                                    <div class="col-50">
                                                                                        <h3>Billing Address</h3>
                                                                                        <label for="fname"><i
                                                                                                class="fa fa-user"></i>First
                                                                                            Name</label>
                                                                                        <input type="text"
                                                                                            id="fname"
                                                                                            name="fname"
                                                                                            value="">
                                                                                        <label for="fname"><i
                                                                                                class="fa fa-user"></i>
                                                                                            Last
                                                                                            Name</label>
                                                                                        <input type="text"
                                                                                            id="lname"
                                                                                            name="lname"
                                                                                            value="">
                                                                                        <label for="adr"><i
                                                                                                class="fa fa-address-card-o"></i>
                                                                                            Address</label>
                                                                                        <input type="text"
                                                                                            id="adr"
                                                                                            name="address"
                                                                                            value="">
                                                                                        <label for="city"><i
                                                                                                class="fa fa-institution"></i>
                                                                                            City</label>
                                                                                        <input type="text"
                                                                                            id="city"
                                                                                            name="city"
                                                                                            value="">

                                                                                        <div class="row">
                                                                                            <div class="col-50">
                                                                                                <label
                                                                                                    for="state">State</label>
                                                                                                <input type="text"
                                                                                                    id="state"
                                                                                                    name="states"
                                                                                                    value="">
                                                                                            </div>
                                                                                            <div class="col-50">
                                                                                                <label
                                                                                                    for="zip">Zip</label>
                                                                                                <input type="text"
                                                                                                    id="zip"
                                                                                                    name="zip"
                                                                                                    value="">
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
                                                                                        <label for="cname">Name on
                                                                                            Card</label>
                                                                                        @error('cname')
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror

                                                                                        <input type="text"
                                                                                            id="cname"
                                                                                            class="@error('cname') is-invalid @enderror"
                                                                                            name="cname"
                                                                                            value="">


                                                                                        <label for="ccnum">Credit
                                                                                            card
                                                                                            number</label>
                                                                                        @error('cnumber')
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                        <input type="text"
                                                                                            id="ccnum"
                                                                                            class="@error('cnumber') is-invalid @enderror"
                                                                                            name="cnumber"
                                                                                            value="">



                                                                                        <div class="row">
                                                                                            <div class="col-50">
                                                                                                <label
                                                                                                    for="expyear">Exp
                                                                                                    Month</label>
                                                                                                @error('mm')
                                                                                                    <span
                                                                                                        class="invalid-feedback"
                                                                                                        role="alert">
                                                                                                        <strong>{{ $message }}</strong>
                                                                                                    </span>
                                                                                                @enderror
                                                                                                <input type="text"
                                                                                                    id="expmonth"
                                                                                                    class="@error('mm') is-invalid @enderror"
                                                                                                    name="mm"
                                                                                                    value="">


                                                                                            </div>
                                                                                            <div class="col-50">
                                                                                                <label
                                                                                                    for="cvv">Exp
                                                                                                    Year</label>
                                                                                                @error('yy')
                                                                                                    <span
                                                                                                        class="invalid-feedback"
                                                                                                        role="alert">
                                                                                                        <strong>{{ $message }}</strong>
                                                                                                    </span>
                                                                                                @enderror
                                                                                                <input type="text"
                                                                                                    id="expyear"
                                                                                                    class="@error('yy') is-invalid @enderror"
                                                                                                    name="yy"
                                                                                                    value="">

                                                                                            </div>
                                                                                        </div>
                                                                                        <label
                                                                                            for="expmonth">CVV</label>
                                                                                        @error('cvv')
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                        <input type="text"
                                                                                            id="cvv"
                                                                                            class="@error('cvv') is-invalid @enderror"
                                                                                            name="cvv"
                                                                                            value="">




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
                            @else
                                <br>
                                <div class="mt-2 pr-3 content">
                                    <h3><b class="text-danger">Expired </b></h3>
                                </div>
                            @endif
                        </div>



                    </div>



                </div>
            </div>
        </div>






    </section>
    <style>
        .txt {
            font-size: 40px;
        }
    </style>

    <div class="container" style="text-align: center;">

        <h1 class="txt">
            Starting Point
        </h1>
    </div>


    <section class="py-5 product_data">

        <div class="container mt-5 mb-5">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-6 border-end">
                        <div class="d-flex flex-column justify-content-center">
                            <div>
                                <div class="mmiii">

                                    <div style="overflow:hidden;max-width:100%;width:1110px;height:500px;">
                                        <div id="google-maps-display" style="height:100%; width:100%;max-width:100%;">
                                            <iframe style="height:100%;width:100%;border:0;" frameborder="0"
                                                src="{{ $tour->starting_point }}"></iframe>
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




                </div>
            </div>
        </div>






    </section>








    <br><br><br><br>
</x-app-layout>
