<?php require 'nav.php';

$id = $_POST['id'];

$token = $_POST['csrf_token'];

$table = $_POST['table'];

if (isset($_POST['delete']) && hash_equals($token, $_POST['csrf_token'])) {

    try {
        $sth = $connect->prepare("DELETE FROM {$table} WHERE id =:id");
        $sth->bindValue(':id', $id);

        $result = $sth->execute();

        if ($result) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            echo "La suppression est effective";
        } else {
            echo "Il ya eu un problème avec votre requête, contactez le support";
        }
    } catch (PDOException $error) {
        echo 'Erreur: ' . $error->getMessage();
    }
}
?>