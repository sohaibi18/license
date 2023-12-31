<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="POST" action="/license/verified/{{$license->id}}/{{$userid}}" enctype="multipart/form-data">
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
                                @if($license)
                                    <tr>
                                        <td>
                                          <span
                                              style="font-family: 'Your_Custom_Font',serif; font-size: 16px; font-weight: bold;">
                                              Applicant Name: {{ $license->business->owner->Applicant_Name }}<br>
                                              Father Name: {{ $license->business->owner->Applicant_Father_Name}}<br>
                                             CNIC: {{ $license->business->owner->CNIC }}<br>
                                            Personal Address: {{ $license->business->owner->Personal_Address }}<br>
                                            Profile Image: {{ $license->business->owner->Profile_Image }}<br>
                                            CNIC Image: {{$license->business->owner->CNIC_Image}}<br>
                                          </span>
                                        </td>

                                        <td>
                                             <span
                                                 style="font-family: 'Your_Custom_Font',serif; font-size: 16px; font-weight: bold;">
                                            Business Name : {{ $license->business->Business_Name }}<br>
                                            Business Type: {{ $license->business->business_type->Business_Types}}<br>
                                            Business Address: {{ $license->business->Business_Address }}<br>
                                            Contact Number: {{ $license->business->Contact_Number }}<br>
                                            District: {{ $license->business->district->District_Name}}<br>
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
                                            License Category : {{ $license->license_category_id }}<br>
                                            Due Amount: {{ $license->payments->Due_Amount}}<br>
                                            Paid Amount: {{ $license->payments->Paid_Amount }}<br>
                                            Due Date: {{ $license->payments->Due_Date }}<br>
                                            Deposit Date: {{ $license->payments->Deposit_Date }}<br>
                                            Challan No: {{$license->payments->Challan_No}}<br>
                                            Challan Image: {{ $license->payments->Challan_Image }}<br>
                                             </span>
                                        </td>

                                        <td>
                                             <span
                                                 style="font-family: 'Your_Custom_Font',serif; font-size: 16px; font-weight: bold;">
                                            Inspected By : {{ $license->payments->Verify_By }}<br>
                                            Inspection Date: {{ $license->Submit_Date}}<br>
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
