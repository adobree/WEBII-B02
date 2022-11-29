<!DOCTYPE html>
<html lang="hu" >
<head>
  <meta charset="UTF-8">
  <title>JS</title>
<?php if ($viewData['style']) echo '<link rel="stylesheet" type="text/css" href="' . $viewData['style'] . '">'; ?>
</head>
<body>

<div id="MyClockDisplay" class="clock" onload="showTime()"></div>
  <script  src="java/ora.js"></script>
</body>

</html>
