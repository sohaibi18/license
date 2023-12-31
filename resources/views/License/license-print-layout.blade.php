<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container mt-5">

            @if($licenses)
                It is to certify that Mr. {{ $licenses->business->owner->Applicant_Name }}
                having CNIC No: {{ $licenses->business->owner->CNIC }}, Contact No: {{ $licenses->business->owner->CNIC }}
                Business Name: {{ $licenses->business->Business_Name }}, premises: {{ $licenses->business->Business_Address }} <br>
                confronts on the rules & regulations of the KP FS & HFA Act 2014.
            @endif


        </div>
    </div>
</x-layouts.app>
