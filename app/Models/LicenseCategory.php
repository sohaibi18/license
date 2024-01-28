<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LicenseCategory extends Model
{
    use HasFactory;
    protected $table = 'license_categories';
    protected $fillable = [
      'License_Category_Name',
      'License_Fee',

    ];

    public function license_applications(): HasMany
    {
        return $this->hasMany(LicenseApplication::class);
    }

    public function product_applications(): HasMany
    {
        return $this->hasMany(ProductApplication::class);
    }
}
