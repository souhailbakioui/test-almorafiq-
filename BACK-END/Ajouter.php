<?php include_once './scripts/scripts.php'; ?>
<!DOCTYPE html>
<Html>  
<head>

<title>  
Ajouter Page  
</title> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="./scripts/scripts.js"></script>
</head>  
<body>
<form>  
  
<div class="form-group">
    <label for="name">Nom :</label>
    <input type="text" class="form-control" id="name" placeholder="Nom">
  </div>
  <div class="form-group">
    <label for="prenom">Prenom :</label>
    <input type="text" class="form-control" id="prenom" placeholder="Prenom">
  </div>
  
 
<label>Genre</label>
<div class="form-check">
  <input class="form-check-input" type="radio" name='gender' id="male" checked>
  <label class="form-check-label" for="male">
    Male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name='gender' id="female">
  <label class="form-check-label" for="female">
    Female
  </label>
</div>
<div class="form-group">
    <label for="age">Age :</label>
    <input type="number" class="form-control" id="age" placeholder="Age">
  </div>
  <button type="button" class="btn btn-primary" onclick="ajouter();">Ajouter</button>
</form>



