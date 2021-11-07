<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Ad extends Model
{
    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    protected $table = 'ads';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['Title_ad', 'Info_ad','Contact_name','contact_phone','date_end'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
