<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserfieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
			$table->renameColumn('name', 'userName'); 
			$table->integer('chainID')->after('id');
			$table->integer('userTypeID');
			$table->integer('is_sys_admin');
			$table->integer('regionID');
			$table->integer('addressID');
			$table->string('companyName',255)->after('remember_token');
			$table->string('firstName',255)->after('companyName');
			$table->string('lastName',255)->after('firstName');
			$table->string('phone',255)->after('lastName');
			$table->integer('status')->after('phone')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
			$table->renameColumn('userName', 'name'); 
			$table->dropColumn(['chainID', 'userTypeID', 'is_sys_admin', 'regionID', 'addressID', 'companyName', 'firstName' , 'lastName', 'phone', 'status']);
        });
    }
}
