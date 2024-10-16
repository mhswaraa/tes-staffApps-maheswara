<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('customers', function (Blueprint $table) {
        $table->id();
        $table->string('name', 255);
        $table->string('email', 255)->unique();
        $table->string('phone_number', 20);
        $table->text('address')->nullable();
        $table->foreignId('package_id')->constrained('packages')->onDelete('cascade'); // Foreign key ke tabel packages
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
