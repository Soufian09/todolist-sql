<?php
    //
    if(isset($_POST['enter']) AND ($_POST['newTask'])){          
        $tache = $_POST['newTask'];
        $bdd->exec('INSERT INTO todos(taches) VALUES("'.$tache.'")');
}

    if(isset($_POST['delete'])){
        foreach($_POST['checkbox'] as $select){
            $bdd -> exec('INSERT INTO archive(taches) VALUES("'.$select.'")');
            $bdd -> exec('DELETE FROM todos WHERE taches = "'.$select.'"');
    
        }
    }





?>    



