<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Enums\Priority;
use App\Enums\Status;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'priority',
        'status',
    ];

    protected $casts = [
        'priority' => Priority::class,
        'status' => Status::class,
    ];
}
