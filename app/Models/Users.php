<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticate;

class Users extends Model
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

    public function menu(): HasMany
    {
        return $this->hasMany(UsersAccess::class, 'user_id');
    }
}
