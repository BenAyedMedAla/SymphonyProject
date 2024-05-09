
<?php
$cheminFichier = $_GET['cv'];
// Spécifiez le chemin vers votre fichier PDF

// Vérifiez si le fichier existe
if (file_exists($cheminFichier)) {
    // Définissez les en-têtes pour indiquer au navigateur qu'il s'agit d'un fichier PDF à télécharger
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . basename($cheminFichier) . '"');
    header('Content-Length: ' . filesize($cheminFichier));
    header('Pragma: public');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Expires: 0');
    // Lisez le fichier et écrivez-le dans la sortie de la réponse HTTP
    readfile($cheminFichier);
    exit;
} else {
    // Si le fichier n'existe pas, affichez un message d'erreur
    echo "Le fichier demandé n'existe pas.";
}
?>
