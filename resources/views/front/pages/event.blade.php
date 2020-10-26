@extends('front.layouts.main')
@section('stylesheet')
    <link rel="stylesheet" type="text/css" href="{{ ('front/assets/css/custom.css') }}"/>

@endsection
@section('banner')
            <div class="page-banner banner-bg-one">
            <div class="container">
                <div class="banner-text">
                    <h1>CKI EVENT</h1>
                </div>
            </div>
        </div>
@endsection
@section('content')
<section class="events-area pt-100 pb-180">
    <div class="container">
        <div class="row">
            @foreach ($posts as $key => $post)
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="single-event se-mb-30">
                        <a href="{{ route('event.show', $post->slug) }}" class="crop">
                            <img src="{{ asset('thumbnail/'.$post->thumbnail) }}" alt="{{ $post->event_title }}" lazy="loading">
                        </a>
                        <div class="event-caption">
                            <span class="date">
                                <i class="icofont-calendar"></i> {{ date('d M, Y', strtotime($post->event_start)) }} {{ $post->start_time }}
                            </span>
                            <h3><a href="{{ route('event.show', $post->slug) }}">{{ Str::of($post->event_title)->limit(23) }}</a></h3>
                            <ul>
                                <li><i class="icofont-ticket"></i>
                                    @if ($post->payment_status == false)
                                       Free Payment
                                    @else
                                        Paid
                                    @endif
                                </li>
                                <li><i class="icofont-mega-phone"></i>{{ $post->author->name }}</li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <nav class="pagination-outer" aria-label="Page navigation">
            <ul class="pagination">
                {{ $posts->links() }}
            </ul>
        </nav>
    </div>
</section>
@endsection
