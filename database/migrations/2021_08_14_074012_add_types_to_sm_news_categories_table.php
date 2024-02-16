<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddTypesToSmNewsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sm_news_categories', function (Blueprint $table) {
            if(!Schema::hasColumn($table->getTable(), 'type')){
                $table->string('type', 191)->default('news')->after('category_name');
            };
        });

        DB::table('sm_news_categories')->where('id', 2)->update(['type' => 'history']);
        DB::table('sm_news_categories')->where('id', 3)->update(['type' => 'mission']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sm_news_categories', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
