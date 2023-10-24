<?php

use App\Models\Division;
use App\Models\Job;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->integer('salary');
            $table->foreignIdFor(Job::class, 'job_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Division::class, 'division_id')->constrained()->cascadeOnDelete();
            $table->boolean('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
