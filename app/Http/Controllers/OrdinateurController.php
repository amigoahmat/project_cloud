<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ordinateur;
use Validator;

class OrdinateurController extends Controller
{
    public function index()
    {
        $ordinateurs = Ordinateur::get();
        return view('ordinateurs.index', ['ordinateurs' => $ordinateurs]);
    }

    public function create()
    {
        return view('ordinateurs.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required',
            'ram' => 'required',
            'disquedur' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('ordinateurs.index')->withErrors($validator)->withInput();
        }

        $ordinateur = new Ordinateur();
        $ordinateur->model = $request->model;
        $ordinateur->ram = $request->ram;
        $ordinateur->disquedur = $request->disquedur;

        if ($ordinateur->save()) {
            $request->session()->flash('success', 'L\'ordinateur a été enregistrée avec succès.');
            return redirect()->route('ordinateurs.index');
        } else {
            $request->session()->flash('error', 'Une erreur est survenue lors de l\'enregistrement de l\'ordinateur.');
            return redirect()->route('ordinateurs.index')->withErrors($validator)->withInput();
        }
    }

    public function edit($id){
        $ordinateur = Ordinateur::findOrFail($id);
        return view('ordinateurs.edit' , ['ordinateur' => $ordinateur]);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required',
            'ram' => 'required',
            'disquedur' => 'required',
        ]);

        if ($validator->passes()) {
            $ordinateur = Ordinateur::find($id);
            $ordinateur->model = $request->model;
            $ordinateur->ram = $request->ram;
            $ordinateur->disquedur = $request->disquedur;

            if ($ordinateur->save()) {
                $request->session()->flash('success', 'L\'Ordinateur a été mise à jour avec succès.');
                return redirect()->route('ordinateurs.index');
            } else {
                $request->session()->flash('error', 'Une erreur est survenue lors de la mise à jour de lOrdinateur.');
                return redirect()->route('ordinateurs.index')->withErrors($validator)->withInput();
            }
        }
    }



    public function destroy(Request $request, $id){
        $ordinateur = Ordinateur::findOrFail($id);
        $ordinateur->delete();

        $request->session()->flash('success', 'Le patient a été supprimé avec succés...!');
        return redirect()->route('ordinateurs.index');
    }

}
