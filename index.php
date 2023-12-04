<?php
include 'functions/utility-functions.php';
include 'functions/names-functions.php';
$fileName = 'names-short-list.txt';

$fullNames = loadFullNames($fileName);
$firstNames = loadFirstNames($fullNames);
$lastNames = loadLastNames($fullNames);

// Get the unique count of full names
$validFullNames = loadValidNames($fullNames, $firstNames, $lastNames);

// Get the unique count of last names 
$validLastNames = loadValidLastNames($fullNames, $firstNames, $lastNames);
//Get the unique count of first names
$validFirstNames = loadValidFirstNames($fullNames, $firstNames, $lastNames);
//Get the most common last names (names & number of occurrences)
$mostCommonLastCount = countMostCommonLast($fullNames, $firstNames, $lastNames);
//Get the most common first names (names & number of occurrences)
$mostCommonFirstCount = countMostCommonFirst($fullNames, $firstNames, $lastNames);

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
$uniqueValidNames = (array_unique($validFullNames));
echo ("<p>There are " . sizeof($uniqueValidNames) . " Unique names</p>");
echo '<ul style="list-style-type:none">';    
    foreach($uniqueValidNames as $uniqueValidNames) {
        echo "<li>$uniqueValidNames</li>";
    }
echo "</ul>";

echo '<h2>Unique Last Names</h2>';
$uniqueValidLastNames = (array_unique($validLastNames));
echo ("<p>There are ". sizeOf($uniqueValidLastNames) . " Unique last names.</p>");
echo '<ul style="list-style-type:none">';
    foreach($uniqueValidLastNames as $uniqueValidLastNames){
        echo "<li>$uniqueValidLastNames</li>";
    }
echo "</ul>";

echo '<h2>Unique First Names</h2>';
$uniqueValidFirstNames = (array_unique($validFirstNames));
echo ("<p>There are ". sizeOf($uniqueValidFirstNames) . " Unique first names.</p>");
echo '<ul style="list-style-type:none">';
    foreach($uniqueValidFirstNames as $uniqueValidFirstNames){
        echo "<li>$uniqueValidFirstNames</li>";
    }
echo "</ul>";

echo '<h2> Most Common Last Names</h2>';
echo "<p>The most common last name is ". array_keys($mostCommonLastCount)[0] ." . </p>";
echo '<ul style="list-style-type:none">';
    foreach($mostCommonLastCount as $name => $count) {
        echo "<li>$name: $count</li>";
    }
echo "</ul>";

echo '<h2> Most Common First Names</h2>';
echo "<p>The most common first name is ". array_keys($mostCommonFirstCount)[0] ." . </p>";
echo '<ul style="list-style-type:none">';
    foreach($mostCommonFirstCount as $name => $count) {
        echo "<li>$name: $count</li>";
    }
echo "</ul>";
