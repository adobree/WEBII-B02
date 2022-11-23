<?php
class Regisztracio_Model
{
    public function regisztracio()
    {
        $retData['eredmeny'] = "";
        $retData['uzenet'] = "";
        try {
            $connection = Database::getConnection();
            if (isset($_POST['felhasznalonev']) && isset($_POST['email']) && isset($_POST['jelszo'])) {
                $_POST['felhasznalonev'] = trim($_POST['felhasznalonev']);
                $_POST['email'] = trim($_POST['email']);
                $_POST['jelszo'] = trim($_POST['jelszo']);
                $jogosultsag = "_1_";
                if ($_POST['felhasznalonev'] != "" && $_POST['email'] != "" && $_POST['jelszo'] != "") {
                    $retData['eredmeny'] = "OK";
                    $retData['uzenet'] = "Sikeres regisztráció";
                    $sql = "insert into users values (0, '" . $_POST['felhasznalonev'] . "', '" . $_POST['email'] . "', '" . sha1($_POST['jelszo']) . "', '" . $jogosultsag . "')";
                    $count = $connection->query($sql);
                    $newid = $connection->lastInsertId();
                } elseif ($_POST['felhasznalonev'] == "" && $_POST['email'] == "" && $_POST['jelszo'] == "") {
                    echo "Hiba: Nem adott meg egy adatot sem";
                } elseif ($_POST['felhasznalonev'] == "") {
                    echo "Hiba: Nem adott meg felhasználónevet";
                } elseif ($_POST['email'] == "") {
                    echo "Hiba: Nem adott meg email címet";
                } elseif ($_POST['bejelentkezes'] == "") {
                    echo "Hiba: Nem adott meg jelszót";
                }
            }
            return $retData;
        } catch (PDOException $e) {
            $retData['eredmény'] = "ERROR";
            $retData['uzenet'] = "Adatbázis hiba: " . $e->getMessage() . "!";
        }
    }
}
