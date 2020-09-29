<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $appends = ['picture_url', 'pdf_doc_url', 'word_doc_url'];

    protected $with = ['licenseReg'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function licenseReg(){

        return $this->hasOne(LicenseReg::class);

    }


    public function getPictureUrlAttribute(){

         $base_url = env("APP_URL");

        return $base_url . '/profile_pic/' . $this->picture;

    }

    public function getPdfDocUrlAttribute(){

        $base_url = env("APP_URL");

        return $base_url . '/pdf_doc/' . $this->pdf_doc;

    }

    public function getWordDocUrlAttribute(){

        $base_url = env("APP_URL");

        return $base_url . '/word_doc/' . $this->word_doc;

    }
}
