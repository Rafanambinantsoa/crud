<?php
// Connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=kim';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    // Préparation de la requête d'insertion
    $sql = 'INSERT INTO exemple (nom, prenom) VALUES (:nom, :prenom)';
    $stmt = $pdo->prepare($sql);

    // Exécution de la requête
    $stmt->execute(array(':nom' => $nom, ':prenom' => $prenom));

    // Vérification du succès de l'insertion
    if ($stmt->rowCount() > 0) {
        echo 'Les données ont été insérées avec succès.';
    } else {
        echo 'Une erreur s\'est produite lors de l\'insertion des données.';
    }
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
    exit();
}
