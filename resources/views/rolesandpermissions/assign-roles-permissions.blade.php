<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="POST" action="/save/roles/permissions/{{ $id }}" enctype="multipart/form-data">

            @csrf
            <!-- Basic Layout -->
            <div class="row">

                <div class="col-xxl-10">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Users</h5>
                            <small class="text-muted float-end">Default label</small>
                        </div>
                        <div class="card-body"><br>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Select User</label>
                                <div class="col-sm-8">
                                    <select name="user_id" class="selectpicker border border-primary font-weight-bold" multiple
                                            data-live-search="true">
                                        @foreach($users as $user)
                                            <option value="{{ $user['id'] }}">
                                                {{ $user['name'] }}
                                               </option>
                                        @endforeach
                                    </select><br>
                                    @error('users')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xxl-10">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Roles</h5>
                            <small class="text-muted float-end">Default label</small>
                        </div>
                        <div class="card-body"><br>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Select Roles</label>
                                <div class="col-sm-8">
                                    <select name="roles[]" class="selectpicker border border-primary font-weight-bold" multiple
                                            data-live-search="true">
                                        @foreach($roles as $role)
                                            <option value="{{ $role['id'] }}">
                                                {{ $role['name'] }}
                                            </option>
                                        @endforeach
                                    </select><br>
                                    @error('roles')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xxl-10">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Permissions</h5>
                            <small class="text-muted float-end">Default label</small>
                        </div>
                        <div class="card-body"><br>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Select Permissions</label>
                                <div class="col-sm-8">
                                    <select name="permissions[]" class="selectpicker border border-primary font-weight-bold" multiple
                                            data-live-search="true">
                                        @foreach($permissions as $permission)
                                            <option value="{{ $permission['id'] }}">
                                                {{ $permission['name'] }}
                                            </option>
                                        @endforeach
                                    </select><br>
                                    @error('permissions')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="row justify-content-start">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Save Roles and Permissions</button>
                        </div>
                    </div>


                </div>
            </div>
        </form>
    </div>
    </div>
</x-layouts.app>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


