<?php
include 'functions/utility-functions.php';
include 'functions/names-functions.php';
$fileName = 'names-short-list.txt';

$fullNames = loadFullNames($fileName);

$firstNames = loadFirstNames($fullNames);
$lastNames = loadLastNames($fullNames);

// $findMe = ',';
// echo $fullNames[0] . '<br>';
// echo strpos($fullNames[0], $findMe) . '<br>';
// echo substr($fullNames[0], 0, strpos($fullNames[0], $findMe));
// exit();

$validNames = getValidNames($fullNames, $firstNames, $lastNames);
$validFirstNames = $validNames['validFirstNames'];
$validLastNames = $validNames['validLastNames'];
$validFullNames = $validNames['validFullNames'];

$uniqueValidNames = array_unique($validFullNames); 
$uniqueFirstNames = array_unique($validFirstNames);
$uniqueLastNames = array_unique($validLastNames);

// Get the unique count of full names
$uniqueCountFullName = count($uniqueValidNames);
// Get the unique count of last names 
$uniqueCountFirst = count($uniqueFirstNames);
//Get the unique count of first names
$uniqueCountLast = count($uniqueLastNames);
//Get the most common last names (names & number of occurrences)

//Get the most common first names (names & number of occurrences)

// ~~~~~~~~~~~~ Display results ~~~~~~~~~~~~ //

echo '<h1>Names - Results</h1>';

echo '<h2>All Names</h2>';
echo "<p>There are " . sizeof($fullNames) . " total names</p>";
echo '<ul style="list-style-type:none">';    
    foreach($fullNames as $fullName) {
        echo "<li>$fullName</li>";
    }
echo "</ul>";

echo '<h2>All Valid Names</h2>';
echo "<p>There are " . sizeof($validFullNames) . " valid names</p>";
echo '<ul style="list-style-type:none">';    
    foreach($validFullNames as $validFullName) {
        echo "<li>$validFullName</li>";
    }
echo "</ul>";

echo '<h2>Unique Names</h2>';
echo ("<p>There are " . sizeof($uniqueValidNames) . " Unique names</p>");
echo '<ul style="list-style-type:none">';    
    foreach($uniqueValidNames as $uniqueValidNames) {
        echo "<li>$uniqueValidNames</li>";
    }
echo '<h3> Counts </h3>';
echo ("<p> There are ". $uniqueCountFullName ." unique full names.</p>");
echo ("<p> There are ". $uniqueCountFirst ." unique first names.</p>");
echo ("<p> There are ". $uniqueCountLast ." unique last names.</p>");
?>

