<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'confirmPassword'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $timestamps = true;

    public function getStatusNameAttribute()
    {
        return config('const.tables.users.status_names')[$this->status] ?? null;
    }

    public static function search(string $search)
    {
        //Query Builder
        $query = self::query();
        if (!empty($search)) {
            $query->where('email', 'LIKE', '%' . $search . '%');
            $query->orWhere('name', 'LIKE', '%' . $search . '%');
        }
        $query->orderBy('id');
        return $query->get();
    }

    
}
