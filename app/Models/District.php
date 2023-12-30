<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class District extends Model
{
    use HasFactory;
    protected $table = 'districts';
    protected $guarded = ['*'];

    public function owners(): HasMany
    {
        return $this->hasMany(Owner::class);
    }

    public function businesses(): HasMany
    {
        return $this->hasMany(Business::class);
    }

    public function license_applications(): HasMany
    {
        return $this->hasMany(LicenseApplication::class);
    }
}
