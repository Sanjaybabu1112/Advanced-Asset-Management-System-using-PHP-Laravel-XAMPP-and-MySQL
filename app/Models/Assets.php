<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'uid', 'brand', 'model', 'image', 'specificatio41', 'specification2', 'specification3', 'specification1'];
}