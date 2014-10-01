<html>
<head>
</head>
<body>
  <?php
    $command = escapeshellcmd('python3 ./python/test.py');
    $output = shell_exec($command);
    echo $output;
  ?>
</body>
</html>

