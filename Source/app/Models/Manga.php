<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * @property mixed url
 * @property mixed image
 */
class Manga extends Model
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
    protected $table = 'Manga';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'image',
    ];


    /***
     * This function returns a manga object specified by its id
     *
     * @param $id
     * @return \App\Manga
     */
    public static function getMangaById($id)
    {
        return Manga::where('id', $id)->first();
    }

    /***
     * This function returns a manga object specified by its url
     *
     * @param $url
     * @return mixed
     */
    public static function getMangaByUrl($url)
    {
        return Manga::where('url', $url)->first();
    }

}
