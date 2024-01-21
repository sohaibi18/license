<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="POST" action="/product/verified/{{$product->id}}/{{$userid}}" enctype="multipart/form-data">
            @csrf

            <!-- Basic Layout -->
            <div class="row">
                <!-- Personal Information -->
                <div class="col-xxl-10">
                    <!-- Table Section -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Licensee Details</h5>
                        </div>
                        <div class="card-body">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="font-weight: bold; font-size: 18px;">Owner Personal Details<br>
                                    </th>
                                    <th style="font-weight: bold; font-size: 18px;">Business Details</th>
                                    <!-- Add more columns as needed -->
                                </tr>

                                </thead>
                                <tbody>
                                @if($product)
                                    <tr>
                                        <td>
                                          <span
                                              style="font-family: 'Your_Custom_Font',serif; font-size: 16px; font-weight: bold;">
                                              Applicant Name: {{ $product->business->owner->Applicant_Name }}<br>
                                              Father Name: {{ $product->business->owner->Applicant_Father_Name}}<br>
                                             CNIC: {{ $product->business->owner->CNIC }}<br>
                                            Personal Address: {{ $product->business->owner->Personal_Address }}<br>
                                            Profile Image:  <img
                                                  src="{{ asset('storage/' . urlencode($product->business->owner->Profile_Image)) }}"
                                                  alt="Profile Image" style="max-width: 5%;"><br>
                                              CNIC Image:   <img
                                                  src="{{ asset('storage/' . urlencode($product->business->owner->CNIC_Image)) }}"
                                                  alt="CNIC Image" style="max-width: 5%;"><br>

                                          </span>
                                        </td>

                                        <td>
                                             <span
                                                 style="font-family: 'Your_Custom_Font',serif; font-size: 16px; font-weight: bold;">
                                            Product Name: {{ $product->Product_Name }}<br>
                                                 Business Name : {{ $product->business->Business_Name }}<br>
                                            Business Type: {{ $product->business->business_type->Business_Types}}<br>
                                            Business Address: {{ $product->business->Business_Address }}<br>
                                            Contact Number: {{ $product->business->Contact_Number }}<br>
                                            District: {{ $product->business->district->District_Name}}<br>
                                             </span>
                                        </td>
                                    </tr>
                                    <th style="padding: 40px; border: none;"></th>
                                    <th style="padding: 40px; border: none;"></th>
                                    <tr>

                                    </tr>
                                    <tr>
                                        <th style="font-weight: bold; font-size: 18px;">License Category Details</th>
                                        <th style="font-weight: bold; font-size: 18px;">Inspection Detials</th>
                                    </tr>

                                    <tr>
                                        <td>
                                             <span
                                                 style="font-family: 'Your_Custom_Font',serif; font-size: 16px; font-weight: bold;">
                                            License Category : {{ $product->license_category_id }}<br>
                                            Due Amount: {{ $product->payments->Due_Amount}}<br>
                                            Paid Amount: {{ $product->payments->Paid_Amount }}<br>
                                            Due Date: {{ $product->payments->Due_Date }}<br>
                                            Deposit Date: {{ $product->payments->Deposit_Date }}<br>
                                            Challan No: {{$product->payments->Challan_No}}<br>
                                            Challan Image:  <img
                                                     src="{{ asset('storage/' . urlencode($product->payments->Challan_Image)) }}"
                                                     alt="CNIC Image" style="max-width: 5%;"><br>

                                             </span>
                                        </td>

                                        <td>
                                             <span
                                                 style="font-family: 'Your_Custom_Font',serif; font-size: 16px; font-weight: bold;">
                                            Inspected By : {{ $product->payments->Verify_By }}<br>
                                            Inspection Date: {{ $product->Submit_Date}}<br>
                                             </span>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="row justify-content-start">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">License Approved</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-layouts.app>
