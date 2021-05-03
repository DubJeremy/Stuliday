<?php require 'nav.php'; ?>
<?php

if (!empty($_SESSION)) 
{
    $admin_id = $_SESSION['id'];
    $sqlAdmin = "SELECT * FROM users WHERE id = '{$admin_id}' AND role = ('1')";

    $resultAdmin = $connect->query($sqlAdmin);

    if ($admin = $resultAdmin->fetch(PDO::FETCH_ASSOC)) 
    {
        $sqlUsers = "SELECT * FROM users WHERE id != '{$admin_id}'";
        $users = $connect->query($sqlUsers)->fetchAll(PDO::FETCH_ASSOC);
?>

        <main>
            <table>
                <thead>
                    <tr>
                        <th scope="col"># id</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $user) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $user['id'] ?></th>
                            <td><?php echo $user['username'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td><?php echo $user['role'] ?></td>
                            <td>Modifier</td>
                            <td>Supprimer</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </main>

<?php
    } else {
        echo "Cette page n'existe pas";
        echo "<a class='btn btn-light' href='index.php'>Retourner à la page d'accueil</a>";
    }
} else {

    echo "Cette page n'existe pas";
    echo "<a class='btn btn-light' href='index.php'>Retourner à la page d'accueil</a>";
}
?>
