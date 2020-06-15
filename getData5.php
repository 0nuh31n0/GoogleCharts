<?php
require_once('dbconnect.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
 
//Päring kasutajale
$query = mysqli_query($mysqli, "SELECT * FROM `k__sitlus`");

$jah= 0;
$ei= 0;

while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    if($row['COL 6'] == "Jah") {
        $jah += 1;
    }else if($row['COL 6'] == "Ei") {
        $ei += 1;
    }
}
  
echo '{
    "cols": [
        {"id":"","label":"teadmised","pattern":"","type":"string"},
        {"id":"","label":"teadmised","pattern":"","type":"string"}
      ],
    "rows": [
        {"c":[{"v":"Jah","f":null},{"v":' . $jah. ',"f":null}]},
        {"c":[{"v":"Ei","f":null},{"v":' . $ei. ',"f":null}]}
      ]
}';