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

    public static function StoreRules()
    {
        $rules = array(
            'title' => ["required", 'bail'],
            'date' => ['required', 'date', 'bail'],
        );
        return $rules;
    }


    public static  $messages = array(
        'title.required' => 'الاسم مطلوب',
        'date.required' => 'تاريخ السشن مطلوب',
    );
}