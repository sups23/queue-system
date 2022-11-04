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
        Schema::create('apps', function (Blueprint $table) {
            $table->id();
            $table->time('expected_time')->nullable();
            $table->date('date');
            $table->enum('status', ['Unpaid', 'Paid', 'Checked'])->default('Unpaid');
            $table->enum('severity', ['Emergency', 'Urgent', 'Referal', 'Normal'])->default('Normal');
            $table->integer('priority')->default(1);
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('doctor_id');
            $table->foreignId('dept_id')->constrained();
            $table->boolean('is_online')->default(true);
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
        Schema::dropIfExists('apps');
    }
};
