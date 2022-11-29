<?php

class grafikon_Model {

}  public function grafikon(){ 
    try {
            $connection = Database::getConnection();
            $sql_lekerdezes = "SELECT ertek, nev FROM ar JOIN suti WHERE ar.sutiid = suti.id";
            
            $sth_lekerdezes = $connection->prepare($sql_lekerdezes);
            $sth_lekerdezes->execute(array());
            $eredmeny['lekerdezes'] = $sth_lekerdezes->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION['lekerdezes'] = $eredmeny['lekerdezes'];
            $grafikon = $eredmeny['lekerdezes'];
            
            $y = count($lekerdezes)-1;
            
            for($x=0; $x<=$y; $x++) {
                $le_ertek[$x] = $grafikon[$x]['ertek'];
            }
            for($x=0; $x<=$y; $x++) {
                $le_nev[$x] = $grafikon[$x]['nev'];
            }
            
            $_SESSION['label1'] = $le_ertek;
            $_SESSION['label2'] = $le_nev;

            }
    	catch (PDOException $e) {
            $eredmeny["hibakod"] = 1;
            $eredmeny["uzenet"] = $e->getMessage();
    	}
        
        
        
    }
