<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSubmenu extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'updated_at',
        'is_active',
    ];

    public function menu(): BelongsTo
    {
        return $this->belongsTo(UserMenu::class);
    }
}
