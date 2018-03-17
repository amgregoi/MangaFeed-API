<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserTable extends Migration
{
    public static $TABLE_NAME = 'User';
    public static $PROPERTY_ID = 'id';
    public static $PROPERTY_NAME = 'name';
    public static $PROPERTY_EMAIL = 'email';

    /**
     * Run the migrations.
     *-
     * @return void
     */
    public function up()
    {
        Schema::create(self::$TABLE_NAME, function (Blueprint $table) {
            $table->increments(self::$PROPERTY_ID);
            $table->string(self::$PROPERTY_NAME);
            $table->string(self::$PROPERTY_EMAIL)->unique();
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
