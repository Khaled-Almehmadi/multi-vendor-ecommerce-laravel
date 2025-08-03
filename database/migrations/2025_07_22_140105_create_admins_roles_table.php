<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('admins_roles', function (Blueprint $table) {
        $table->id();
        $table->integer('subadmin_id');
        $table->string('module');
        $table->boolean('view_access');
        $table->boolean('edit_access');
        $table->boolean('full_access');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins_roles');
    }
};
