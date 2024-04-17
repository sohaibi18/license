<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="POST" action="" enctype="multipart/form-data">
            @csrf
            <!-- Display Owner Information -->
            <div class="row">
                <div class="col-xxl-12">
                    <!-- Licensee Details Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">License Details</h5>
                        </div>
                        <div class="card-body">

                            <div class="row"
                                 style="border-width: 2px; border-style: solid; border-color: #007bff; font-weight: bold;">
                                <!-- Owner Personal Details -->
                                <div class="col-md-6 border p-3">
                                    <ul class="list-unstyled mb-4" style="font-size: 16px;">
                                        <h4>Owner Information</h4>
                                        <!-- Display owner details -->
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>Applicant Name:</strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text"
                                                       class="form-control border border-primary font-weight-bold"
                                                       value="{{ $owner->Applicant_Name }}" readonly>
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
                                                       value="{{ $owner->Applicant_Father_Name }}" readonly>
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
                                                       value="{{ $owner->CNIC }}" readonly>
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
                                                       value="{{ $owner->Personal_Address }}" readonly>
                                            </div>
                                        </div>
                                        <br>

                                    </ul>
                                </div>

                                <!-- Display Business Information -->
                                <div class="col-md-6 border p-3">
                                    <ul class="list-unstyled mb-4" style="font-size: 16px;">
                                        <h4>Business Information</h4>
                                        @if($business)
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <strong>Product Name:</strong>
                                                </div>
                                                <div class="col-md-8">

                                                    @if(isset($products) && $products->isNotEmpty())
                                                        @foreach($products as $product)
                                                            <input type="text"
                                                                   class="form-control border border-primary font-weight-bold"
                                                                   value="{{ $product->Product_Name }}" readonly>
                                                            <br>
                                                        @endforeach
                                                    @else
                                                        <p class="text-muted">No products found</p>
                                                    @endif

                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <strong>Business Name:</strong>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text"
                                                           class="form-control border border-primary font-weight-bold"
                                                           value="{{  $business->Business_Name }}" readonly>
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
                                                           value="{{  $business->business_type->Business_Types }}"
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
                                                           value="{{  $business->Business_Address }}" readonly>
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
                                                           value="{{  $business->Contact_Number }}" readonly>
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
                                                           value="{{  $business->district->District_Name }}" readonly>
                                                </div>
                                            </div>
                                            <br>

                                        @else
                                            <p>No business found</p>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            <!-- Display License and Inspection Details -->
                            <div class="row mt-4"
                                 style="border-width: 2px; border-style: solid; border-color: #007bff; font-weight: bold;">


                                <div class="col-md-6 border p-3">
                                    <ul class="list-unstyled mb-4" style="font-size: 16px;">
                                        <h4>License Information</h4>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>License Category:</strong>
                                            </div>

                                            <div class="col-md-8">
                                                <input type="text"
                                                       class="form-control border border-primary font-weight-bold"
                                                       value="{{ optional($licenses->licenseCategory)->License_Category_Name ?? 'N/A' }}"
                                                       readonly>
                                                <br>
                                                <a href="/show/update/license/category/{{$licenses->id}}">
                                                    <button type="button" class="btn rounded-pill btn-primary">Update
                                                        Category
                                                    </button>
                                                </a>
                                            </div>


                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>Product Category:</strong>
                                            </div>
                                            <div class="col-md-8">

                                                <input type="text"
                                                       class="form-control border border-primary font-weight-bold"
                                                       value="{{ optional(optional($licenses->business)->product_applications->first())->licenseCategory->License_Category_Name ?? 'N/A' }}"
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
                                                       value="{{ optional($licenses->payments)->Paid_Amount }}"
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
                                                       value="{{ optional($licenses->payments)->Challan_No }}"
                                                       readonly>
                                            </div>
                                        </div>
                                        <br>

                                    </ul>
                                </div>

                                <div class="col-md-6 border p-3">
                                    <ul class="list-unstyled mb-4" style="font-size: 16px;">
                                        <h4>Inspection Details</h4>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>Inpsected By:</strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text"
                                                       class="form-control border border-primary font-weight-bold"
                                                       value="{{ optional($licenses->payments)->Verify_By }}"
                                                       readonly>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>Inspected Date:</strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text"
                                                       class="form-control border border-primary font-weight-bold"
                                                       value="{{ $licenses->Submit_Date }}"
                                                       readonly>
                                            </div>
                                        </div>
                                        <br>

                                    </ul>
                                </div>

                            </div>

                            <!-- Display Images -->
                            <div class="row mt-4">

                                <div class="col-md-6 border p-3">
                                    <h4>Profile Image</h4>
                                    <img
                                        src="{{ asset('storage/' . urlencode($licenses->business->owner->Profile_Image)) }}"
                                        alt="Profile Image" style="max-width: 50%;">
                                </div>

                                <div class="col-md-6 border p-3">
                                    <h4>CNIC Image</h4>
                                    <img
                                        src="{{ asset('storage/' . urlencode($licenses->business->owner->CNIC_Image)) }}"
                                        alt="CNIC Image" style="max-width: 50%;">
                                </div>


                                <div class="col-md-6 border p-3">
                                    <h4>Lab Report</h4>
                                    @if(isset($products) && $products->isNotEmpty())
                                        @foreach($products as $product)
                                            <img
                                                src="{{ asset('storage/' . urlencode($product->Lab_Analysis_Report)) }}"
                                                alt="Lab Report Image" style="max-width: 50%;">
                                        @endforeach
                                    @else
                                        <p>No lab reports found</p>
                                    @endif
                                </div>

                                <div class="col-md-6 border p-3">
                                    <h4>Product Label</h4>
                                    @if(isset($products) && $products->isNotEmpty())
                                        @foreach($products as $product)
                                            <img src="{{ asset('storage/' . urlencode($product->Product_Label)) }}"
                                                 alt="Product Label Image" style="max-width: 50%;">
                                        @endforeach
                                    @else
                                        <p>No product labels found</p>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-layouts.app>



