
<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">

            <div class="col-xxl-12">

                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Licensee Details</h5>
                    </div>
                    <form method="POST" action="/show/licensee/information/form/" enctype="multipart/form-data"
                          id="LicenseeForm">
                        @csrf
                        <div class="card-body">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Enter Owner CNIC</label>
                                <div class="col-sm-8">
                                    <input type="text" id="ownerInput"
                                           class="form-control border border-primary font-weight-bold"
                                           name="CNIC"/>
                                    @error('CNIC')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div id="ownerStatus"></div>
                                </div>
                                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                <script>
                                    $(document).ready(function () {
                                        $('#ownerInput').on('input', function () {
                                            var cnic = $(this).val();

                                            $.ajax({
                                                url: "{{ route('check-cnic-no') }}",
                                                method: "POST",
                                                data: {"_token": "{{ csrf_token() }}", "CNIC": cnic},
                                                success: function (response) {
                                                    if (cnic === '') {
                                                        $('#ownerStatus').text('');
                                                    } else if (response.exists) {
                                                        $('#ownerStatus').text('Licensee exists!');
                                                    } else {
                                                        $('#ownerStatus').text('Licensee does not exist.');
                                                    }

                                                    $('#LicenseeForm').attr('action', '/show/licensee/information/form/' + cnic);
                                                }
                                            });
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </form>

                    <form method="POST" action="/show/license/information/form/" enctype="multipart/form-data"
                          id="LicenseForm">
                        @csrf
                        <div class="card-body">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Enter License No</label>
                                <div class="col-sm-8">
                                    <input type="text" id="licensenoInput"
                                           class="form-control border border-primary font-weight-bold"
                                           name="License_No"/>
                                    @error('License_No')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div id="licensenoStatus"></div>
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
                                                    } else if (response.exists) {
                                                        $('#licensenoStatus').text('License exists!');
                                                    } else {
                                                        $('#licensenoStatus').text('License does not exist.');
                                                    }


                                                    $('#LicenseForm').attr('action', '/show/license/information/form/' + licenseno);
                                                }
                                            });
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="row justify-content-start">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" onclick="submitForm()">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var isLicenseeForm = true;

        function submitForm() {
            var form;

            if (isLicenseeForm) {
                form = document.getElementById("LicenseForm");
            } else {
                form = document.getElementById("LicenseeForm");
            }

            if (form) {
                form.submit();
            } else {
                console.error("Form not found!");
            }

            // Toggle the form for the next click
            isLicenseeForm = !isLicenseeForm;
        }
    </script>

</x-layouts.app>

