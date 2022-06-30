<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habbit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'habbit_type_id',
        'habbit_name',
        'status'
    ];
}
