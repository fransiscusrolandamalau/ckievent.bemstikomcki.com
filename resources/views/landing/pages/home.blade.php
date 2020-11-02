@extends('landing.layouts.main', ['title' => 'Home'])
@section('banner')
    <div class="container-fluid px-0 px-md-3 mt-5 pt-md-4">
        <div class="slider single-item">
            @foreach ($popular_events as $popular_event)
                <div class="bg-half-170 rounded-md" style="background: url('{{ asset('thumbnail/'.$popular_event->thumbnail) }}') center center;">
                    <div class="bg-overlay rounded-md"></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="title-heading text-center">
                                    <h1 class="text-white title-dark mb-3">{{ $popular_event->event_title }}</h1>
                                    <ul class="list-unstyled">
                                        <li class="list-inline-item small user text-white-50 mr-2"><i class="mdi mdi-account text-white title-dark"></i> {{ $popular_event->author->name }}</li>
                                        <li class="list-inline-item small date text-white-50 mr-2"><i class="mdi mdi-calendar-check text-white title-dark"></i> {{ Carbon\Carbon::parse($popular_event->event_start)->isoFormat('dddd, D MMM, Y') }} {{ Carbon\Carbon::parse($popular_event->start_time)->format('H:i') }} WIB</li>
                                        <li class="list-inline-item small amp text-white-50"><i class="mdi mdi-map text-white title-dark"></i> {{ $popular_event->location }}</li>
                                    </ul>
                                    <p class="para-desc mx-auto text-white-50 mb-0">{!! strip_tags(Str::limit($popular_event->content, 150, '.')) !!}</p>
                                    <div class="mt-4">
                                        <a href="javascript:void(0)" class="btn btn-primary">Read More </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('content')
    <section class="section">
        <div class="container">
            <div class="row align-items-center pb-4">
                <div class="col-md-8">
                    <div class="section-title text-center text-md-left">
                        <h2 class="font-weight-bold title-dark">Featured events</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($popular_events as $popular_event)
                    <div class="col-lg-4 col-md-6 mt-4 pt-2 d-flex align-items-stretch">
                        <div class="card blog rounded border-0 shadow overflow-hidden">
                            <div class="position-relative">
                                <img style="height: 300px; object-fit: cover; object-position: center;" src="{{ asset('thumbnail/'.$popular_event->thumbnail) }}" class="card-img-top" alt="Poster Event">
                                <div class="overlay bg-dark"></div>
                                <div class="teacher d-flex align-items-center">
                                    <img src="{{ $popular_event->author->gravatar() }}" class="avatar avatar-md-sm rounded-circle shadow" alt="">
                                    <div class="ml-2">
                                        <h6 class="mb-0"><a href="javascript:void(0)" class="text-light user">{{ $popular_event->author->name }}</a></h6>
                                    </div>
                                </div>
                                <div class="course-fee bg-white text-center shadow-lg rounded-circle">
                                    <h6 class="text-primary font-weight-bold fee">{{ $popular_event->payment_status === 1 ? "Paid" : "Free"}}</h6>
                                </div>
                            </div>
                            <div class="position-relative">
                                <div class="shape overflow-hidden text-white">
                                    <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="card-body content">
                                <small><p class="text-primary h6">{{ Carbon\Carbon::parse($popular_event->event_start)->isoFormat('dddd, D MMM, Y') }} {{ Carbon\Carbon::parse($popular_event->start_time)->format('H:i') }} WIB</p></small>
                                <h5 class="mt-2"><a href="{{ route('event.show', $popular_event->slug) }}" class="title text-dark"><strong>{{ $popular_event->event_title }}</strong></a></h5>
                                <ul class="list-unstyled d-flex justify-content-between border-top mt-3 pt-3 mb-0">
                                    <li class="text-muted small"><i data-feather="map" class="fea icon-sm text-info mr-1"></i> {{ $popular_event->location }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container mt-100 mt-60">
            <div class="row align-items-center pb-4">
                <div class="col-md-8">
                    <div class="section-title text-center text-md-left">
                        <h2 class="font-weight-bold title-dark">More events</h2>
                    </div>
                </div>

                <div class="col-md-4 mt-4 mt-sm-0">
                    <div class="text-center text-md-right">
                        <a href="javascript:void(0)" class="btn btn-soft-primary">See More <i data-feather="arrow-right" class="fea icon-sm"></i></a>
                    </div>
                </div>
            </div>

            <div id="posts" class="row">
                @foreach ($events as $event)
                    <div class="col-lg-4 col-md-6 mt-4 pt-2 d-flex align-items-stretch">
                        <div class="card blog rounded border-0 shadow overflow-hidden">
                            <div class="position-relative">
                                <img style="height: 300px; object-fit: cover; object-position: center;" src="{{ asset('thumbnail/'.$event->thumbnail) }}" class="card-img-top" alt="Poster Event">
                                <div class="overlay bg-dark"></div>
                                <div class="teacher d-flex align-items-center">
                                    <img src="{{ $event->author->gravatar() }}" class="avatar avatar-md-sm rounded-circle shadow" alt="">
                                    <div class="ml-2">
                                        <h6 class="mb-0"><a href="javascript:void(0)" class="text-light user">{{ $event->author->name }}</a></h6>
                                    </div>
                                </div>
                                <div class="course-fee bg-white text-center shadow-lg rounded-circle">
                                    <h6 class="text-primary font-weight-bold fee">{{ $event->payment_status === 1 ? "Paid" : "Free"}}</h6>
                                </div>
                            </div>
                            <div class="position-relative">
                                <div class="shape overflow-hidden text-white">
                                    <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="card-body content">
                                <small><p class="text-primary h6">{{ Carbon\Carbon::parse($event->event_start)->isoFormat('dddd, D MMM, Y') }} {{ Carbon\Carbon::parse($event->start_time)->format('H:i') }} WIB</p></small>
                                <h5 class="mt-2"><a href="{{ route('event.show', $event->slug) }}" class="title text-dark"><strong>{{ $event->event_title }}</strong></a></h5>
                                <ul class="list-unstyled d-flex justify-content-between border-top mt-3 pt-3 mb-0">
                                    <li class="text-muted small"><i data-feather="map" class="fea icon-sm text-info mr-1"></i> {{ $event->location }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
