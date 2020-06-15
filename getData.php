<?php
require_once('dbconnect.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
 
//Päring kasutajale
$query = mysqli_query($mysqli, "SELECT * FROM `k__sitlus`");

$van61 = 0;
$van5160 = 0;
$van4150 = 0;
$van3140 = 0;
  
while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    if($row['COL 2'] == "61+ aastat") {
        $van61+= 1;
    }else if($row['COL 2'] == "51-60 aastat"){
        $van5160+= 1;
    }else if($row['COL 2'] == "41-50 aastat"){
        $van4150+= 1;
    }else if($row['COL 2'] == "31-40 aastat"){
        $van3140+= 1;
    }
}
  
echo '{
    "cols": [
        {"id":"","label":"Vanus","pattern":"","type":"string"},
        {"id":"","label":"Slices","pattern":"","type":"number"}
      ],
    "rows": [
        {"c":[{"v":"61+","f":null},{"v":' . $van61 . ',"f":null}]},
        {"c":[{"v":"51-60","f":null},{"v":' . $van5160 . ',"f":null}]},
        {"c":[{"v":"41-50","f":null},{"v":' . $van4150 . ',"f":null}]},
        {"c":[{"v":"31-40","f":null},{"v":' . $van3140 . ',"f":null}]}
      ]
}';