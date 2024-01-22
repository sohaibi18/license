<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container mt-5">
            <div style="font-size: 16px; text-align: center;">
                KHYBER PAKHTUNKHWA FOOD SAFETY AND HALAL FOOD AUTHORITY<br>
                BRAND/PRODUCT REGISTRATION CERTIFICATE<br><br><br>
            </div>


            <div style="text-align: center; display: flex; justify-content: space-between;">
                <div style="text-align: left;">
                    Product Category: {{ $products->license_category->License_Category_Name }}
                </div>
                <div style="text-align: right;">
                    Product Registration No: {{ $products->Product_Registration_No }}/DG/KPFS&HFA/2024<br><br><br>
                </div>
            </div>
            <div style="text-align: center;">
                @if($products)
                    <p style="font-size: 16px; text-align: left; margin-left: 10%; margin-right: 10%;">
                        Brand/Product Name:{{ $products->Product_Name }} Business Name: {{ $products->business->Business_Name }}<br>
                        Premises Address: {{$products->business->Business_Address}}<br>
                        Validity Period {{$products->Issue_Date}} to {{$products->Expire_Date}} renewal of this
                        Certificate will be according to rules and regulations.
                    </p><br><br>
                    <p style="font-size: 16px; text-align: center">
                        This certificate is issued under the clause section 7(2), section 15 of the KP Food Safety and
                        Halal Food Authority Act, 2014.
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
