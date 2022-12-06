<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryDetail extends Model
{
    use HasFactory;

    public function rules(){
        return $this->belongsTo(Rule::class, 'rule_id');
    }

    public function histories(){
        return $this->belongsTo(History::class, 'history_id');
    }
}
