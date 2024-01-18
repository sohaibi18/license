<?php

namespace App\Models;

use App\Http\Controllers\ProductApplicationController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Owner extends Model
{
    use HasFactory;

    protected $table = 'owners';
    protected $fillable = [
       'Applicant_Name',
        'Applicant_Father_Name',
        'CNIC',
        'Mobile_Number',
        'Email',
        'Personal_Address',
        'Gender',
        'Profile_Image',
        'CNIC_Image',
        'district_id',
    ];

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function businesses(): BelongsToMany
    {
        return $this->belongsToMany(Business::class)->withTimestamps();
    }
    // Assuming 'name' is the attribute you want to retrieve
    public function business()
    {
        return $this->hasOne(Business::class);
    }

    public function product_applications(): HasMany
    {
        return $this->hasMany(ProductApplicationController::class);
    }


}
