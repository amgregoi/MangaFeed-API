<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MangaTable extends Migration
{
    public static $TABLE_NAME = 'Manga';
    public static $PROPERTY_ID = 'id';
    public static $PROPERTY_URL = 'url';
    public static $PROPERTY_IMAGE = 'image';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::$TABLE_NAME, function (Blueprint $table) {
            $table->increments(self::$PROPERTY_ID);
            $table->string(self::$PROPERTY_URL)->unique();
            $table->string(self::$PROPERTY_IMAGE)->default('NO_IMAGE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::$TABLE_NAME);
    }
}
