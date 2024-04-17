<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="POST" action="/update/license/category/{{ $id }}" enctype="multipart/form-data">

            @csrf
            <!-- Basic Layout -->
            <div class="row">
                <!-- Personal Information -->

                <!-- Business Information -->
                <div class="col-xxl-10">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Previous License Category</h5>
                            <small class="text-muted float-end">Default label</small>
                        </div>
                        <div class="card-body"><br>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Existing License Category</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                           class="form-control border border-primary font-weight-bold"
                                           value="{{ optional($appid->licenseCategory)->License_Category_Name ?? 'N/A' }}"
                                           readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- License Category -->
                <div class="col-xxl-10">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Choose License Category</h5>
                            <small class="text-muted float-end">Default label</small>
                        </div>
                        <div class="card-body"><br>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">New License Category</label>
                                <div class="col-sm-8">
                                    <select name="licensecategories[]" class="selectpicker border border-primary font-weight-bold" multiple
                                            data-live-search="true">
                                        @foreach($licensecategories as $licensecat)
                                            <option value="{{ $licensecat['id'] }}">
                                                {{ $licensecat['License_Category_Name'] }}
                                                - {{ $licensecat['License_Fee'] }}</option>
                                        @endforeach
                                    </select><br>
                                    @error('licensecategories')
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
                            <button type="submit" class="btn btn-primary">Update License Category</button>
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




