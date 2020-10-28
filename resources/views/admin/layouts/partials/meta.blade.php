<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{!! $title ?? '' !!} - {{ config('app.name') }}</title>

{{-- <meta name="description" content="{{ $description ?? '' }}">
<meta property="og:title" content="{{ $ogTitle ?? $title ?? '' }}"/>
<meta property="og:description" content="{{ $ogDescription ?? $description ?? '' }}"/>
<meta property="og:image" content="{{ $ogImage ?? url('/images/og-image.jpg') }}"/>
<meta property="og:url" content="{{ request()->getUri() }}"/>
<meta property="og:type" content="website" /> --}}
