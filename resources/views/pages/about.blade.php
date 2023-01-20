@include('components/head', ['page_title' => 'About | Alphalink Global Solutions'])
@include('components/menu')
<section class="section main-banner" id="top" data-section="section1">
    <video autoplay muted loop id="bg-video">
        <source src="{{asset('img/course-video.mp4')}}" type="video/mp4" />
    </video>
    <div class="video-overlay header-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="caption">
                        <h2>WHO ARE WE?</h2>
                        <p>{{ getDefaults()[0]->who_are_we_text }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services">
    <div class="container">
        <div class="row">
            <div class="p-1 col-sm-12 col-md-3">
                <div class="item">
                    <div class="icon">
                    <img src="{{asset('img/service-icon-01.png')}}" alt="">
                    </div>
                    <div class="down-content">
                    <p>CONTINUOUSLY INNOVATE ALL FACET OF STAFFING OF OUR COMPANY</p>
                    </div>
                </div>
            </div>
        
            <div class="p-1 col-sm-12 col-md-3">
                <div class="item">
                    <div class="icon">
                    <img src="{{asset('img/service-icon-03.png')}}" alt="">
                    </div>
                    <div class="down-content">
                    <p>DEVELOP VIGOROUS RELATIONSHIP WITH OUR CLIENT AND FUTURE STAKEHOLDERS.</p>
                    </div>
                </div>
            </div>
            
            <div class="p-1 col-sm-12 col-md-3">
                <div class="item">
                    <div class="icon">
                    <img src="{{asset('img/service-icon-02.png')}}" alt="">
                    </div>
                    <div class="down-content">
                    <p>BEING APPLICANT-FRIENDLY AND SOCIALLY RESPONSIBLE</p>
                    </div>
                </div>
            </div>
            
            <div class="p-1 col-sm-12 col-md-3">
                <div class="item">
                    <div class="icon">
                    <img src="{{asset('img/service-icon-03.png')}}" alt="">
                    </div>
                    <div class="down-content">
                    <p>SUSTAINABLY SOURCING APPLICANTS AND MATCH THEM WITH OUR CLIENT NEEDS.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="upcoming-meetings" id="meetings">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>INDUSTRIES WE SERVE</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row">
    <div class="col-sm-12 col-md-6">
        <img src="{{ asset('img/about-1.png') }}" alt="" onclick="openModal();currentSlide(1)" class="hover-shadow">
    </div>
    <div class="col-sm-12 col-md-6">
        <img src="{{ asset('img/about-2.png') }}" alt="" onclick="openModal();currentSlide(2)" class="hover-shadow">
    </div>
    <div class="col-sm-12 col-md-6">
        <img src="{{ asset('img/about-3.png') }}" alt="" onclick="openModal();currentSlide(3)" class="hover-shadow">
    </div>
    <div class="col-sm-12 col-md-6">
        <img src="{{ asset('img/about-4.png') }}" alt="" onclick="openModal();currentSlide(4)" class="hover-shadow">
    </div>
</div>

<section class="our-courses" id="courses">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="background: rgba(255, 255, 255, 0.22);">
                <h2 style="color: #fff; font-weight: bold; margin-bottom: 2rem;">Our Partners</h2>
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <div class="content">
                            <img src="{{ asset('img/Accenture.png') }}" alt="Mountains" style="width:100%">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="content">
                            <img src="{{ asset('img/Alorica.png') }}" alt="Lights" style="width:100%">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="content">
                            <img src="{{ asset('img/Teleperformance.png') }}" alt="Nature" style="width:100%">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="content">
                            <img src="{{ asset('img/HGS.png') }}" alt="Car" style="width:100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('components/foot')