<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $casts = [
        'user_id' => 'integer',
    ];
    protected $fillable = [
        'user_id', 'category', 'title', 'content', 'status', 'image'
    ];
    public function getCategoryNameAttribute()
    {
        return config('const.tables.reviews.category')[$this->category] ?? null;
    }

    public static function search(string $sort, string $​direction)
    {
        $query = self::query();
        $query->orderBy($sort, $​direction);
        return $query->get();
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function t_category()
    {
        return $this->hasMany(t_category::class);
    }
}
