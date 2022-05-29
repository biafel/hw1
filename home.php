<?php

    // Avvia la sessione
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SoundTrip</title>
        <link rel="stylesheet" href="style/home.css?v=<?php echo time();?>"/>
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i|Open+Sans:400,700" rel="stylesheet">
        <script src="scripts/prova.js" defer="true" ></script>
    </head>
    <body>
    <header>
        <div id="overlay"></div>
        <nav>
            <div id="titolo">
                <img class="logo" src="img/Logo.png"/>
                SoundTrip  
            </div>
            <div id="links">
                <a href="home.php">Home</a>
                <a href="libreria.php">La tua libreria</a>
                <?php if(isset($_SESSION["username"])){
                    echo " <a href='logout.php'> Logout </a> ";
                }  else 
                echo "<a href='login.php' class='button'> Accedi/Registrati  </a> ";
                ?> 
                
            </div>
        </nav>
        <h1>
            <em>Novità: Ultimi album 2022!</em><br/>
            <strong>C'è tutto un suono intorno</strong><br/>
            <!-- <a class="button">Inizia subito la prova gratuita</a>    -->
        </h1>
    </header>
    <section> <!--Questo si mette sempre tra header e footer-->
     <h1> Milioni di brani solo per te</h1>
    <article>
    <form>
        <input id='brano' placeholder='Inserisci il nome di un brano che vuoi cercare' type='search' >
        <input id="submit" type="submit"  value="Cerca">
    </form>
    </article>

    <div id="cover"> 
    </div>
    
     <div id="flex-container">
        <div class="flex-item">
            <img src="img/Top 10 Italia.png" />
            <h1> <a href="https://open.spotify.com/playlist/37i9dQZF1DWUJcZpQ1337Z?si=a5c51640d4894ec1">Top 10 Album Italia</a> </h1>
            <p>
              Voglia di ballare? 
              Ecco a te una 
              playlist tutta italiana per scatenarti un po'!        
            </p>
        </div>
        <div class="flex-item">
            <img src="img/Release Radar.png" />
            <h1> <a href="https://open.spotify.com/playlist/37i9dQZEVXbub9Tsy1XwuY?si=0e54bcf588bc4179"> Release Radar </a> </h1> 
            <p>
            Ascolta tutti gli ultimi brani degli artisti che segui e i nuovi singoli 
            scelti per te. </p>

        </div>
        <div class="flex-item">
            <img src="img/hot hits.jpg" />
            <h1> <a href="https://open.spotify.com/playlist/37i9dQZF1DX6wfQutivYYr?si=ff6941cb4517466b"> Hot Hits </a> </h1>
            <p>
            La playlist del momento!<br>
            Copertina: Luca Patané</p>
        </div>
        <div class="flex-item">
            <img src="img/Top 10 Globale.png" />
            <h1> <a href="https://open.spotify.com/playlist/37i9dQZEVXbMDoHDwVN2tF?si=7b8e949592884ae4"> Top 50 Globale</a> </h1>
            <p>
              Il tuo aggiornamento quotidiano sugli album più <br>ascoltati in questo momento. Around the world!
            </p>      
        </div>
    </div>

    <form id="testo"> 
        <h1>Cerca la lyrics di una canzone</h1>
        <input placeholder='Inserisci il nome di un artista' type='search' id='nome_artista'>
        <input placeholder='Inserisci il nome del brano' type='search' id='nome_brano'>
        <br>
        <input type="button" id="submit" value="Cerca">
        <p id="text_lyrics"></p>
     </form>

    </section>
    <footer>
     <address>
         Bianca Felis<br>
         1000001839
     </address>
    </footer>
    </body>
</html>