<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Mon Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h2>Me contacter</h2>
        <form action="https://formspree.io/f/mdawwpeg" method="POST">
            <label for="nom">Nom complet</label>
            <input type="text" name="nom" id="nom" placeholder="Ex: Jean Mukendi" value="<?php echo isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : ''; ?>" required>

            <label for="message">Votre message</label>
            <textarea name="message" id="message" rows="5" placeholder="Écrivez ici..." required></textarea>

            <button type="submit" name="envoyer">Envoyer le message</button>
        </form>
    </div>

    <?php
if (isset($_POST['envoyer'])) {
    //  Récupération et nettoyage des espaces vides
    $nom = trim(htmlspecialchars($_POST['nom']));
    $message = trim(htmlspecialchars($_POST['message']));

    // Initialisation d'une variable pour les erreurs
    $erreur = "";

    // Vérification des conditions
    if (strlen($nom) < 3) {
        $erreur = "Le nom doit contenir au moins 3 caractères.";
    } elseif (strlen($message) < 10) {
        $erreur = "Le message est trop court (10 caractères minimum).";
    }

    //  Affichage du résultat selon le cas
    if ($erreur != "") {
        // S'il y a une erreur, on l'affiche en rouge (on peut créer une classe .error en CSS)
        echo "<div class='result' style='background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;'>";
        echo "<strong>Erreur :</strong> " . $erreur;
        echo "</div>";
    } else {
        // Si tout est bon, on affiche le succès
        echo "<div class='result'>";
        echo "<strong>Message envoyé avec succès !</strong><br>";
        echo "Merci $nom, votre message a bien été pris en compte.";
        echo "</div>";
    }
}
?>
