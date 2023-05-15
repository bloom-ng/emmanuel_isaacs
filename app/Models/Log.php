<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Log extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['action', 'user_id', 'description', 'data'];

    protected $searchableFields = ['*'];

    protected $casts = [
        'data' => 'array',
    ];
}
