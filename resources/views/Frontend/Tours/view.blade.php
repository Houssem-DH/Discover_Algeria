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












<br><br>


    <section class="py-5 product_data">

        <div class="container mt-5 mb-5">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-6 border-end">
                        <div class="d-flex flex-column justify-content-center">
                            <div class="main_image"> <img src="storage/places/{{ $tour->place->image }}"
                                    id="{{ $tour->place->name }}" width="1000"> </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 right-side">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2><b>{{ $tour->place->name }}</b></h2>
                            </div>
                            <div class="mt-2 pr-3 content">
                                <h3>{{ $tour->place->descreption }}</h3>
                            </div>
                            <br>
                            <div class="mt-2 pr-3 content">
                                <h3>Rgisteration Experation Date : {{ date('D', strtotime($tour->exp_date)) }} {{ date('M', strtotime($tour->exp_date)) }} {{ date('Y', strtotime($tour->exp_date)) }}</h3>
                            </div>
                            <div class="mt-2 pr-3 content">
                                <h3>Staring Date : {{ date('D', strtotime($tour->date)) }} {{ date('M', strtotime($tour->date)) }} {{ date('Y', strtotime($tour->date)) }}</h3>
                            </div>
                           
                            
                           
                           
                            <div class="mt-2 pr-3 content">
                                <span>{{ $tour->n_place-$tour->n_client }} Places</span>
                            </div>


                            <div class="mt-5"> <span class="fw-bold">
                                    <h3>Price  :<span> {{ $tour->price }} $</span></h3>

                                   
                                
                                <div class="colors">
                                    <div class="buttons"> <button class="btn btn-primary">Register</button> </div>
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
