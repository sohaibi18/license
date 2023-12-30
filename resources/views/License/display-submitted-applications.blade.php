<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->

        <div class="container mt-5">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Serial No</th>
                    <th>Submitted License Applications</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $serialNumber = 1;
                @endphp
                @foreach($licenseapplications as $licenseapplication)
                    <tr>
                        <td>{{ $serialNumber++ }}</td>
                        <td>
                            License Application No: {{ $licenseapplication->id }} <br>
                            Applicant Name: {{ $licenseapplication->business->owner->Applicant_Name }} <br>
                            Business Name: {{ $licenseapplication->business->Business_Name }} <br>
                            Business Address: {{ $licenseapplication->business->Business_Address }} <br>
                            License Category: {{ $licenseapplication->licenseCategory->License_Category_Name }} <br>

                        </td>
                        <td>
                            <a href="/attach/licensee/documents/{{$licenseapplication->id}}">
                                <button type="button" class="btn rounded-pill btn-primary">Attach Documents</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </div>


</x-layouts.app>
