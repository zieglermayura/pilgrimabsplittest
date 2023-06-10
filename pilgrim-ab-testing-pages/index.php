<?php

global $splitFolder;
global $html_page;

// ------------------------------------------
// COOKIE SETUP
// Her sætter vi en cookie op og tildeler den en  værdien på 1 eller 2
// ------------------------------------------
if(!isset($_COOKIE['ABTest'])) {
    $random = rand(1,2);        // Tildeler en random værdie på 1 eller 2
    $cookie_name = 'ABTest';    // Cookie navn
    $cookie_value = $random;    // Værdien bliver lagt over i Cookie variablen $cookie_value
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // Her sættes Cookien med en leve tid på 86400 * 30 dage (86400 sekunder er længden på en dag)
    header('Refresh:0'); // Refresher vores webside når cookie'en er sat
}

// Hvis vores cookie er sat, vis værdi 1 eller 2 (1=a / 2=b) 
if (isset($_COOKIE['ABTest'])) {
    if ($_COOKIE['ABTest'] == "1") {
        $splitFolder = 'page_a';
        $html_page = 'split_1.html';
        header("Location: $splitFolder/$html_page");
        // include($html_page_01); // Udskriver (inkluder vores HTML)
    }
    if ($_COOKIE['ABTest'] == "2") {
        $splitFolder = 'page_b';
        $html_page = 'split_2.html';
        header("Location: $splitFolder/$html_page");
    }
}
?>



