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
            <input type="text" name="nom" id="nom" placeholder="Ex: Jean Mukendi" 
                   value="<?php echo isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : ''; ?>" required>

            <label for="message">Votre message</label>
            <textarea name="message" id="message" rows="5" placeholder="Écrivez votre message ici..." required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>

            <button type="submit" name="envoyer">Envoyer le message</button>
        </form>

        <?php
        if (isset($_POST['envoyer'])) {
            // 1. Nettoyage des données
            $nom = trim(htmlspecialchars($_POST['nom']));
            $message = trim(htmlspecialchars($_POST['message']));
            $erreur = "";

            // 2. Validation (Logique métier)
            if (strlen($nom) < 3) {
                $erreur = "Le nom doit contenir au moins 3 caractères.";
            } elseif (strlen($message) < 10) {
                $erreur = "Le message est trop court (10 caractères minimum).";
            }

            // 3. Affichage des résultats
            echo "<div style='margin-top: 20px;'>";
            if ($erreur != "") {
                echo "<div class='result' style='background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;'>";
                echo "<strong>Erreur :</strong> " . $erreur;
                echo "</div>";
            } else {
                // Ici tu recevras aussi une notification si ton hébergeur supporte mail()
                @mail("ton-email@gmail.com", "Contact Portfolio", "Nom: $nom \nMessage: $message");

                echo "<div class='result'>";
                echo "<strong>Succès !</strong><br>";
                echo "Merci $nom, votre message a bien été reçu.";
                echo "</div>";
            }
            echo "</div>";
        }
        ?>
        
        <div style="margin-top: 25px; text-align: center;">
            <a href="index.html" style="text-decoration: none; color: #3498db; font-weight: bold;">← Retour à l'accueil</a>
        </div>
    </div>

</body>
</html>
