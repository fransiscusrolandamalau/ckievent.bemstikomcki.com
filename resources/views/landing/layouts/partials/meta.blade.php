<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="csrf-token" content="{{ csrf_token() }}" />

<title>{!! $title ?? '' !!} - {{ config('app.name') }}</title>

@hasSection ('meta')
    @yield('meta')
@else
    <meta name="title" content="@yield('title') - {{ config('app.name') }}">
    <meta name="description" content="CKI Event brings people together through live experiences. Discover events that match your passions">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->getUri() }}">
    <meta property="og:title" content="@yield('title') - {{ config('app.name') }}">
    <meta property="og:description" content="Sebuah organisasi kemahasiswaan yang nantinya akan menjadi wadah aktualisasi mahasiswa untuk memaksimalkan potensi minat dan bakat mahasiswa.">
    <meta property="og:image" content="{{ URL::to('/') }}/storage/site-setting">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ request()->getUri() }}">
    <meta property="twitter:title" content="@yield('title') - {{ config('app.name') }}">
    <meta property="twitter:description" content="Sebuah organisasi kemahasiswaan yang nantinya akan menjadi wadah aktualisasi mahasiswa untuk memaksimalkan potensi minat dan bakat mahasiswa.">
    <meta property="twitter:image" content="{{ URL::to('/') }}/storage/site-setting">
@endif
