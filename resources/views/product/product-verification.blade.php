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

                @foreach($productapplications as $productapplication)
                    <tr>
                        <td>{{ $serialNumber++ }}</td>
                        <td>

                            @if($productapplication->ProcLvl == 'Finance Verified')
                                <span class="text-success">{{ $productapplication->ProcLvl }}</span><br>
                            @endif
                            Product Application No: {{ $productapplication->id }}<br>
                                Product Name: {{ $productapplication->Product_Name }} <br>
                            {{-- Display Business details --}}
                            @if ($productapplication->business)
                                Business Name: {{ $productapplication->business->Business_Name }}<br>
                                Business Address: {{ $productapplication->business->Business_Address }}<br>
                                Contact Number: {{ $productapplication->business->Contact_Number }}<br>

                            @endif

                            {{-- Other details --}}
                        </td>
                        <td>
                            @if($productapplication->business->owner)
                                Owner Name: {{ $productapplication->business->owner->Applicant_Name }}<br>
                                Owner Father Name: {{ $productapplication->business->owner->Applicant_Father_Name }}<br>
                            @endif
                        </td>
                        <td>
                            <a href="/show/product/verification/form/{{ $userid }}/product/{{ $productapplication->id }}">
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
