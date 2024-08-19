<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protein extends Model
{
    use HasFactory;

    protected $fillable = [
        'ensembl_id',
        'protein_accession',
        'gene',
        'gene_description',
        'k198r_s',
        'k198r_m',
        'r47g',
        'd156e',
        'pval_k198rs',
        'pval_k198rm',
        'pval_r47g',
        'pval_d156e',
    ];
}
