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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('mobile', 20)->index();
            $table->string('email', 150)->index();

            $table->enum('purpose', ['interview', 'meeting', 'maintenance', 'other'])->default('other');
            $table->string('person_to_meet', 255)->nullable();
            $table->enum('department', ['hr', 'it', 'marketing', 'ra', 'sales', 'telemarketing','mis', 'management', 'other'])->nullable();
            $table->enum('id_type', ['aadhar', 'passport', 'driving_license', 'voter_id', 'other'])->nullable();
            $table->string('id_number', 255)->nullable();

            $table->smallInteger('birth_year')->nullable();
            $table->dateTime('visted_at')->useCurrent();

            $table->enum('approval_status', ['approved', 'pending', 'rejected'])->default('pending')->index();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
