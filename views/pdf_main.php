<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php if ($viewData['style']) echo '<link rel="stylesheet" type="text/css" href="' . $viewData['style'] . '">'; ?>
</head>
<body>

<?php
if(isset($_SESSION['nev_sel'])) { $igeny = $_SESSION['nev_sel']; }
?>  
<form method="POST" action="tcpdf/examples/pdf.php">
    <fieldset>
    <legend>Sütik</legend>
      <label for="nev">Sütinevek:</label><br>
      <select class="select_nagy" id="nev" name="nev">
        <option disabled selected>- Válasszon -</option>
        <option value="osszes">Összes</option>
        
           <?php
            foreach ($igeny as $row) {
                echo "<option value=".$row['nev'].">".$row['nev']." - ".$row['tipus']."</option>";
                }
            ?>">

        </select> 
        <br><br>
<?php
if(isset($_SESSION['ertek_sel'])) { $igeny = $_SESSION['ertek_sel']; }
?>
        <label for="ertek">Egysegar:</label><br>
        <select id="ertek" name="ertek">
            <option disabled selected>- Válasszon -</option>
            <option value="osszes">Összes</option>
        
           <?php
            foreach ($igeny as $row) {
                echo "<option value=".$row['ertek'].">".$row['ertek']."</option>";
                }
            ?>">

        </select>
        <br><br>
<?php
if(isset($_SESSION['mentes_sel'])) { $igeny = $_SESSION['mentes_sel']; }
?>
        <label for="mentes">Mentes:</label><br>
        <select id="mentes" name="mentes">
            <option disabled selected>- Válasszon -</option>
            <option value="osszes">Összes</option>
            
           <?php
            foreach ($igeny as $row) {
                echo "<option value=".$row['mentes'].">".$row['mentes']."</option>";
                }
            ?>">

        </select>
        <br><br>
        
        <input type="submit" value="PDF generálás">
    </fieldset>
    </form>

</body>