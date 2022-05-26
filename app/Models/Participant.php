<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }


    public static function StoreRules()
    {
        $rules = array(
            'name' => ["required", 'bail'],
            'date_of_birth' => ['required', 'date', 'bail'],
            'email' => ['required', 'email', 'bail', 'unique:participants'],
            'phone' => ['required', 'digits:11', 'bail'],
            'gender' => ['required', 'bail'],
            'governorate' => ['required', 'bail'],
            'nationality' => ['required', 'bail'],
            'session_id' => ['required', 'bail'],
            'educational_background' => ['bail'],
            'university' => [],
            "field_of_study" => [],
            "attendance" => []
        );
        return $rules;
    }

    public static  $messages = array(
        'name.required' => 'الاسم مطلوب',
        'date_of_birth.required' => 'تاريخ الميلاد مطلوب',
        'email.required' => 'البريد الالكتروني مطلوب',
        'email.email' => 'البريد الالكتروني غير صالح',
        'email.unique' => 'البريد الالكتروني مسجل سابقا',
        'phone.required' => 'رقم الهاتف مطلوب',
        'phone.digits' => 'رقم الهاتف غير صالح',
        'gender.required' => 'gender is required',
        'governorate.required' => 'المحافظة مطلوبة',
        'nationality.required' => 'القومية مطلوبة',
        'session_id.required' => 'session_id is required',
    );

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'session_id',
    ];
}