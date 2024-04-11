<?php

namespace App\Http\Controllers;

use App\Models\Localite;
use App\Models\Projet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        // dd($projets);
        $projets = Projet::paginate(3);
        // foreach ($projets as $projet) {
        //     dump($projet->codeProjet );
        // }
        // dump($projets[4]->codeProjet);
        return view('projet.list', compact('projets'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $localites = Localite::all();
        // $projet = Projet::all();
        return view('projet.create', compact('localites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     //systeme dee validation 
        //     'codeProjet' => 'required',
        //     'nomProjet' => 'required',
        //     'dateLancement' => 'required',
        //     'duree' => 'required',
        //     'localite' => 'required',

        // ]);
        // dd($request->all());
        $projet = new Projet();
        $projet->codeProjet = $request->codeProjet;
        $projet->nomProjet = $request->nomProjet;
        $projet->dateLancement = $request->dateLancement;
        $projet->duree = $request->duree;
        $projet->localite_id = $request->localite;

        $projet->save();

        return redirect(route('projet.list'))->with('status', 'Projet ajouté avec succès');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        $projet = Projet::findOrFail($id);
        $localites = Localite::all();
        return view('projet.edit', compact('projet', 'localites'));


    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request) {
        // $request->validate([
        //     'codeProjet' => 'required',
        //     'nomProjet' => 'required',
        //     'dateLancement' => 'required',
        //     'duree' => 'required',
        //     'localite' => 'required',
        // ]);
    
        // Récupérer le projet à mettre à jour
        $projet = Projet::findOrFail($request->id);
    
        $projet->codeProjet = $request->codeProjet;
        $projet->nomProjet = $request->nomProjet;
        $projet->dateLancement = $request->dateLancement;
        $projet->duree = $request->duree;
        $projet->localite_id = $request->localite;
    
        // Enregistrer les modifications
        $projet->update();
    
        return redirect()->route('projet.list')->with('message', 'Projet modifié avec succès');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $projet = Projet::find($id);
        $projet->delete();

        return redirect()->route('projet.list');
    }
}


