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
                    <tr>
                        <td>{{ $serialNumber++ }}</td>
                        <td>
                            @if($payment->license_applications->ProcLvl == 'Submitted')
                                <span class="text-success">{{ $payment->license_applications->ProcLvl }}</span><br>
                            @endif
                            License Application No: {{ $payment->license_application_id }}<br>

                            {{-- Display Business details --}}
                            @if ($payment->license_applications->business)
                                Business Name: {{ $payment->license_applications->business->Business_Name }}<br>
                                Business Address: {{ $payment->license_applications->business->Business_Address }}<br>
                                Contact Number: {{ $payment->license_applications->business->Contact_Number }}<br>
                                District: {{ $payment->license_applications->business->district->District_Name }}<br>
                                {{-- Add other details as needed --}}
                            @endif

                            {{-- Other details --}}
                        </td>
                        <td>
                            @if($payment->license_applications->business->owner)
                                Owner Name: {{ $payment->license_applications->business->owner->Applicant_Name }}<br>
                                Owner Father
                                Name: {{ $payment->license_applications->business->owner->Applicant_Father_Name }}<br>
                            @endif
                        </td>
                        <td>
                            <a href="/show/verification/form/{{ $userid }}/license/{{ $payment->license_application_id }}">
                                <button type="button" class="btn rounded-pill btn-primary">Verify</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>

