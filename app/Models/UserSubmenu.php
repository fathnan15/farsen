<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserSubmenu extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'updated_at',
        'is_active',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(UserSubmenu::class, 'relate_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(UserSubmenu::class, 'relate_id');
    }

    public function menu(): BelongsTo
    {
        return $this->belongsTo(UserMenu::class);
    }
}
