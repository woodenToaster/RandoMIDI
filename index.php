<html>
<head>
</head>
<body>
  <h1>Welcome to RandoMIDI</h1>
  <h3>Choose the options you would like to hear in a pseudo-random song</h3>

  <form name="options" action="createFormArgs.php" method="post">
    Style:  <input type="text" name="style">
    Tempo:  <input type="text" name="tempo">
    Mode:  <input type="text" name="mode">
    Instruments:  <input type="text" name="instruments">
    Motif:  <input type="text" name="motif">
    Chord Progression:  <input type="text" name="progression">
    <input type="submit" value="Submit">
  </form>


  <?php
    $command = escapeshellcmd('python3 ./python/test.py');
    $output = shell_exec($command);
    echo $output;
  ?>
</body>
</html>

