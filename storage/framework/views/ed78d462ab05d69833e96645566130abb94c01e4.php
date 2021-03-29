

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>HC </title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/css/vendors.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/css/app.css')); ?>">
    
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <script src="https://use.fontawesome.com/2276b7b0e5.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <style type="text/css">
      .gris_tabla{  
        background-color: #D2D2D2;
           color: #5C8293;
        }
    </style>
  </head>

  <body style="background: white;">

    <div class="container">
      <header class="blog-header py-1">
        <table class="table table-bordered table-striped">
			<tr>
				<td style="background-color: #000000; text-align: center; "><img src="<?php echo e(url('app-assets/images/logo_completo.jpg')); ?>" style="width: 150px;"></td>
	        	<td style="background-color: #5C8293; "><label style="font-family:sans-serif; font-size: 11px; color: white; ">Calzada San Pedro # 108<br>San Pedro Garza García, NL, México, 66220<br>+52 (81) 8378 0601 <br/> info@hardwarecollection.mx</label></td>
			</tr>
		</table>
      </header>

      <div class="py-1 p-md-1 rounded ">
      	<h4 style="color: #40A8B0; font-family: sans-serif; "><b>Configuración de abatimientos</b></h4>
        <div class="col-md-12 px-0" id="contenido">	
          <?php echo $__env->make('cotizador.abatimientos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		      <hr>
		
        </div>
        <div class="col-md-12">
          <img src="<?php echo e(url('images/barra.jpg')); ?>">  
        </div>
        
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
     <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>	

	<script type="text/javascript">
    	function configura_abatimiento(id_cotizacion, tipo,vista){
		  $.ajax({
		        data: {id_cotizacion:id_cotizacion, 'tipo':tipo,'vista':2},
		        url: '/api/v1/configura_abatimiento',
		        dataType: 'json',
		        type:  'get',
		        success:  function (response){  
		          $("#contenido").html(response);
		        }
		    });
		}

		function guarda_abatimiento(id,id_cotizacion){
		   var val = $("input[name='p_"+id+"']:checked").val();

		  var parameters = {'id':id,
		                    'id_cotizacion':id_cotizacion,
		                    'puerta':$("#puerta_"+id).val(),
		                    'valor':val,
		                    'vista':2,
		                    'sel':$("#sel_"+id).val()
		                  }
		  $.ajax({
		        data: parameters,
		        url: '/api/v1/guarda_abatimiento',
		        dataType: 'json',
		        type:  'get',
		        success:  function (response){  
		          $("#contenido").html(response);
		        }
		    });
		}

    function muestra_abatimiento(){
      $.dialog({
          title: 'Hardware Collection',
          columnClass: 'medium',
          content: "<img src='<?php echo e(url('images/puertas.jpg')); ?>' style='width:100%;'>",
      });
    }

    function elimina_elemento(id, ocf){
 $.confirm({
            title: 'Hardware Collection',
            content: 'Estas seguro deseas eliminar este abatimiento?',
            type:'orange',
            buttons: {
                confirmar: function () {
                  $.ajax({
                      data: {"id":id, 'ocf':ocf,'vista':1},
                      url: '/api/v1/elimina_elemento',
                      dataType: 'json',
                      type:  'get',
                      success:  function (response) { 
                        $("#contenido").html(response);
                      }
                  });

                },
                cancelar: function () {}
              } 
          }); 
}




    </script>    
  </body>
</html>

<?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/cotizador/config_abat.blade.php ENDPATH**/ ?>