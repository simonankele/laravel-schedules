<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('players', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('person_id')->constrained('peoples')->cascadeOnDelete();
            $table->foreignId('sports_organization_id')->nullable()->constrained('sports_organizations')->nullOnDelete();
            $table->string('player_number')->nullable();
            $table->string('position')->nullable();
            $table->string('status')->default('active');
            $table->json('stats')->nullable();
            $table->timestamps();

            $table->unique(['person_id', 'sports_organization_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
