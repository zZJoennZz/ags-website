@include('components/admin_head', ['page_title' => 'Dashboard | Alphalink Global Solutions'])
@include('components/admin_header')
<div class="container-fluid">
    <div class="row">
        @include('components/admin_sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="mt-3 card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 border-bottom border-primary text-secondary pb-3 mb-3">
                            Summary of Business
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3 col-sm-12">
                            <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title fs-6 text-end">Total Applicants</h5>
                                    <p class="card-text fw-bold fs-1 text-end">{{$total_applicants}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-12">
                            <div class="card text-bg-success" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title fs-6 text-end">Total Vacancies</h5>
                                    <p class="card-text fw-bold fs-1 text-end">{{$total_job_vacancies}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
@include('components/foot')