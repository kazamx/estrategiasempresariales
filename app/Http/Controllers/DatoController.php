<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos_puntovta = DB::table('bs_puntovta')->get();
        return view('index',compact('datos_puntovta'));

        // $datos = DB::select('select nombre_empresas, bs_empresas.id_empresas, codigo_punto, fecha
        //     from bs_empresas inner join bs_puntovta ON bs_empresas.id_empresas = bs_puntovta.id_empresas
        //     inner join bs_acumulavtas ON bs_puntovta.codigo_punto = bs_acumulavtas.codigo_puntovta');
        // return $datos;
        // return "INDEX";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos_empresas = DB::table('bs_empresas')->get();
        $datos_puntovta = DB::table('bs_puntovta')->get();
        // return $datos_puntovta;
        return view('create',compact('datos_empresas','datos_puntovta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos_puntovta = DB::table('bs_puntovta')->get();

        // return $datos_puntovta;
        // return $request;
        
        foreach($datos_puntovta as $puntovta){
            
            if($puntovta->codigo_punto == $request->punto_venta){
                DB::insert('insert into bs_acumulavtas (fecha, valor_venta, codigo_puntovta, id_acumulavtas)
                    values (?, ?, ?, ?)', [$request->fecha, $request->valor,$puntovta->codigo_punto, null]);
                
                
            }
            
        }
        return redirect(route('create'));
    }

    
    // Método que atrapa la consulta para mostrar 
    public function show(Request $request)
    {
        if(false){
            $datos = DB::select('select nombre_empresas, bs_empresas.id_empresas, codigo_punto, fecha, valor_venta
             from bs_empresas inner join bs_puntovta 
             ON bs_empresas.id_empresas = bs_puntovta.id_empresas
             inner join bs_acumulavtas ON bs_puntovta.codigo_punto = bs_acumulavtas.codigo_puntovta
             where fecha = ? and codigo_punto = ?',[$request->fecha,$request->punto_venta]);
            $suma_dato = 0;
            foreach($datos as $dato){
                $suma_dato += $dato->valor_venta;
             }
        }
        if(true){
            $datos_empresa = DB::select('select nombre_empresas, bs_empresas.id_empresas, codigo_punto
             from bs_empresas inner join bs_puntovta 
            ON bs_empresas.id_empresas = bs_puntovta.id_empresas');


            $datos = DB::select('select sum(valor_venta), codigo_puntovta from bs_acumulavtas
                where fecha = ? group by codigo_puntovta', [$request->fecha]);


                $i=0;

            foreach($datos as $dato){
                foreach($datos_empresa as $dato_empresa){
                    if($dato_empresa->codigo_punto === $dato->codigo_puntovta){
                        $dato->nombre_empresa = $dato_empresa->nombre_empresas;
                        $dato->id_empresa = $dato_empresa->id_empresas;
                        $i++;
                    }
                }
            }
            // return $datos_empresa;
            return $datos;

            // $datos = DB::select('select nombre_empresas, bs_empresas.id_empresas, codigo_punto, fecha, valor_venta
            // from bs_empresas inner join bs_puntovta 
            // ON bs_empresas.id_empresas = bs_puntovta.id_empresas
            // inner join bs_acumulavtas ON bs_puntovta.codigo_punto = bs_acumulavtas.codigo_puntovta
            // where fecha = ?',[$request->fecha]);
            // $suma = 0;
            // foreach($datos as $dato){
            //     [$dato->codigo_punto];
            // }

            // $datos = DB::select('select nombre_empresas, bs_empresas.id_empresas, codigo_punto, sum(valor_venta)
            //  from bs_empresas inner join bs_puntovta 
            //  ON bs_empresas.id_empresas = bs_puntovta.id_empresas
            //  inner join bs_acumulavtas ON bs_puntovta.codigo_punto = bs_acumulavtas.codigo_puntovta
            //  group by codigo_puntovta');

            // $datos = DB::select('select valor_venta, codigo_puntovta, nombre_empresas, bs_empresas.id_empresas,
            //  from bs_acumulavtas inner join bs_puntovta
            //  ON  bs_puntovta.codigo_punto = bs_acumulavtas.codigo_puntovta
            //  inner join bs_empresas ON bs_empresas.id_empresas = bs_puntovta.id_empresas
            //  ');
        }
        

        // $datos_empresas = DB::select('select nombre_empresas, bs_empresas.id_empresas from bs_empresas
        //     where active = ?', [1])

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
