@extends('website.layouts.main')
@section('main_section')

    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid bg-jumbotron" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h3 class="text-white display-3 mb-4">Open Hours</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <i class="far fa-circle px-3"></i>
                <p class="m-0">Open Hours</p>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Open Hours Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/opening.jpg" style="object-fit: cover;">
                    </div>
                </div>
                @foreach ($opening as $g )
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="hours-text bg-light p-4 p-lg-5 my-lg-5">
                        <h6 class="d-inline-block text-white text-uppercase bg-primary py-1 px-2">Open Hours</h6>
                        <h1 class="mb-4">{{$g->name}}</h1>
                      <p>{{$g->Desc}}</p>
                        <ul class="list-inline">
                            <li class="h6 py-1"><i class="far fa-circle text-primary mr-3"></i>{{$g->day1}} : {{$g->time1}}</li>
                            <li class="h6 py-1"><i class="far fa-circle text-primary mr-3"></i>{{$g->day2}} : {{$g->time2}}</li>
                            <li class="h6 py-1"><i class="far fa-circle text-primary mr-3"></i>{{$g->day3}} : {{$g->time3}}</li>
                        </ul>
                        <a href="" class="btn btn-primary mt-2">Book Now</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Open Hours End -->


@endsection