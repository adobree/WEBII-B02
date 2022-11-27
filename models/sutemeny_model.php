<?php
require_once '../includes/database.inc.php';
$suti = $_REQUEST["q"];
$response = "";
try {
    // echo $suti;
    $connection = Database::getConnection();
    $sql = "select suti.nev, ar.ertek, tartalom.mentes from cukraszda.suti inner join ar on suti.id = ar.sutiid	inner join tartalom on suti.id = tartalom.sutiid where suti.nev like '%" . $suti . "%'";
    // $sql = "select suti.nev from cukraszda.suti where suti.nev like '%" . $suti . "%'";
    // $sql = "select nev from suti where nev like '" . $suti . "'";
    $stmt = $connection->query($sql);
    $suti_res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // echo $suti_res[0]["nev"];
    $talalat = [];
    foreach ($suti_res as $suti) {
        echo $suti["nev"] . '<br>';
        // echo var_dump($suti);
        array_push($talalat, $suti);
    }
    // echo "találat: " . var_dump($talalat);
    return json_encode($talalat);
    // echo var_dump($talalat);
    // echo var_dump($suti);
} catch (PDOException $error) {
    echo "kutyageci";
    $response = "Hiba";
}
// Array with names
// $a[] = "Anna";
// $a[] = "Brittany";
// $a[] = "Cinderella";
// $a[] = "Diana";
// $a[] = "Eva";
// $a[] = "Fiona";
// $a[] = "Gunda";
// $a[] = "Hege";
// $a[] = "Inga";
// $a[] = "Johanna";
// $a[] = "Kitty";
// $a[] = "Linda";
// $a[] = "Nina";
// $a[] = "Ophelia";
// $a[] = "Petunia";
// $a[] = "Amanda";
// $a[] = "Raquel";
// $a[] = "Cindy";
// $a[] = "Doris";
// $a[] = "Eve";
// $a[] = "Evita";
// $a[] = "Sunniva";
// $a[] = "Tove";
// $a[] = "Unni";
// $a[] = "Violet";
// $a[] = "Liza";
// $a[] = "Elizabeth";
// $a[] = "Ellen";
// $a[] = "Wenche";
// $a[] = "Vicky";

// // get the q parameter from URL
// // $suti = $_REQUEST["q"];

// // $hint = "";

// // if ($suti !== "") {
// //     $suti = strtolower($suti);
// //     $len = strlen($suti);
// //     foreach ($a as $name) {
// //         if (stristr($suti, substr($name, 0, $len))) {
// //             if ($hint === "") {
// //                 $hint = $name;
// //             } else {
// //                 $hint .= ", $name";
// //             }
// //         }
// //     }
// // }

// // // Output "no suggestion" if no hint was found or output correct values
// // echo $hint === "" ? "no suggestion" : $hint;
