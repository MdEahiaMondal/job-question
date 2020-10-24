<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Option extends Model
{

    protected $fillable = [
        'question_id',
        'option_text',
        'option_image',
        'is_answer',
        'is_image',
        'created_by',
        'updated_by',
    ];


    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::creating(function ($option){
            $option->created_by = Auth::id();
        });
        static::updating(function ($option){
            $option->updated_by = Auth::id();
        });
    }

    public function createdUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }


    public function updatedUser()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function answer()
    {
        return $this->hasOne(Answer::class, 'option_id');
    }

}
