<div id="container">
<?php require('partials/head.php');?>
<div id="body">
<h1>Homepage Utenti</h1>

<h1>Submit Your Name</h1>
<form method="GET" action="/names">

<?php var_dump($articoli); ?>
  <input name="name"></input>
  <button type="submit">Submit</button>

</form>
</div>
<?php require('partials/footer.php');?>
</div>