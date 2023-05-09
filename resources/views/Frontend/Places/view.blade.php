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















    <section class="py-5 product_data">

        <div class="container mt-5 mb-5">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-6 border-end">
                        <div class="d-flex flex-column justify-content-center">
                            <div class="main_image"> <img src="storage/places/{{ $place->image }}"
                                    id="{{ $place->name }}" width="1000"> </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 right-side">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2><b>{{ $place->name }}</b></h2>
                            </div>
                            <div class="mt-2 pr-3 content">
                                <h3>{{ $place->descreption }}</h3>
                            </div>
                            <br>
                            <div class="mt-2 pr-3 content">
                                <span>{{ $countr }} Reviews</span>
                            </div>


                            <div class="mt-5"> <span class="fw-bold">
                                    <h3>Private Guide Price</h3>

                                    <span>{{ $place->pg_price }} $</span>
                                </span>
                                <div class="colors">
                                    <div class="buttons"> <button class="btn btn-primary">Request</button> </div>
                                </div>
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
