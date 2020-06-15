<?php
require_once('dbconnect.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
 
//Päring kasutajale
$query = mysqli_query($mysqli, "SELECT * FROM `k__sitlus`");

$teadmised1 = 0;
$teadmised2 = 0;
$teadmised3 = 0;
$teadmised4 = 0;
$teadmised5 = 0;

while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    if($row['COL 3'] == "1") {
        $teadmised1 += 1;
    }else if($row['COL 3'] == "2") {
        $teadmised2 += 1;
    }else if($row['COL 3'] == "3") {
        $teadmised3 += 1;      
    }else if($row['COL 3'] == "4") {
        $teadmised4 += 1;
    }else if($row['COL 3'] == "5") {
        $teadmised5 += 1;
    }
}
  
echo '{
    "cols": [
        {"id":"","label":"teadmised","pattern":"","type":"string"},
        {"id":"","label":"teadmised","pattern":"","type":"string"},
        {"id":"","label":"teadmised","pattern":"","type":"string"},
        {"id":"","label":"teadmised","pattern":"","type":"string"},
        {"id":"","label":"teadmised","pattern":"","type":"string"}
      ],
    "rows": [
        {"c":[{"v":"1","f":null},{"v":' . $teadmised1 . ',"f":null}]},
        {"c":[{"v":"2","f":null},{"v":' . $teadmised2 . ',"f":null}]},
        {"c":[{"v":"3","f":null},{"v":' . $teadmised3 . ',"f":null}]},
        {"c":[{"v":"4","f":null},{"v":' . $teadmised4 . ',"f":null}]},
        {"c":[{"v":"5","f":null},{"v":' . $teadmised5 . ',"f":null}]}
      ]
}';