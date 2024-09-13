<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoalStatus extends Model
{
    use HasFactory;

    protected $fillable = ['status'];

    /**
     * The goal type that the status belongs to.
     */
    public function goalType()
    {
        return $this->belongsTo(GoalType::class);
    }
}
