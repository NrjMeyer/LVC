<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commande;
use Validator;

class CommandeController extends Controller
{
    // all commands
    public function index()
    {
        $commands = Commande::all()->toArray();
        return array_reverse($commands);
    }

    // add command
    public function add(Request $request)
    {
        $command = new Commande([
            'nom_client' => $request->input('nom_client'),
            'produit' => $request->input('produit'),
            'quantite' => $request->input('quantite'),
            'adresse_livraison' => $request->input('adresse_livraison'),
        ]);
        $command->save();

        return response()->json('The command successfully added');
    }

    // edit command
    public function edit($id)
    {
        $command = Commande::find($id);
        return response()->json($command);
    }

    // update command
    public function update($id, Request $request)
    {
        $command = Commande::find($id);
        $command->update($request->all());

        return response()->json('The command successfully updated');
    }

    // delete command
    public function delete($id)
    {
        $command = Commande::find($id);
        $command->delete();

        return response()->json('The command successfully deleted');
    }
}
