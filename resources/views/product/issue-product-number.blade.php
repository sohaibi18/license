<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="POST" action="/issue/productnumber/{{$userid}}/{{$id}}">
            @csrf
            <!-- Basic Layout -->
            <div class="row">
                <!-- Personal Information -->
                <div class="col-xxl-10">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Issue Product Registration Number</h5>
                            <small class="text-muted float-end">Default label</small>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Product Registration No</label>
                                <div class="col-sm-8">
                                    <label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="Product_Registration_No"
                                            value="{{ $nextProductRegNumber }}"
                                            placeholder=""/>
                                        @if($errors->has('Product_Registration_No'))
                                            <span class="alert alert-danger"> {{ $errors->first('Product_Registration_No') }}</span>
                                            <br>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="row justify-content-start">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Issued</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-layouts.app>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
