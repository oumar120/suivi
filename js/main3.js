$(document).ready(function() {
var id, option;
option = 4;
    
dataTable = $('#dataTable').DataTable({ 
   "dom" : 'Bfltip',
      "buttons" :[
      'copy','excel','print'],
    "ajax":{            
        "url": "../admin/crud.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{option:option}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "columns":[
        {"data": "id"},
        {"data": "numero"},
        {"data": "nom_develope"},
        {"data": "sigle"},
        {"data": "tel"},
        {"data": "gerant"},
        {"data": "tel_pca"},
        {"data": "region"},
        {"data": "departement"},
        {"data": "type"},
        {"data": "situation"},
        {"defaultContent": "<button class='btn btn-danger btn-sm btnBorrar'><i class='fa fa-trash'></i></button>"}
    ],
    "language": {
                "url": "../langue.json"
            }
});     
//B9rrar
$(document).on("click", ".btnBorrar", function(){
    fila = $(this);           
    id =$(this).closest('tr').find('td:eq(3)').text();		
    option = 3; //eliminar
    var message=prompt("Veuillez saisir la phrase secrete pour continuer");
    if (message=="fimf"){
    var reponse = confirm("etes-vous certain(e) de vouloir continuer?");                
    if (reponse) {            
        $.ajax({
          url: "../admin/crud.php",
          type: "POST",
          datatype:"json",    
          data:  {option:option, id:id},    
          success: function() {
              dataTable.row(fila.parents('tr')).remove().draw();                  
           }
        });	
    }
  }else{
    alert("Désolé vous n'etes pas autorisé à éffectuer cette action ");
  }
});

});    