<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Version extends Model
{
    use Notifiable;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Version';

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
        'id', 'type', 'version',
    ];
    
}
