<?php
$link = [
  "./test/test01.html",
  "./test/test02.php",
  "./test/test03.php",
  "./kadai01.html",
  "./kadai02.php",
  "./kadai03.php",
  "./kadai04.php"
]
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <?php
  foreach ($link as $value) {
    echo "<a target='_blank' href='$value'>$value</a><br>";
  }
  ?>
</body>

</html>