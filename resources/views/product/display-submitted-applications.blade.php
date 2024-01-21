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
                @foreach($productapplications as $productapplication)
                    <tr>
                        <td>{{ $serialNumber++ }}</td>
                        <td>
                            @if($productapplication->ProcLvl == 'Pending')
                                <span class="text-success">{{ $productapplication->ProcLvl }}</span><br>
                            @endif
                            Product Application No: {{ $productapplication->id }} <br>
                            Product Name: {{ $productapplication->Product_Name }} <br>
                            Business Name: {{ $productapplication->business->Business_Name }} <br>
                            Business Address: {{ $productapplication->business->Business_Address }} <br>
                            Product Category: {{ $productapplication->license_category->License_Category_Name }} <br>

                        </td>
                        <td>
                            <a href="/attach/product/documents/{{$productapplication->id}}">
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
