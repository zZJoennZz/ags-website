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
                <a href="{{ route('chat.home') }}">Chat Interview</a>
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
                        <p>We have hundreds of job vacancies waiting to be filled. If you're ready to start your career journey with Alphalink Global Solutions today, feel free to check our current openings and apply now. </p>
                        <a href="{{ route('agent.job') }}"><button>APPLY NOW!</button></a>

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

<div class="tabs-content" id="blog">
    <div class="container">
        <div class="row">
            <div class="wrapper">
                <div class="col-md-4">
                    <div class="section-heading">
                        <h4><br><br>Our Blog Posts</h4>
                        <div class="line-dec"></div>
                        <p>Some FREE RESOURCES to help your career grow.</p>
                        <ul class="tabs clearfix" data-tabgroup="first-tab-group">
                            <li><a href="#tab1" class="active">How to apply in the BPO industry? BPO Career Tips: A Job Seeker’s Guide to a BPO Company Interview</a></li>
                            <li><a href="#tab2">How to improve your English</a></li>
                            <li><a href="#tab3">How to Handle an Irate Customer</a></li>
                            <li><a href="#tab4">Versant and Berlitz Simulation Test</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <section id="first-tab-group" class="tabgroup">
                        <div id="tab1">
                            <img src="img/Guide.jpg" alt="">
                            <div class="text-content">

                                <p>Are you planning to apply to a BPO company for the first time? Or is it that you are aiming for a new BPO job?

                                    If you want to increase your chances of being hired, it is best to be ready, especially when it comes to job interview questions and answers.

                                    Since there are many BPO benefits in terms of economic or personal growth, working for a BPO business is perhaps the finest thing you can do for your career.

                                    We’ll provide you with a short interview guide in this article to help you get through your interview and come out with a job offer.</p>

                            </div>
                        </div>
                        <div id="tab2">
                            <img src="img/english.png" alt="">
                            <div class="text-content">

                                <p>We always write about positive reviews, great customer service, and advice on what you can do to provide it in your company. Yet we don’t keep ourselves from posting about angry and irate customers. And we cannot deny the fact that it is sometimes hard to deal with them.

                                    If you work in customer service or own a business, you will occasionally need to take calls from irate customers. The way you handle these calls can determine the quality of reviews you receive and the success of your business.

                                    So, take a look at this article and see the things you can do when handling irate customers.</p>
                                <a href="{{route('course.one')}}" button class="w3-btn w3-black">Continue Reading</a>
                            </div>
                        </div>
                        <div id="tab3">
                            <img src="img/irate.jpg" alt="">
                            <div class="text-content">

                                <p>Who do you call when you have a problem with a product or service? More often than not, it is the company’s customer service call center.

                                    These calls are important to the customer service process, and call center agents are on the frontlines. After all, you are the first-person customers turn to get their questions answered and their problems solved. And, according to the study, 63% of customers agree that resolving an issue quickly or at first contact is the most important element of a good customer experience.

                                    In this article, we will give you seven skills you need to possess as a call center agent to provide excellent customer service and impress bosses both present and future.</p>
                                <a href="{{route('course.two')}}" button class="w3-btn w3-black">Continue Reading</a>
                            </div>
                        </div>
                        <div id="tab4">
                            <img src="img/versant.png" alt="">
                            <div class="text-content">

                                <p>Benjamin Franklin once said “By failing to prepare you are preparing to fail”. This also applies when you are applying for a job. How well you are prepared for your exams and interviews will determine the outcome of your job application. Here are 6 things you should be doing the day before your scheduled application.</p>
                                <a href="{{route('course.three')}}" button class="w3-btn w3-black">Continue Reading</a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

@include('components/foot')