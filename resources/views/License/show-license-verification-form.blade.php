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
                                    <th>Owner Personal Details<br>
                                    </th>
                                    <th>Business Details</th>
                                    <!-- Add more columns as needed -->
                                </tr>

                                </thead>
                                <tbody>
                                @if($license)
                                    <tr>
                                        <td>Applicant Name : {{ $license->business->owner->Applicant_Name }}<br>
                                            Father Name: {{ $license->business->owner->Applicant_Father_Name}}<br>
                                            CNIC: {{ $license->business->owner->CNIC }}<br>
                                            Personal Address: {{ $license->business->owner->Personal_Address }}<br>
                                            Profile Image: {{ $license->business->owner->Profile_Image }}<br>
                                            CNIC Image: {{$license->business->owner->CNIC_Image}}<br>
                                        </td>

                                        <td>Business Name : {{ $license->business->Business_Name }}<br>
                                            Business Type: {{ $license->business->business_type->Business_Types}}<br>
                                            Business Address: {{ $license->business->Business_Address }}<br>
                                            Contact Number: {{ $license->business->Contact_Number }}<br>
                                            District: {{ $license->business->district->District_Name}}<br>
                                        </td>
                                    </tr>
                                    <th></th>
                                    <th></th>
                                    <tr>

                                    </tr>
                                    <tr>
                                        <th>License Category Details</th>
                                        <th>Inspection Detials</th>
                                    </tr>

                                    <tr>
                                        <td>License Category : {{ $license->license_category_id }}<br>
                                            Due Amount: {{ $license->payments->Due_Amount}}<br>
                                            Paid Amount: {{ $license->payments->Paid_Amount }}<br>
                                            Due Date: {{ $license->payments->Due_Date }}<br>
                                            Deposit Date: {{ $license->payments->Deposit_Date }}<br>
                                            Challan No: {{$license->payments->Challan_No}}<br>
                                            Challan Image: {{ $license->payments->Challan_Image }}<br>
                                        </td>

                                        <td>Inspected By : {{ $license->payments->Verify_By }}<br>
                                            Inspection Date: {{ $license->Submit_Date}}<br>

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
                                <button type="submit" class="btn btn-primary">Submit License Application</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-layouts.app>
