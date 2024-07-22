<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCNDS - Schwartz Lab</title>
    <!--css-->
    <link rel="stylesheet" href="./style.css">
    <!--fonts-->
    <!--kode mono-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&display=swap" rel="stylesheet">

    <!--work sans-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!--font awesome cdn-->
    <script src="https://kit.fontawesome.com/b07cd41544.js" crossorigin="anonymous"></script>
</head>

<?php

// get all data from both tables in a big array with a structure matching the column names, blank if not present
// return the array
function getAllData() {
    $db = new SQLite3('data.sqlite');

    // Fetch all data from both tables
    $results = $db->query('SELECT * FROM prot_log');
    $prot_log = [];
    while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
        $prot_log[] = $row;
    }

    $results = $db->query('SELECT * FROM phos_log');
    $phos_log = [];
    while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
        $phos_log[] = $row;
    }

    // Get all unique headers from both tables
    $all_headers = array_unique(array_merge(array_keys($prot_log[0] ?? []), array_keys($phos_log[0] ?? [])));

    // Prepare the merged data
    $data = [];
    foreach ($prot_log as $prot) {
        $found = false;
        foreach ($phos_log as $phos) {
            if ($prot['accession'] == $phos['Protein']) {
                $merged_row = array_merge($prot, $phos);
                $data[] = array_merge(array_fill_keys($all_headers, ''), $merged_row);
                $found = true;
                break;
            }
        }
        if (!$found) {
            $data[] = array_merge(array_fill_keys($all_headers, ''), $prot);
        }
    }

    // Add remaining entries from phos_log if not found in prot_log
    foreach ($phos_log as $phos) {
        $found = false;
        foreach ($prot_log as $prot) {
            if ($prot['accession'] == $phos['Protein']) {
                $found = true;
                break;
            }
        }
        if (!$found) {
            $data[] = array_merge(array_fill_keys($all_headers, ''), $phos);
        }
    }

    return $data;
}


$rows = getAllData();
?>

<body>
    <!--------------------------HEADER-------------------------->
    <header>
        <div class="title">
            <h1 class="main-title">OCNDS</h1>
            <h2 class="title2">Okur-Chung<br>
                Neurodevelopmental<br>
                Syndrome</h2>
        </div>
        <div class="subtitle">
            <p>Schwartz Lab - University of Connecticut</p>
        </div>
    </header>


    <!-------------------------------SIDEBAR------------------------------->
    <aside>
        <!-----------------------CREDITS---------------------->
        <section class="credits">
            <h3>Credits</h3>
            <p>
                Schwartz Lab | Researchers: John Doe, Mary Sue | Lorem ipsum dolor sit amet consectetur. Lacinia turpis et quam non in.
            </p>
            <div class="btn-group">
                <div class="btn">
                    <a href="#">Home</a>
                </div>
                <div class="btn">
                    <a href="#">Experiment Design</a>
                </div>
                <div class="btn">
                    <a href="#">The Paper [pdf]</a>
                </div>
            </div>
        </section>

        <!-----------------------DATABASE DESCRIPTION---------------------->

        <section class="description">
            <h3>Database Description</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur. Lacinia turpis et quam non in. In lorem massa et blandit gravida mattis. Quis viverra lacus duis metus amet purus est sit. Ut aliquam erat faucibus faucibus morbi neque ipsum ut proin. Habitasse quam in congue risus quam. In lorem massa et blandit gravida mattis.
            </p>
        </section>
    </aside>

    <main>
        <!-----------------------SEARCH BAR---------------------->
        <section class="search-bar">

            <form id="search-bar" role="search">
                <input type="search" id="query" name="q" placeholder="Search gene, protein, or protein accession" aria-label="Search database by gene, protein, or protein accession">
                <!--search btn + icon-->
                <button type="submit" id="search-btn" name="search-btn" aria-label="Search database"><i class="fa-solid fa-magnifying-glass"></i></button>

                <div class="filter-wrap">
                    <!--Protein checkbox/filter-->
                    <div class="filter">
                        <input type="checkbox" id="protein-checkbox" name="protein-checkbox">
                        <label for="protein-checkbox"> Protein Table</label>
                    </div>

                    <!--Phosphorylation checkbox/filter-->
                    <div class="filter">
                        <input type="checkbox" id="phosphorylation-checkbox" name="protein-checkbox">
                        <label for="phosphorylation-checkbox"> Phosphorylation Table</label>
                    </div>
                </div>

            </form>
        </section>


        <!-----------------------TABLE DATA---------------------->
        <section class="data">

        <table>
            <thead>
                <tr>
                    <?php
                    // Loop through the first row of data to get the column names
                    $headers = array_keys($rows[0]);
                    foreach ($headers as $header) {
                        echo "<th>$header</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through each row of data
                foreach ($rows as $row) {
                    echo "<tr>";
                    // Loop through each value in the row
                    foreach ($row as $value) {
                        echo "<td>$value</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>



        </section>

    </main>

</body>

</html>