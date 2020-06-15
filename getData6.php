<?php
require_once('dbconnect.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
 
//Päring kasutajale
$query = mysqli_query($mysqli, "SELECT * FROM `k__sitlus`");

$vastus1 = 0;
$vastus2 = 0;
$vastus3 = 0;
$vastus4 = 0;
  

while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    if($row['COL 7'] == "omaks teadmisi antud valdkonnas" || $row['COL 7'] == "teadmisi" || $row['COL 7'] == "tarkust" || $row['COL 7'] == "pädevust" || $row['COL 7'] == "õpetlik" || $row['COL 7'] == "tark") {
        $vastus1 += 1;
    }else if($row['COL 7'] == "kannalikkus" || $row['COL 7'] == "kannatlikkust" || $row['COL 7'] == "kannatlikust" || $row['COL 7'] == "kannatlikkus" || $row['COL 7'] == "kannatlik" || $row['COL 7'] == "rahulik" || $row['COL 7'] == "rahulikkust" || $row['COL 7'] == "rahu") {
        $vastus2 += 1;
    }else if($row['COL 7'] == "mõistev" || $row['COL 7'] == "lahke" || $row['COL 7'] == "sõbralikkus" || $row['COL 7'] == "positiivsust" || $row['COL 7'] == "tähelepanelikkust") {
        $vastus3 += 1;      
    }else if($row['COL 7'] == "-") {
        $vastus4 += 1;      
    }
}
  
echo '{
    "cols": [
        {"id":"","label":"teadmised","pattern":"","type":"string"},
        {"id":"","label":"teadmised","pattern":"","type":"string"},
        {"id":"","label":"teadmised","pattern":"","type":"string"},
        {"id":"","label":"teadmised","pattern":"","type":"string"}
      ],
    "rows": [
        {"c":[{"v":"Pädevus","f":null},{"v":' . $vastus1 . ',"f":null}]},
        {"c":[{"v":"Kannatlikus","f":null},{"v":' . $vastus2 . ',"f":null}]},
        {"c":[{"v":"Lahkus, sõbralikus, positiivsus","f":null},{"v":' . $vastus3 . ',"f":null}]},
        {"c":[{"v":"Ei vastanud","f":null},{"v":' . $vastus4 . ',"f":null}]}
      ]
}';