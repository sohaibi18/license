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

                @foreach($licenseapplications as $licenseApplication)
                    <tr>
                        <td>{{ $serialNumber++ }}</td>
                        <td>

                            @if($licenseApplication->ProcLvl == 'Finance Verified')
                                <span class="text-success">{{ $licenseApplication->ProcLvl }}</span><br>
                            @endif
                                License Application No: {{ $licenseApplication->id }}<br>
                            {{-- Display Business details --}}
                            @if ($licenseApplication->business)
                                Business Name: {{ $licenseApplication->business->Business_Name }}<br>
                                Business Address: {{ $licenseApplication->business->Business_Address }}<br>
                                Contact Number: {{ $licenseApplication->business->Contact_Number }}<br>
                                District: {{ $licenseApplication->business->district->District_Name }}<br>
                                {{-- Add other details as needed --}}
                            @endif

                            {{-- Other details --}}
                        </td>
                        <td>
                            @if($licenseApplication->business->owner)
                                Owner Name: {{ $licenseApplication->business->owner->Applicant_Name }}<br>
                                Owner Father Name: {{ $licenseApplication->business->owner->Applicant_Father_Name }}<br>
                            @endif
                        </td>
                        <td>
                            <a href="/show/license/verification/form/{{ $userid }}/license/{{ $licenseApplication->id }}">
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
