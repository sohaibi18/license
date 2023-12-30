<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssistantDirector extends Model
{
    use HasFactory;
    protected $table = 'assistant_directors';
    protected $guarded = ['*'];


}
