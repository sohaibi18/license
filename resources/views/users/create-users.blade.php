<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="POST" action="/add/user/{{$id}}" enctype="multipart/form-data">

            @csrf
            <div class="row">
                <div class="col-xxl-10">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Add User</h5>
                            <small class="text-muted float-end">Default label</small>
                        </div>
                        <div class="card-body"><br>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">User Name</label>
                                <div class="col-sm-8">
                                    <input
                                        type="text"
                                        class="form-control border border-primary font-weight-bold"
                                        name="name"
                                        placeholder=""/>
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input
                                        id="basic-default-message"
                                        class="form-control border border-primary font-weight-bold"
                                        name="email"
                                        aria-describedby="basic-icon-default-message2"
                                    />
                                    <small class="text-muted">Enter your email in the format: example@mail.com</small>
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Enter Password</label>
                                <div class="col-sm-8">
                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control border border-primary font-weight-bold"
                                        name="password"
                                        aria-describedby="basic-icon-default-message2"
                                    />
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-8">
                                    <input
                                        id="password_confirmation"
                                        type="password"
                                        class="form-control border border-primary font-weight-bold"
                                        name="password_confirmation"
                                        aria-describedby="basic-icon-default-message2"
                                    />
                                    @error('password_confirmation')
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
                            <button type="submit" class="btn btn-primary">Save User</button>
                        </div>
                    </div>


                </div>
            </div>
        </form>
    </div>
    </div>
</x-layouts.app>
