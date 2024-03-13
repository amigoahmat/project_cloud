<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enseignant;
use Validator;

class EnseignantController extends Controller
{
    public function index()
    {
        $enseignants = Enseignant::get();
        return view('enseignants.index', ['enseignants' => $enseignants]);
    }

    public function create()
    {
        return view('enseignants.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'grade' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('enseignants.index')->withErrors($validator)->withInput();
        }

        $enseignant = new Enseignant();
        $enseignant->nom = $request->nom;
        $enseignant->prenom = $request->prenom;
        $enseignant->grade = $request->grade;

        if ($enseignant->save()) {
            $request->session()->flash('success', 'L\'enseignat a été enregistrée avec succès.');
            return redirect()->route('enseignants.index');
        } else {
            $request->session()->flash('error', 'Une erreur est survenue lors de l\'enregistrement de l\'enseignat.');
            return redirect()->route('enseignants.index')->withErrors($validator)->withInput();
        }
    }

    public function edit($id){
        $enseignant = Enseignant::findOrFail($id);
        return view('enseignants.edit' , ['enseignant' => $enseignant]);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'grade' => 'required',
        ]);

        if ($validator->passes()) {
            $enseignant = Enseignant::find($id);
            $enseignant->nom = $request->nom;
            $enseignant->prenom = $request->prenom;
            $enseignant->grade = $request->grade;

            if ($enseignant->save()) {
                $request->session()->flash('success', 'L\'enseignant a été mise à jour avec succès.');
                return redirect()->route('enseignants.index');
            } else {
                $request->session()->flash('error', 'Une erreur est survenue lors de la mise à jour de lenseignant.');
                return redirect()->route('enseignants.index')->withErrors($validator)->withInput();
            }
        }
    }



    public function destroy(Request $request, $id){
        $enseignant = Enseignant::findOrFail($id);
        $enseignant->delete();

        $request->session()->flash('success', 'Le patient a été supprimé avec succés...!');
        return redirect()->route('enseignants.index');
    }

}
