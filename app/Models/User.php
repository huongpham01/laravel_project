<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'status',
        'created_at',
        // 'password',
        // 'confirmPassword'
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

    // public $sortable = ['id', 'name', 'email', 'status', 'created_at'];
}
