@include('components/head')
@include('components/menu')
<div class="parallax-content baner-content" id="home">
    <div class="container">
        <div class="text-content">
            <video autoplay loop muted plays-inline class="back-video">
                <source src="img/Video.mp4" type="video/mp4">
            </video>
            <h2><em>MULTIPLE</em><span> JOB</span> OPENINGS AWAIT!</h2>
            <p>Unlock thousands of BPO and Tech positions with one chat interview..</p>
            <div class="primary-white-button">
                <a href="Chat/front page-chat.html">Chat Interview</a>
            </div>
        </div>
    </div>
</div>

<section id="about" class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="service-item">
                    <div class="icon">
                        <img src="img/service_icon_01.png" alt="">
                    </div>
                    <h4>Our Partner Industries</h4>
                    <div class="line-dec"></div>
                    <p>Curabitur non risus fringilla libero accumsan molestie et quis justo. Cras aliquam tempor sem, vestibulum facilisis dui. Mauris malesuada porta.</p>

                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="service-item">
                    <div class="icon">
                        <img src="img/service_icon_05.png" alt="">
                    </div>
                    <h4>Free Online Courses</h4>
                    <div class="line-dec"></div>
                    <p>Alphalink Global Solutions aims to help more applicants tp broaden their knowledge and pass all the interview process.</p>
                    <div class="primary-white-button">

                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="service-item">
                    <div class="icon">
                        <img src="img/service_icon_03.png" alt="">
                    </div>
                    <h4>24/7 Chat Interview</h4>
                    <div class="line-dec"></div>
                    <p>Job seekers can explore thousands of job openings from multiple companies, positions and locations and apply for them in one place. With Alphalink Global Solutions, career goals are only a chat interview away.</p>
                    <div class="primary-white-button">

                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="service-item">
                    <div class="icon">
                        <img src="img/service_icon_06.png" alt="">
                    </div>
                    <h4>Employement Areas</h4>
                    <div class="line-dec"></div>
                    <p>We do have a lot of site in Luzon, Visayas, and Mindanao. </p>
                    <div class="primary-white-button">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="agentjob">
    <div class="content-wrapper">
        <div class="inner-container container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="section-heading">
                        <h4>Job Vacancies</h4>
                        <div class="line-dec"></div>
                        <p>We have hundreds of job vacancies waiting to be filled. If you’re ready to start your career journey with Alphalink Global Solutions today, feel free to check our current openings and apply now. </p>
                        <a href=""><button>APPLY NOW!</button></a>

                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="thumb">
                        <div class="image col-lg-offset-0">
                            <a href="#" data-lightbox="image-1" alt=""><img src="{{ asset('img/portfolio_big_item_04.jpg') }}" alt="" class="img-thumbnail"></a>
                        </div>
                        <div>&nbsp;</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div id="owl-testimonials" class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="testimonials-item">
                            <p>“ People in Alphalink are totally approachable. If you're planning to apply to any call center, just go directly here and they will accommodate you politely and respectfully. You can trust them! ”</p>
                            <h4>Arel Escote</h4>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonials-item">
                            <p>“ This firm is totally of big help. They bring right people to the right BPO company. It's the passion that will drive you towards achievement. I highly recommend you to tap them as your partner. ”</p>
                            <h4>Shiela Mingoa</h4>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonials-item">
                            <p>“ This is indeed one of the best recruitment firms in the country. Guys, try niyo. Pagdating na pagdating niyo dun, ma-amaze kayo kung gano kaorganize yung process. And may free orientation pa about Call center application. You will surely love it. 🙂 ”</p>
                            <h4>Rhoniel Quiambao</h4>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonials-item">
                            <p>“ I highly recommend Alphalink to those who haven't tried applying to BPO. The staffs are very accommodating and they are all willing to help those unemployed with the best option available, base on your locations and qualifications. They also give helpful tips. Do's and Don'ts. Thanks Alphalink again! More power ”</p>
                            <h4>Rapz Quinto</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('components/foot')