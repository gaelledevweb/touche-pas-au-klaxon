<?php
if (file_exists('includes/header.php')) {
    echo "Le fichier est bien trouvé !";
} else {
    echo "Le fichier n'est pas trouvé. Vérifie le nom du dossier et du fichier.";
}