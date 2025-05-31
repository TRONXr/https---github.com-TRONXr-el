<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable = ['test_id', 'min_score', 'max_score', 'description'];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
