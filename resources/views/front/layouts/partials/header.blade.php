<nav class="navbar navbar-expand-lg navbar-light edu-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('front/assets/img/logo190x50px.png') }}" alt="Logo" lazy="loading">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('event') }}">Browse Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/event-gallery') }}">Gallery</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
