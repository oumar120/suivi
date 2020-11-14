$(document).ready(function() {
var id,option,fila;
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
        {"defaultContent": "<div class='text-center'><button class='btn btn-danger btn-sm btnFolder'><i class='fa fa-folder-open'></i></button> <button class='btn btn-primary btn-sm btnEditar'><i class='fa fa-edit'>editer</i></button></div>"}
    ],
    "language": {
                "url": "langue.json"
            }
});     

 //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formUsuarios').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    nom1 = $.trim($('#nom1').val());    
    nom2 = $.trim($('#nom2').val());
    nom3 = $.trim($('#nom3').val());    
    nom4 = $.trim($('#nom4').val()); 
    nom5 = $.trim($('#nom5').val()); 
    nom6 = $.trim($('#nom6').val()); 
    nom7 = $.trim($('#nom7').val()); 
    nom8 = $.trim($('#nom8').val()); 
    nom9 = $.trim($('#nom9').val());  
    nom10 = $.trim($('#nom10').val());                            
        $.ajax({
          url: "./admin/crud.php",
          type: "POST",
          datatype:"json",    
          data:  {id:id, 
              nom1:nom1,
              nom2:nom2,
              nom3:nom3,
              nom4:nom4,
              nom5:nom5,
              nom6:nom6,
              nom7:nom7,
              nom8:nom8,
              nom9:nom9,
              nom10:nom10,
              option:option 
              },    
          success: function(data) {
            dataTable.ajax.reload(null, false);
           }
        });			        
    $('#modalCRUD').modal('hide');											     			
});
        
 

//para limpiar los campos antes de dar de Alta una Persona

//Editar        
$(document).on("click", ".btnEditar", function(){		        
    option = 2;//editar
    fila = $(this).closest("tr");	        
    id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
    nom1 = fila.find('td:eq(1)').text();
    nom2 = fila.find('td:eq(2)').text();
    nom3 = fila.find('td:eq(3)').text();
    nom4 = fila.find('td:eq(4)').text();
    nom5 = fila.find('td:eq(5)').text();
    nom6 = fila.find('td:eq(6)').text();
    nom7 = fila.find('td:eq(7)').text();
    nom8 = fila.find('td:eq(8)').text();
    nom9 = fila.find('td:eq(9)').text();
    nom10 = fila.find('td:eq(10)').text();

    $("#nom1").val(nom1);
    $("#nom2").val(nom2);
    $("#nom3").val(nom3);
    $("#nom4").val(nom4);
    $("#nom5").val(nom5);
    $("#nom6").val(nom6);
    $("#nom7").val(nom7);
    $("#nom8").val(nom8);
    $("#nom9").val(nom9);
     $("#nom10").val(nom10);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("modifier la ligne");		
    $('#modalCRUD').modal('show');		   
});

$(document).on("click", ".btnFolder", function(){ 
if ($.fn.DataTable.isDataTable("#dataTable1")) {
  $('#dataTable1').DataTable().clear().destroy();
}            
    fila = $(this).closest("tr");            
    id = fila.find('td:eq(3)').text();
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
    $(".modal-title").text("sous-dossiers de "+id);
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
            document.getElementById('reponse1').innerHTML=data;
           }
    });
  $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title1").text(intitule);
$('#modalTable1').modal('show');      
});      
});    