<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container mt-5">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Serial No</th>
                    <th>Pending Verification Applications</th>
                    <th>Details</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $serialNumber = 1;
                @endphp

                @foreach($payments as $payment)
                    {{-- Skip the entire row if license_applications is null --}}
                    @if ($payment->product_applications)
                        <tr>
                            <td>{{ $serialNumber++ }}</td>
                            <td>
                                @if($payment->product_applications->ProcLvl == 'Submitted')
                                    <span class="text-success">{{ $payment->product_applications->ProcLvl }}</span><br>
                                @endif
                                Product Application No: {{ $payment->product_application_id }}<br>
                                Product Name: {{ $payment->product_applications->Product_Name }}<br>
                                {{-- Display Business details --}}
                                @if ($payment->product_applications->business)
                                    Business Name: {{ $payment->product_applications->business->Business_Name }}<br>
                                    Business Address: {{ $payment->product_applications->business->Business_Address }}
                                    <br>
                                    Contact Number: {{ $payment->product_applications->business->Contact_Number }}<br>

                                    {{-- Add other details as needed --}}
                                @endif

                                {{-- Other details --}}
                            </td>
                            <td>
                                @if($payment->product_applications->business->owner)
                                    Owner Name: {{ $payment->product_applications->business->owner->Applicant_Name }}
                                    <br>
                                    Owner Father
                                    Name: {{ $payment->product_applications->business->owner->Applicant_Father_Name }}
                                    <br>
                                @endif
                            </td>
                            <td>
                                <a href="/show/verification/form/{{ $userid }}/product/{{ $payment->product_application_id }}">
                                    <button type="button" class="btn rounded-pill btn-primary">Verify</button>
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>



