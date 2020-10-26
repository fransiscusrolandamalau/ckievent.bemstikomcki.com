@extends('front.layouts.main')
@section('banner')
    <div class="hero-slider2 owl-carousel owl-theme owl-theme-1 rs">
            <div class="hero-slider-item item-bg-1">
                <div class="d-table">
                    <div class="d-tablecell">
                        <div class="hero-slider-text">
                            <span class="welcome-text">Welcome To</span>
                            <h1>Education Template</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
@section('content')
    <section class="events-area pt-100 pb-180">
        <div class="container">
            <div class="section-header">
                <i class="icofont-education"></i>
                <h2>Upcoming Events</h2>
            </div>
            <div class="row">
                @foreach ($posts as $key => $post)
                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="single-event se-mb-30">
                            <img src="{{ asset('thumbnail/'.$post->thumbnail) }}" alt="{{ $post->event_title }}" lazy="loading">
                            <div class="event-caption">
                                <span class="date">
                                    <i class="icofont-calendar"></i> {{ date('d M, Y', strtotime($post->event_start)) }}
                                </span>
                                <h3><a href="{{ route('event.show', $post->slug) }}">{{ Str::limit($post->event_title, 45, '...') }}</a></h3>
                                <ul>
                                    <li><i class="icofont-clock-time"></i> {{ $post->start_time }} - {{ $post->end_time }}</li>
                                    <li><i class="icofont-location-pin"></i> {{ $post->location }}</li>
                                    <li><i class="icofont-location-pin"></i> {{ $post->payment_status === 1 ? "Paid" : "Free"}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-20 text-center">
                <a href="#" class="book-now-btn">Read More</a>
            </div>
        </div>
    </section>
@endsection
