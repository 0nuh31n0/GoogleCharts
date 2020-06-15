<?php
require_once('dbconnect.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
 
//Päring kasutajale
$query = mysqli_query($mysqli, "SELECT * FROM `k__sitlus`");

$vastus1 = 0;
$vastus2 = 0;
$vastus3 = 0;
$vastus4 = 0;
$vastus5 = 0;
$vastus6 = 0;
$vastus7 = 0;
$vastus8 = 0;

while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    if($row['COL 5'] == "Ei ole probleeme ette tulnud") {
        $vastus1 += 1;
    }else if($row['COL 5'] == "Sotsiaalvõrgustik (nt Facebook)") {
        $vastus2 += 1;
    }else if($row['COL 5'] == "Piltide arvutisse laadimine") {
        $vastus3 += 1;      
    }else if($row['COL 5'] == "\"Pilve\" kasutamine") {
        $vastus4 += 1;
    }else if($row['COL 5'] == "Digiallkirjastamine") {
        $vastus5 += 1;
    }else if($row['COL 5'] == "E-kirja saatimine") {
        $vastus6 += 1;
    }else if($row['COL 5'] == "MS Wordi/ MS Exceli/ MS Powerpointi kasutamine") {
        $vastus7 += 1;
    }else if($row['COL 5'] == "Internetipanga kasutamine") {
        $vastus8 += 1;
  }
}
  
echo '{
    "cols": [
        {"id":"","label":"teadmised","pattern":"","type":"string"},
        {"id":"","label":"teadmised","pattern":"","type":"string"},
        {"id":"","label":"teadmised","pattern":"","type":"string"},
        {"id":"","label":"teadmised","pattern":"","type":"string"},
        {"id":"","label":"teadmised","pattern":"","type":"string"},
        {"id":"","label":"teadmised","pattern":"","type":"string"},
        {"id":"","label":"teadmised","pattern":"","type":"string"},
        {"id":"","label":"teadmised","pattern":"","type":"string"}
      ],
    "rows": [
        {"c":[{"v":"Ei ole probleeme ette tulnud","f":null},{"v":' . $vastus1 . ',"f":null}]},
        {"c":[{"v":"Sotsiaalvõrgustik (nt Facebook)","f":null},{"v":' . $vastus2 . ',"f":null}]},
        {"c":[{"v":"Piltide arvutisse laadimine","f":null},{"v":' . $vastus3 . ',"f":null}]},
        {"c":[{"v":"\"Pilve\" kasutamine","f":null},{"v":' . $vastus4 . ',"f":null}]},
        {"c":[{"v":"Digiallkirjastamine","f":null},{"v":' . $vastus5 . ',"f":null}]},
        {"c":[{"v":"E-kirja saatimine","f":null},{"v":' . $vastus6 . ',"f":null}]},
        {"c":[{"v":"MS Wordi/ MS Exceli/ MS Powerpointi kasutamine","f":null},{"v":' . $vastus7 . ',"f":null}]},
        {"c":[{"v":"Internetipanga kasutamine","f":null},{"v":' . $vastus8 . ',"f":null}]}
      ]
}';