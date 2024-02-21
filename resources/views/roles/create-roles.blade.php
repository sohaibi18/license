<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="POST" action="/add/role/{{$id}}" enctype="multipart/form-data">

            @csrf
            <div class="row">
                <div class="col-xxl-10">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Add Role</h5>
                            <small class="text-muted float-end">Default label</small>
                        </div>
                        <div class="card-body"><br>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Add Role</label>
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

                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="row justify-content-start">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Save Role</button>
                        </div>
                    </div>


                </div>
            </div>
        </form>
    </div>
    </div>
</x-layouts.app>
