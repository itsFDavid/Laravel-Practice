<?php

// Changed file name from 2025_02_04_195708_create_employers_table.php to 2025_02_01_195708_create_employers_table.php

use App\Models\Employer;
use App\Models\User;
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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->foreignIdFor(User::class)
                    ->nullable()
                    ->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Eliminar la clave foránea
        });
        Schema::dropIfExists('employers');
    }
};
