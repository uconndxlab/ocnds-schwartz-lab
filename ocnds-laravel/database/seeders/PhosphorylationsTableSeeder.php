<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Phosphorylation;

class PhosphorylationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = database_path('source-data/phosphorylation_final.csv');

        // Open the file for reading
        if (($handle = fopen($file, 'r')) !== false) {
            // Get the first row, which contains the column headers
            $headers = fgetcsv($handle, 10000, ',');

            // Loop through the remaining rows
            while (($row = fgetcsv($handle, 10000, ',')) !== false) {
                // Combine the row data with the headers to create an associative array
                $record = array_combine($headers, $row);

                // Create the Phosphorylation record
                Phosphorylation::create([
                    'accession' => $record['Accession'],
                    'position' => $record['Phosphorylated Residue(s)'],
                    'gene' => $record['Gene'],
                    'gene_description' => $record['Gene_Description'],
                    'k198r_s' => $record['K198R_S'],
                    'k198r_m' => $record['K198R_M'],
                    'r47g' => $record['R47G'],
                    'd156e' => $record['D156E'],
                    'pval_k198rs' => $record['pval_K198Rs'],
                    'pval_k198rm' => $record['pval_K198Rm'],
                    'pval_r47g' => $record['pval_R47G'],
                    'pval_d156e' => $record['pval_D156E'],
                    'modified_residue' => $record['ModifiedResidue'],
                    'modified_position' => $record['ModifedPosition'],
                    '15mer' => $record['15mer'],
                ]);
            }

            // Close the file
            fclose($handle);
        }
    }
}
