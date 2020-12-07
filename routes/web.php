<?php 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('clientes', 'ClientesController');
	Route::resource('fabricantes', 'FabricantesController');
	Route::resource('productos', 'productosController');
	Route::resource('catalogos', 'CatalogosController');
	Route::resource('familias', 'familiaController');
	Route::resource('categorias', 'categoriaController');
	Route::resource('subcategorias', 'subcategoriasController');
	Route::resource('disenios', 'disenioController');
	Route::resource('items', 'itemController');
	Route::resource('formulas', 'formulasController');
	Route::resource('proyectos', 'proyectosController');
	Route::resource('proyectosClientes', 'proyectos_clientesController');
	Route::resource('proyectosFiles', 'proyectos_filesController');

	Route::get('subEmtek', 'Sub_baldwinController@subEmtek')->name('subEmtek.index');
	Route::get('lista_familias/{id_catalogo}/listado', 'CatalogosController@lista_familias')->name('familias.lista');
	Route::get('lista_categorias/{id_familia}/listado', 'CatalogosController@lista_categorias')->name('categorias.lista');
	Route::get('lista_subcategorias/{id_categoria}/listado', 'CatalogosController@lista_subcategorias')->name('subcategorias.lista');
	Route::get('lista_disenio/{subcategoria}/listado', 'CatalogosController@lista_disenios')->name('disenios.lista');
	Route::get('lista_items/{disenio}/listado', 'CatalogosController@lista_items')->name('items.lista');
	Route::resource('subBaldwins', 'Sub_baldwinController');
	Route::resource('sufijos', 'sufijosController');
	Route::get('productos_masivo', 'productosController@productos_masivo')->name('productos_masivo.index');
	Route::get('catalogos_download', 'productosController@catalogos_download')->name('catalogos_download.index');
	Route::get('cotizador', 'cotizadorController@index')->name('cotizador.index');
	Route::get('cotizaciones_lista', 'cotizadorController@lista')->name('cotizador.lista');
	Route::get('cotizaciones_oc', 'cotizadorController@oc')->name('cotizador.oc');

	Route::get('selectores', 'Sub_baldwinController@selectores')->name('selectores.index');
	Route::get('dependencia', 'CatalogosController@dependencia')->name('dependencia.index');
	Route::get('costos', 'FabricantesController@costos')->name('costos.index');

	Route::get('catalogos_generales', 'CatalogosController@catalogos_generales')->name('catalogos_generales');

	Route::resource('tipoClientes', 'tipo_clienteController');

	Route::resource('tipoProyectos', 'tipo_proyectoController');

	Route::resource('tblFotosProductos', 'tbl_fotos_productosController');

	Route::resource('tblOcFabs', 'tbl_oc_fabController');

	Route::get('pedidos', 'tbl_oc_fabController@pedidos')->name('pedidos');

	Route::get('enviadas', 'cotizadorController@enviadas')->name('enviadas');



	
});

	
	
Route::group(['middleware' => 'auth','prefix'=>'api/v1/'], function () {
	Route::get('get_municipios', 'CatalogosController@get_municipios');
	Route::get('inserta_cliente_asignado', 'ClientesController@clientes_asignado');
	Route::get('elimina_cliente_asignado', 'ClientesController@elimina_cliente_asignado');
	Route::get('nuevo_contacto_fab', 'FabricantesController@nuevo_contacto_fab');
	Route::get('guarda_contacto_fab', 'FabricantesController@guarda_contacto_fab');
	Route::get('delete_contacto_fab', 'FabricantesController@delete_contacto_fab');
	Route::get('opciones_catalogo', 'CatalogosController@opciones_catalogo');
	Route::post('guarda_catalogo', 'CatalogosController@guarda_catalogo');
	Route::get('elimina_catalogo', 'CatalogosController@elimina_catalogo');
	Route::get('obtiene_catalogo', 'CatalogosController@obtiene_catalogo');
	Route::get('obtiene_catalogo2', 'CatalogosController@obtiene_catalogo2');
	Route::get('valida_grupo', 'Sub_baldwinController@valida_grupo');
	Route::get('download_excel', 'productosController@download_excel')->name('download.excel');
	Route::get('limpiar_temporal', 'productosController@limpiar_temporal');
	Route::get('detalle_producto', 'cotizadorController@detalle_producto');
	Route::get('agrega_producto', 'cotizadorController@agrega_producto');
	Route::get('elimina_producto', 'cotizadorController@elimina_producto');
	Route::get('agregar_dependencia', 'cotizadorController@agregar_dependencia');
	Route::get('agrega_clientes', 'proyectosController@agrega_clientes');
	Route::get('elimina_clientes', 'proyectosController@elimina_clientes');
	Route::get('guarda_info_cotizacion', 'cotizadorController@guarda_info_cotizacion');
	Route::get('guardar_descuentos', 'cotizadorController@guardar_descuentos');
	Route::get('guarda_costo', 'FabricantesController@guarda_costo');
	Route::get('guarda_datos', 'cotizadorController@guarda_datos');
	Route::get('buscar_elemento', 'productosController@buscar_elemento');
	Route::get('buscar_cliente_proyecto', 'cotizadorController@buscar_cliente_proyecto');
	Route::get('actualiza_cliente_proyecto', 'cotizadorController@actualiza_cliente_proyecto');
	Route::get('confirmar_eliminar', 'productosController@confirmar_eliminar');
	Route::get('guarda_detalle', 'cotizadorController@guarda_detalle');
	Route::get('guarda_comentarios', 'proyectosController@guarda_comentarios');
	Route::get('baja_cotiza_pdf', 'cotizadorController@baja_cotiza_pdf');
	Route::get('guarda_generales', 'CatalogosController@guarda_generales');
	Route::get('/nuevo_dibujo', 'productosController@nuevo_dibujo');	
	Route::POST('/ajaxupload', 'tbl_fotos_productosController@store')->name('ajaxupload');
	Route::get('actualiza_fotos', 'tbl_fotos_productosController@actualiza_fotos');
	Route::get('borra_foto', 'tbl_fotos_productosController@destroy');
	Route::get('revive_cotizacion/{id_cotizacion}', 'cotizadorController@revive_cotizacion')->name('cotizador.revive');
	Route::get('elimina_cot', 'cotizadorController@elimina_cot');
	Route::get('actualiza_cots', 'cotizadorController@actualiza_cots');
	Route::get('guarda_cot_not', 'cotizadorController@guarda_cot_not');
	Route::get('enviar_produccion', 'productosController@enviar_produccion');

	Route::get('cambia_oc', 'cotizadorController@oc_cambia');
	Route::get('oc_cambia2', 'cotizadorController@oc_cambia2');
	Route::get('agrega_producto_oc', 'tbl_oc_fabController@agrega_producto_oc');

	Route::get('buscar_producto', 'productosController@buscar_producto');
	Route::get('duplica_cotizacion', 'cotizadorController@duplica_cotizacion');


	Route::get('enviar_cotizacion2', 'cotizadorController@enviar_cotizacion2');

	Route::get('finaliza_pedido', 'tbl_oc_fabController@finaliza_pedido');

	Route::get('ver_pedidos', 'tbl_oc_fabController@ver_pedidos');
	Route::get('estatus_pedido2', 'tbl_oc_fabController@estatus_pedido2');



});


