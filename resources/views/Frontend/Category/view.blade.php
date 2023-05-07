<x-app-layout>




    <section class="ftco-section">
        <div class="container">

            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">{{ $category->name }} Destinations</h2>
            </div>
            <div class="row justify-content-center pb-4">
            </div>
            <div class="row">
                @foreach ($place as $item)
                    <div class="col-md-4 ftco-animate">
                        <div class="project-wrap">
                            <a href="{{ url('places/' . $item->slug) }}" class="img"
                                style="background-image: url(storage/places/{{ $item->image }});">

                            </a>
                            <div class="text p-4">
                                <span class="days"></span>
                                <h3><a href="#"></a></h3>
                                <p class="location"><span class="fa fa-map-marker"></span> {{ $item->name }},
                                    {{ $item->wilaya->name }}
                                </p>
                                <ul>

                                    <li><span class="flaticon-map"></span>{{ $item->category->name }}</li>
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
       <div class="nn"> {{ $place->links() }}</div>
    </section>

    <br><br><br><br><br><br>
</x-app-layout>
