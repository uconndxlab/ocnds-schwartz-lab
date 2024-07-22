<?php
// create a new sqlite3 database called data.sqlite
$db = new SQLite3('../data.sqlite');

// create a new table called prot_log with the following fields
// accession,ENSEBL,K198R_S,K198R_M,R47G,D156E,pval_K198Rs,pval_K198Rm,pval_R47G,pval_D156E

$db->exec('CREATE TABLE prot_log (accession STRING, ENSEMBL STRING, K198R_S STRING, K198R_M STRING, R47G STRING, D156E STRING, pval_K198Rs STRING, pval_K198Rm STRING, pval_R47G STRING, pval_D156E STRING)');

// create a new table called phos_log with the following fields
// "id","Protein","K198R_S","K198R_M","R47G","D156E","pval_K198Rs","pval_K198Rm","pval_R47G","pval_D156E"

$db->exec('CREATE TABLE phos_log (id STRING, Protein STRING, K198R_S STRING, K198R_M STRING, R47G STRING, D156E STRING, pval_K198Rs STRING, pval_K198Rm STRING, pval_R47G STRING, pval_D156E STRING)');



