<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FollowTable extends Migration
{
    public static $TABLE_NAME = 'Follow';
    public static $PROPERTY_ID = 'id';
    public static $PROPERTY_USER_ID = 'userId';
    public static $PROPERTY_MANGA_ID = 'mangaId';
    public static $PROPERTY_FOLLOW_TYPE = 'followType';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::$TABLE_NAME, function (Blueprint $table) {
            $table->increments(self::$PROPERTY_ID);
            $table->integer(self::$PROPERTY_USER_ID)->unsigned();
            $table->integer(self::$PROPERTY_MANGA_ID)->unsigned();
            $table->integer(self::$PROPERTY_FOLLOW_TYPE);

            $table->foreign(self::$PROPERTY_USER_ID)->references('id')->on(UserTable::$TABLE_NAME);
            $table->foreign(self::$PROPERTY_MANGA_ID)->references('id')->on(MangaTable::$TABLE_NAME);

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
