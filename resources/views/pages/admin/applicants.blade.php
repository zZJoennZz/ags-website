@include('components/admin_head', ['page_title' => 'Applicants | Alphalink Global Solutions'])
@include('components/admin_header')
<div class="container-fluid">
    <div class="row">
        @include('components/admin_sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="mt-3 card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addNewApplicant">
                        <em class="bi bi-plus-circle"></em> Add Applicant
                    </button>
                    <h1>Applicants List</h1>
                    <hr />
                    <div class="table-responsiveness">
                        <table id="applicant-table" class="table table-bordered table-small">
                            <caption>List of applicants</caption>
                            <thead>
                                <tr>
                                    <th style="width: 25%;">Job Vacancy</th>
                                    <th style="width: 35%;">Full Name</th>
                                    <th style="width: 20%;">Status</th>
                                    <th style="width: 20%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_applicants as $applicant)
                                    <tr>
                                        <td>
                                            {{ $applicant->job_vacancy_record->position_name }}
                                        </td>
                                        <td>@if($applicant->is_delete) <span class="badge bg-danger">Deleted</span> @endif {{$applicant->first_name}} {{$applicant->middle_name}} {{$applicant->last_name}} @if($applicant->gender === 1) <em class="bi bi-gender-male"></em> @else <em class="bi bi-gender-female"></em> @endif</td>
                                        <td>
                                            {{ $applicant->status->description }}
                                        </td>
                                        <td>
                                            <div class="w-100 h-100 d-flex justify-content-center">
                                                <form onsubmit="return confirmDelete()" action="{{route('applicant.delete')}}/{{$applicant->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                        <button @if($applicant->is_delete) disabled @endif type="button" onclick="viewApplicant({{$applicant->id}})" class="btn btn-primary"><em class="bi bi-eye-fill"></em></button>
                                                        <button @if($applicant->is_delete) disabled @endif type="submit" class="btn btn-danger"><em class="bi bi-trash-fill"></em></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addNewApplicant" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addNewApplicantLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h2 class="h1 modal-title fs-5" id="addNewApplicantLabel">Add New Applicant</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="addnewapplicant" method="POST" action="{{ route('applicant.new') }}" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <div class="mb-3">
                    <label for="job_vacancy" class="form-label">Position</label>
                    <select class="form-select" id="job_vacancy" name="job_vacancy" aria-label="Select job vacancy">
                        <option selected>Select job vacancy</option>
                        @foreach ($job_vacancies as $vacancy)
                            <option value="{{$vacancy->id}}">{{$vacancy->position_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-4 col-sm-12">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
    
                    <div class="mb-3 col-md-4 col-sm-12">
                        <label for="middle_name" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name" required>
                    </div>
    
                    <div class="mb-3 col-md-4 col-sm-12">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-4 col-sm-12">
                        <span class="form-label">Gender</span>
                        <div class="form-check">
                            <input class="form-check-input" value="1" type="radio" name="gender" id="male">
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" value="2" type="radio" name="gender" id="female">
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>
                    </div>

                    <div class="mb-3 col-md-4 col-sm-12">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3 col-md-4 col-sm-12">
                        <label for="contact_number" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number" required>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-12">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" required></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-12">
                        <label for="cover_letter" class="form-label">Cover Letter</label>
                        <textarea class="form-control" id="cover_letter" name="cover_letter" placeholder="(Optional)"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-12">
                        <label for="resume" class="form-label">Resume</label>
                        <input type="file" accept="application/pdf" class="form-control" id="resume" name="resume" required>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="viewApplicant" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewApplicantLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h2 class="h1 modal-title fs-5" id="viewApplicantLabel">View Applicant Information</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('applicant.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <input type="hidden" name="id" id="app_id">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="view_job_vacancy" class="form-label">Position</label>
                    <select class="form-select" id="view_job_vacancy" name="job_vacancy" aria-label="Select job vacancy">
                        <option selected>Select job vacancy</option>
                        @foreach ($job_vacancies as $vacancy)
                            <option value="{{$vacancy->id}}">{{$vacancy->position_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-4 col-sm-12">
                        <label for="view_first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="view_first_name" name="first_name" required>
                    </div>
    
                    <div class="mb-3 col-md-4 col-sm-12">
                        <label for="view_middle_name" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="view_middle_name" name="middle_name" required>
                    </div>
    
                    <div class="mb-3 col-md-4 col-sm-12">
                        <label for="view_last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="view_last_name" name="last_name" required>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-4 col-sm-12">
                        <span class="form-label">Gender</span>
                        <div class="form-check">
                            <input class="form-check-input" value="1" type="radio" name="gender" id="view_male">
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" value="2" type="radio" name="gender" id="view_female">
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>
                    </div>

                    <div class="mb-3 col-md-4 col-sm-12">
                        <label for="view_email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="view_email" name="email" required>
                    </div>

                    <div class="mb-3 col-md-4 col-sm-12">
                        <label for="view_contact_number" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="view_contact_number" name="contact_number" required>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-12">
                        <label for="view_address" class="form-label">Address</label>
                        <textarea class="form-control" id="view_address" name="address" required></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-12">
                        <label for="view_cover_letter" class="form-label">Cover Letter</label>
                        <textarea class="form-control" id="view_cover_letter" name="cover_letter" placeholder="(Optional)"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-12">
                        <label for="resume" class="form-label">Resume</label>
                        <input type="file" accept="application/pdf" class="form-control" id="resume" name="resume">
                    </div>
                    <div class="mb-2 ps-4">
                        <a id="view_resume_download" href="#" download><em class="bi bi-file-earmark-arrow-down-fill"></em> <span id="view_resume"></span></a>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>

<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
    $('#applicant-table').DataTable();
} );
</script>

<script>
    function confirmDelete() {
        let a = confirm("Are you sure to delete?");
        if (a) {
            return true;
        }

        return false;
    }

    async function viewApplicant(applicant_id) {
        // let job_vacancy = document.querySelector('#');
        await fetch(`{{ route('applicant.single') }}/${applicant_id}`).then(res => res.json()).then(res => {
            $('#view_job_vacancy').val(res.data.job_vacancy).change();
            $('#view_first_name').val(res.data.first_name);
            $('#view_middle_name').val(res.data.middle_name);
            $('#view_last_name').val(res.data.last_name);
            if (res.data.gender === 1) {
                $("#view_male").prop("checked", true);
            } else {
                $("#view_female").prop("checked", true);
            }
            $('#view_email').val(res.data.email);
            $('#view_contact_number').val(res.data.contact_number);
            $('#view_address').val(res.data.address);
            $('#view_cover_letter').val(res.data.cover_letter);
            $('#view_resume').html(res.data.resume);
            $('#view_resume_download').attr('href', `{{asset('storage/resume')}}/${res.data.resume}`);
            $('#app_id').val(applicant_id);
        }).then(res => {
            $('#viewApplicant').modal('toggle');
        });
    }
</script>
@include('components/admin_foot')