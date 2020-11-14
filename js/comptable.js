// tresorerie
$(document).ready(function() {
var id2,option2;
option2 = 4; 
dataTable=$('#tresorerie').DataTable({ 
   "dom" : 'Bfltip',
      "buttons" :[
      'copy','print','excel'],
    "ajax":{            
        "url": "./admin/crud.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{option2:option2}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "columns":[
        {
            "data": "id",
            render:function(data, type, row)
            {
               return "<span class='badge badge-success'>"+data+"</span>";
            }
        },
        {"data":"compte"},
 
        {"data": "solde"},
        {
            "data": "dater",
            render:function(data, type, row)
            {
              return data;
            }
        },
        {"defaultContent": "<button class='btn btn-success btn-sm btnEditar'><i class='fa fa-edit'></i></button>"}
    ],
    "language": {
                "url": "langue.json"
            }
});

$(document).on("click", ".ajout", function(){
 option2=1; 
    $("#formulaireA").trigger("reset");               
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Ajouter une ligne");        
    $('#modalA').modal('show');           
});

$('#formulaireA').submit(function(e){                  
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    nom1 = $.trim($('#nom1').val());    
    nom2 = $.trim($('#nom2').val());
    nom3 = $.trim($('#nom3').val());    
                              
        $.ajax({
          url: "./admin/crud.php",
          type: "POST",
          datatype:"json",    
          data:  {id2:id2,
              nom1:nom1,
              nom2:nom2,
              nom3:nom3,
              option2:option2 
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
$(document).on("click", ".btnEditar", function(){            
    option2 = 2;//editar
    fila = $(this).closest("tr");          
    id2 = parseInt(fila.find('td:eq(0)').text()); //capturo el ID                
    nom2 = fila.find('td:eq(2)').text();
 
    $("#nom2").val(nom2);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("modifier la ligne");    
    $('#modalA').modal('show');       
}); 

});

