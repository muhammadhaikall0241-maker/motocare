
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_registration_id')
                ->constrained('service_registrations')
                ->restrictOnDelete();

            $table->text('complaint');
            $table->decimal('estimated_cost', 12, 2);
            $table->string('mechanic_name');
            $table->text('replacement_sparepart')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_details');
    }
};
