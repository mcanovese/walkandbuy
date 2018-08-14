<?php require('partials/head.php');?>
<h1>Homepage Utenti</h1>

<h1>Submit Your Name</h1>
<form method="GET" action="/names">

<?php var_dump($articoli); ?>
  <input name="name"></input>
  <button type="submit">Submit</button>

</form>

<?php require('partials/footer.php');?>
