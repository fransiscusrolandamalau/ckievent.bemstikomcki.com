@extends('front.layouts.main')
@section('content')
        <section class="contact-us-section ptb-100 white-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-4">
                        <div class="contact-info">
                            <i class="icofont-google-map"></i>
                            <h3>Address</h3>
                            <p>184 Collins Street West Victoria, United States</p>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-4">
                        <div class="contact-info">
                            <i class="icofont-envelope"></i>
                            <h3>Email</h3>
                            <p>
                                <a href="mailto:support@education.com">
                                    support@education.com
                                </a>
                            </p>
                            <p>
                                <a href="mailto:info@education.com">
                                    info@education.com
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-4">
                        <div class="contact-info">
                            <i class="icofont-phone"></i>
                            <h3>Phone</h3>
                            <p>
                                <a href="tel:info@education.com">
                                    +44 44859 4875
                                </a>
                            </p>
                            <p>
                                <a href="tel:info@education.com">
                                    +44 44859 4875
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="contact-form">
                    <form id="contactForm">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required data-error="Please enter your name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required data-error="Please enter your email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="msg_subject" placeholder="Subject" required data-error="Please enter your subject">
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" id="message" rows="5" placeholder="Message" data-error="Write your message" required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="text-center">
                            <button type="submit" id="submit" class="btn default-btn mt-10">Send Message</button>
                            <div id="msgSubmit" class="h4 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- End Contact us -->

        <!-- Map Area -->
        <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29624007.58460168!2d115.22979863156776!3d-24.992915938390176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2b2bfd076787c5df%3A0x538267a1955b1352!2sAustralia!5e0!3m2!1sen!2sbd!4v1547009556393"></iframe>
        </div>
        <!-- End Map Area -->
@endsection
