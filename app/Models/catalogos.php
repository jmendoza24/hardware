<?php

namespace App\Models;

use Eloquent as Model;
use App\Models\familia;
use App\Models\categoria;
use App\Models\subcategorias;
use App\Models\Sub_baldwin;
use App\Models\disenio;
use App\Models\item;
use App\Models\sufijos;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
/**
 * Class catalogos
 * @package App\Models
 * @version May 20, 2020, 3:06 pm UTC
 *
 * @property integer fabricante
 * @property string catalogo
 */
class catalogos extends Model
{
 #   use SoftDeletes;

    public $table = 'catalogos';

    #protected $dates = ['deleted_at'];



    public $fillable = [
        'fabricante',
        'catalogo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fabricante' => 'integer',
        'catalogo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    function get_municipios($filtro){

        $municipios = DB::table('tbl_estadosmun as em')
                        ->join('tbl_municipios as m', 'em.municipios_id','=','m.id')
                        ->where('em.estados_id',$filtro->id_estado)
                        ->selectraw('m.*')
                        ->orderby('m.municipio')
                        ->get();
        return $municipios; 
    }


    function lista_catalogo(){
        return db::table('catalogos as c')
                ->join('tbl_fabricantes as f','f.id_fabricante','c.fabricante')
                ->selectraw('c.id, c.catalogo, f.fabricante, id_fabricante, c.abrev')
                ->get();
    }

    function obtiene_catalogo($filtro){
        if($filtro->tipo==1){
            $catalogo = catalogos::where('fabricante',$filtro->fabricante)
                        ->selectraw('id as campo1, catalogo as campo2')
                        ->orderby('catalogo','asc')
                        ->get();
        }else if($filtro->tipo==2){
            $catalogo = familia::where('catalogo',$filtro->catalogo)
                        ->selectraw('id as campo1, familia as campo2')
                        ->orderby('familia')
                        ->get();
            $arr = array('catalogo'=>$catalogo);
        }else if($filtro->tipo==3){
            $catalogo = categoria::where('familia',$filtro->familia)
                        ->selectraw('id as campo1, categoria as campo2')
                        ->orderby('categoria')
                        ->get();
        }else if($filtro->tipo==4){
            $catalogo = subcategorias::where('categoria',$filtro->categoria)
                        ->selectraw('id as campo1, subcategoria as campo2')
                        ->orderby('subcategoria')
                        ->get();
        }else if($filtro->tipo==5){
            $catalogo = disenio::where('subcategoria',$filtro->subcategoria)
                        ->selectraw('id as campo1, disenio as campo2')
                        ->orderby('disenio')
                        ->get();
        }else if($filtro->tipo==6){
            $catalogo = item::where('disenio',$filtro->disenio)
                        ->selectraw('id as campo1, item as campo2')
                        ->orderby('item')
                        ->get();
        }
        
        
        /**if($filtro->fabricante==77 && $filtro->categoria >0 && $filtro->subcategoria > 0){
            $sufijo = db::select('call proceso_obtiene_sufijos('.$filtro->categoria.','.$filtro->subcategoria.')');
            if($sufijo[0]->campo1 == '0'){
                $sufijo = array();
            }
        }else{
            $sufijo = array();
            $sufijo = (object)$sufijo;
        }
        */
        
    
        if($filtro->fabricante==77){
            $grupo_suf = Sub_baldwin::where([['fabricante',$filtro->fabricante],['variable',2]])
                            ->selectraw('subcatalogo as campo1, subcatalogo as campo2')
                            ->orderby('subcatalogo')
                            ->get();
        }else{
            $grupo_suf = array('campo1'=>'',
                               'campo2'=>'');
            $grupo_suf = (object)$grupo_suf;
            
        }

        $arr = array('catalogo'=>$catalogo,
                     'sufijos'=>[],
                     'grupo_suf'=>$grupo_suf);
        
        return $arr;
    }

    function obtiene_catalogo2($filtro){
        if($filtro->tipo==1){
            $catalogo = catalogos::where('fabricante',$filtro->id)
                        ->selectraw('id as campo1, catalogo as campo2')
                        ->orderby('catalogo')
                        ->get();
        }else if($filtro->tipo==2){
            $catalogo = familia::where('catalogo',$filtro->id)
                        ->selectraw('id as campo1, familia as campo2')
                        ->orderby('familia')
                        ->get();
            $arr = array('catalogo'=>$catalogo);
        }else if($filtro->tipo==3){
            $catalogo = categoria::where('familia',$filtro->id)
                        ->selectraw('id as campo1, categoria as campo2')
                        ->orderby('categoria')
                        ->get();
        }else if($filtro->tipo==4){
            $catalogo = subcategorias::where('categoria',$filtro->id)
                        ->selectraw('id as campo1, subcategoria as campo2')
                        ->orderby('subcategoria')
                        ->get();
        }else if($filtro->tipo==5){
            $catalogo = disenio::where('subcategoria',$filtro->id)
                        ->selectraw('id as campo1, disenio as campo2')
                        ->orderby('disenio') 
                        ->get();
        }else if($filtro->tipo==6){
            $catalogo = item::where('disenio',$filtro->id)
                        ->selectraw('id as campo1, item as campo2')
                        ->orderby('item') 
                        ->get();
        }

        $arr = array('catalogo'=>$catalogo);
        
        return $arr;
    }
    
}
