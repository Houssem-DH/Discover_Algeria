<x-app-layout>
    
 
    
    <section class="ftco-section img ftco-select-destination">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Our Tours</span>
                    <h2 class="mb-4">Recent Tours</h2>
                </div>
            </div>
            
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="carousel-destination owl-carousel ftco-animate">
                        @foreach ($tour as $item)
                            <div class="item">
                                <div class="project-destination">
                                    <a href="{{ url('tours/' . $item->id) }}" class="img"
                                        style="background-image: url(storage/places/{{ $item->place->image }});">
                                        <div class="text">
                                            <h3>{{ $item->place->name }}</h3>
                                            <span>{{ date('D', strtotime($item->date)) }} {{ date('M', strtotime($item->date)) }} {{ date('Y', strtotime($item->date)) }}</span>
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