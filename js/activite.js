// suivi des activités
$(document).ready(function() {
var id1,option1,percent;
option1 = 4; 
$('#activite').DataTable({ 
   "dom" : 'Bfltip',
      "buttons" :[
      'copy','print','excel'],
    "ajax":{            
        "url": "./admin/crud.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{option1:option1}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "columns":[
        {
            "data": "id",
            render:function(data, type, row)
            {
               return "<span class='badge badge-info'>"+data+"</span>";
            }
        },
        {"data":"service"},
 
        {"data": "nom"},
        {
            "data": "date_debut",
            render:function(data, type, row)
            {
              return data;
            }
        },
        {
            "data": "duree",
            render:function(data, type, row)
            {
              return "<span class='badge'>"+data+"</span>";
            }
        },
        {
            "data": "percent",
            render:function(data, type, row)
            {
              return "<p style='text-align:center;'>"+data+" %</p><div class='progress progress-sm'><div class='progress-bar bg-danger' style='width:"+data+"%'></div></div>";
            }
        },
        {"defaultContent": "<button class='btn btn-info btn-sm btnFolder'><i class='fa fa-eye'></i> voir</button>"}
    ],
    "language": {
                "url": "langue.json"
            }
});

$(document).on("click", ".ajout", function(){ 
    $("#formulaireA").trigger("reset");               
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Ajouter une ligne");        
    $('#modalA').modal('show');           
});

$('#formulaireA').submit(function(e){     
option=2;                    
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    nom1 = $.trim($('#nom1').val());    
    nom2 = $.trim($('#nom2').val());
    nom3 = $.trim($('#nom3').val());    
    nom4 = $.trim($('#nom4').val()); 
    nom5 = $.trim($('#nom5').val()); 
    nom6 = $.trim($('#nom6').val()); 
    nom7 = $.trim($('#nom7').val()); 
    nom8 = $.trim($('#nom8').val());                            
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
              option:option 
              },    
          success: function(data) {
            dataTable.ajax.reload(null, false);
           }
        });     
    $("#formulaireA").trigger("reset");               
    $('#modalA').modal('hide');                                                             
});
        
 

//para limpiar los campos antes de dar de Alta una Persona

//Editar        
$(document).on("click", ".btnFolder", function(){ 
 var fila = $(this).closest("tr");            
   id1 =parseInt(fila.find('td:eq(0)').text());   
    option1=5;
 $.ajax({
          url: "./admin/crud.php",
          type: "POST",
          datatype:"html",    
          data:  { id1,id1,
                 option1:option1,
              },
     success: function(data) {
            document.getElementById('donnee').innerHTML=data;
           }
    });   
  $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("les taches de l'activité");
$('#modaltache').modal('show'); 
    
}); 
});

