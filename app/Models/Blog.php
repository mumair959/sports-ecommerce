<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:d M Y'
    ];

    public function author()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
