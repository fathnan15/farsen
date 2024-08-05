<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserMenu extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'updated_at',
        'is_active',
    ];

    public function subMenu(): HasMany
    {
        return $this->hasMany(UserSubmenu::class, 'menu_id');
    }
}
