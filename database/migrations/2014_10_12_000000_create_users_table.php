<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            // $table->dateTime('created_at')->default(DB::raw('GETDATE()'))->change()->nullable();
            // $table->dateTime('updated_at')->default(DB::raw('GETDATE()'))->change()->nullable();
            $table->timestamps(4);
            // $table->timestamp('created_at')->default(DB::raw('GETDATE()'))->change();
            // $table->timestamp('updated_at')->default(DB::raw('GETDATE()'))->change();
            
            // $table->dateTime('updated_at')->default(DB::raw('GETDATE()'))->change()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
