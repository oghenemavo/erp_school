<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\RolePermission\Entities\InfixModuleStudentParentInfo;

class AddColumnToInfixModuleStudentParentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('infix_module_student_parent_infos', function (Blueprint $table) {
            if (!Schema::hasColumn('infix_module_student_parent_infos', 'parent_route')) {
                Schema::table('infix_module_student_parent_infos', function ($table) {
                    $table->string('parent_route')->nullable()->after('route');
                });
            }

            if (!Schema::hasColumn('infix_module_student_parent_infos', 'module_name')) {
                Schema::table('infix_module_student_parent_infos', function ($table) {
                    $table->string('module_name')->nullable()->after('module_id');
                });
            }

           
           
        });
        // id, module_name, parent_route, name,route

      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
