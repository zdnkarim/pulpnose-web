<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    public function diseases(){
        return $this->belongsTo(Disease::class, 'disease_id');
    }

    public function symptoms(){
        return $this->belongsTo(Symptom::class, 'symptom_id');
    }

    public function historyDetail()
    {
        return $this
        ->hasMany(HistoryDetail::class)
        ->withTimeStamps();
    }
}
