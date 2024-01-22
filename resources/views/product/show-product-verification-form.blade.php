<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="POST" action="/product/verified/{{$product->id}}/{{$userid}}" enctype="multipart/form-data">
            @csrf

            <!-- Basic Layout -->
            <div class="row">
                <!-- Personal Information -->
                <div class="col-xxl-12">
                    <!-- Licensee Details Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Product Application Details</h5>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <!-- Owner Personal Details -->


                                <div class="col-md-6 border p-3">
                                    <ul class="list-unstyled mb-4" style="font-size: 16px;">
                                        <strong>Applicant Name:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span
                                            class="border border-primary p-1 font-weight-bold">{{ $product->business->owner->Applicant_Name }}</span><br><br>
                                        <strong>Applicant Father Name:</strong> <span
                                            class="border border-primary p-1 font-weight-bold">{{ $product->business->owner->Applicant_Father_Name}}</span><br><br>
                                        <strong>Applicant CNIC:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                            class="border border-primary p-1 font-weight-bold">{{ $product->business->owner->CNIC }}</span><br><br>
                                        <strong>Applicant Address:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                            class="border border-primary p-1 font-weight-bold">{{ $product->business->owner->Personal_Address }}</span><br><br>

                                    </ul>
                                </div>


                                <!-- Business Details -->
                                <div class="col-md-6 border p-3">
                                    <ul class="list-unstyled mb-4" style="font-size: 16px;">
                                        <strong class="label-with-space">Product Name:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span
                                            class="border border-primary p-1 font-weight-bold">{{ $product->Product_Name }}</span><br><br>

                                        <strong class="label-with-space">Business Name:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span
                                            class="border border-primary p-1 font-weight-bold">{{ $product->business->Business_Name }}</span><br><br>

                                        <strong class="label-with-space">Business Type:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span
                                            class="border border-primary p-1 font-weight-bold">{{ $product->business->business_type->Business_Types}}</span><br><br>

                                        <strong class="label-with-space">Business Address:</strong>
                                        <span
                                            class="border border-primary p-1 font-weight-bold">{{ $product->business->Business_Address }}</span><br><br>

                                        <strong class="label-with-space">Contact Number:</strong>&nbsp;&nbsp;
                                        <span
                                            class="border border-primary p-1 font-weight-bold">{{ $product->business->Contact_Number }}</span><br><br>

                                        <strong class="label-with-space">District:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span
                                            class="border border-primary p-1 font-weight-bold">{{ $product->business->district->District_Name}}</span><br><br>
                                    </ul>
                                </div>

                            </div>

                            <!-- License Category and Inspection Details -->
                            <div class="row mt-4">
                                <div class="col-md-6 border p-3">
                                    <ul class="list-unstyled mb-4" style="font-size: 16px;">
                                        <strong class="label-with-space">License Category:</strong>
                                        <span
                                            class="border border-primary p-1 font-weight-bold">{{ $product->license_category->License_Category_Name }}</span><br><br>

                                        <strong class="label-with-space">Due Amount:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span
                                            class="border border-primary p-1 font-weight-bold">{{ $product->payments->Due_Amount}}</span><br><br>

                                        <strong class="label-with-space">Paid Amount:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span
                                            class="border border-primary p-1 font-weight-bold">{{ $product->payments->Paid_Amount }}</span><br><br>

                                        <strong class="label-with-space">Due Date:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span
                                            class="border border-primary p-1 font-weight-bold">{{ $product->payments->Due_Date }}</span><br><br>

                                        <strong class="label-with-space">Deposit Date:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span
                                            class="border border-primary p-1 font-weight-bold">{{ $product->payments->Deposit_Date }}</span><br><br>

                                        <strong class="label-with-space">Challan No:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span
                                            class="border border-primary p-1 font-weight-bold">{{$product->payments->Challan_No}}</span><br><br>
                                    </ul>
                                </div>

                                <div class="col-md-6 border p-3">
                                    <ul class="list-unstyled mb-4" style="font-size: 16px;">
                                        <strong class="label-with-space">Inspected By:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span
                                            class="border border-primary p-1 font-weight-bold">{{ $product->payments->Verify_By }}</span><br><br>

                                        <strong class="label-with-space">Inspection Date:</strong>
                                        <span
                                            class="border border-primary p-1 font-weight-bold">{{ $product->Submit_Date}}</span><br><br>
                                    </ul>
                                </div>

                            </div>

                            <!-- Images -->
                            <div class="row mt-4">
                                <div class="col-md-6 border p-3">
                                    <p class="font-weight-bold"><strong>Profile Image:</strong></p>
                                    <img
                                        src="{{ asset('storage/' . urlencode($product->business->owner->Profile_Image)) }}"
                                        alt="Profile Image" style="max-width: 50%;">
                                </div>

                                <div class="col-md-6 border p-3">
                                    <p class="font-weight-bold"><strong>CNIC Image:</strong></p>
                                    <img
                                        src="{{ asset('storage/' . urlencode($product->business->owner->CNIC_Image)) }}"
                                        alt="CNIC Image" style="max-width: 50%;">
                                </div>

                                <div class="col-md-6 border p-3">
                                    <p class="font-weight-bold"><strong>Lab Report:</strong></p>
                                    <img src="{{ asset('storage/' . urlencode($product->Lab_Analysis_Report)) }}"
                                         alt="Lab Report Image" style="max-width: 50%;">
                                </div>

                                <div class="col-md-6 border p-3">
                                    <p class="font-weight-bold"><strong>Product Label:</strong></p>
                                    <img src="{{ asset('storage/' . urlencode($product->Product_Label)) }}"
                                         alt="Label Image" style="max-width: 50%;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Approval Button -->
                    <div class="row justify-content-start">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Product Approved</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</x-layouts.app>



