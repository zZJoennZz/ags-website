@include('components/head', ['page_title' => 'Contact Us | Alphalink Global Solutions'])
@include('components/menu')
<section class="bg-danger">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 style="font-weight: 600; text-transform: uppercase;">Get in touch!</h1>
                <p class="col-sm-12 col-md-6">Anything we can help you with for your application? just send us a message.</p>
            </div>
        </div>
    </div>
</section>
<section class="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <img src="{{ asset('img/contact-png.png') }}" alt="contact us image">
            </div>
            <div class="col-sm-12 col-md-6">
                <h2>Reach us at these information</h2>
                <ul>
                    <li><em style="margin-right: 1rem;">Phone:</em> {{ getDefaults()[0]->phone_number }}</li>
                    <li><em style="margin-right: 1rem;">Email:</em> {{ getDefaults()[0]->email_address }}</li>
                </ul>
                <h2>Connect with us at</h2>
                <ul style="font-size: 5rem;">
                    <li style="display: inline; margin-right: 2rem;"><a href="{{ getDefaults()[0]->twitter_url }}"><i class="fa fa-twitter"></i></a></li>
                    <li style="display: inline; margin-right: 2rem;"><a href="{{ getDefaults()[0]->facebook_url }}"><i class="fa fa-facebook"></i></a></li>
                    <li style="display: inline; margin-right: 2rem;"><a href="mailto:{{ getDefaults()[0]->email_address }}"><i class="fa fa-google"></i></a></li>
                    <li style="display: inline;"><a href="{{ getDefaults()[0]->rss_url }}"><i class="fa fa-rss"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

@include('components/foot')