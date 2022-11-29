<?php
class pdf_Model {

  public function pdf(){
  

    unset($_SESSION['lekerdezes']);
    
    //-------------------------------------------------------------------------
    //- Kiválasztja az adatbázisból a sutik nevet és jelentését -
    //-------------------------------------------------------------------------
    $connection = Database::getConnection();
    $sql = "SELECT DISTINCT `nev`, `tipus` FROM `suti` ORDER BY `nev` ASC";
    $sth = $connection->prepare($sql);
    $sth->execute(array());
    $sel_nev = $sth->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['nev_sel'] = $sel_nev;
    //- END -------------------------------------------------------------------
    
    //-------------------------------------------------------------------------
    //- Kiválasztja az adatbázisból az arat                  -
    //-------------------------------------------------------------------------
    $connection = Database::getConnection();
    $sql = "SELECT DISTINCT `ertek` FROM `ar` ORDER BY `ertek` ASC";
    $sth = $connection->prepare($sql);
    $sth->execute(array());
    $sel_ertek = $sth->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['ertek_sel'] = $sel_ertek;
    //- END -------------------------------------------------------------------
    
    //-------------------------------------------------------------------------
    //- Kiválasztja az adatbázisból az ügyfél adatait                         -
    //-------------------------------------------------------------------------
    $connection = Database::getConnection();
    $sql = "SELECT DISTINCT `mentes` FROM `tartalom` ORDER BY `mentes` ASC";
    $sth = $connection->prepare($sql);
    $sth->execute(array());
    $sel_mentes = $sth->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['mentes_sel'] = $sel_mentes;
    //- END -------------------------------------------------------------------

    function ConnDB(){
        $connection = Database::getConnection();
        $sql_OOO = "    SELECT nev, tipus, ertek, mentes
        FROM ar AS a
        INNER JOIN suti as s
        ON s.id=a.sutiid
        INNER JOIN tartalom as t
        ON s.id=t.sutiid 
                      order by ertek ASC";
        
        $sth_OOO = $connection->prepare($sql_OOO);
        $sth_OOO->execute(array());
        $eredmeny['OOO'] = $sth_OOO->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['OOO'] = $eredmeny['OOO'];
        $OOO = $eredmeny['OOO'];
        $fp = fopen('tcpdf/examples/data/muffin.csv', 'w');
        foreach ($OOO as $fields) {
            fputcsv($fp, $fields, ";");
        }
        fclose($fp);
        
        }
    ConnDB();
     
  }}