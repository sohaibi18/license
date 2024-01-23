<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="POST" action="/license/verified/{{$license->id}}/{{$userid}}" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <!-- Personal Information -->
                <div class="col-xxl-12">
                    <!-- Licensee Details Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">License Application Details</h5>
                        </div>
                        <div class="card-body">

                            <div class="row"
                                 style="border-width: 2px; border-style: solid; border-color: #007bff; font-weight: bold;">
                                <!-- Owner Personal Details -->


                                <div class="col-md-6 border p-3">
                                    <ul class="list-unstyled mb-4" style="font-size: 16px;">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>Applicant Name:</strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text"
                                                       class="form-control border border-primary font-weight-bold"
                                                       value="{{ $license->business->owner->Applicant_Name }}" readonly>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>Applicant Father Name:</strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text"
                                                       class="form-control border border-primary font-weight-bold"
                                                       value="{{ $license->business->owner->Applicant_Father_Name}}"
                                                       readonly>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>Applicant CNIC:</strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text"
                                                       class="form-control border border-primary font-weight-bold"
                                                       value="{{ $license->business->owner->CNIC}}" readonly>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>Applicant Address:</strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text"
                                                       class="form-control border border-primary font-weight-bold"
                                                       value="{{ $license->business->owner->Personal_Address}}"
                                                       readonly>
                                            </div>
                                        </div>

                                    </ul>
                                </div>


                                <!-- Business Details -->
                                <div class="col-md-6 border p-3">
                                    <ul class="list-unstyled mb-4" style="font-size: 16px;">

                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>Business Name:</strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text"
                                                       class="form-control border border-primary font-weight-bold"
                                                       value="{{ $license->business->Business_Name}}"
                                                       readonly>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>Business Type:</strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text"
                                                       class="form-control border border-primary font-weight-bold"
                                                       value="{{ $license->business->business_type->Business_Types}}"
                                                       readonly>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>Business Address:</strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text"
                                                       class="form-control border border-primary font-weight-bold"
                                                       value="{{ $license->business->Business_Address}}"
                                                       readonly>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>Contact Number:</strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text"
                                                       class="form-control border border-primary font-weight-bold"
                                                       value="{{ $license->business->Contact_Number}}"
                                                       readonly>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>District:</strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text"
                                                       class="form-control border border-primary font-weight-bold"
                                                       value="{{ $license->business->district->District_Name}}"
                                                       readonly>
                                            </div>
                                        </div>
                                        <br>

                                    </ul>
                                </div>

                            </div>

                            <!-- License Category and Inspection Details -->
                            <div class="row mt-4"
                                 style="border-width: 2px; border-style: solid; border-color: #007bff; font-weight: bold;">
                                <div class="col-md-6 border p-3">
                                    <ul class="list-unstyled mb-4" style="font-size: 16px;">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>License Category:</strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text"
                                                       class="form-control border border-primary font-weight-bold"
                                                       value="{{ $license->license_category->License_Category_Name}}"
                                                       readonly>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>Due Amount:</strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text"
                                                       class="form-control border border-primary font-weight-bold"
                                                       value="{{ $license->payments->Due_Amount}}"
                                                       readonly>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>Paid Amount:</strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text"
                                                       class="form-control border border-primary font-weight-bold"
                                                       value="{{ $license->payments->Paid_Amount}}"
                                                       readonly>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>Due Date:</strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text"
                                                       class="form-control border border-primary font-weight-bold"
                                                       value="{{ $license->payments->Due_Date}}"
                                                       readonly>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>Deposit Date:</strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text"
                                                       class="form-control border border-primary font-weight-bold"
                                                       value="{{ $license->payments->Deposit_Date}}"
                                                       readonly>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>Challan No:</strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text"
                                                       class="form-control border border-primary font-weight-bold"
                                                       value="{{ $license->payments->Challan_No}}"
                                                       readonly>
                                            </div>
                                        </div>
                                        <br>

                                    </ul>
                                </div>

                                <div class="col-md-6 border p-3">
                                    <ul class="list-unstyled mb-4" style="font-size: 16px;">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>Inspected By:</strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text"
                                                       class="form-control border border-primary font-weight-bold"
                                                       value="{{ $license->payments->Verify_By}}"
                                                       readonly>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>Inspection Date:</strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text"
                                                       class="form-control border border-primary font-weight-bold"
                                                       value="{{ $license->Submit_Date}}"
                                                       readonly>
                                            </div>
                                        </div>
                                        <br>

                                    </ul>
                                </div>

                            </div>

                            <!-- Images -->
                            <div class="row mt-4"
                                 style="border-width: 2px; border-style: solid; border-color: #007bff; font-weight: bold;">
                                <div class="col-md-6 border p-3">
                                    <p class="font-weight-bold"><strong>Profile Image:</strong></p>
                                    <img
                                        src="{{ asset('storage/' . urlencode($license->business->owner->Profile_Image)) }}"
                                        alt="Profile Image" style="max-width: 50%;">
                                </div>

                                <div class="col-md-6 border p-3">
                                    <p class="font-weight-bold"><strong>CNIC Image:</strong></p>
                                    <img
                                        src="{{ asset('storage/' . urlencode($license->business->owner->CNIC_Image)) }}"
                                        alt="CNIC Image" style="max-width: 50%;">
                                </div>

                                <div class="col-md-6 border p-3">
                                    <p class="font-weight-bold"><strong>Challan Image:</strong></p>
                                    <img src="{{ asset('storage/' . urlencode($license->payments->Challan_Image)) }}"
                                         alt="Lab Report Image" style="max-width: 50%;">
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- Approval Button -->
                    <div class="row justify-content-start">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">License Approved</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</x-layouts.app>
