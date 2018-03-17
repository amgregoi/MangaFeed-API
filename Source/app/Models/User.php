<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * @property mixed email
 * @property mixed name
 */
class User extends Model
{
    use Notifiable;

    /**
     * The attribute that disables created_at and updated_at column requirements
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'User';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public static function getUserByEmail($email)
    {
        return User::where(['email' => $email])->first();
    }

    public static function getUserById($id)
    {
        return User::where(['id' => $id])->first();
    }

}
