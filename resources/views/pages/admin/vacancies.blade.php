@include('components/admin_head', ['page_title' => 'Job Vacancies | Alphalink Global Solutions'])
@include('components/admin_header')
<div class="container-fluid">
    <div class="row">
        @include('components/admin_sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="mt-3 card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addNewVacancy">
                        <em class="bi bi-plus-circle"></em> Add New Vacancy
                    </button>
                    <h1>Job Vacancies List</h1>
                    <hr />
                    <div class="table-responsiveness">
                        <table id="vacancy-table" class="table table-bordered table-small">
                            <caption>List of job vacancies</caption>
                            <thead>
                                <tr>
                                    <th style="width: 50%;">Vacancy Information</th>
                                    <th style="width: 20%;">Availability</th>
                                    <th style="width: 10%;">Status</th>
                                    <th style="width: 20%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_vacancies as $vacancy)
                                    <tr>
                                        <td>
                                            <div class="fs-4 fw-bold">{{$vacancy->position_name}}</div>
                                            <div class="fst-italic small">
                                                {{$vacancy->description}}
                                            </div>
                                        </td>
                                        <td>{{$vacancy->availability}}</td>
                                        <td>
                                            @if ($vacancy->is_active && !$vacancy->is_delete)
                                                <span class="badge bg-primary"><em class="bi bi-check2-circle"></em> Active</span>
                                            @else
                                                @if ($vacancy->is_delete)
                                                    <span class="badge bg-danger"><em class="bi bi-x-circle-fill"></em> Deleted</span>
                                                @else
                                                    <span class="badge bg-warning"><em class="bi bi-pause-circle-fill"></em> Inactive</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            <div class="w-100 h-100 d-flex justify-content-center">
                                                <form onsubmit="return confirmDelete()" action="{{route('vacancies.delete')}}/{{$vacancy->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                        <button @if($vacancy->is_delete) disabled @endif type="button" onclick="viewVacancy({{$vacancy->id}})" class="btn btn-primary"><em class="bi bi-eye-fill"></em></button>
                                                        <button @if($vacancy->is_delete) disabled @endif type="button" onclick="editVacancy({{$vacancy->id}})" class="btn btn-success"><em class="bi bi-pencil-square"></em></button>
                                                        <button @if($vacancy->is_delete) disabled @endif type="submit" class="btn btn-danger"><em class="bi bi-trash-fill"></em></button>
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
<div class="modal fade" id="addNewVacancy" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addNewVacancyLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h2 class="h1 modal-title fs-5" id="addNewVacancyLabel">Add New Vacancy</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="addnewvacancy" method="POST" action="{{ route('vacancies.add') }}">
            <div class="modal-body">
                @csrf
                <div class="mb-3">
                    <label for="position_name" class="form-label">Position Name</label>
                    <input type="text" class="form-control" id="position_name" name="position_name" placeholder="eg. Web Developer">
                </div>

                <div class="mb-3">
                    <label for="availability" class="form-label">Availability</label>
                    <input type="number" class="form-control" id="availability" name="availability" min="0">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description"></textarea>
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
<div class="modal fade" id="viewVacancy" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewVacancyLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h2 class="h1 modal-title fs-5" id="viewVacancyLabel">Vacancy Information</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="position_name" class="form-label">Position Name</label>
                <input type="text" class="form-control" id="view_position_name" name="view_position_name" readonly>
            </div>

            <div class="mb-3">
                <label for="availability" class="form-label">Availability</label>
                <input type="number" class="form-control" id="view_availability" name="view_availability" min="0" readonly  >
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="view_description" id="view_description" readonly></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editVacancy" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editVacancyLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h2 class="h1 modal-title fs-5" id="editVacancyLabel">Edit Vacancy Information</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('vacancies.update')}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" class="form-control" id="edit_id" name="id">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="position_name" class="form-label">Position Name</label>
                    <input type="text" class="form-control" id="edit_position_name" name="position_name">
                </div>
    
                <div class="mb-3">
                    <label for="availability" class="form-label">Availability</label>
                    <input type="number" class="form-control" id="edit_availability" name="availability" min="0">
                </div>
    
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="edit_description"></textarea>
                </div>
    
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="edit_is_active" name="is_active">
                        <label class="form-check-label" for="edit_is_active">
                            Active
                        </label>
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
    $('#vacancy-table').DataTable();
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

    async function viewVacancy(vacancy_id) {
        let position_name = document.querySelector('#view_position_name');
        let availability = document.querySelector('#view_availability');
        let description = document.querySelector('#view_description');
        await fetch(`{{ route('vacancy-single-api.show') }}/${vacancy_id}`).then(res => res.json()).then(res => {
            position_name.value = res.data.position_name;
            availability.value = res.data.availability;
            description.value = res.data.description;
        }).then(res => {
            $('#viewVacancy').modal('toggle');
        });
    }

    async function editVacancy(vacancy_id) {
        let position_name = document.querySelector('#edit_position_name');
        let availability = document.querySelector('#edit_availability');
        let description = document.querySelector('#edit_description');
        let vac_id = document.querySelector('#edit_id');
        await fetch(`{{ route('vacancy-single-api.show') }}/${vacancy_id}`).then(res => res.json()).then(res => {
            position_name.value = res.data.position_name;
            availability.value = res.data.availability;
            description.value = res.data.description;
            vac_id.value = vacancy_id;
            if (res.data.is_active) {
                $('#edit_is_active').attr('checked', true);
            }
        }).then(res => {
            $('#editVacancy').modal('toggle');
        });
    }
</script>
@include('components/admin_foot')