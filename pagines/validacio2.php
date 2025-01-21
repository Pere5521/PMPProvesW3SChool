<?php
// Verificar si el formulari ha estat enviat
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recollir les dades del formulari
    $nom = htmlspecialchars($_POST['nom'] ?? '');
    $cognoms = htmlspecialchars($_POST['cognoms'] ?? '');
    $dni = htmlspecialchars($_POST['idni'] ?? '');
    $username = htmlspecialchars($_POST['username'] ?? '');
    $clau = htmlspecialchars($_POST['clau'] ?? '');
    $reclau = htmlspecialchars($_POST['reclau'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $edat = htmlspecialchars($_POST['edat'] ?? '');
    $sexe = htmlspecialchars($_POST['sex'] ?? '');
    $pais_code = htmlspecialchars($_POST['pais_code'] ?? '');
    $zip_code = htmlspecialchars($_POST['zip_code'] ?? '');
    $imatge = $_FILES['imatge'] ?? null;
    $interessos = $_POST['interessos'] ?? [];
    $coneixaments = $_POST['coneixaments'] ?? [];
    $coment = htmlspecialchars($_POST['coment'] ?? '');

    /*// Validacions bàsiques
    $errors = [];
    if (empty($nom)) $errors[] = "El camp 'Nom' és obligatori.";
    if (empty($cognoms)) $errors[] = "El camp 'Cognoms' és obligatori.";
    if (empty($dni)) $errors[] = "El camp 'DNI' és obligatori.";
    if (empty($username)) $errors[] = "El camp 'Username' és obligatori.";
    if (empty($clau)) $errors[] = "El camp 'Clau' és obligatori.";
    if ($clau !== $reclau) $errors[] = "Les claus no coincideixen.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "El format de l'E-Correu no és vàlid.";
    if (!empty($pais_code) && !preg_match('/^[A-Za-z]{2}$/', $pais_code)) $errors[] = "El codi del país ha de tenir dos caràcters.";
    if (!empty($zip_code) && !preg_match('/^[0-9]{5}$/', $zip_code)) $errors[] = "El codi ZIP ha de tenir 5 números.";

    // Si hi ha errors, mostrar-los
    if (!empty($errors)) {
        echo "<h3>Errors trobats:</h3><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        echo "<a href='form2.html'>Tornar al formulari</a>";
        exit;
    }
*/
echo "<a href='form2.html'>Tornar al formulari</a>";
    // Mostrar les dades del formulari
    echo "<h1>Dades del formulari:</h1>";
    echo "<h2>Nom: $nom</h2><br>";
    echo "<h2>Cognoms: $cognoms</h2><br>";
    echo "<h2>DNI: $dni</h2><br>";
    echo "<h2>Username: $username</h2><br>";
    echo "<h2>E-Correu: $email</h2><br>";
    echo "<h2>Franja d'edat: $edat</h2><br>";
    echo "<h2>Sexe: $sexe</h2><br>";
    echo "<h2>Codi País: $pais_code</h2><br>";
    echo "<h2>Codi ZIP: $zip_code</h2><br>";
    echo "<h2>Comentaris: $coment</h2><br>";

    // Mostrar interessos
    echo "<h4>Interessos:</h4>";
    if (!empty($interessos)) {
        echo "<ul>";
        foreach ($interessos as $interes) {
            echo "<li>$interes</li>";
        }
        echo "</ul>";
    } else {
        echo "No s'han seleccionat interessos.<br>";
    }

    // Mostrar coneixements
    echo "<h4>Coneixements:</h4>";
    if (!empty($coneixaments)) {
        echo "<ul>";
        foreach ($coneixaments as $coneixament) {
            echo "<li>$coneixament</li>";
        }
        echo "</ul>";
    } else {
        echo "No s'han seleccionat coneixements.<br>";
    }

    // Gestionar la imatge si es carrega
    if ($imatge && $imatge['error'] == 0) {
        $upload_dir = 'uploads/';
        $upload_file = $upload_dir . basename($imatge['name']);

        if (move_uploaded_file($imatge['tmp_name'], $upload_file)) {
            echo "<p>Imatge carregada correctament: <a href='$upload_file'>Visualitza</a></p>";
        } else {
            echo "<p>No s'ha pogut carregar la imatge.</p>";
        }
    } else {
        echo "<p>No s'ha carregat cap imatge.</p>";
    }
} else {
    echo "<p>Formulari no enviat correctament.</p>";
}
?>