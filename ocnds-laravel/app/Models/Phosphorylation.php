<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phosphorylation extends Model
{
    use HasFactory;

    protected $fillabe = [
        'accession',
        'position',
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
        'modified_residue',
        'modified_position',
        '15mer',
    ];
}
