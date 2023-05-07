<x-app-layout>
    
 
    
    <section class="ftco-section img ftco-select-destination" >
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Select Your Destination</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="carousel-destination owl-carousel ftco-animate">
                        @foreach ($category as $item)
                            <div class="item">
                                <div class="project-destination">
                                    <a href="{{url('destination/'. $item->id)}}" class="img"
                                        style="background-image: url(storage/categories/{{ $item->image }});">
                                        <div class="text">
                                            <h3>{{ $item->name }}</h3>
                                            <span></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
       <br><br><br><br><br><br>
    </x-app-layout>