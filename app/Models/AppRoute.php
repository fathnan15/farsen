<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppRoute extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'updated_at',
        'is_active',
    ];
}
