<?php
  
  session_start(); //avvia la sessione

  if(isset($_SESSION["username"])){
    header("Location: home.php");
    exit;
  }

// Verifica l'esistenza di dati POST
    if(isset($_POST["username"]) && isset($_POST["password"]))
    {
        $conn = mysqli_connect("localhost","root","","test_data") or die("Errore: ".mysqli_connect_error()); /*connessione al db*/
        
        /*cerca utenti con quelle credenziali*/
        $query = "SELECT * FROM users WHERE username='".$_POST['username']."' AND password ='".$_POST['password']."'";
        $res = mysqli_query($conn,$query);
        
        // Verifica la correttezza delle credenziali
        if(mysqli_num_rows($res)>0)
        {
            // Vai alla pagina home.php
            $row = mysqli_fetch_assoc($res);
            $_SESSION["username"]=$_POST['username'];
            $_SESSION["user_id"]=$row["id"];
            header("Location: home.php");
            exit;
        }
        else
        {
            // Flag di errore
            $errore = true;
        }
    }

?>
<html>
    <head>
        <link rel='stylesheet' href="style/g_login.css?v=<?php echo time();?>"/>
        <script src='scripts/login.js' defer></script>
    </head>
    <body>

        <?php
            // Verifica la presenza di errori
            if(isset($errore))
            {
                echo "<p class='errore'>";
                echo "Credenziali non valide.";
                echo "</p>";
            }
        ?>
        <main>
            <form name='nome_form' method='post'>
                <p> 
                    <label>Nome utente <input type='text' name='username'></label>
                </p>
                <p>
                    <label>Password <input type='password' name='password'></label>
                </p>
                <p>
                    <label>&nbsp;<input type='submit'></label>
                </p>
            </form>
            <div class="signup">Non hai un account? <a href="signup.php">Iscriviti</a>
        </main>
    </body>
</html>
