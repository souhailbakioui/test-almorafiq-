<?php include_once './scripts/scripts.php'; ?>
<!DOCTYPE html>
<Html>  
<head>

<title>  
Update Student  
</title> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="./scripts/scripts.js"></script>
<script>
    var url_string = window.location;
    const myArray = url_string.toString().split("=");
    console.log(myArray[1]);
    $.ajax({
            type: 'post',
            data: {
                id_u: myArray[1],
                m:'3'
            },
            success: function(data) {
                var list = JSON.parse(data);
                console.log(list);
                document.getElementById("id_u").value = list[0][0].id;
                document.getElementById("name_u").value = list[0][0].nom;
                document.getElementById("prenom_u").value= list[0][0].prenom;
                if(list[0][0].gender=='male'){
                document.getElementById('male_u').checked=true;
                document.getElementById('female_u').checked=false;
                }else{
                document.getElementById('female_u').checked=true;
                document.getElementById('male_u').checked=false;
                }
                age: document.getElementById("age_u").value= list[0][0].age;
            }
    });
</script>
</head>  
<body>
<form>  
  
<div class="form-group">
    <label for="id_u">Id :</label>
    <input type="text" class="form-control" id="id_u" placeholder="Id">
  </div>
<div class="form-group">
    <label for="name_u">Nom :</label>
    <input type="text" class="form-control" id="name_u" placeholder="Nom">
  </div>
  <div class="form-group">
    <label for="prenom_u">Prenom :</label>
    <input type="text" class="form-control" id="prenom_u" placeholder="Prenom">
  </div>
  
 
<label>Genre</label>

<div class="form-check">
  <input class="form-check-input" type="radio" name='gender_u' id="male_u" checked>
  <label class="form-check-label" for="male_u">
    Male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name='gender_u' id="female_u">
  <label class="form-check-label" for="female_u">
    Female
  </label>
</div>
<div class="form-group">
    <label for="age_u">Age :</label>
    <input type="number" class="form-control" id="age_u" placeholder="Age">
  </div>
  <button type="button" class="btn btn-primary" onclick="update();">Modifier</button>
</form>



