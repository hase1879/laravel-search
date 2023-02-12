<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Employees', function (Blueprint $table) {
            $table->id();

            $table->timestamps();

            //users.id
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->string('所属支社')->nullable();
            $table->string('所属部署')->nullable();
            // $table->date('入社年月日')->nullable();
            // $table->string('役職')->nullable();
            // $table->string('雇用形態')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Employees');
    }
};
