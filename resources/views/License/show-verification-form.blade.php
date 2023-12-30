<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="POST" action="/verified/{{ $userid }}/licenseapp/{{ $licenseappid }}">
            @csrf
            <!-- Basic Layout -->
            <div class="row">
                <!-- Attach Documents -->
                <div class="col-xxl-10">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">For Finance Verification</h5>
                            <small class="text-muted float-end">Default label</small>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Due Amount</label>
                                <div class="col-sm-8">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="Due_Amount"
                                        value="{{ $Due_Amount }}"
                                        placeholder=""/>
                                    @if($errors->has('Due_Amount'))
                                        <span class="alert alert-danger"> {{ $errors->first('Due_Amount') }}</span>
                                        <br>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Paid Amount</label>
                                <div class="col-sm-8">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="Paid_Amount"
                                        value="{{ $Paid_Amount }}"
                                        placeholder=""/>
                                    @if($errors->has('Paid_Amount'))
                                        <span
                                            class="alert alert-danger"> {{ $errors->first('Paid_Amount') }}</span>
                                        <br>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Due Date</label>
                                <div class="col-sm-8">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="Due_Date"
                                        value="{{ $Due_Date }}"
                                        aria-describedby="basic-default-phone"/>
                                    @if($errors->has('Due_Date'))
                                        <span class="alert alert-danger"> {{ $errors->first('Due_Date') }}</span><br>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Deposit Date</label>
                                <div class="col-sm-8">
                                    <input
                                        id="basic-default-message"
                                        class="form-control"
                                        name="Deposit_Date"
                                        value="{{ $Deposit_Date }}"
                                        aria-describedby="basic-icon-default-message2"
                                    />
                                    @if($errors->has('Deposit_Date'))
                                        <span class="alert alert-danger"> {{ $errors->first('Deposit_Date') }}</span>
                                        <br>
                                    @endif
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Challan Image</label>
                                <div class="col-sm-8">
                                    <img src="{{ asset('storage/app/public' . $Challan_Image) }}" alt="Challan Image"
                                         style="max-width: 100%;">
                                    @if($errors->has('Challan_Image'))
                                        <span class="alert alert-danger"> {{ $errors->first('Challan_Image') }}</span>
                                        <br>
                                    @endif

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Challan Number</label>
                                <div class="col-sm-8">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="Challan_No"
                                        value="{{ $Challan_No }}"
                                        placeholder=""/>
                                    @if($errors->has('Challan_No'))
                                        <span class="alert alert-danger"> {{ $errors->first('Challan_No') }}</span>
                                        <br>
                                    @endif
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Transaction ID</label>
                                <div class="col-sm-8">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="Transaction_Id"
                                        value="{{ $Transaction_Id }}"
                                        placeholder=""/>
                                    @if($errors->has('Transaction_Id'))
                                        <span class="alert alert-danger"> {{ $errors->first('Transaction_Id') }}</span>
                                        <br>
                                    @endif
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Bank Name</label>
                                <div class="col-sm-8">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="Bank_Name"
                                        value="{{ $Bank_Name }}"
                                        placeholder=""/>
                                    @if($errors->has('$Bank_Name'))
                                        <span class="alert alert-danger"> {{ $errors->first('$Bank_Name') }}</span>
                                        <br>
                                    @endif
                                </div>
                            </div>


                        </div>
                    </div>
                </div>


                <div class="row justify-content-end">
                    <div class="row justify-content-start">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Verified</button>
                        </div>
                    </div>


                </div>
            </div>
        </form>
    </div>
    </div>
</x-layouts.app>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
