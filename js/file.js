$(document).ready(function() {
//agenda du directeur 
var id,option;
option = 4; 
dataTable=$('#agenda').DataTable({ 
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
        {
            "data": "id",
            render:function(data, type, row)
            {
               return "<span class='badge badge-primary'>"+data+"</span>";
            }
        },
        {
            "data": "dater",
            render:function(data, type, row)
            {
               return "<span class='card text-center'>"+data+"</span>";
            }
        },
        {"data": "nature"},
        {"data": "type_contact"},
        {"data": "identite"},
        {"data": "contact"},
        {
            "data": "etat",
            render:function(data, type, row)
            { 
              if (data=="prevu")
               return "<span class='badge' style='background-color:orange;'><i class='fa fa-refresh'></i> "+data+"</span>";
             if (data=="tenu")
               return "<span class='badge' style='background-color:#28A745;'><i class='fa fa-check'></i> "+data+"</span>";
             if (data=="annule")
               return "<span class='badge' style='background-color:#ff3933;'><i class='fa fa-warning'></i> "+data+"</span>";
             if (data=="reporte")
               return "<span class='badge bg-info'><i class='fa fa-share'></i> "+data+"</span>";
             
            }
        },
        {"data": "recu"},
        {
            "data": "commentaire",
            render:function(data, type, row)
            {
               return "<span class='card text-center'>"+data+"</span>";
            }
        },
        {"defaultContent": "<button class='btn btn-primary btn-sm btnEditar'><i class='fa fa-edit'></i></button>"}
    ],
    "language": {
                "url": "langue.json"
            }
});

$(document).on("click", ".ajoutA", function(){              
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Ajouter une ligne");        
    $('#agendaA').modal('show');           
});

$('#formulaireA').submit(function(e){     
option=1;                    
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    nom1 = $.trim($('#nom1').val());    
    nom2 = $.trim($('#nom2').val());
    nom3 = $.trim($('#nom3').val());    
    nom4 = $.trim($('#nom4').val()); 
    nom5 = $.trim($('#nom5').val()); 
    nom6 = $.trim($('#nom6').val());                          
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
              option:option 
              },    
          success: function(data) {
            dataTable.ajax.reload(null, false);
           }
        });                   
    $('#agendaA').modal('hide');                                                             
});
 
$(document).on("click", ".btnEditar", function(){  
     $("#formulaireB").trigger("reset");       
    var fila = $(this).closest("tr");                    
    id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID 
    option=2; 
    nom4 = fila.find('td:eq(4)').text();
    nom5 = fila.find('td:eq(5)').text();
    
    $("#nom44").val(nom4);
    $("#nom55").val(nom5);               
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("modifier la ligne");        
    $('#agendaB').modal('show');           
});
$('#formulaireB').submit(function(e){                      
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    nom1 = $.trim($('#nom11').val());    
    nom2 = $.trim($('#nom22').val());
    nom3 = $.trim($('#nom33').val());     
    nom4 = $.trim($('#nom44').val());    
    nom5 = $.trim($('#nom55').val());
    nom6 = $.trim($('#nom66').val());     
    nom7 = $.trim($('#nom77').val());    
    nom8 = $.trim($('#nom88').val());                         
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
    $('#agendaB').modal('hide');                                                             
});
});
