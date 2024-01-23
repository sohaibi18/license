<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LicenseApplication extends Model
{
    use HasFactory;
    protected $table = 'license_applications';
    protected $fillable = [
      'business_id',
        'license_category_id',
        'ProcLvl',
        'Affidavit',
        'Medical_Certificate',
        'Expire_Date',
        'License_No',
        'QRImage',
        'user_id',
        'district_id', 'Update_Date', 'Submit_Date', 'Issue_Date',
    ];
    public static function boot()
    {
        parent::boot();

        self::updating(function ($model) {
            // Set 'Update_Date' to the current timestamp when updating any field in the record
            $model->Update_Date = Carbon::now();
        });
    }
    public function business():BelongsTo
    {
        return $this->belongsTo(Business::class,'business_id','id');
    }

    public function license_category(): BelongsTo
    {
        return $this->belongsTo(LicenseCategory::class, 'license_category_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }
// the below relation is used to display the fields of payment table by using the license model in show-license-verification-form.blade.php
    public function payments()
    {
        return $this->hasOne(Payment::class, 'license_application_id', 'id');
    }

    public function licenseCategory()
    {
        return $this->belongsTo(LicenseCategory::class, 'license_category_id');
    }
}
