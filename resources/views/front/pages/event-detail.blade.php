@extends('front.layouts.main')
@section('banner')
    <div class="page-banner banner-bg-one">
        <div class="container">
            <div class="banner-text">
                @foreach ($posts as $post)
                <h1>{{ $post->event_title }}</h1>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section class="single-event-area ptb-100">
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
    </section>
@endsection
