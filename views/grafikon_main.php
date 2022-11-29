<head>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php if ($viewData['style']) echo '<link rel="stylesheet" type="text/css" href="' . $viewData['style'] . '">'; ?>
</head>
<body>

<?php
    try {
        $connection = Database::getConnection();
        $sql_lekerdezes = "SELECT ertek, nev FROM ar JOIN suti WHERE ar.sutiid = suti.id";
        
        $sth_lekerdezes = $connection->prepare($sql_lekerdezes);
        $sth_lekerdezes->execute(array());
        $eredmeny['lekerdezes'] = $sth_lekerdezes->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['lekerdezes'] = $eredmeny['lekerdezes'];
        $grafikon = $eredmeny['lekerdezes'];
        
        $y = count($grafikon)-1;
            
        for($x=0; $x<=$y; $x++) {
            $le_ertek[$x] = $grafikon[$x]['ertek'];
        }
        for($x=0; $x<=$y; $x++) {
            $le_nev[$x] = $grafikon[$x]['nev'];
        }
        }
    catch (PDOException $e) {
        $eredmeny["hibakod"] = 1;
        $eredmeny["uzenet"] = $e->getMessage();
    }


$labels1 = $le_nev;
//$labels1 = $_SESSION['label1'];
$labels2 = $le_ertek;
//$labels2 = $_SESSION['label2'];

$title = "Süti egységára";
?>

<div>
    <canvas class="mychart" id="mychart">?</canvas>
</div>

<script>
        $(function () {
            var ctx_2 = document.getElementById("mychart").getContext('2d');
            var data_2 = {
                datasets: [{
                    label: <?php echo json_encode($title); ?>,
                    data: <?php echo json_encode($labels2); ?>,
                }],
                labels: <?php echo json_encode($labels1); ?>
            };
            var myDoughnutChart_2 = new Chart(ctx_2, {
                type: 'bar',
                data: data_2,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12
                        }
                    }
                }
            });
        });
</script>

</body>

<?php

