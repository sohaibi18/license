<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductApplication extends Model
{
    use HasFactory;

    protected $table = 'product_applications';
    protected $fillable = [
        'business_id',
        'owner_id',
        'Product_Name',
        'Product_Label',
        'Lab_Analysis_Report',
        'ProcLvl',
        'Affidavit',
        'Expire_Date',
        'Product_Registration_No',
        'QRImage',
        'user_id',
        'Update_Date', 'Submit_Date', 'Issue_Date', 'Finance_Verified_Date', 'Registration_Approved_Date',
        'Printed_Date', 'Dispatched_Date', 'license_category_id'
    ];

    public function business():BelongsTo
    {
        return $this->belongsTo(Business::class,'business_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function owner(): HasOne
    {
        return $this->hasOne(Owner::class);
    }

    public function license_category()
    {
        return $this->belongsTo(LicenseCategory::class);
    }
    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }
}
