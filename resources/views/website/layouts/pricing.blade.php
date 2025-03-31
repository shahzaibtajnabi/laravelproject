@extends('website.layouts.main')
@section('main_section')
   <!-- Header Start -->
   <div class="jumbotron jumbotron-fluid bg-jumbotron" style="margin-bottom: 90px;">
    <div class="container text-center py-5">
        <h3 class="text-white display-3 mb-4">Pricing</h3>
        <div class="d-inline-flex align-items-center text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <i class="far fa-circle px-3"></i>
            <p class="m-0">Pricing</p>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Pricing Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-5" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="img/pricing.jpg" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-7 pt-5 pb-lg-5">
                <div class="pricing-text bg-light p-4 p-lg-5 my-lg-5">
                    <div class="owl-carousel pricing-carousel">
                       @foreach ($pricing as $g)
                       <div class="bg-white">
                        <div class="d-flex align-items-center justify-content-between border-bottom border-primary p-4">
                            <h1 class="display-4 mb-0">
                                <small class="align-top text-muted font-weight-medium" style="font-size: 22px; line-height: 45px;">$</small>{{$g->price}}<small class="align-bottom text-muted font-weight-medium" style="font-size: 16px; line-height: 40px;">/Mo</small>
                            </h1>
                            <h5 class="text-primary text-uppercase m-0">{{$g->name}}</h5>
                        </div>
                        <div class="p-4">
                            <p><i class="fa fa-check text-success mr-2"></i>{{$g->heading1}}</p>
                            <p><i class="fa fa-check text-success mr-2"></i>{{$g->heading2}}</p>
                            <p><i class="fa fa-check text-success mr-2"></i>{{$g->heading3}}</p>
                            <p><i class="fa fa-check text-success mr-2"></i>{{$g->heading4}}</p>
                            <p><i class="fa fa-check text-success mr-2"></i>{{$g->heading5}}</p>
                            <a href="" class="btn btn-primary my-2">Order Now</a>
                        </div>
                    </div>

                       @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Pricing End -->


<!-- Open Hours Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="img/opening.jpg" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 pt-5 pb-lg-5">
                <div class="hours-text bg-light p-4 p-lg-5 my-lg-5">
                    <h6 class="d-inline-block text-white text-uppercase bg-primary py-1 px-2">Open Hours</h6>
                    <h1 class="mb-4">Best Relax And Spa Zone</h1>
                    <p>Dolores lorem lorem ipsum sit et ipsum. Sadip sea amet diam dolore sed et. Sit rebum labore sit sit ut vero no sit. Et elitr stet dolor sed sit et sed ipsum et kasd ut. Erat duo eos et erat sed diam duo</p>
                    <ul class="list-inline">
                        <li class="h6 py-1"><i class="far fa-circle text-primary mr-3"></i>Mon – Fri : 9:00 AM - 7:00 PM</li>
                        <li class="h6 py-1"><i class="far fa-circle text-primary mr-3"></i>Saturday : 9:00 AM - 6:00 PM</li>
                        <li class="h6 py-1"><i class="far fa-circle text-primary mr-3"></i>Sunday : Closed</li>
                    </ul>
                    <a href="" class="btn btn-primary mt-2">Book Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Open Hours End -->


@endsection