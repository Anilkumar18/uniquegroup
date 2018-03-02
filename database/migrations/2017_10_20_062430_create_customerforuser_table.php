<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customerusers', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('CustomerID')->unsigned();
			$table->integer('customerID')->unsigned();
			$table->integer('StateID')->unsigned();
			$table->integer('UserTypeID')->unsigned();
			$table->string('FirstName');
			$table->string('LastName');
			$table->string('PhoneNumber');
			$table->string('Email');
			$table->string('Suite');
			$table->string('Street');
			$table->string('City');
			$table->integer('ZIPcode');
			$table->string('UserName');
			$table->string('Password');
			$table->string('remember_token');
			$table->integer('is_sys_admin');
			$table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customerusers');
    }
}
?>