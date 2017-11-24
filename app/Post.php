<?php

namespace App;

use App\Traits\SearchAndFilterAble;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use SearchAndFilterAble;
    
    protected $fillable = ['title', 'content'];
    protected $searchable = ['title', 'content'];
}
