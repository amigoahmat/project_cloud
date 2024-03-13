<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salle;
use Validator;

class SalleController extends Controller
{
    public function index()
    {
        $salles = Salle::get();
        return view('salles.index', ['salles' => $salles]);
    }

    public function create()
    {
        return view('salles.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'superficie' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('salles.index')->withErrors($validator)->withInput();
        }

        $salle = new Salle();
        $salle->superficie = $request->superficie;

        if ($salle->save()) {
            $request->session()->flash('success', 'La salle a été enregistrée avec succès.');
            return redirect()->route('salles.index');
        } else {
            $request->session()->flash('error', 'Une erreur est survenue lors de l\'enregistrement de la salle.');
            return redirect()->route('salles.index')->withErrors($validator)->withInput();
        }
    }

    public function edit($id){
        $salle = Salle::findOrFail($id);
        return view('salles.edit' , ['salle' => $salle]);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'superficie' => 'required',
        ]);

        if ($validator->passes()) {
            $salle = Salle::find($id);
            $salle->superficie = $request->superficie;

            if ($salle->save()) {
                $request->session()->flash('success', 'La salle a été mise à jour avec succès.');
                return redirect()->route('salles.index');
            } else {
                $request->session()->flash('error', 'Une erreur est survenue lors de la mise à jour de la salle.');
                return redirect()->route('salles.index')->withErrors($validator)->withInput();
            }
        }
    }



    public function destroy(Request $request, $id){
        $salle = Salle::findOrFail($id);
        $salle->delete();

        $request->session()->flash('success', 'Le patient a été supprimé avec succés...!');
        return redirect()->route('salles.index');
    }

}
