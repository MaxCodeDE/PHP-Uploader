<?php

// Verzeichnis zum speichern der Daten Festlegen
$uploadPath = "upload/";

// upload Verzeichnis erstellen
if (!file_exists($uploadPath)) {
    mkdir($uploadPath);
    echo "Verzeichnis erstellt!";
} else {
    echo "Verzeichnis exestiert bereits!";
}
    
// Infos zur Datei(Name, Typ) bekommen
$filename = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME);
$fileType = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));

// Infos zur Datei
echo "<br>";
echo "Dateiname: " .$filename;
echo "<br>";
echo "Dateityp: " .$fileType;
echo "<br>";
echo "Temp-Name: " .$_FILES['datei']['tmp_name'];
echo "<br>";

// Pfad der Datei zusammensetzen
$finalUploadPath = $uploadPath.$filename.".".$fileType;

// Temporäre Datei in Verzeichnisspeichern
move_uploaded_file($_FILES['datei']['tmp_name'],  $finalUploadPath);

// Ausgaben um einzelne und komplettes Verzeichnis anzuzeigen
echo 'Datei erfolgreich hochgeladen: <a href="'.$finalUploadPath.'">'.$finalUploadPath.'</a>';
echo "<br>";
echo "Verzeichnis ansehen: <a href='$uploadPath'> $uploadPath </a>";


?>