<?php 

function loadFullNames($fileName) {

  $lineNumber = 0;

  // Load up the array
  $FH = fopen("$fileName", "r");
  $nextName = fgets($FH);

  while(!feof($FH)) {
      if($lineNumber % 2 == 0) {
          $fullNames[] = trim(substr($nextName, 0, strpos($nextName, " --")));
      }

  $lineNumber++;
  $nextName = fgets($FH);
  }
  return $fullNames;
}

function loadFirstNames($fullNames){

    // Get all first names
  foreach($fullNames as $fullName) {
    $startHere = strpos($fullName, ",") + 1;
    $firstNames[] = trim(substr($fullName, $startHere));
  }
  return $firstNames;
}

function loadLastNames($fullNames) {
    // Get all last names
  foreach ($fullNames as $fullName) {
    $stopHere = strpos($fullName, ",");
    $lastNames[] = substr($fullName, 0, $stopHere);
  }
  return $lastNames;
}

function loadValidNames($fullNames, $firstNames, $lastNames) {
    for($i = 0; $i < sizeOf($fullNames); $i++){
      if(ctype_alpha(str_replace("'", "", $lastNames[$i].$firstNames[$i]))) {
        $validFirstNames[$i] = $firstNames[$i];
        $validLastNames[$i] = $lastNames[$i];
        $validFullNames[$i] = $validLastNames[$i] . " , " . $validFirstNames[$i];
      }
    }
    return $validFullNames;
}

function loadValidLastNames($fullNames, $firstNames, $lastNames) {
  for($i = 0; $i < sizeOf($fullNames); $i++) {
    if(ctype_alpha(str_replace("'","", $lastNames[$i].$firstNames[$i]))) {
      $validLastNames[$i] = $lastNames[$i];
    }
  }
  return $validLastNames;
}

function loadValidFirstNames($fullNames, $firstNames, $lastNames) {
  for($i = 0; $i < sizeOf($fullNames); $i++) {
    if(ctype_alpha(str_replace("'","", $lastNames[$i].$firstNames[$i]))) {
      $validFirstNames[$i] = $firstNames[$i];
    }
  }
  return $validFirstNames;
}
