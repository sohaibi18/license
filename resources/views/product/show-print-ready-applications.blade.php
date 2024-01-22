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
                @if($products)
                    @php
                        $serialNumber = ($products->currentPage() - 1) * $products->perPage() + 1;
                    @endphp
                @endif
                @foreach($products as $product)

                    <tr>
                        <td>{{ $serialNumber++ }}</td>
                        <td>

                            @if($product->ProcLvl == 'Issued')
                                <span class="text-success">{{ $product->ProcLvl }}</span><br>
                            @endif
                            Product Application No: {{ $product->id }}<br>


                            @if($product->business->owner)
                                Owner Name: {{ $product->business->owner->Applicant_Name }}<br>
                                Owner Father Name: {{ $product->business->owner->Applicant_Father_Name }}<br>
                            @endif
                            License Category: {{ $product->license_category->License_Category_Name }}<br>
                            Product Registration No: {{ $product->Product_Registration_No }}


                        </td>
                        <td>
                            @if ($product->business)
                                Business Name: {{ $product->business->Business_Name }}<br>
                                Business Address: {{ $product->business->Business_Address }}<br>
                                Contact Number: {{ $product->business->Contact_Number }}<br>
                                District: {{ $product->business->district->District_Name }}<br>
                            @endif
                            Issue Date: {{ $product->Issue_Date }}<br>
                            Expire Date: {{ $product->Expire_Date }}
                        </td>
                        <td>
                            <a href="/print/product/{{ $userid }}/{{ $product->id }}">
                                <button type="button" class="btn rounded-pill btn-primary">Print Product Registration</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            <div class="row">
                <div class="col-md-12">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
