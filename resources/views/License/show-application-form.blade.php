<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="POST" action="/display/submitted/data/{{ $id }}" enctype="multipart/form-data">

            @csrf
            <!-- Basic Layout -->
            <div class="row">
        <!-- Personal Information -->
        <div class="col-xxl-10">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Personal Information</h5>
                    <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Applicant Name</label>
                        <div class="col-sm-8">
                            <input
                                type="text"
                                class="form-control"
                                name="Applicant_Name"
                                placeholder=""/>
                            @if($errors->has('Applicant_Name'))
                                <span class="alert alert-danger"> {{ $errors->first('Applicant_Name') }}</span>
                                <br>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Father Name</label>
                        <div class="col-sm-8">
                            <input
                                type="text"
                                class="form-control"
                                name="Applicant_Father_Name"
                                placeholder=""/>
                            @if($errors->has('Applicant_Father_Name'))
                                <span
                                    class="alert alert-danger"> {{ $errors->first('Applicant_Father_Name') }}</span>
                                <br>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">CNIC</label>
                        <div class="col-sm-8">
                            <input
                                type="text"
                                class="form-control"
                                name="CNIC"
                                aria-describedby="basic-default-phone"/>
                            <small class="text-muted">Enter your CNIC in the format: 12345-6789123-4</small>
                            @if($errors->has('CNIC'))
                                <span class="alert alert-danger"> {{ $errors->first('CNIC') }}</span><br>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Contact Number</label>
                        <div class="col-sm-8">
                            <input
                                id="basic-default-message"
                                class="form-control"
                                name="Mobile_Number"
                                aria-describedby="basic-icon-default-message2"
                            />
                            <small class="text-muted">Enter your Mobile Number in the format: 1234-6789123</small>
                            @if($errors->has('Mobile_Number'))
                                <span class="alert alert-danger"> {{ $errors->first('Mobile_Number') }}</span>
                                <br>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input
                                id="basic-default-message"
                                class="form-control"
                                name="Email"
                                aria-describedby="basic-icon-default-message2"
                            />
                            <small class="text-muted">Enter your email in the format: example@mail.com</small>
                            @if($errors->has('Email'))
                                <span class="alert alert-danger"> {{ $errors->first('Email') }}</span><br>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Personal Address</label>
                        <div class="col-sm-8">
                            <input
                                id="basic-default-message"
                                class="form-control"
                                name="Personal_Address"
                                aria-describedby="basic-icon-default-message2"
                            />
                            @if($errors->has('Personal_Address'))
                                <span
                                    class="alert alert-danger"> {{ $errors->first('Personal_Address') }}</span>
                                <br>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="Gender" id="genderSelect">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            @if($errors->has('Gender'))
                                <span class="alert alert-danger"> {{ $errors->first('Gender') }}</span><br>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Profile Image</label>
                        <div class="col-sm-8">
                            <input
                                type="file"
                                id="basic-default-message"
                                class="form-control"
                                name="Profile_Image"
                                aria-describedby="basic-icon-default-message2"
                            />
                            @if($errors->has('Profile_Image'))
                                <span class="alert alert-danger"> {{ $errors->first('Profile_Image') }}</span><br>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">CNIC Image</label>
                        <div class="col-sm-8">
                            <input
                                type="file"
                                id="basic-default-message"
                                class="form-control"
                                name="CNIC_Image"
                                aria-describedby="basic-icon-default-message2"
                            />
                            @if($errors->has('CNIC_Image'))
                                <span class="alert alert-danger"> {{ $errors->first('CNIC_Image') }}</span><br>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Add District</label>
                        <div class="col-sm-8">
                            <select name="districts[]" class="selectpicker" multiple data-live-search="true">
                                @foreach($districts as $district)
                                    <option value="{{ $district['id'] }}">{{ $district['District_Name'] }}</option>
                                @endforeach
                            </select><br>
                            @if($errors->has('districts'))
                                <span class="alert alert-danger"> {{ $errors->first('districts') }}</span><br>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Business Information -->
        <div class="col-xxl-10">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Business Information</h5>
                    <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Business Name</label>
                        <div class="col-sm-8">
                            <input
                                type="text"
                                class="form-control"
                                name="Business_Name"
                                placeholder=""/>
                            @if($errors->has('Business_Name'))
                                <span class="alert alert-danger"> {{ $errors->first('Business_Name') }}</span>
                                <br>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Business Address</label>
                        <div class="col-sm-8">
                            <input
                                type="text"
                                class="form-control"
                                name="Business_Address"
                                placeholder=""/>
                            @if($errors->has('Business_Address'))
                                <span
                                    class="alert alert-danger"> {{ $errors->first('Business_Address') }}</span>
                                <br>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Contact Number</label>
                        <div class="col-sm-8">
                            <input
                                type="text"
                                class="form-control"
                                name="Contact_Number"
                                aria-describedby="basic-default-phone"/>
                            <small class="text-muted">Enter your Mobile Number in the format: 1234-6789123</small>
                            @if($errors->has('Contact_Number'))
                                <span class="alert alert-danger"> {{ $errors->first('Contact_Number') }}</span><br>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Business Email</label>
                        <div class="col-sm-8">
                            <input
                                id="basic-default-message"
                                class="form-control"
                                name="Business_Email"
                                aria-describedby="basic-icon-default-message2"
                            />
                            <small class="text-muted">Enter your email in the format: example@mail.com</small>
                            @if($errors->has('Business_Email'))
                                <span class="alert alert-danger"> {{ $errors->first('Business_Email') }}</span>
                                <br>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Attach Affidavit</label>
                        <div class="col-sm-8">
                            <input
                                type="file"
                                id="basic-default-message"
                                class="form-control"
                                name="Affidavit"
                                aria-describedby="basic-icon-default-message2"
                            />
                            @if($errors->has('Affidavit'))
                                <span class="alert alert-danger"> {{ $errors->first('Affidavit') }}</span><br>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Attach Medical Certificate</label>
                        <div class="col-sm-8">
                            <input
                                type="file"
                                id="basic-default-message"
                                class="form-control"
                                name="Medical_Certificate"
                                aria-describedby="basic-icon-default-message2"
                            />
                            @if($errors->has('Medical_Certificate'))
                                <span class="alert alert-danger"> {{ $errors->first('Medical_Certificate') }}</span><br>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Website</label>
                        <div class="col-sm-8">
                            <input
                                id="basic-default-message"
                                class="form-control"
                                name="Website"
                                aria-describedby="basic-icon-default-message2"
                            />
                            @if($errors->has('Website'))
                                <span class="alert alert-danger"> {{ $errors->first('Website') }}</span><br>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Start Date</label>
                        <div class="col-sm-8">
                            <input
                                id="basic-default-message"
                                class="form-control"
                                name="Start_Date"
                                aria-describedby="basic-icon-default-message2"
                            />
                            @if($errors->has('Start_Date'))
                                <span
                                    class="alert alert-danger"> {{ $errors->first('Start_Date') }}</span>
                                <br>
                            @endif
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Food Handlers</label>
                        <div class="col-sm-8">
                            <input
                                id="basic-default-message"
                                class="form-control"
                                name="Food_Handlers"
                                aria-describedby="basic-icon-default-message2"
                            />
                            @if($errors->has('Food_Handlers'))
                                <span class="alert alert-danger"> {{ $errors->first('Food_Handlers') }}</span><br>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Add District</label>
                        <div class="col-sm-8">
                            <select name="districts[]" class="selectpicker" multiple data-live-search="true">
                                @foreach($districts as $district)
                                    <option value="{{ $district['id'] }}">{{ $district['District_Name'] }}</option>
                                @endforeach
                            </select><br>
                            @if($errors->has('districts'))
                                <span class="alert alert-danger"> {{ $errors->first('districts') }}</span><br>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Add Business Type</label>
                        <div class="col-sm-8">
                            <select name="businesstypes[]" class="selectpicker" multiple data-live-search="true">
                                @foreach($businesstypes as $business)
                                    <option value="{{ $business['id'] }}">{{ $business['Business_Types'] }}</option>
                                @endforeach
                            </select><br>
                            @if($errors->has('businesstypes'))
                                <span class="alert alert-danger"> {{ $errors->first('businesstypes') }}</span><br>
                            @endif
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
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Add License Categories</label>
                        <div class="col-sm-8">
                            <select name="licensecategories[]" class="selectpicker" multiple data-live-search="true">
                                @foreach($licensecategories as $licensecat)
                                    <option value="{{ $licensecat['id'] }}">
                                        {{ $licensecat['License_Category_Name'] }} - {{ $licensecat['License_Fee'] }}</option>
                                @endforeach
                            </select><br>
                            @if($errors->has('licensecategories'))
                                <span class="alert alert-danger"> {{ $errors->first('licensecategories') }}</span><br>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="row justify-content-start">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit License Application</button>
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


