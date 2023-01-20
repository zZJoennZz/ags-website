@include('components/head', ['page_title' => 'About | Alphalink Global Solutions'])
@include('components/menu')
<style>

</style>
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
                        <p>Alphalink Global Solutions was established to help skilled applicants to be employment ready and introduce them to the best job option suited to their qualification.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services">
    <div class="container">
        <div class="row">
            <div class="item col-sm-12 col-md-3">
                <div class="icon">
                <img src="{{asset('img/service-icon-01.png')}}" alt="">
                </div>
                <div class="down-content">
                <p>CONTINUOUSLY INNOVATE ALL FACET OF STAFFING OF OUR COMPANY</p>
                </div>
            </div>
        
            
            <div class="item col-sm-12 col-md-3">
                <div class="icon">
                <img src="{{asset('img/service-icon-03.png')}}" alt="">
                </div>
                <div class="down-content">
                <p>DEVELOP VIGOROUS RELATIONSHIP WITH OUR CLIENT AND FUTURE STAKEHOLDERS.</p>
                </div>
            </div>
            
            <div class="item col-sm-12 col-md-3">
                <div class="icon">
                <img src="{{asset('img/service-icon-02.png')}}" alt="">
                </div>
                <div class="down-content">
                <p>BEING APPLICANT-FRIENDLY AND SOCIALLY RESPONSIBLE</p>
                </div>
            </div>
            
            <div class="item col-sm-12 col-md-3">
                <div class="icon">
                <img src="{{asset('img/service-icon-03.png')}}" alt="">
                </div>
                <div class="down-content">
                <p>SUSTAINABLY SOURCING APPLICANTS AND MATCH THEM WITH OUR CLIENT NEEDS.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('components/foot')