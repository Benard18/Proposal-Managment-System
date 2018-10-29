<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingOtherFieldsToProposal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::table('proposals', function($table){
            $table->mediumText('Activities')->default('Activities');
            $table->string('Budget')->default('Budget');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('proposals', function($table){
            $table->dropColumn("Activities");
            $table->dropColumn("Budget");
        });
    }
}
