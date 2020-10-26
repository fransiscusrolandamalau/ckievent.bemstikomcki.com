@extends('front.layouts.main')
@section('stylesheet')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfBBQRaQq65ekYz3UQ==" crossorigin="anonymous" />
@endsection
@section('banner')
    <div class="page-banner banner-bg-one">
        <div class="container">
            <div class="banner-text">
                <h1>Gallery</h1>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section class="events-area pt-100 pb-180">
        <div class="container">
            <div class="row">
                @foreach ($photos as $photo)
                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="single-event se-mb-30" style="height: 250px">
                            <a href="/gallery/{{ $photo->filename }}" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4" data-max-width="600">
                                <img src="/gallery/{{ $photo->filename }}" alt="{{ $photo->original_name }}" lazy="loading" class="img-fluid" style='height: 100%; width: 100%; object-fit: contain'>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <nav class="pagination-outer" aria-label="Page navigation">
                <ul class="pagination">
                    {{ $photos->links() }}
                </ul>
            </nav>
        </div>
    </section>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g==" crossorigin="anonymous"></script>
<script>
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
</script>
@endpush
