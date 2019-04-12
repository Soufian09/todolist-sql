<?php

   include 'connexion.php';
   include 'modification.php';
   
   //affiche mes données de la table des tâches et de l'archive 
   $taches = $bdd -> query('SELECT * FROM todos');
   $archive = $bdd -> query('SELECT * FROM archive');
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Todolist</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" media="screen" href="style.css">

   <body>
      <section class="container text-white">
         <h1 class="text-center">Tâches a realiser</h1>
         <form class="d-flex justify-content-around" action="index.php" method="POST" >
          <section class="border border-primary">
            <h2>liste :</h2>
               <?php
                  while ($donnees = $taches -> fetch())
                      {
                      echo "<p> <input name='checkbox[]' type='checkbox' value='".$donnees['taches']."'/> ".$donnees['taches']."</p>";
                      }
               ?>
                  <input name="delete" type="submit" value="Tâche accomplie">
          </section>  

         <section  class="border border-primary">    
            <h2>Archive :</h2>
            <?php
               while ($donnees = $archive -> fetch()){
                  echo "<p class='valide'> <input name='checkbox[]' type='checkbox' value='".$donnees['taches']."' checked='checked' disabled='disabled'/> ".$donnees['taches']."</p>";                  }
                  ?>
          </section>

         <section  class="border border-primary">
            <p>Ajouter une tâche : </p>
            <input type="text" cols="30" rows="2" name="newTask"/>
            <button type="submit" value="Ajouter" name="enter">Entrer</button>
         </section>
         </form>
      
   
      <?php
         $archive->closeCursor();
         $taches->closeCursor();
      ?>
   
   </body>
</html>