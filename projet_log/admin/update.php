<?php
require '../php/crud/config.php';

$login = $role = '';
$login_err = $role_err = '';

if (isset($_POST['id']) && !empty($_POST['id'])) {

    $id = $_POST['id'];

    $input_login = trim($_POST['login']);

    if (empty($input_login)) {
        $login_err = 'Entrez un login';
    } else {
        $login = $input_login;
    }

    $input_role = trim($_POST['role']);

    if (empty($input_role)) {
        $role_err = 'Entrez un role';
    } else {
        $role = $input_role;
    }

    if (empty($login_err) && empty($role_err)) {

        $sql = 'update user set login=?, role=? where id=?';

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, 'ssi', $param_login, $param_role, $param_id);

            $param_login = $login;
            $param_role = $role;
            $param_id = $id;

            if (mysqli_stmt_execute($stmt)) {
                header("location: ./index_admin.php");
                exit();
            } else {
                echo "Oops ! Erreur inattendu, rééssayez plus tard !!!";
            }
        }
    }
    mysqli_close($conn);
} else {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = trim($_GET['id']);

        $sql = "select * from user where id=?";

        if ($stmt = mysqli_prepare($conn, $sql)) {

            mysqli_stmt_bind_param($stmt, "i", $param_id);

            $param_id = $id;
            if (mysqli_stmt_execute($stmt)) {

                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    $mail = $row['login'];
                    $role = $row['role'];
                    $id = $row['id'];
                }
            } else {
                echo "Oops ! erreur inattendu, réésayer plous tard !!!";
            }
        } else {
            header('location: ./index_admin.php');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Mise à jour de l'utilisateur <?php echo $mail; ?></h2>
                </div>
                <p>Changez les valeurs et validez !!! </p>
                <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">
                    <div class="form-group">
                        <label>@mail</label>
                        <input type="text" name="login" class="form-controle <?php echo (!empty($login_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mail; ?>">
                        <span class="invalid-feedback"><?php echo $login_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <textarea name="role" class="form-control <?php echo (!empty($role_err)) ? 'is-invalid' : ''; ?>"><?php echo $role; ?></textarea>
                        <span class="invalid-feedback"><?php echo $role_err; ?></span>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <input type="submit" class="btn btn-primary" value="Enregistrer">
                    <a href="../index_admin.php" class="btn btn-secondary ml-2">Annuler</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>