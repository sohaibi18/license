<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $fillable = [
        'license_application_id',
        'Due_Amount',
        'Paid_Amount',
        'Due_Date',
        'Deposit_Date',
        'Verified_Date',
        'Verify_By',
        'Challan_Image',
        'Challan_No', 'Remarks', 'Transaction_Id', 'Bank_Name', 'Branch_Code',
    ];

    public function license_applications(): BelongsTo
    {
        return $this->belongsTo(LicenseApplication::class, 'license_application_id');
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product_applications(): BelongsTo
    {
        return $this->belongsTo(ProductApplication::class, 'product_application_id');
    }
}
