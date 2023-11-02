<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Users extends Authenticatable 
{
    use HasFactory;

    protected $guarded = [
        'id',
        'adm_pwd',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'username',
        'password',
        'role_id',
        'created_at',
    ];

    protected $hidden = [
        'password',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(UsersRole::class);
    }

    public function access()
    {
        return $this->hasMany(UsersAccess::class);
    }

    public function menu():HasMany {
        return $this->hasMany(
            UsersAccess::class,
            'user_id',
            'id'
        );
    }

    public function subMenus():HasManyThrough
    {
        return $this->hasManyThrough(
            MenusSubmenu::class,
            UsersAccess::class,
            'user_id',
            'menu_id',
            'id',
            'menu_id'
        );
    }
    public function menus():HasManyThrough
    {
        return $this->hasManyThrough(
            UsersMenu::class,
            UsersAccess::class,
            'user_id',
            'id','id','menu_id'
        );
    }
}
