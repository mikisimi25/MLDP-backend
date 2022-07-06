<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Lista;
use Illuminate\Http\Request;

/**
 * Class ListaController
 * @package App\Http\Controllers
 */
class ListaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listas = Lista::paginate();

        return view('lista.index', compact('listas'))
            ->with('i', (request()->input('page', 1) - 1) * $listas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lista = new Lista();
        return view('lista.create', compact('lista'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Lista::$rules);

        $lista = Lista::create($request->all());

        return redirect()->route('listas.index')
            ->with('success', 'Lista created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lista = Lista::find($id);

        return view('lista.show', compact('lista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lista = Lista::find($id);

        return view('lista.edit', compact('lista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Lista $lista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lista $lista)
    {
        request()->validate(Lista::$rules);

        $lista->update($request->all());

        return redirect()->route('listas.index')
            ->with('success', 'Lista updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lista = Lista::find($id)->delete();

        return redirect()->route('listas.index')
            ->with('success', 'Lista deleted successfully');
    }
}
