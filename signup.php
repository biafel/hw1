<?php
    /*Controlla che l'utente sia già autenticato, per non 
       dover chiedere il login ad ogni volta  */            
    session_start();

    function checkAuth() {
        // Se esiste già una sessione, la ritorno, altrimenti ritorno 0
        if(isset($_SESSION['username'])) {
            header("Location: mhw1.php");
            exit;
        } else 
            return 0;
    }

if ((!empty($_POST["nome"]) && !empty($_POST["cognome"]) && $_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"]) ){
    $error = array();
    $conn = mysqli_connect("localhost","root","","test_data");


    # USERNAME 
    if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
        $error[] = "Username non valido";
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        // Cerco se l'username esiste già o se appartiene a una delle 3 parole chiave indicate
        $query = "SELECT username FROM users WHERE username = '$username'";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $error[] = "Username già utilizzato";
        }
    }

    # PASSWORD
    if (strlen($_POST["password"]) < 8) {
        $error[] = "Caratteri password insufficienti";
    } 

    # EMAIL
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error[] = "Email non valida";
    } else {
        $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
        $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
        if (mysqli_num_rows($res) > 0) {
            $error[] = "Email già utilizzata";
        }
    }


        # REGISTRAZIONE NEL DATABASE
        if (count($error) == 0) {
            $name = mysqli_real_escape_string($conn, $_POST['nome']);
            $surname = mysqli_real_escape_string($conn, $_POST['cognome']);

            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $query = "INSERT INTO users(username, password, name, surname, email) VALUES('$username', '$password', '$name', '$surname', '$email')";
            
            if (mysqli_query($conn, $query)) {
                $_SESSION["username"] = $_POST["username"];
                mysqli_close($conn);
                header("Location: mhw1.php");
                exit;
            } else {
                $error[] = "Errore di connessione al Database";
            }
        }

            mysqli_close($conn);

    }
  else if (isset($_POST["username"])) {
        $error = array("Riempi tutti i campi");
    }


?>


<!DOCTYPE html>
<html>
    <head>
        <title>Registrazione</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
        <link rel="stylesheet" href="style/g_signup.css?v=<?php echo time();?>"/>
        <script src='scripts/signup.js' defer></script>
    </head>
    <body> 
        <form method="post"> 
            <h1>Registrati!</h1>
            <label> <input type="text" id="nome" placeholder="Nome" name="nome" required> </label>
            <label> <input type="text" id="cognome" placeholder="Cognome" name="cognome" required> </label>
            <label> <input type="text" id="username" placeholder="Username" name="username" maxlength="50" required> </label>
            <label> <input type="password" id="password" placeholder="Password" name="password" required> </label>
            <label> <input type="email" id="email" placeholder="Email" name="email" required> </label>
            <button type="submit" name="register">Avanti</button>
            <div>Hai già un account? <a href="login.php">Accedi</a>
        </form>
    </body>
</html>

