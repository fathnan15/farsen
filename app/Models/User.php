<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
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
        'email',
        'gender',
        'date_birth',
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

    public function access() : HasMany
    {
        return $this->hasMany(UserAccess::class);
    }
}
