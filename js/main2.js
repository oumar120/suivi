$(document).ready(function() {
 
var id, option;
option = 4; 
dataTable = $('#dataTable').DataTable({ 
   "dom" : 'Bfltip',
      "buttons" :[
      'copy','print','excel'],
    "ajax":{            
        "url": "./admin/crud.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{option:option}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "columns":[
        {"data": "id"},
        {"data": "numero"},
        {"data": "nom_develope"},
        {"data": "sigle"},
        {"data": "region"},
        {"data": "departement"},
        {"data": "tel"},
        {"data": "gerant"},
        {"data": "tel_pca"},
        {"data": "type"},
        {"data": "situation"},
        {"defaultContent": "<button class='btn btn-primary btn-sm btnFolder'><i class='fa fa-folder-open'></i></button>"}
    ],
    "language": {
                "url": "langue.json"
            }
});
$(document).on("click", ".btnFolder", function(){ 
if ($.fn.DataTable.isDataTable("#dataTable1")) {
  $('#dataTable1').DataTable().clear().destroy();
}            
    ligne = $(this).closest("tr");            
    id = ligne.find('td:eq(3)').text();
    option=1;
 $('#dataTable1').DataTable({ 
   "dom" : 'ftp',
    "ajax":{            
        "url": "./admin/crud.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{option:option,id:id}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "columns":[
        {"data":"id_donnee"},
        {"data": "intitule"},
        {"defaultContent": "<div class='text-center'><button class='btn btn-primary btn-sm btnFolder1'><i class='fa fa-folder-open'></i></button></div>"}
    ],
    "language": {
                "url": "langue.json"
            }
});     
  $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("sous-dossiers de " + id);
$('#modalTable').modal('show'); 
    
}); 

$(document).on("click", ".btnFolder1", function(){  
   fila = $(this).closest("tr");            
   sigle = fila.find('td:eq(0)').text();
   intitule =    fila.find('td:eq(1)').text();     
    option=5;
 $.ajax({
          url: "./admin/crud.php",
          type: "POST",
          datatype:"html",    
          data:  { intitule,intitule,
                 option:option,
                 sigle:sigle 
              },
     success: function(data) {
            document.getElementById('reponse').innerHTML=data;
           }
    });
  $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title1").text(intitule);
$('#modalTable1').modal('show');      
});      
});   