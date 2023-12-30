<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->

        <div class="container mt-5">
            {{--            <h2 class="mb-4">Complete Applicant Data</h2>--}}
            {{--            --}}{{--            <div class="card-body m-100 ">--}}
            {{--            --}}{{--                <div class="demo-inline-spacing">--}}
            {{--            --}}{{--                    <a href="/profile/update/{{ $users['id'] }}">--}}
            {{--            --}}{{--                        <button type="button" class="btn rounded-pill btn-primary">Update Profile</button>--}}
            {{--            --}}{{--                    </a>--}}
            {{--            --}}{{--                </div>--}}
            {{--            --}}{{--            </div>--}}
            {{--            --}}{{--            <div class="card-body m-100">--}}
            {{--            --}}{{--                <div class="demo-inline-spacing">--}}
            {{--            --}}{{--                    <a href="/profile/delete/{{ $users['id'] }}">--}}
            {{--            --}}{{--                        <button type="button" class="btn rounded-pill btn-primary">Delete Profile</button>--}}
            {{--            --}}{{--                    </a>--}}
            {{--            --}}{{--                </div>--}}
            {{--            --}}{{--            </div>--}}
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th>Applicant Name</th>
                    @if($personaldata)
                        <td>{{ $personaldata->Applicant_Name }}</td>
                    @else
                        <td>Not Found</td>
                    @endif
                </tr>
                <tr>
                    <th>Applicant Father Name</th>
                    @if($personaldata)
                        <td>{{ $personaldata->Applicant_Father_Name }}</td>
                    @else
                        <td>Not Found</td>
                    @endif
                </tr>
                <tr>
                    <th>CNIC</th>
                    @if($personaldata)
                        <td>{{ $personaldata->CNIC }}</td>
                    @else
                        <td>Not Found</td>
                    @endif
                </tr>
                <tr>
                    <th>Contact Number</th>
                    @if($personaldata)
                        <td>{{ $personaldata->Mobile_Number }}</td>
                    @else
                        <td>Not Found</td>
                    @endif
                </tr>
                <tr>
                    <th>Email</th>
                    @if($personaldata)
                        <td>{{ $personaldata->Email }}</td>
                    @else
                        <td>Not Found</td>
                    @endif
                </tr>
                <tr>
                    <th>Personal Address</th>
                    @if($personaldata)
                        <td>{{ $personaldata->Personal_Address }}</td>
                    @else
                        <td>Not Found</td>
                    @endif
                </tr>
                <tr>
                    <th>Gender</th>
                    @if($personaldata)
                        <td>{{ $personaldata->Gender }}</td>
                    @else
                        <td>Not Found</td>
                    @endif
                </tr>
                <tr>
                    <th>Profile Image</th>
                    @if($personaldata)
                        <td>
                            <img src="{{ asset($personaldata->Profile_Image) }}" alt="Profile Image">
                        </td>
                    @else
                        <td>Not Found</td>
                    @endif
                </tr>

                <tr>
                    <th>Profile Image</th>
                    @if($personaldata)
                        <td>
                            <img src="{{ asset($personaldata->CNIC_Image) }}" alt="CNIC Image">
                        </td>
                    @else
                        <td>Not Found</td>
                    @endif
                </tr>
                <tr>
                    <th>Residential District</th>
                    @if($personaldata)
                        <td>
                            @if($personaldata->district)
                                {{ $personaldata->district->District_Name }}
                            @else
                                Not Found
                            @endif
                        </td>
                    @else
                        <td>Not Found</td>
                    @endif
                </tr>
                <tr>
                    <th>Business Name</th>
                    @if($business)
                        <td>{{ $business->Business_Name }}</td>
                    @else
                        <td>Not Found</td>
                    @endif
                </tr>

                <tr>
                    <th>Business Address</th>
                    @if($business)
                        <td>{{ $business->Business_Address }}</td>
                    @else
                        <td>Not Found</td>
                    @endif
                </tr>
                <tr>
                    <th>Contact Number</th>
                    @if($business)
                        <td>{{ $business->Contact_Number }}</td>
                    @else
                        <td>Not Found</td>
                    @endif
                </tr>
                <tr>
                    <th>Business Email</th>
                    @if($business)
                        <td>{{ $business->Business_Email }}</td>
                    @else
                        <td>Not Found</td>
                    @endif
                </tr>
                <tr>
                    <th>Website</th>
                    @if($business)
                        <td>{{ $business->Website }}</td>
                    @else
                        <td>Not Found</td>
                    @endif
                </tr>
                <tr>
                    <th>Start Date</th>
                    @if($business)
                        <td>{{ $business->Start_Date }}</td>
                    @else
                        <td>Not Found</td>
                    @endif
                </tr>
                <tr>
                    <th>Food Handlers</th>
                    @if($business)
                        <td>{{ $business->Food_Handlers }}</td>
                    @else
                        <td>Not Found</td>
                    @endif
                </tr>
                <tr>
                    <th>Business District</th>
                    @if($business)
                        <td>
                            @if($business->district)
                                {{ $business->district->District_Name }}
                            @else
                                Not Found
                            @endif
                        </td>
                    @else
                        <td>Not Found</td>
                    @endif
                </tr>
                <tr>
                    <th>Business Type</th>
                    @if($business)
                        <td>
                            @if($business->business)
                                {{ $business->business->Business_Types }}
                            @else
                                Not Found
                            @endif
                        </td>
                    @else
                        <td>Not Found</td>
                    @endif
                </tr>
{{--                <tr>--}}
{{--                    <th>License Category</th>--}}
{{--                    @if($license)--}}
{{--                        <td>--}}
{{--                            @if($license->business)--}}
{{--                                {{ $license->business->Business_Types }}--}}
{{--                            @else--}}
{{--                                Not Found--}}
{{--                            @endif--}}
{{--                        </td>--}}
{{--                    @else--}}
{{--                        <td>Not Found</td>--}}
{{--                    @endif--}}
{{--                </tr>--}}

                </tbody>
            </table>
        </div>
    </div>


</x-layouts.app>
