@include('components/admin_head', ['page_title' => 'Users | Alphalink Global Solutions'])
@include('components/admin_header')
<div class="container-fluid">
    <div class="row">
        @include('components/admin_sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="mt-3 card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addNewUser">
                        <em class="bi bi-plus-circle"></em> Add User
                    </button>
                    <h1>Users List</h1>
                    <hr />
                    <div class="table-responsiveness">
                        <table id="user-table" class="table table-bordered table-small">
                            <caption>List of users</caption>
                            <thead>
                                <tr>
                                    <th style="width: 25%;">Username</th>
                                    <th style="width: 35%;">Full Name</th>
                                    <th style="width: 20%;">Status</th>
                                    <th style="width: 20%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_users as $user)
                                    <tr>
                                        <td>
                                            {{ $user->username }}
                                        </td>
                                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                                        <td>
                                            @if($user->is_active === 1) <span class="badge bg-primary">Active</span> @else <span class="badge bg-secondary">Inactive</span> @endif
                                        </td>
                                        <td>
                                            <div class="w-100 h-100 d-flex justify-content-center">
                                                <form onsubmit="return confirmDelete()" action="{{ route('user.delete') }}/{{$user->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button @if($user->is_active === 0) disabled @endif type="button" onclick="viewUser({{$user->id}})" class="btn btn-primary"><em class="bi bi-eye-fill"></em></button>
                                                        <button @if($user->is_active === 0) disabled @endif type="submit" class="btn btn-danger"><em class="bi bi-trash-fill"></em></button>
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
<div class="modal fade" id="addNewUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addNewUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h2 class="h1 modal-title fs-5" id="addNewUserLabel">Add New User</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="addnewuser" method="POST" action="{{ route('user.register') }}">
            <div class="modal-body">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-4 col-sm-12">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" autocomplete="username" required>
                    </div>

                    <div class="mb-3 col-md-4 col-sm-12">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" autocomplete="email" required>
                    </div>

                    <div class="mb-3 col-md-4 col-sm-12">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" required>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-4 col-12">
                        <label for="account_type" class="form-label">Account Type</label>
                        <select class="form-select" id="account_type" name="account_type" required>
                            <option value="" selected>Select account type</option>
                            <option value="ADMIN">Admin</option>
                            <option value="STAFF">Staff</option>
                        </select>
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
<div class="modal fade" id="viewUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h2 class="h1 modal-title fs-5" id="viewUserLabel">Add New User</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="viewnewuser" method="POST" action="{{ route('user.update') }}">
            <div class="modal-body">
                @csrf
                @method("PUT")
                <input type="hidden" id="view_id" name="id">
                <div class="row">
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="view_first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="view_first_name" name="first_name" required>
                    </div>
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="view_last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="view_last_name" name="last_name" required>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-4 col-sm-12">
                        <label for="view_username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="view_username" name="username" autocomplete="username" required>
                    </div>

                    <div class="mb-3 col-md-4 col-sm-12">
                        <label for="view_email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="view_email" name="email" autocomplete="email" required>
                    </div>

                    <div class="mb-3 col-md-4 col-sm-12">
                        <label for="view_password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="view_password" name="password" autocomplete="current-password">
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6 col-12">
                        <label for="view_account_type" class="form-label">Account Type</label>
                        <select class="form-select" id="view_account_type" name="account_type" required>
                            <option value="" selected>Select account type</option>
                            <option value="ADMIN">Admin</option>
                            <option value="STAFF">Staff</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6 col-12">
                        <label for="view_is_active" class="form-label">Status</label>
                        <select class="form-select" id="view_is_active" name="is_active" required>
                            <option value="" selected>Is user active?</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
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
    $('#user-table').DataTable();
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

    async function viewUser(user_id) {
        // let job_vacancy = document.querySelector('#');
        await fetch(`{{ route('user.single') }}/${user_id}`).then(res => res.json()).then(res => {
            $('#view_account_type').val(res.data.account_type).change();
            $('#view_first_name').val(res.data.first_name);
            $('#view_last_name').val(res.data.last_name);
            $('#view_username').val(res.data.username);
            $('#view_email').val(res.data.email);

            $('#view_is_active').val(res.data.is_active).change();

            $('#view_id').val(user_id);
        }).then(res => {
            $('#viewUser').modal('toggle');
        });
    }
</script>
@include('components/admin_foot')