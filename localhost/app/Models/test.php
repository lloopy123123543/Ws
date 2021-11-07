<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class test extends Model
{
    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    protected $table = 'tests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['card_text', 'card_likes','card_title'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
