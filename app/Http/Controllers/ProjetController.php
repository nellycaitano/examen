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
        $projets = Projet::all();
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

        $request->validate([
            //systeme dee validation 
            'codeProjet' => 'required',
            'nomProjet' => 'required',
            'dateLancement' => 'required',
            'duree' => 'required',
            'localite' => 'required',

        ]);
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
        
        $projets = Projet::findOrFail($id);
        $localites = Localite::all();
        return view(route('projet.edit'), compact('projets','localites'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projet $projet)
    {
       // système de validation
       $request->validate([
        'codeProjet' => 'required',
        'nomProjet' => 'required',
        'dateLancement' => 'required',
        'duree' => 'required',
        'localite' => 'required',
    ]);

        $projets = Projet::find($id);
        
        // Mise à jour des attributs du projet
        $projet->codeProjet = $request->codeProjet;
        $projet->nomProjet = $request->nomProjet;
        $projet->dateLancement = $request->dateLancement;
        $projet->duree = $request->duree;
        $projet->localite_id = $request->localite;

        $projet->update();

        // Redirection avec message de succès
        return redirect()->route('projet.list')->with('message', 'Projet modifié avec succès');
 


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projet $projet)
    {
        //
    }
}


