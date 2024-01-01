<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container mt-5">


            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Serial No</th>
                    <th>Pending Applications</th>
                    <th>Details</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @if($licenses)
                    @php
                        $serialNumber = ($licenses->currentPage() - 1) * $licenses->perPage() + 1;
                    @endphp
                @endif
                @foreach($licenses as $license)

                    <tr>
                        <td>{{ $serialNumber++ }}</td>
                        <td>

                            @if($license->ProcLvl == 'Issued')
                                <span class="text-success">{{ $license->ProcLvl }}</span><br>
                            @endif
                            License Application No: {{ $license->id }}<br>


                            @if($license->business->owner)
                                Owner Name: {{ $license->business->owner->Applicant_Name }}<br>
                                Owner Father Name: {{ $license->business->owner->Applicant_Father_Name }}<br>
                            @endif
                            License Category: {{ $license->licenseCategory->License_Category_Name }}<br>
                            License No: {{ $license->License_No }}


                        </td>
                        <td>
                            @if ($license->business)
                                Business Name: {{ $license->business->Business_Name }}<br>
                                Business Address: {{ $license->business->Business_Address }}<br>
                                Contact Number: {{ $license->business->Contact_Number }}<br>
                                District: {{ $license->business->district->District_Name }}<br>
                            @endif
                            Issue Date: {{ $license->Issue_Date }}<br>
                            Expire Date: {{ $license->Expire_Date }}
                        </td>
                        <td>
                            <a href="/print/license/{{ $userid }}/{{ $license->id }}">
                                <button type="button" class="btn rounded-pill btn-primary">Print License</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            <div class="row">
                <div class="col-md-12">
                    {{ $licenses->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
