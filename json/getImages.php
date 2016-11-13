<?php

$file = file_get_contents('myndir.json');

$data = json_decode($file);

if (isset($_POST['putContents'])) {

    $mynd = $_POST['title'];
    $url = $_POST['url'];
    $data1 = json_decode($file, true);

    $extra = ['mynd' => $mynd,
              'url'  => $url];

    $data1['myndir'][] = $extra;
    $result = json_encode($data1); 

    file_put_contents('myndir.json', $result);
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>JSON</title>
</head>
<body>

<?php           
    foreach ($data->myndir as $value) {
        echo "<p><img src='",$value->url,"'>",$value->mynd,"</p>";
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