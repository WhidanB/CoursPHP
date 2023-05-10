<?php
require_once("connect.php");

$sql = "SELECT * FROM stagiaire";
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
require_once('close.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cours PHP</title>
</head>

<body>
    <h1>Liste Stagiaires</h1>
    <table>
        <thead>
            <th>id</th>
            <th>first name</th>
            <th>last name</th>
            <th>actions</th>
        </thead>
        <tbody>
            <?php
            //pour chaque résultat de $result, on affiche une ligne dans le tableau
            foreach ($result as $stagiaire) {
                // print_r($stagiaire);
            ?>

                <tr>
                    <td><?= $stagiaire['id'] ?></td>
                    <td><?= $stagiaire['first_name'] ?></td>
                    <td><?= $stagiaire['last_name'] ?></td>
                    <td>
                        <a href="stagiaire.php?id=<?= $stagiaire['id'] ?>">Voir</a>
                        <a href="delete.php?id=<?= $stagiaire['id'] ?>">Supprimer</a>
                        <a href="edit.php?id=<?= $stagiaire['id'] ?>">Modifier</a>
                    </td>
                </tr>

            <?php
            };

            ?>

        </tbody>
    </table>
    <a href="add.php">Add stagiaire</a>
</body>

</html>