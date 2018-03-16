<?php
/**
 * Created by PhpStorm.
 * User: Andy Gregoire
 * Date: 3/15/2018
 * Time: 11:12 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


/**
 * @property mixed userId
 * @property mixed mangaId
 * @property mixed followType
 */
class Follow extends Model
{
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Follow';


    /**
     * The attribute that disables created_at and updated_at column requirements
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userId', 'mangaId', 'followType',
    ];


    public static function getFollowedItems($id)
    {
        return Follow::where('userId', $id)->get();
    }

    public static function getFollowedItem($userId, $mangaId)
    {
        return Follow::where('userId',$userId)->where('mangaId', $mangaId)->first();
    }
}