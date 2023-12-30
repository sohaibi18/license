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
    protected $guarded = ['*'];

    public function license_applications(): HasMany
    {
        return $this->hasMany(LicenseApplication::class);
    }
}
