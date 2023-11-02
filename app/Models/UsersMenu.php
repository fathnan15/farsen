<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UsersMenu extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'updated_at',
        'is_active',
    ];

    // public function accessess(): HasMany
    // {
    //     return $this->hasMany(UsersAccess::class, 'menu_id');
    // }

    public function users():BelongsToMany
    {
        return $this->belongsToMany(Users::class,UsersAccess::class,'menu_id','user_id');
    }
}
