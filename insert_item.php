<?php

//sessione
session_start();
include_once("./config/config.php")

    if(!isset($_SESSION['idutente']))
        header("Location: index.php");





if((!isset($_POST["nome"])) || (!isset($_POST["descrizione"])) || (!isset($_POST["prezzopieno"])) || (!isset($_POST["unitamisura"])) || (!isset($_POST["foto"])) || (!isset($_POST["percsconto"]))
|| (!isset($_POST["categoria"])) || (!isset($_POST["giacenza"])) || )

  $name = $_POST["nome"];
  $description = $_POST["descrizione"];
  $netprice = $_POST["prezzopieno"];
  $um = $_POST["unitamisura"];
  $discount = $_POST["percsconto"];
  $category = $_POST["categoria"];
  $storeqty = $_POST["giacenza"];

  $sql = "INSERT INTO articoli(nome,descrizione,prezzopieno,unitamisura,percsconto,categoria,giacenza) VALUES('".$_SESSION['id']."','".$name."','".$description."','".$netprice."','".$um."','".$discount."','".$category."','".$storeqty."')";
  //controllo la connessione
  if (mysqli_query($conn, $sql))
      header("Location: insert_place.php?room=".mysqli_insert_id($conn)."");
  else //sollevo eccezione
      header("Location: insert_place.php");
  //  echo "ER1234 - Ops!, qualcosa è andato storto, se il problema persiste contatta il supporto";
  }





$pagina = file_get_contents("./html/user.html");
$pagina2 = file_get_contents("./html/footer.html");

$pagina = str_replace("[BREADCRUMB]","<a href='home.php'>Home</a> > Inserisci Articolo, $pagina");
$pagina = str_replace("[FOOTER]", $pagina2, $pagina);
echo str_replace ("[CONTENUTO]",$lista,$pagina);
?>
