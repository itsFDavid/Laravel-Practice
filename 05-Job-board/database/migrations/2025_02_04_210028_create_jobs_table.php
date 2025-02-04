<?php

// Changed file name from 2025_02_01_210028_create_jobs_table.php to 2025_02_04_210028_create_jobs_table.php

use App\Models\Employer;
use App\Models\Job;
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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->unsignedInteger('salary');
            $table->string('location');
            $table->string('category');
            // $table->enum('experience', ['entry', 'intermediate', 'senior']);
            $table->enum('experience', Job::$experience);
            $table->timestamps();

            $table->foreignIdFor(Employer::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropForeign(['employer_id']); // Eliminar la clave foránea
        });
        Schema::dropIfExists('jobs');
    }
};
