<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Habbit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'habbit_type_id',
        'status',
        'current_target_amount',
        'target_amount',
        'targeted_at',
    ];


    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function habitType() : BelongsTo
    {
        return $this->belongsTo(HabitType::class);
    }

}
