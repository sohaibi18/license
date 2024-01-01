<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container mt-5">
            <div style="font-size: 16px; text-align: center;">
                KHYBER PAKHTUNKHWA FOOD SAFETY AND HALAL FOOD AUTHORITY<br>
                LICENSE CERTIFICATE UNDER SECTION 15 of KPFS&HFA Act, 2014<br>
                THIS LICENSE IS NOT TRANSFERABLE AND FEE IS NOT REFUNDABLE<br><br><br>
            </div>


            <div style="text-align: center; display: flex; justify-content: space-between;">
                <div style="text-align: left;">
                    License Category: {{ $licenses->licenseCategory->License_Category_Name }}
                </div>
                <div style="text-align: right;">
                    License No: {{ $licenses->License_No }}/DG/KPFS&HFA/2024<br><br><br>
                </div>
            </div>
            <div style="text-align: center;">
                @if($licenses)
                    <p style="font-size: 16px; text-align: left; margin-left: 10%; margin-right: 10%;">
                        In pursuance of the provision of section 15 of the KP Food Safety and Halal Food Authority Act,
                        2014, license to operate a food business is
                        hereby issued to Mr./Ms./Mrs.{{ $licenses->business->owner->Applicant_Name }}, bearing CNIC
                        No. {{ $licenses->business->owner->CNIC }}, contact
                        No. {{ $licenses->business->Contact_Number }},
                        having business name {{ $licenses->business->Business_Name }}, located
                        at {{$licenses->business->Business_Address}}.
                        The license is issued on {{$licenses->Issue_Date}} and expires on {{$licenses->Expire_Date}}.
                    </p><br><br>
                    <p style="font-size: 16px; text-align: center">
                        The licensee has agreed to comply with the standards, rules and regulations of Khyber
                        Pakhtunkhwa Food Safety and Halal Food Authority for <br>
                        the time being enforced. Therefore, license is issued subject to the compliance of the aforesaid
                        committment.
                    </p><br><br><br>
                @endif
            </div>
            <div style="display: flex; justify-content: space-between;">
                <div style="text-align: left;">
                    <div style="text-align: center; display: inline-block;">
                        Assistant Director<br>
                        (Licensing)<br>
                        KP Food Safety &<br>
                        Halal Food Authority<br>
                    </div>
                </div>
                <div style="text-align: right;">
                    <div style="text-align: center; display: inline-block;">
                        Director General<br>
                        KP Food Safety &<br>
                        Halal Food Authority<br>
                    </div>
                </div>
            </div>


        </div>
    </div>
</x-layouts.app>
