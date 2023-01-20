@include('components/head', ['page_title' => 'Agent Job | Alphalink Global Solutions'])
@include('components/menu')
<section class="bg-success">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 style="font-weight: 600; text-transform: uppercase;">Job Vacancies</h1>
                <p class="col-sm-12 col-md-6">We have hundreds of job vacancies waiting to be filled. If you're ready to start your career journey with Alphalink Global Solutions today, feel free to check our current openings and apply now. </p>
            </div>
        </div>
    </div>
</section>
<section class="job-postings">
    <div class="container">
        <div class="row">
            @foreach (getJobPostings() as $vacancy)
                <div class="col-sm-9 col-md-4">
                    <div class="card">
                        <div style="padding-bottom: 0; padding-top: 0; float: right; font-size: 4rem;"><i class="fa fa-cogs" aria-hidden="true"></i></div>
                        <h2 style="font-weight: bold;">{{$vacancy->position_name}}</h2>
                        {{-- <p style="max-width: 250px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{$vacancy->description}}</p> --}}
                        <p style="">{{$vacancy->description}}</p>
                        <a href="{{ route('chat.home') }}" class="btn btn-danger" style="width: 100%;">Apply Now!</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('components/foot')