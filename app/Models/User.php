<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'plantype',
        'num_of_posts',
        'image',
        'money'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getPlantypeAttribute($data)
    {
        if ($data == 100 ){
            return $data = 'admin';
        }elseif($data == 1){
            return $data = 'primium';
        }else{
            return $data = 'basic'; 
        }
        ;

    }

    public function getRoleAttribute($data)
    {
        if ($data == 1 ){
            return $data = 'admin';
        }else{
            return $data = 'user';
        };

    }


    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->money = rand(0,2000);
        });
    }
}
