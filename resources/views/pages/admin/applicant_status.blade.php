@include('components/admin_head', ['page_title' => 'Applicant Status | Alphalink Global Solutions'])
@include('components/admin_header')
<div class="container-fluid">
    <div class="row">
        @include('components/admin_sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="mt-3 card">
                <div class="card-body">
                    <h1>Applicant Status List</h1>
                    <hr />
                    <form action="{{ route('applicant-status.add') }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-10 mb-3">
                                <input type="text" class="form-control" id="description" name="description" placeholder="eg. For Interview">
                            </div>
                            <div class="col-md-2 mb-3">
                                <button type="submit" class="btn btn-primary w-100">Add Status</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsiveness">
                        <table id="status-table" class="table table-bordered table-small">
                            <caption>List of applicant status</caption>
                            <thead>
                                <tr>
                                    <th style="width: 80%;">Status</th>
                                    <th style="width: 20%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applicant_status as $status)
                                    <tr>
                                        <td>{{$status->description}} @if($status->is_delete) <span class="badge bg-danger">Deleted</span> @endif</td>
                                        <td>
                                            <div class="w-100 h-100 d-flex justify-content-center">
                                                <form onsubmit="return confirmDelete()" action="{{route('applicant-status.delete')}}/{{$status->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                        <button @if($status->is_delete) disabled @endif type="button" onclick="editStatus({{$status->id}})" class="btn btn-success"><em class="bi bi-pencil-square"></em></button>
                                                        <button @if($status->is_delete) disabled @endif type="submit" class="btn btn-danger"><em class="bi bi-trash-fill"></em></button>
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
<div class="modal fade" id="editStatus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editStatusLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h2 class="h1 modal-title fs-5" id="editStatusLabel">Edit Status</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('applicant-status.update')}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" class="form-control" id="edit_id" name="id">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="description" class="form-label">Status</label>
                    <input type="text" class="form-control" id="edit_description" name="description">
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
    $('#status-table').DataTable();
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

    async function editStatus(status_id) {
        let description = document.querySelector('#edit_description');
        let stat_id = document.querySelector('#edit_id');
        await fetch(`{{ route('status-single-api.show') }}/${status_id}`).then(res => res.json()).then(res => {
            description.value = res.data.description;
            stat_id.value = status_id;
        }).then(res => {
            $('#editStatus').modal('toggle');
        });
    }
</script>
@include('components/admin_foot')