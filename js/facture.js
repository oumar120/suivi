// FACTURES
$(document).ready(function() {
var id3,option3;
option3 = 4; 
dataTable=$('#facture').DataTable({ 
   "dom" : 'Bfltip',
      "buttons" :[
      'copy','print','excel'],
    "ajax":{            
        "url": "./admin/crud.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{option3:option3}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "columns":[
        {
            "data": "id",
            render:function(data, type, row)
            {
               return "<span class='badge' style='background-color:teal;color:white;'>"+data+"</span>";
            }
        },
        {"data":"fournisseur"},
 
        {"data": "montant"},
        {"data": "date_reception"},
        {"data": "echeance"},
        {
            "data": "date_reglement",
            render:function(data, type, row)
            {
             if (data=="reglée")
               return "<span class='badge' style='background-color:green;'><i class='fa fa-check'></i> "+data+"</span>";
             if (data=="non reglée")
               return "<span class='badge badge-danger'><i class='fa fa-warning'></i> "+data+"</span>";
            }
        },
        {"defaultContent": "<button class='btn btn-sm btnEditar' style='background-color:teal;color:white;'><i class='fa fa-edit'></i></button>"}
    ],
    "language": {
                "url": "langue.json"
            }
});

$(document).on("click", ".ajout", function(){
 option3=1; 
 document.getElementById('reglement').innerHTML="";
 document.getElementById('nom3').required="true";
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
    nom4 = $.trim($('#nom4').val()); 
    nom5 = $.trim($('#nom5').val()); 
                              
        $.ajax({
          url: "./admin/crud.php",
          type: "POST",
          datatype:"json",    
          data:  {id3:id3,
              nom1:nom1,
              nom2:nom2,
              nom3:nom3,
              nom4:nom4,
              nom5:nom5,
              option3:option3
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
    option3 = 2;//editar
    document.getElementById('nom3').required=false;
    document.getElementById('reglement').innerHTML='<div class="col-lg-12"><div class="form-group"><label for="" class="col-form-label">reglement</label><div class="form-group"><select id="nom5" required class="form-control"><option value=""></option><option value="reglée">reglée</option><option value="non reglée">non reglée</option></select></div></div></div>'
    fila = $(this).closest("tr");          
    id3 = parseInt(fila.find('td:eq(0)').text()); //capturo el ID 
     nom1 = fila.find('td:eq(1)').text();              
    nom2 = fila.find('td:eq(2)').text();
    nom4 = fila.find('td:eq(4)').text();
      $("#nom1").val(nom1);
    $("#nom2").val(nom2);
     $("#nom4").val(nom4);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("modifier la ligne");    
    $('#modalA').modal('show');       
}); 
});