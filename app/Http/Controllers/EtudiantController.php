<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Salle;
use Validator;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::with('salle')->get();
        return view('etudiants.index', ['etudiants' => $etudiants]);
    }

    public function create()
    {
        $salles = Salle::all();
        return view('etudiants.create', ['salles' => $salles]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'groupe' => 'required',
            'salle_id' => 'required|exists:salles,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('etudiants.create')->withErrors($validator)->withInput();
        }

        $etudiant = new Etudiant();
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->groupe = $request->groupe;
        $etudiant->salle_id = $request->salle_id;

        if ($etudiant->save()) {
            $request->session()->flash('success', 'L\'étudiant a été enregistré avec succès.');
            return redirect()->route('etudiants.index');
        } else {
            $request->session()->flash('error', 'Une erreur est survenue lors de l\'enregistrement de l\'étudiant.');
            return redirect()->route('etudiants.create')->withErrors($validator)->withInput();
        }
    }

    public function edit($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $salles = Salle::all();
        return view('etudiants.edit', ['etudiant' => $etudiant, 'salles' => $salles]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'groupe' => 'required',
            'salle_id' => 'required|exists:salles,id',
        ]);

        if ($validator->passes()) {
            $etudiant = Etudiant::find($id);
            $etudiant->nom = $request->nom;
            $etudiant->prenom = $request->prenom;
            $etudiant->groupe = $request->groupe;
            $etudiant->salle_id = $request->salle_id;

            if ($etudiant->save()) {
                $request->session()->flash('success', 'L\'étudiant a été mis à jour avec succès.');
                return redirect()->route('etudiants.index');
            } else {
                $request->session()->flash('error', 'Une erreur est survenue lors de la mise à jour de l\'étudiant.');
                return redirect()->route('etudiants.edit', $id)->withErrors($validator)->withInput();
            }
        }
    }

    public function destroy(Request $request, $id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();

        $request->session()->flash('success', 'L\'étudiant a été supprimé avec succès.');
        return redirect()->route('etudiants.index');
    }
}
