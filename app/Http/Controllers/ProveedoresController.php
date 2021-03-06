<?php

namespace App\Http\Controllers;

use App\Modelos\proveedores;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    protected $manager;

    public function __construct()
    {
        $this->manager = new proveedores();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sistema.proveedores.lista')
            ->with('proveedores', $this->manager->listarProveedores());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->manager->agregarProveedores($request->all())) {
            return redirect()->route('proveedores.index')->withErrors("Se creo exitosamente el proveedor");
        } else {
            return redirect()->back()->withErrors("No se pudo crear el proveedor");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('sistema.proveedores.ver')
            ->with('datos', $this->manager->buscarProveedor($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->manager->actualizarProveedor($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->manager->eliminarProveedor($id)) {
            return redirect()->route('proveedores.index')->withErrors("Se elimino exitosamente el proveedor");
        } else {
            return redirect()->route('proveedores.index')->withErrors("No se pudeo eliminar el proveedor");
        }
    }
}
