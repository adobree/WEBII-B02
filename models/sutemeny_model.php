<?php
header('Content-Type: application/json; charset=utf-8');
require_once '../includes/database.inc.php';
$suti = $_REQUEST["q"];
$response = "";
try {
    // echo $suti;
    $connection = Database::getConnection();
    /**
     * Lekérjük a sütemény nevét, értékét és "mentességét" 3 táblából az adatbázisból
     */
    $sql = "select suti.nev, ar.ertek, tartalom.mentes from cukraszda.suti inner join ar on suti.id = ar.sutiid	inner join tartalom on suti.id = tartalom.sutiid where suti.nev like '%" . $suti . "%'";
    $stmt = $connection->query($sql);
    $suti_res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    /**
     * találat tömb
     */
    $talalat = [];
    /**
     * végigmegyünk a válaszon és hozzáadjuk a "talalat" tömbhöz
     */
    foreach ($suti_res as $suti) {
        array_push($talalat, $suti);
    }
    /**
     * JSON formátumban adjuk vissza a választ javaScript-nek, amely példányokat hoz létre belőle
     */
    echo json_encode($talalat);
} catch (PDOException $error) {
    $response = "Hiba";
}
