<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
$user = htmlspecialchars($_POST['user']);
$password = htmlspecialchars($_POST['password']);
echo "<h1> Nom d'usuari: " . $user . "</h1>";
echo "<h1> Contrassenya: " . $password . "</h1>";

} 
else {
    echo "<h1>No s'ha enviat cap formulari.</h1>";
}

?>