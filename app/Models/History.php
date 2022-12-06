<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function diseases(){
        return $this->belongsTo(Disease::class, 'result');
    }

    public function historyDetail()
    {
        return $this
        ->hasMany(HistoryDetail::class)
        ->withTimeStamps();
    }
}
