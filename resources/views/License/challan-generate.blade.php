<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container mt-5">
            <div style="font-size: 16px; text-align: center;">
                KHYBER PAKHTUNKHWA FOOD SAFETY AND HALAL FOOD AUTHORITY<br>
                <br><br><br>


                @if($payment)

                        LICENSE VOUCHER NO:{{ $payment->Challan_No }}<br><br>
                        @endif

                        A/C No: {{ $bankAccountNo }} <br><br><br>



                    @if($owners)
                      
                            OWNER NAME:{{ $owners->Applicant_Name }}<br><br>
                            CNIC: {{ $owners->CNIC }}<br><br>
                            @endif
                            @if($businesses)
                                BUSINESS NAME: {{ $businesses->Business_Name }}<br><br>
                            @endif


                            DUE AMOUNT: {{ $Due_Amount }}<br>
                            <br><br><br>
            </div>
        </div>
    </div>
</x-layouts.app>
