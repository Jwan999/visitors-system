<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'date'];

    public function participants()
    {

        return $this->hasMany(Participant::class);
    }
}
