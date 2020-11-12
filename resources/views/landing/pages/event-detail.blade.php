@extends('landing.layouts.main')
@section('banner')
    {{-- <div class="page-banner banner-bg-one">
        <div class="container">
            <div class="banner-text">
                @foreach ($posts as $post)
                <h1>{{ $post->event_title }}</h1>
                @endforeach
            </div>
        </div>
    </div> --}}
    <section class="bg-half-260 d-table w-100" style="background: url('images/job/company.jpg') center center;">
        <div class="bg-overlay"></div>
    </section>
@endsection
@section('content')
    {{-- <section class="single-event-area ptb-100">
        <div class="container">
            @foreach ($posts as $key => $post)
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-preview-img">
                        <img src="{{ asset('thumbnail/'.$post->thumbnail) }}" alt="{{ $post->event_title }}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-event-info">
                        <h3 class="title">Event Info</h3>
                        <ul>
                            <li>
                                <i class="icofont-calendar"></i>
                                <span class="label">Start Date</span>
                                <span class="date">{{ $post->event_start }}</span>
                            </li>
                            <li>
                                <i class="icofont-clock-time"></i>
                                <span class="label">Time</span>
                                <span class="date">{{ $post->start_time }} - {{ $post->end_time }}</span>
                            </li>
                            <li>
                                <i class="icofont-calendar"></i>
                                <span class="label">End Date</span>
                                <span class="date">{{ $post->event_ends }}</span>
                            </li>
                            <li>
                                <i class="icofont-live-support"></i>
                                <span class="label">Contact Person</span>
                                <span class="date">{{ $post->contact }}</span>
                            </li>
                            <li>
                                <i class="icofont-location-pin"></i>
                                <span class="label">Address</span>
                                <span class="date">{{ $post->location }}<br></span>
                            </li>
                            <li>
                                <i class="icofont-ticket"></i>
                                <span class="label">Payment Status</span>
                                @if ($post->payment_status == false)
                                    <span class="date">Free Payment</span>
                                @else
                                    <span class="date">Paid</span>
                                @endif
                            </li>
                            <li>
                                <i class="icofont-mega-phone"></i>
                                <span class="label">Presented by</span>
                                <span class="date">{{ $post->author->name  }}</span>
                            </li>
                        </ul>
                        <div class="se-info-foot">
                            @if ($post->event_status == false)
                                <a href="javascript:void" class="default-btn">Event Closed</a>
                            @else
                                <a href="{{ route('event-registration.show', $post->slug) }}" target="_blank" rel="noopener" class="default-btn">Book Now</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-event-description">
                <p>{!! $post->content !!}</p>
            </div>
            @endforeach
        </div>
    </section> --}}
    {{-- <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="job-profile position-relative">
                        <div class="rounded shadow bg-white">
                            <div class="text-center">
                                <img src="{{ asset('thumbnail/'.$events->thumbnail) }}" width="445px" alt="">
                            </div>

                            <div class="p-4">
                                <h5>Event Info :</h5>
                                <ul class="list-unstyled mb-4">
                                    <li class="h6">
                                        <i data-feather="calendar" class="fea icon-sm text-warning mr-2"></i>
                                        <span class="text-muted">Start Date :</span> {{ Carbon\Carbon::parse($events->event_start)->isoFormat('dddd, D MMM, Y') }}
                                    </li>
                                    <li class="h6">
                                        <i data-feather="clock" class="fea icon-sm text-warning mr-2"></i>
                                        <span class="text-muted">Time :</span> {{ Carbon\Carbon::parse($events->start_time)->format('H:i') . " - " . $events->end_time }} WIB
                                    </li>
                                    @if ($events->event_start != $events->event_ends)
                                        <li class="h6">
                                            <i data-feather="calendar" class="fea icon-sm text-warning mr-2"></i>
                                            <span class="text-muted">End Date :</span> {{ Carbon\Carbon::parse($events->event_ends)->isoFormat('dddd, D MMM, Y') }}
                                        </li>
                                    @endif
                                    <li class="h6">
                                        <i data-feather="phone" class="fea icon-sm text-warning mr-2"></i>
                                        <span class="text-muted">Contact Person :</span> {{ $events->contact }}
                                    </li>
                                    <li class="h6">
                                        <i data-feather="map-pin" class="fea icon-sm text-warning mr-2"></i>
                                        <span class="text-muted">Location :</span> {{ $events->location }}
                                    </li>
                                    <li class="h6">
                                        <i data-feather="shopping-cart" class="fea icon-sm text-warning mr-2"></i>
                                        <span class="text-muted">Payment Status :</span> {{ $events->payment_status == 1 ? 'Paid' : 'Free' }}
                                    </li>
                                    <li class="h6">
                                        <i data-feather="meh" class="fea icon-sm text-warning mr-2"></i>
                                        <span class="text-muted">Presented by :</span> {{ $events->author->name }}
                                    </li>
                                </ul>
                                <a href="javascipt:void(0)" data-toggle="modal" data-target="#ApplyNow" class="btn btn-block btn-success">Register</a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-7 col-md-7 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="ml-md-4">
                        <h4>About this Event</h4>
                        {!! nl2br($events->content) !!}
                        <h4 class="mt-lg-5 mt-4">Share With Friends</h4>
                        <ul class="list-unstyled social-icon mb-0 mt-4">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="github" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="youtube" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="gitlab" class="fea icon-sm fea-social"></i></a></li>
                        </ul>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section--> --}}
@endsection
