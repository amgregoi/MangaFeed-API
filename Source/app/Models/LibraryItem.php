<?php
/**
 * Created by PhpStorm.
 * User: Andy Gregoire
 * Date: 3/15/2018
 * Time: 11:48 PM
 */

namespace App\Models;

/**
 * @property mixed url
 * @property mixed followType
 * @property mixed image
 */
class LibraryItem
{
    public $url;
    public $image;
    public $followType;

    public function __construct(array $attributes = [])
    {
        $this->url = $attributes['url'];
        $this->image = $attributes['image'];
        $this->followType = $attributes['followType'];
    }


}