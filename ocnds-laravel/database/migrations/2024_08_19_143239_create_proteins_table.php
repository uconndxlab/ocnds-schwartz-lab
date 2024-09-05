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
        Schema::create('proteins', function (Blueprint $table) {
            $table->id();
            $table->string('ensembl_id')->nullable();
            $table->string('protein_accession')->unique();
            $table->string('gene');
            $table->text('gene_description')->nullable();
            $table->float('k198r_s')->nullable();
            $table->float('k198r_m')->nullable();
            $table->float('r47g')->nullable();
            $table->float('d156e')->nullable();
            $table->double('pval_k198rs')->nullable();
            $table->double('pval_k198rm')->nullable();
            $table->double('pval_r47g')->nullable();
            $table->double('pval_d156e')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proteins');
    }
};
