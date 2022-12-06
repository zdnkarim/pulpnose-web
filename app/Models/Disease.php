<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    public function rule()
    {
        return $this
        ->hasMany(Rule::class)
        ->withTimeStamps();
    }

    public function history()
    {
        return $this
        ->hasMany(History::class)
        ->withTimeStamps();
    }

    public function rules()
    {
        return $this
        ->hasMany(Rule::class)
        ->withTimeStamps();
    }
}
