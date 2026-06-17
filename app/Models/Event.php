<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date_time',
        'location',
        'capacity',
        'banner_path',
        'category_id',
        'user_id'
    ];

    public function organizer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function participants()
{
    return $this->belongsToMany(User::class, 'event_user')
        ->withPivot('ticket_code', 'status')
        ->withTimestamps();
}
}