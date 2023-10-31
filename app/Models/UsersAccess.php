<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class UsersAccess extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'updated_at',
        'is_active',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Users::class,'user_id');
    }

    public function menu(): BelongsTo
    {
        return $this->belongsTo(UsersMenu::class,'menu_id');
    }
    
    public function submenus(): HasManyThrough
    {
        return $this->hasManyThrough(MenusSubmenu::class, UsersMenu::class);
    }
}