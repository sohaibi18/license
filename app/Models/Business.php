<?php

namespace App\Models;

use App\Http\Controllers\ProductApplicationController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Business extends Model
{
    use HasFactory;

    protected $table = 'businesses';
    protected $fillable = [
        'Business_Name',
        'Business_Address',
        'Contact_Number',
        'Business_Email',
        'Website',
        'Start_Date',
        'Food_Handlers',
        'district_id', 'owner_id', 'user_id', 'business_type_id',
    ];

    public function owners(): BelongsToMany
    {
        return $this->belongsToMany(Owner::class)->withTimestamps();
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class);
    }


    public function business_type(): BelongsTo
    {
        return $this->belongsTo(BusinessType::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(LicenseApplication::class);
    }

    public function product_applications(): HasMany
    {
        return $this->hasMany(ProductApplication::class);
    }
}
