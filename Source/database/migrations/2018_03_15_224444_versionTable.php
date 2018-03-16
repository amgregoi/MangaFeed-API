<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VersionTable extends Migration
{
    public static $TABLE_NAME = 'Version';
    public static $PROPERTY_ID = 'id';
    public static $PROPERTY_TYPE = 'type';
    public static $PROPERTY_VERSION = 'version';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::$TABLE_NAME, function (Blueprint $table) {
            $table->increments(self::$PROPERTY_ID);
            $table->string(self::$PROPERTY_TYPE);
            $table->string(self::$PROPERTY_VERSION)->unique();
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
