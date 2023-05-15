<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Content extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['page', 'key', 'value', 'section', 'type'];

    protected $searchableFields = ['*'];
}
