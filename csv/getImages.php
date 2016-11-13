<?php

$file = fopen('myndir.csv', 'r');

$data = fgetcsv($file);

$names = [];

while (($row = fgetcsv($file)) !== false) {
    

    if (count($row) == 1 && is_null($row[0])) {
        continue;
    }
   
    $names[] = array_combine($data, $row);
}
fclose($file);

if (isset($_POST['putContents'])) {

    $file = fopen('myndir.csv', 'a');
  

    fwrite($file, $_POST['title'].",". $_POST['url'] . PHP_EOL);
   
    fclose($file);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php
	foreach ($names as $value) {
		echo '<p>';
		echo "<img src='{$value['url']}'>";
		echo $value['name'];
		echo '<p>';
	}
?>

<form name="writeFile" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 	<p>
        <label for="title">Myndaheiti:</label>
        <input name="title" id="title"></input>
   
        <label for="url">Myndavefslóð:</label>
        <input name="url" id="url"></input>
    </p>

    <p>
        <input name="putContents" type="submit" value="Submit">
    </p>

    
</form>
</body>
</html>