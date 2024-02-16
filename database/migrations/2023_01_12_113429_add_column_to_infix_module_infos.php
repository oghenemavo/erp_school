<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\RolePermission\Entities\InfixModuleInfo;

class AddColumnToInfixModuleInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('infix_module_infos', function (Blueprint $table) {
        if(!Schema::hasColumn('infix_module_infos', 'parent_route')){
          $table->string('parent_route')->nullable()->after('route');
        }

        if(!Schema::hasColumn('infix_module_infos', 'module_name')){
          $table->string('module_name')->nullable()->after('module_id');
        }
      });
        
        
      
         
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('infix_module_infos', function (Blueprint $table) {
            $dropColumns = ['parent_route', 'module_name'];
            $table->dropColumn($dropColumns);
        });
    }
}
