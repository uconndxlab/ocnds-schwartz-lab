<?php 
// read phos_log.csv and insert each row into the phos_log table
// fields: "id","Protein","K198R_S","K198R_M","R47G","D156E","pval_K198Rs","pval_K198Rm","pval_R47G","pval_D156E"

$file = fopen('phos_log.csv', 'r');

$db = new SQLite3('../data.sqlite');

while (($line = fgetcsv($file)) !== FALSE) {
    if ($line[0] == 'id') {
        continue;
    }

    $db->exec("INSERT INTO phos_log (Protein, K198R_S, K198R_M, R47G, D156E, pval_K198Rs, pval_K198Rm, pval_R47G, pval_D156E) VALUES ('$line[1]', '$line[2]', '$line[3]', '$line[4]', '$line[5]', '$line[6]', '$line[7]', '$line[8]', '$line[9]')");
}

fclose($file);

// read prot_log.csv and insert each row into the prot_log table
// accession,ENSEBL,K198R_S,K198R_M,R47G,D156E,pval_K198Rs,pval_K198Rm,pval_R47G,pval_D156E

$file = fopen('prot_log.csv', 'r');

while (($line = fgetcsv($file)) !== FALSE) {
    if ($line[0] == 'accession') {
        continue;
    }

    $db->exec("INSERT INTO prot_log (accession, ENSEMBL, K198R_S, K198R_M, R47G, D156E, pval_K198Rs, pval_K198Rm, pval_R47G, pval_D156E) VALUES ('$line[0]', '$line[1]', '$line[2]', '$line[3]', '$line[4]', '$line[5]', '$line[6]', '$line[7]', '$line[8]', '$line[9]')");
}

