<x-app-layout>
    <!-- Add the Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Add the Font Awesome JavaScript (if required) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>


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
                                <h3>Staring Date : <b>{{ date('D', strtotime($tour->date)) }}
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



                            @if ( ($tour->n_place - $tour->n_client)  != 0)
                                <div class="mt-5"> <span class="fw-bold">
                                        <h3>Price :<span> {{ $tour->price }} $</span></h3>



                                        <div class="colors">
                                            <div class="buttons"> <button class="btn btn-primary">Register</button>
                                            </div>
                                        </div>
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
