<x-app-layout>
    
<br><br><br><br>


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-4">
           
        </div>
        <div class="row">
            @foreach ($place as $item )
                <div class="col-md-4 ftco-animate">
                    <div class="project-wrap">
                        <a href="{{url('places/' . $item->slug)}}" class="img"
                            style="background-image: url(storage/places/{{ $item->image }});">

                        </a>
                        <div class="text p-4">
                            <span class="days"></span>
                            <h3><a href="#"></a></h3>
                            <p class="location"><span class="fa fa-map-marker"></span> {{$item->name}}, {{$item->wilaya->name}}
                            </p>
                            <ul>
                                <li><span class="flaticon-shower"></span></li>
                                <li><span class="flaticon-king-size"></span></li>
                                <li><span class="flaticon-mountains"></span>{{$item->category->name}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

   <br><br><br><br><br><br>
</x-app-layout>
