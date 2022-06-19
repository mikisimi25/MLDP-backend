<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lista;
use App\Models\User;
use App\Models\Listas_User;

class ListaController extends Controller
{
    public function getList(Request $request) {
        $listaColection = Lista::with('user')->where('visible',true);

        if(request('id') !== null) {
            $listaColection = $listaColection->where('id',request('id'));
        }

        if(request('public') !== null) {
            $listaColection = $listaColection->where('public',request('public') == 'true');
        }

        if(request('username') !== null) {
            $listaColection = $listaColection->where('username', request('username'));
        }

        if(request('user_list_count') !== null) {
            $listaColection = $listaColection->where('user_list_count', request('user_list_count'));
        }

        return response()->json($listaColection->get(), 200);
    }

    public function getSavedLists( Request $request ) {
        $user = User::where('username', $request->user)->first();

        return response()->json($user->savedLists, 200);
    }

    public function store( Request $request )
    {
        $user = User::where('username', $request->username)->firstOrFail();

        $user_list_count = $user->listas->last()->user_list_count+1;

        $request->merge(['user_list_count' => $user_list_count]);

        $lista = Lista::create($request->input());

        return response()->json($lista, 201);

    }

    public function update( Request $request )
    {
        $lista = Lista::findOrFail($request->list);

        $lista->update($request->input());

        return response()->json($lista);
    }

    public function destroy( Request $request )
    {
        $lista = Lista::findOrFail($request->list);

        $lista->delete();

        return response()->json(null, 200);
    }

    public function addContentToList( Request $request ) {
        $lista = Lista::findOrFail($request->list);
        $lista->contentId = $request->contentId;
        $lista->save();

        return response()->json($lista, 200);
    }

    public function saveList( Request $request ) {
        $lista = Lista::findOrFail($request->list['id']);
        $user = User::findOrFail($request->user['id']);

        $user->savedLists()->attach($lista->id);

        return response()->json($user->savedLists, 201);
    }


}
