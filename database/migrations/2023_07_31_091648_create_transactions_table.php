<?php

use App\Models\Client;
use App\Models\Compte;
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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer("montant");
            $table->foreignIdFor(Compte::class)->nullable();
            $table->foreignId("expediteur_id")->constrained("clients");
            $table->foreignId("destinataire_id")->constrained("clients")->nullable();
            $table->string("code")->nullable();
            $table->dateTime("date_transaction");
            $table->enum('type_transfert',["Depot","Retrait","Transfert"]);
            $table->boolean("immediat")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
