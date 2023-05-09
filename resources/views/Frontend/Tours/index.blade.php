<x-app-layout>



    <section class="ftco-section">
        <div class="container">

            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Our Tours</span>
                    <h2 class="mb-4">All Tours</h2>
                </div>
            </div>
            <div class="row justify-content-center pb-4">
            </div>
            <div class="row">
                @foreach ($tour as $item)
                    <div class="col-md-4 ftco-animate">
                        <div class="project-wrap">
                            <a href="{{ url('tours/' . $item->id) }}" class="img"
                                style="background-image: url(storage/places/{{ $item->place->image }});">

                            </a>
                            <div class="text p-4">
                                <span class="days"></span>
                                <h3><a href="#"></a></h3>
                                <p class="location"><span class="fa fa-map-marker"></span> {{ $item->place->name }},
                                    {{ $item->place->wilaya->name }}
                                </p>
                                <p> From : {{ $item->from }}</p>


                                <ul>

                                    <li><span class="flaticon-map"></span>{{ date('D', strtotime($item->date)) }}
                                        {{ date('M', strtotime($item->date)) }}
                                        {{ date('Y', strtotime($item->date)) }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
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
        <div class="nn"> {{ $tour->links() }}</div>
    </section>

    <br><br><br><br><br><br>
</x-app-layout>
