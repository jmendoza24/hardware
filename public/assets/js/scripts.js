function cambia_oc(id){

		$.confirm({
						title: 'Hardware collection',
						content: 'Estas seguro deseas convertir esta cotización a OC?',
						type:'orange',
						buttons: {
								confirmar: function () {
									$.ajax({
											data: {"id":id},
											url: '/api/v1/cambia_oc',
											dataType: 'json',
											type:  'get',
											success:  function (response) { 
											}
									});
																	window.location.href = 'cotizaciones_oc';

								},
								cancelar: function () {}
							} 
					});
}


function cambia_oc2(id){

		$.confirm({
						title: 'Hardware collection',
						content: 'Estas seguro deseas convertir esta OC a cotización ?',
						type:'orange',
						buttons: {
								confirmar: function () {
									$.ajax({
											data: {"id":id},
											url: '/api/v1/oc_cambia2',
											dataType: 'json',
											type:  'get',
											success:  function (response) { 
											}
									});
													 window.location.href = 'cotizaciones_lista';

								},
								cancelar: function () {}
							} 
					});
}




(function() {
	'use strict';
	window.addEventListener('load', function() {
		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		var forms = document.getElementsByClassName('needs-validation');
		// Loop over them and prevent submission
		var validation = Array.prototype.filter.call(forms, function(form) {
			form.addEventListener('submit', function(event) {
				if (form.checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				}
				form.classList.add('was-validated');
			}, false);
		});
 
	}, false);

})();
function busca_estado(campo){

	if($("#pais").val()==146){
		$("#estado_text").hide();
		$("#estado_select").show();
		$("#municipio_text").hide();
		$("#municipio_select").show();
	}else{
		$("#estado_text").show();
		$("#estado_select").hide();
		$("#municipio_text").show();
		$("#municipio_select").hide();
	}
}

function get_municipios(estado,municipio){
	var id_estado = $("#"+estado).val();
	var parameters = {"id_estado":id_estado}

	 $.ajax({
						data: parameters,
						url:   '/api/v1/get_municipios',
						dataType: 'json',
						type:  'get',
						success:  function (response) { 
							var len = response.length;
							$("#"+municipio).html('<option value="0">Seleccione una opción</option>');
							for (var i = 0; i < len; i++) {
									$("#"+municipio).append("<option value='"+response[i].id+"'>"+response[i].municipio+"</option>");
							}      
						}
				}); 
}

	 
		
function baja_cotiza_pdf(id_cotizacion){

			var id_tipo = $("#id_tipo").val();
			if(id_tipo ==''){
				id_tipo = 1;
			}
			
			window.open('/api/v1/baja_cotiza_pdf?id_cotizacion='+id_cotizacion+'&id_tipo='+id_tipo,'_blank');

			} 

function agrega_cliente(id_cliente){
	var parameters = {"id_cliente":id_cliente,
										"cliente_id":$("#cliente_id").val()
										};

	if($("#cliente_id").val()==''){
		$.alert("seleccione un cliente");
	}else{
		$.ajax({
						data: parameters,
						url:   '/api/v1/inserta_cliente_asignado',
						dataType: 'json',
						type:  'get',
						success:  function (response) { 
							console.log(response);
							if(response==1){
								$.alert("El cliente ya esta agregado");
							}else{
								$("#lista_asignados").html(response);
								$(".zero-configuration").dataTable();  
							}
							
						}
				}); 
	}
}

function elimina_asignacion(cliente_id,id_cliente){
	var parameters = {'cliente_id':cliente_id,
										'id_cliente':id_cliente
										};
	$.ajax({
						data: parameters,
						url:   '/api/v1/elimina_cliente_asignado',
						dataType: 'json',
						type:  'get',
						success:  function (response) { 
							console.log(response);
								$("#lista_asignados").html(response);
								$(".zero-configuration").dataTable();  
						}
				});
}

function agrega_contacto(id_fabricante,id_contacto){
	var parameters = {'id_fabricante':id_fabricante,
										'id_contacto':id_contacto
										}
	$.ajax({
						data: parameters,
						url:   '/api/v1/nuevo_contacto_fab',
						dataType: 'json',
						type:  'get',
						success:  function (response) { 
							console.log(response);
							$("#modal_primary").removeClass("modal-xl");
							//$('.modal-dialog').draggable({handle: ".modal-header"});
							$("#footer_primary").hide();
							$("#contenido").html(response);
						}
				});
}

function guarda_contacto(id_fabricante,id_contacto){
	var parameters = {'id_fabricante':id_fabricante,
										'id_contacto':id_contacto,
										'contacto':$("#c_contacto").val(),
										'telefono':$("#c_telefono").val(),
										'telefono_2':$("#c_telefono_2").val(),
										'correo':$("#c_correo").val(),
										'comentarios':$("#c_comentarios").val()
										}
	$.ajax({
						data: parameters,
						url:   '/api/v1/guarda_contacto_fab',
						dataType: 'json',
						type:  'get',
						success:  function (response) { 
							console.log(response);
							$("#contactos_fab").html(response);
							$(".zero-configuration").dataTable();
						}
				});
}

function delete_contacto(id_fabricante,id_contacto){
	var parameters = {'id_fabricante':id_fabricante,
										'id_contacto':id_contacto
										}
	$.ajax({
						data: parameters,
						url:   '/api/v1/delete_contacto_fab',
						dataType: 'json',
						type:  'get',
						success:  function (response) { 
							$("#contactos_fab").html(response);
							$(".zero-configuration").dataTable();
						}
				});
}


function ver_catalogo(catalogo,id,tipo,fabricante,catalogos,familia,categoria,subcategoria,disenio){
 var parameters = {'catalogo':catalogo,
										'id':id,
										'tipo':tipo,
										'fabricante':fabricante,
										'catalogos':catalogos,
										'familia':familia,
										'categoria':categoria,
										'subcategoria':subcategoria,
										'disenio':disenio
										}
	$.ajax({
						data: parameters,
						url:   '/api/v1/opciones_catalogo',
						dataType: 'json',
						type:  'get',
						success:  function (response) { 
							 $("#contenido").html(response);
							 if(catalogo!=16 ){
									$("#modal_primary").removeClass("modal-xl");
							 }
							 //$("#modal_primary").addClass("modal-lg");
							 $('.modal-dialog').draggable({handle: ".modal-header"});
							 $("#footer_primary").hide();
						}
				}); 
}

function guarda_catalogo(catalogo,id,tipo,nom_table){
	if($("#fabricante").val()==''){
		$.alert("Llene todos los campos");
	}else{
	 var formData = new FormData($("#catalogos_forma")[0]);
	 $.ajax({
						url:"/api/v1/guarda_catalogo",
						type: 'POST',
						method: "POST",        
						data:  formData,
						//async: false,
						cache: false,
						contentType: false,
						processData: false, 
						success: function(respuesta){
								$('#tabla_catalogos').html(respuesta);
								$('.file-export').DataTable({
											dom: 'Bfrtip',
											"paging": false,
											"columnDefs": [
													{
															"targets": [ 0 ],
															"visible": false
													}
											],
											buttons: [
													{
															extend: 'excelHtml5',
															exportOptions: {
																	columns: [0,1,2]
															}
													}
											]
									});
									$('.buttons-excel').addClass('btn btn-outline-primary');
								$("#primary").modal('hide');
								$("#catalogos_forma")[0].reset();
						}
				});
		}
}

function elimina_catalogo(catalogo,id,nom_table,fabricante,catalogos,familia,categoria,subcategoria,disenio){
	var parameters = {'catalogo':catalogo,
										'id':id,
										'fabricante':fabricante,
										'catalogos':catalogos,
										'familia':familia,
										'categoria':categoria,
										'subcategoria':subcategoria,
										'disenio':disenio
										}

	$.confirm({
						title: 'Hardware collection',
						content: 'Estas seguro deseas elimniar este registro?',
						type:'orange',
						buttons: {
								confirmar: function () {
									$.ajax({
													data: parameters,
													url: '/api/v1/elimina_catalogo',
													dataType: 'json',
													type:  'get',
													success:  function (response) {  
														$('#tabla_catalogos').html(response);
														$('.file-export').DataTable({
																	dom: 'Bfrtip',
																	"paging": false,
																	"columnDefs": [
																			{
																					"targets": [ 0 ],
																					"visible": false
																			}
																	],
																	buttons: [
																			{
																					extend: 'excelHtml5',
																					exportOptions: {
																							columns: [0,1,2]
																					}
																			}
																	]
															});
															$('.buttons-excel').addClass('btn btn-outline-primary');
														//$('#'+nom_table+'-table').dataTable();
													}
											}); 

								},
								cancelar: function () {}
							} 
					});
}

function obtiene_catalogo(tipo,campo){
	var valores = '<option value="">Seleccione una opción</option>';
	var sufijo = '<option value="">Seleccione una opción</option>';
	var gsufijo = '<option value="">Seleccione una opción</option>';
	var fabricante = $("#fabricante").val();
	var parameters = {'tipo':tipo,
										'fabricante':$("#fabricante").val(),
										'catalogo':$("#catalogo").val(),
										'familia':$("#familia").val(),
										'categoria':$("#categoria").val(),
										'subcategoria':$("#subcategoria").val(),
										'disenio':$("#disenio").val(),
										}
			if(fabricante==77){
				$("#bw_lista").show();
				$("#seccion_bwh").show();
				$("#seccion_bwh_2").show();        
				$("#elementos_mtk").hide();
			}else if(fabricante == 76){
				$("#bw_lista").hide();
				$("#seccion_bwh").hide();
				$("#seccion_bwh_2").hide();  
				$("#elementos_mtk").show();        
			}
		$.ajax({
						data: parameters,
						url: '/api/v1/obtiene_catalogo',
						dataType: 'json',
						type:  'get',
						success:  function (response) { 
							console.log(response);
							var len = response.catalogo.length;
								for (var i = 0; i < len; i++) {
										valores += "<option value='"+response.catalogo[i].campo1+"'>"+response.catalogo[i].campo2+"</option>";
								}
							var len2 = response.sufijos.length;
							
								for (var i = 0; i < len2; i++) {
									console.log(response.sufijos[i]);
										sufijo += "<option value='"+response.sufijos[i].campo1+"'>"+response.sufijos[i].campo2+"</option>";
								}
								var len3 = response.grupo_suf.length;
								for (var i = 0; i < len3; i++) {
										gsufijo += "<option value='"+response.grupo_suf[i].campo1+"'>"+response.grupo_suf[i].campo2+"</option>";
								}
								/**if(fabricante ==77){
									$("#sufijo").html(sufijo);
									$("#grupo_sufijo").html(gsufijo);
									console.log(gsufijo);
								}*/
								$('#'+campo).html(valores);
						}
				}); 
}

function obtiene_catalogo2(tipo,id,campo){
	var valores = '';
	var stipo = 0;
	var campo = '';
	var parameters = {'tipo':tipo,
										'id':id
										}
		if(tipo==1){
			$("#l_catalogos").show();
			$("#l_familias").hide();
			$("#l_categorias").hide();
			$("#l_subcategorias").hide();
			$("#l_disenios").hide();
			$("#l_items").hide();
			stipo = 2;
			campo = 'lista_catalogos';
			scampo = 'lista_familias';
		}else if(tipo==2){
			$("#l_catalogos").show();
			$("#l_familias").show();
			$("#l_categorias").hide();
			$("#l_subcategorias").hide();
			$("#l_disenios").hide();
			$("#l_items").hide();
			stipo = 3;
			scampo = 'lista_categorias';
			campo = 'lista_familias';
		}else if(tipo==3){
			$("#l_catalogos").show();
			$("#l_familias").show();
			$("#l_categorias").show();
			$("#l_subcategorias").hide();
			$("#l_disenios").hide();
			$("#l_items").hide();
			stipo = 4;
			scampo = 'lista_subcategorias';
			campo = 'lista_categorias';
		}else if(tipo==4){
			$("#l_catalogos").show();
			$("#l_familias").show();
			$("#l_categorias").show();
			$("#l_subcategorias").show();
			$("#l_disenios").hide();
			$("#l_items").hide();
			stipo = 5;
			scampo = 'lista_disenios';
			campo = 'lista_subcategorias';
		}else if(tipo==5){
			$("#l_catalogos").show();
			$("#l_familias").show();
			$("#l_categorias").show();
			$("#l_subcategorias").show();
			$("#l_disenios").show();
			$("#l_items").hide();
			stipo = 6;
			scampo = 'lista_items';
			campo = 'lista_disenios';
		}else if(tipo==6){
			$("#l_catalogos").show();
			$("#l_familias").show();
			$("#l_categorias").show();
			$("#l_subcategorias").show();
			$("#l_disenios").show();
			$("#l_items").show();
			stipo = 7;
			scampo = 'lista_otro';
			campo = 'lista_items';
		}

		$.ajax({
						data: parameters,
						url: '/api/v1/obtiene_catalogo2',
						dataType: 'json',
						type:  'get',
						success:  function (response) { 
							console.log(response);
							var len = response.catalogo.length;
								for (var i = 0; i < len; i++) {
									if(tipo==6){
										valores += "<li><a class='dropdown-item' data-toggle='modal' data-backdrop='false' data-target='#primary' onclick=\"detalle_producto("+response.catalogo[i].campo1+")\">"+response.catalogo[i].campo2+"<submenu class='name'></submenu></a></li>";
										}else{
											valores += "<li><a class='dropdown-item' data-toggle='dropdown' onclick=\"obtiene_catalogo2("+stipo+","+response.catalogo[i].campo1+",'"+scampo+"'"+")\">"+response.catalogo[i].campo2+"<submenu class='name'></submenu></a></li>";
										}
								}
								console.log(valores);
								$('#'+campo).html(valores);
						}
				}); 
}


function valida_grupo(){
	if($("#variable").val()==''){
		$alert("Selecciona una variable");
	}else{
		var parameters = {'variable': $("#variable").val(),
											'grupo':$("#subcatalogo").val(),
											'fabricante':$("#fabricante").val()}
		$.ajax({
						data: parameters,
						url: '/api/v1/valida_grupo',
						dataType: 'json',
						type:  'get',
						success:  function (response) { 
							if(response==1){
								$.alert('El grupo '+ $("#subcatalogo").val() + ' ya existe, elija otro nombre');
								$('#subcatalogo').css('border', 'solid 1px red');
								$("#subcatalogo").val('');
							}
						}
				});
	}
	
}

function limpiar_temporal(numero){

	$.confirm({
						title: 'Hardware collection',
						content: 'Estas seguro deseas limpiar la tabla?',
						type:'orange',
						buttons: {
								confirmar: function () {
									$.ajax({
											data: {"numero":numero},
											url: '/api/v1/limpiar_temporal',
											dataType: 'json',
											type:  'get',
											success:  function (response) { 
												$("#productos-table").html(response);
											}
									});

								},
								cancelar: function () {}
							} 
					});


	
}

function detalle_producto (producto){
	$.ajax({
					data: {'producto':producto},
					url: '/api/v1/detalle_producto',
					dataType: 'json',
					type:  'get',
					success:  function (response) {  
						$("#contenido").html(response);
						$("#modal_primary").removeClass("modal-xl");
						
						$('.modal-dialog').draggable({handle: ".modal-header"});
						$("#footer_primary").hide();
					}
			}); 
}

function agrega_producto(producto){
	$.ajax({
					data: {'producto':producto},
					url: '/api/v1/agrega_producto',
					dataType: 'json',
					type:  'get',
					success:  function (response) {  
						if(response==1){
							$.alert("El producto ya se encuentra agregado");
						}else{
							$("#cotiza_table").html(response);
							$("#primary").modal('hide');
						}
						
					}
			}); 
}

function elimina_producto(producto){
	$.confirm({
						title: 'HC',
						content: 'Estas seguro que deseas eliminar esta item?',
						buttons: {
								confirmar: function () {
										$.ajax({
												data: {'producto':producto},
												url: '/api/v1/elimina_producto',
												dataType: 'json',
												type:  'get',
												success:  function (response){  
														$("#cotiza_table").html(response);
														$('.cantidad-mask').inputmask({ 
																				groupSeparator: ".",
																				alias: "numeric",
																				placeholder: "0",
																				autoGroup: !0,
																				digits: 0,
																				digitsOptional: !1,
																				clearMaskOnLostFocus: !1,
																				max:9999
																		});
														$('.p_unit-mask').inputmask({
																				prefix: "$ ",
																				groupSeparator: ".",
																				alias: "numeric",
																				placeholder: "0",
																				autoGroup: !0,
																				digits: 1,
																				digitsOptional: !1,
																				clearMaskOnLostFocus: !1,
																				max:9999999
																		});
														$('.perc-inputmask').inputmask({
																				alias: "porcentaje",
																				placeholder: "0",
																				digitsOptional: !1,
																				clearMaskOnLostFocus: !1,
																				max:99,
																				mask: "99%",
																		});
												}
										}); 
								},
								cancelar: function () {

								}
						}
				});

	
}

function agregar_dependencia(item,id){
	 $.ajax({
				data: {'item':item,'id':id},
				url: '/api/v1/agregar_dependencia',
				dataType: 'json',
				type:  'get',
				success:  function (response){  
						console.log(response);
						$("#contenido").html(response);
						$('.cantidad-mask').inputmask({ 
												groupSeparator: ".",
												alias: "numeric",
												placeholder: "0",
												autoGroup: !0,
												digits: 0,
												digitsOptional: !1,
												clearMaskOnLostFocus: !1,
												max:9999
										});
						$("#modal_primary").addClass("modal-xl");
						//$("#modal_primary").addClass("modal-lg");
						$('.modal-dialog').draggable({handle: ".modal-header"});
						$("#footer_primary").hide();
				}
		}); 
}

function agrega_clientes(id_proyecto){
	$.ajax({
				data: {'id_proyecto':id_proyecto,'id_cliente':$("#cliente_proyecto").val(),'cliente_comentarios':$("#cliente_comentarios").val()},
				url: '/api/v1/agrega_clientes',
				dataType: 'json',
				type:  'get',
				success:  function (response){  
						$("#tabIcon12").html(response);
				}
		}); 
}

function eliminar_clientes(id_proyecto, id){
	$.ajax({
				data: {'id_proyecto':id_proyecto,'id':id},
				url: '/api/v1/elimina_clientes',
				dataType: 'json',
				type:  'get',
				success:  function (response){  
						$("#tabIcon12").html(response);
				}
		}); 
}

function guarda_info_cotizacion(id){
	var parameters = {'id':id,
										'posicion':$("#posicion_"+id).val(),
										'descripcion':$("#descripcion_"+id).val(),
										'bks':$("#bks_"+id).val(),
										'door_t':$("#doort_"+id).val(),
										'cantidad':$("#pro_cant_"+id).val(),
										'mod_precio_unit':$("#mod_pre_unit_"+id).val(),
										'mod_cantidad':$("#mod_cant_"+id).val(),
										'inst_precio_unit':$("#inst_pre_unit_"+id).val(),
										'inst_cantidad':$("#inst_cant_"+id).val()}

 $.ajax({
				data: parameters,
				url: '/api/v1/guarda_info_cotizacion',
				dataType: 'json',
				type:  'get',
				success:  function (response){  
						$("#cotiza_table").html(response);
						$('.cantidad-mask').inputmask({ 
												groupSeparator: ".",
												alias: "numeric",
												placeholder: "0",
												autoGroup: !0,
												digits: 0,
												digitsOptional: !1,
												clearMaskOnLostFocus: !1,
												max:9999
										});
						$('.p_unit-mask').inputmask({
												prefix: "$ ",
												groupSeparator: ".",
												alias: "numeric",
												placeholder: "0",
												autoGroup: !0,
												digits: 1,
												digitsOptional: !1,
												clearMaskOnLostFocus: !1,
												max:9999999
										});
						$('.perc-inputmask').inputmask({
												alias: "porcentaje",
												placeholder: "0",
												digitsOptional: !1,
												clearMaskOnLostFocus: !1,
												max:99,
												mask: "99%",
										});
				}
		});  
}

function guardar_descuentos(){
	var parameters = {'descuento_mx':$("#descuento_mx").val(),
										'descuento_usa':$("#descuento_usa").val(),
										'descuento_mod':$("#descuento_mod").val(),
										'iva_mx':$("#iva_mx").val(),
										'iva_usa':$("#iva_usa").val(),
										'iva_mod':$("#iva_mod").val()}
	$.ajax({
				data: parameters,
				url: '/api/v1/guardar_descuentos',
				dataType: 'json',
				type:  'get',
				success:  function (response){  
						$("#cotiza_table").html(response);
						$('.cantidad-mask').inputmask({ 
												groupSeparator: ".",
												alias: "numeric",
												placeholder: "0",
												autoGroup: !0,
												digits: 0,
												digitsOptional: !1,
												clearMaskOnLostFocus: !1,
												max:9999
										});
						$('.p_unit-mask').inputmask({
												prefix: "$ ",
												groupSeparator: ".",
												alias: "numeric",
												placeholder: "0",
												autoGroup: !0,
												digits: 1,
												digitsOptional: !1,
												clearMaskOnLostFocus: !1,
												max:9999999
										});
						$('.perc-inputmask').inputmask({
												alias: "porcentaje",
												placeholder: "0",
												digitsOptional: !1,
												clearMaskOnLostFocus: !1,
												max:99,
												mask: "99%",
										});
				}
		}); 
}

function muestra_sufijo_ext(id_catalogo){
	var ext = $("#item_"+id_catalogo).val();
	var option = '';
	var option2 = '';

	if(ext==''){
		$("#sufijo_"+id_catalogo).html('');  
	}else{
		var sufijo  = ext.split('.');
		console.log(sufijo.length);

		if(sufijo.length > 1){
			$("#sufijo_"+id_catalogo).html(sufijo[2]);
			if(sufijo[1].toLowerCase() !='xxx'){
					option2 = "<option value='"+sufijo[1]+"'>"+sufijo[1]+"</option>";
					$("#color_"+id_catalogo).html(option2);
				}
		}else{
			$("#sufijo_"+id_catalogo).html('-');
		}  

		
	}
	
}

function ver_dependencias(catalogo){
	
}

function guarda_costo(id,campo){
	var parameters =  {'id':id,
										 'campo':campo,
										 'valor':$("#"+campo+'_'+id).val()
									 }
	$.ajax({
				data: parameters,
				url: '/api/v1/guarda_costo',
				dataType: 'json',
				type:  'get',
				success:  function (response){  
						console.log(response);
						//$("#lista_costs").html(response);
				}
		}); 

}

function guarda_datos(id,id_catalogo){
	var parameters = {'item':$("#item_"+id_catalogo).val(),
										'color':$("#color_"+id_catalogo).val(),
										'sufijo':$("#sufijo_"+id_catalogo).val(),
										'cantidad':$("#cantidad_"+id_catalogo).val(),
										'id':id,
										'id_catalogo':id_catalogo}

	$.ajax({
				data: parameters,
				url: '/api/v1/guarda_datos',
				dataType: 'json',
				type:  'get',
				success:  function (response){  
						console.log(response);
						if(response.alerta==0){
							$("#tabla_dependencias").html(response.options);
							$.alert("El item no existe, intente con otro");

						}else{
							$("#tabla_dependencias").html(response.options);
						}
						guarda_detalle(response.id_detalle);
						$('.cantidad-mask').inputmask({ 
												groupSeparator: ".",
												alias: "numeric",
												placeholder: "0",
												autoGroup: !0,
												digits: 0,
												digitsOptional: !1,
												clearMaskOnLostFocus: !1,
												max:9999
										});
						//$("#lista_costs").html(response);
				}
		}); 

}

function buscar_elemento(campo1, campo2){
	$.ajax({
				data: {'campo1':$("#"+campo1).val()},
				url: '/api/v1/buscar_elemento',
				dataType: 'json',
				type:  'get',
				success:  function (response){
					console.log(response);  
					 var len = response.length;
							$("#"+campo2).html('<option value="0">Seleccione una opción</option>');
							for (var i = 0; i < len; i++) {
									$("#"+campo2).append("<option value='"+response[i]+"'>"+response[i]+"</option>");
							}      
				}
		}); 
}

function buscar_cliente_proyecto(tipo){
	$.ajax({
				data: {'tipo':tipo,'clientes':$("#clientes").val(),'proyectos':$("#proyectos").val()},
				url: '/api/v1/buscar_cliente_proyecto',
				dataType: 'json',
				type:  'get',
				success:  function (response){
					$("#div_cliente_proyecto").html(response);
					$(".select2").select2();
					$('.select2-size-xs').select2({
						containerCssClass: 'select-xs'
						});
				}
		}); 
}

function actualiza_cliente_proyecto(tipo){
	$.ajax({
				data: {'tipo':tipo,'clientes':$("#clientes").val(),'proyectos':$("#proyectos").val()},
				url: '/api/v1/actualiza_cliente_proyecto',
				dataType: 'json',
				type:  'get',
				success:  function (response){
					$("#div_cliente_proyecto").html(response);
					$(".select2").select2();
					$('.select2-size-xs').select2({
						containerCssClass: 'select-xs'
						});
				}
		}); 
}


function confirmar_eliminar(id){
				 $.confirm({
						title: 'Hardware collection',
						content: 'Estas seguro deseas elimniar este registro?',
						type:'orange',
						buttons: {
								confirmar: function () {
									$.ajax({
														data: {'id':id},
														url: '/api/v1/confirmar_eliminar',
														dataType: 'json',
														type:  'get',
														success:  function (response){
															window.location.href = '/productos';
														}
												});
								},
								cancelar: function () {}
							} 
					});
		}

function guarda_detalle(id_detalle){
	$.ajax({
				data: {'id_detalle':id_detalle, finish:$("#det_finish").val(), 'style':$("#det_style").val(),'handing':$("#handing").val()},
				url: '/api/v1/guarda_detalle',
				dataType: 'json',
				type:  'get',
				success:  function (response){
						console.log(response);
						$("#detalle_head").html(response.options);
						$("#cotiza_table").html(response.options2);
					}
			}); 
}


function guarda_generales(){

	 var parameters =  {'condiciones':$("#condiciones").val(),
										 'notas':$("#notas").val(),
										 'cuentas':$("#cuentas").val()
									 }
	$.ajax({
				data: parameters,
				url: '/api/v1/guarda_generales',
				dataType: 'json',
				type:  'get',
				success:  function (response){  
						$.alert("Información actualizada");
				}
		}); 
 

}




function nuevo_dibujo(id_proyecto){
 

	 var formData = new FormData($("#formUpload")[0]);
	 

		$.blockUI({ message: 'Proccesing, please wait.' }); 
		$.ajax({
						url:"/api/v1/ajaxupload",
						type: 'POST',
						method: "POST",        
						data:  formData,
						//async: false,
						cache: false,
						contentType: false,
						processData: false,
						success: function(respuesta){ 
										//$.alert("loaded document");
							setTimeout($.unblockUI, 2000);
						 $('#myModal').modal('hide');

							 actualiza_fotos(id_proyecto)


						},  
						error: function(XMLHttpRequest, textStatus, errorThrown) { 
							// alert("Status: " + textStatus); alert("Error: " + errorThrown); 
						}   

				});
		
}


function actualiza_fotos(id_proyecto){

	$.ajax({
				data: {'id_proyecto':id_proyecto},
				url: '/api/v1/actualiza_fotos',
				dataType: 'json',
				type:  'get',
				success:  function (response){  

					$("#tblFotosProductos-table").html(response);
				}
		}); 
}


function borra_foto(id){     

	 $.confirm({
						title: 'Hardware collection',
						content: 'Estas seguro deseas elimniar esta foto?',
						type:'orange',
						buttons: {
								confirmar: function () {
									
										$.ajax({
													data: {'id':id},
													url: '/api/v1/borra_foto',
													dataType: 'json',
													type:  'get',
													success:  function (response){   

														 actualiza_fotos(response)
													}
											});


								},
								cancelar: function () {}
							} 
					});

}

function enviar_cotizacion(tipo){
 $.ajax({
				data: {'tipo':tipo},
				url: '/api/v1/enviar_cotizacion',
				dataType: 'json',
				type:  'get',
				success:  function (response){  
						window.location.href = '/cotizaciones_lista';
				}
		});  
}



function eliminar_cotizacion(id){

var parameters = {
										'id':id
										}
 

	$.confirm({
						title: 'Hardware collection',
						content: 'Estas seguro deseas elimniar esta cotización?',
						type:'orange',
						buttons: {
								confirmar: function () {
									$.ajax({
													data: parameters,
													url: '/api/v1/elimina_cot',
													dataType: 'json',
													type:  'get',
													success:  function (response) {  
														window.location.href = '/cotizaciones_lista';
													}
											}); 

								},
								cancelar: function () {}
							}  
					});

}


function actualiza_cots(){

 $.ajax({
					data: parameters,
					url: '/api/v1/actualiza_cots',
					dataType: 'json',
					type:  'get',
					success:  function (response) {  
							
							alert(response);
						 
						 $("#tablac").html(response);
					}
			});


}


function guarda_cot_not(id_cot){

var nota= $("#nota").val();

$.ajax({
				data: {'id_cot':id_cot,'nota':nota},
				url: '/api/v1/guarda_cot_not',
				dataType: 'json',
				type:  'get',
				success:  function (response){  
						console.log(1);
				}
		});  

}


function enviar_produccion(){
	$.confirm({
		title: 'Hardware',
		type: 'red',
		typeAnimated: true,
		theme: 'supervan',
		content: 'Estas seguro deseas enviar los productos a produccion',
		buttons: {
				tryAgain: {
						text: 'Confirmar',
						btnClass: 'btn-blue',
						action: function(){
							$.ajax({
										data: '',
										url: '/api/v1/enviar_produccion',
										dataType: 'json',
										type:  'get',
										success:  function (response){  
											$.alert('Los productos se enviaron a produccion correctamente');
										}
								});
						}
				},
				close: function () {
				}
		}
});

	
}