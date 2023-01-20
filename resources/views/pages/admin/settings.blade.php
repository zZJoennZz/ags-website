@include('components/admin_head', ['page_title' => 'Website Settings | Alphalink Global Solutions'])
@include('components/admin_header')
<div class="container-fluid">
    <div class="row">
        @include('components/admin_sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="mt-3 card">
                <div class="card-body">
                    <h1>Site Settings</h1>
                    <hr />
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="full_address" class="form-label">Full Address</label>
                            <textarea class="form-control" id="full_address" name="full_address">{{ $settings[0]->full_address }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $settings[0]->phone_number }}">
                        </div>
                        <div class="mb-3">
                            <label for="email_address" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email_address" name="email_address" value="{{ $settings[0]->email_address }}">
                        </div>
                        <div class="mb-3">
                            <label for="twitter_url" class="form-label">Twitter URL</label>
                            <input type="text" class="form-control" id="twitter_url" name="twitter_url" value="{{ $settings[0]->twitter_url }}">
                        </div>
                        <div class="mb-3">
                            <label for="facebook_url" class="form-label">Facebook URL</label>
                            <input type="text" class="form-control" id="facebook_url" name="facebook_url" value="{{ $settings[0]->facebook_url }}">
                        </div>
                        <div class="mb-3">
                            <label for="rss_url" class="form-label">RSS URL</label>
                            <input type="text" class="form-control" id="rss_url" name="rss_url" value="{{ $settings[0]->rss_url }}">
                        </div>
                        <hr />
                        <div class="mb-3">
                            <label for="who_are_we_text" class="form-label">Who Are We Text</label>
                            <textarea class="form-control" id="who_are_we_text" name="who_are_we_text">{{ $settings[0]->who_are_we_text }}</textarea>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
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
@include('components/admin_foot')