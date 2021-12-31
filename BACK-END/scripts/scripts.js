function ajouter(){
    var genre="";
    if(document.getElementById('male').checked) {
        genre="male";
      }else if(document.getElementById('female').checked) {
        genre="female";
      }
        $.ajax({
            type: 'post',
            data: {
                name: document.getElementById("name").value,
                prenom: document.getElementById("prenom").value,
                genre: genre,
                age: document.getElementById("age").value,
            },
            success: function(data) {
              window.location.href='./show.php';
                
            },
            error: function() {
            }
            
        });
}
function refresh(){
  $.ajax({
      url: './scripts/scripts.php?action=show',
      type: 'get',
      success: function(data) {
        
          var list = JSON.parse(data);
          console.log(list[0].length);
          $('#show').dataTable().fnClearTable();
          for (var i = 0; i < list[0].length; i++) {
              
              $('#show').dataTable().fnAddData([ 
                  list[0][i].id,
                  list[0][i].nom,
                  list[0][i].prenom,
                  list[0][i].gender,
                  list[0][i].age,
                  "<button  onclick='click_update("+ list[0][i].id+");' class='btn btn-primary'>Update</button>",
                  "<button  onclick='delete_s("+ list[0][i].id+");' class='btn btn-danger'>Delete</button>"
                  ]);
          }
      },
      error: function() {
      }
  });
}
function update()
{
  var genre="";
  if(document.getElementById('male_u').checked) {
      genre="male";
    }else if(document.getElementById('female_u').checked) {
      genre="female";
    }
$.ajax({
    type: 'post',
    data: {
      id_u: document.getElementById("id_u").value,
      name_u: document.getElementById("name_u").value,
      prenom_u: document.getElementById("prenom_u").value,
      genre_u: genre,
      age_u: document.getElementById("age_u").value,
  },
    success: function(data) {
      window.location.href='./show.php';
    },
    error: function() {

    }
    
}); 
}
function click_update(id)
{
  window.location.href='./modifier.php?='+id;
}
function printer(){
  var doc= new jsPDF('l', 'mm', [297, 420]);
  var htmlelement = $("#info").html();
  console.log(htmlelement);
  doc.fromHTML(htmlelement);
  // doc.text('Hello World',10,10);
  doc.autoPrint();
  window.open(doc.output('bloburl'), '_blank');
//This is a key for printing
// doc.output('dataurlnewwindow');
}
function delete_s(id)
{
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: 'post',
        data: {
          id_s: id,
      },
        success: function(data) {
        Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
      )
          window.location.href='./show.php';
        },
        error: function() {
    
        }
        
    });
      
    }
  })

}