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

function getValidNames($fullNames, $firstNames, $lastNames) {
    $validFirstNames = array();
    $validLastNames = array();
    $validFullNames = array();

    for($i = 0; $i < sizeof($fullNames); $i++) {
      // jam the first and last name toghether without a comma, then test for alpha-only characters
      if(ctype_alpha($lastNames[$i].$firstNames[$i])) {
          $validFirstNames[$i] = $firstNames[$i];
          $validLastNames[$i] = $lastNames[$i];
          $validFullNames[] = $validLastNames[$i] . ", " . $validFirstNames[$i];
      }
  }
  return array('validFirstNames' => $validFirstNames, 'validLastNames' => $validLastNames,'validFullNames' => $validFullNames,);
}
