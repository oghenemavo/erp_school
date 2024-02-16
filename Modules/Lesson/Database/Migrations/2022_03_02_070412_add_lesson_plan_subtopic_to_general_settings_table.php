<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\RolePermission\Entities\InfixModuleInfo;

class AddLessonPlanSubtopicToGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sm_general_settings', function (Blueprint $table) {
            if(!Schema::hasColumn($table->getTable(), 'sub_topic_enable')){
                $table->boolean('sub_topic_enable')->default(true);
            }
        });

            $new = new InfixModuleInfo();
            $new->id = 835;
            $new->module_id = 29;
            $new->parent_id = 800;
            $new->type = '1';
            $new->is_saas = 0;
            $new->route = "Lesson Plan Setting";
            $new->lang_name = "lesson.lesson-planner.settomg";
            $new->icon_class = "lesson_plan";
            $new->active_status = 1;
            $new->created_by =1;
            $new->updated_by = 1;
            $new->school_id = 1;
            $new->save();

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sm_general_settings', function (Blueprint $table) {
            if(Schema::hasColumn($table->getTable(), 'sub_topic_enable')){
                $table->dropColumn('sub_topic_enable');
            }
        });

        \Modules\RolePermission\Entities\InfixModuleInfo::where('id', 835)->delete();
    }
}
