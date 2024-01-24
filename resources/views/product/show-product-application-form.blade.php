<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="POST" action="/store/product/data/{{ $id }}" enctype="multipart/form-data">
            @csrf
            <!-- Basic Layout -->
            <div class="row">
                <!-- Product Information -->
                <div class="col-xxl-10">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Product Information</h5>
                            <small class="text-muted float-end">Default label</small>
                        </div>
                        <div class="card-body"><br>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Business License No</label>
                                <div class="col-sm-8">
                                    <input type="text" id="licensenoInput" class="form-control border border-primary font-weight-bold" name="License_No"/>
                                    @error('License_No')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div id="licensenoStatus"></div>
                                    <div id="businessDetails"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Enter Product Name</label>
                                <div class="col-sm-8">
                                    <input type="text" id="productInput" class="form-control border border-primary font-weight-bold" name="Product_Name"/>

                                    <div id="productStatus"></div>
                                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                    <script>
                                        $(document).ready(function () {
                                            $('#productInput').on('input', function () {
                                                var product = $(this).val();
                                                console.log('Product value:', product);

                                                $.ajax({
                                                    url: "{{ route('check-product') }}",
                                                    method: "POST",
                                                    data: {"_token": "{{ csrf_token() }}", "Product_Name": product},
                                                    success: function (response) {
                                                        console.log('Response:', response);

                                                        if (product === '') {
                                                            $('#productStatus').text('');
                                                        } else if (response.exists) {
                                                            $('#productStatus').text('Product name already exists!');
                                                        } else {
                                                            $('#productStatus').text('Product name is ok');
                                                        }
                                                    }
                                                });
                                            });
                                        });

                                    </script>
                                    @error('Product_Name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!DOCTYPE html>
                            <html lang="en">
                            <head>
                                <meta charset="UTF-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <title>Image Upload with Preview</title>
                            </head>
                            <body>
                            <!-- Container for additional sections -->
                            <div class="additional-sections" style="display: none;">

                                <!-- Lab report, product image, and affidavit sections go here -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Attach Lab Report</label>
                                    <div class="col-sm-8">
                                        <input type="file" id="labReportInput" class="form-control border border-primary font-weight-bold"
                                               name="Lab_Analysis_Report"
                                               aria-describedby="basic-icon-default-message2"/>
                                        @error('Lab_Analysis_Report')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div id="labReportPreview" class="mt-2"></div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Attach Product Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" id="productImageInput" class="form-control border border-primary font-weight-bold"
                                               name="Product_Label" accept="image/*"/>
                                        @error('Product_Label')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div id="productImagePreview" class="mt-2"></div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Attach Affidavit</label>
                                    <div class="col-sm-8">
                                        <input type="file" id="affidavtImageInput" class="form-control border border-primary font-weight-bold" name="Affidavit"
                                               aria-describedby="basic-icon-default-message2"/>
                                        @error('Affidavit')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div id="affidavitImagePreview" class="mt-2"></div>
                                    </div>
                                </div>
                            </div>

                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                            <script>
                                $(document).ready(function () {
                                    $('#licensenoInput').on('input', function () {
                                        var licenseno = $(this).val();

                                        $.ajax({
                                            url: "{{ route('check-license-no') }}",
                                            method: "POST",
                                            data: {"_token": "{{ csrf_token() }}", "License_No": licenseno},
                                            success: function (response) {
                                                if (licenseno === '') {
                                                    $('#licensenoStatus').text('');
                                                    $('#businessDetails').text('');
                                                    $('.additional-sections').hide();
                                                } else if (response.exists) {
                                                    $('#licensenoStatus').text('License exists!');
                                                    // Update business details
                                                    $('#businessDetails').html(
                                                        '<p>Business Name: ' + response.businessName + '</p>' +
                                                        '<p>Business Address: ' + response.businessAddress + '</p>'
                                                    );
                                                    $('.additional-sections').show();
                                                } else {
                                                    $('#licensenoStatus').text('License does not exist.');
                                                    $('#businessDetails').text('');
                                                    $('.additional-sections').hide();
                                                }
                                            }
                                        });
                                    });
                                });
                            </script>
                            <script>
                                document.getElementById('productImageInput').addEventListener('change', function () {
                                    var fileInput = this;
                                    var previewContainer = document.getElementById('productImagePreview');

                                    while (previewContainer.firstChild) {
                                        previewContainer.removeChild(previewContainer.firstChild);
                                    }

                                    var files = fileInput.files;
                                    for (var i = 0; i < files.length; i++) {
                                        var reader = new FileReader();

                                        reader.onload = function (e) {
                                            var imageElement = document.createElement('img');
                                            imageElement.className = 'custom-thumbnail';
                                            imageElement.src = e.target.result;

                                            previewContainer.appendChild(imageElement);
                                        };

                                        reader.readAsDataURL(files[i]);
                                    }
                                });

                                document.getElementById('labReportInput').addEventListener('change', function () {
                                    var fileInput = this;
                                    var previewContainer = document.getElementById('labReportPreview');

                                    while (previewContainer.firstChild) {
                                        previewContainer.removeChild(previewContainer.firstChild);
                                    }

                                    var files = fileInput.files;
                                    for (var i = 0; i < files.length; i++) {
                                        var reader = new FileReader();

                                        reader.onload = function (e) {
                                            var imageElement = document.createElement('img');
                                            imageElement.className = 'custom-thumbnail';
                                            imageElement.src = e.target.result;

                                            previewContainer.appendChild(imageElement);
                                        };

                                        reader.readAsDataURL(files[i]);
                                    }
                                });

                                document.getElementById('affidavtImageInput').addEventListener('change', function () {
                                    var fileInput = this;
                                    var previewContainer = document.getElementById('affidavitImagePreview');

                                    while (previewContainer.firstChild) {
                                        previewContainer.removeChild(previewContainer.firstChild);
                                    }

                                    var files = fileInput.files;
                                    for (var i = 0; i < files.length; i++) {
                                        var reader = new FileReader();

                                        reader.onload = function (e) {
                                            var imageElement = document.createElement('img');
                                            imageElement.className = 'custom-thumbnail';
                                            imageElement.src = e.target.result;

                                            previewContainer.appendChild(imageElement);
                                        };

                                        reader.readAsDataURL(files[i]);
                                    }
                                });
                            </script>
                            <style>
                                .custom-thumbnail {
                                    width: 150px; /* Set your desired width */
                                    height: auto; /* Maintain aspect ratio */
                                    margin-right: 10px; /* Optional: Add margin for spacing */
                                }
                            </style>

                            </body>
                            </html>
                            <!-- Rest of your HTML for other sections... -->

                        </div>
                    </div>
                </div>
                <div class="col-xxl-10">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Choose License Category</h5>
                            <small class="text-muted float-end">Default label</small>
                        </div>
                        <div class="card-body"><br>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Add Product Categories</label>
                                <div class="col-sm-8">
                                    <select name="licensecategories[]" class="selectpicker form-control border border-primary font-weight-bold" multiple
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
                            <button type="submit" class="btn btn-primary">Submit Product Application</button>
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

