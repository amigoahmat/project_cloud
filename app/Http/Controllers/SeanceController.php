<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enseignant;
use App\Models\Salle;
use App\Models\Seance;
use Validator;
use DB;

class SeanceController extends Controller
{

    public function index(){
        $seances = DB::table('seances')
        ->join('salles','seances.salle_id','=','salles.id')
        ->join('enseignants','seances.ens_id','=','enseignants.id')
        ->select('salles.*', 'enseignants.*', 'seances.*')
        ->get();
        return view('seances.index', ['seances' => $seances]);
    }


    public function create()
    {
        $salles = Salle::all();
        $enseignants = Enseignant::all();
        return view('seances.create', ['salles' => $salles, 'enseignants' => $enseignants]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jour_semaine' => 'required',
            'heure' => 'required',
            'groupe' => 'required',
            'salle_id' => 'required|exists:salles,id',
            'ens_id' => 'required|exists:enseignants,id',
        ]);



        if ($validator->fails()) {
            return redirect()->route('seances.create')->withErrors($validator)->withInput();
        }

        $seance = new Seance();
        $seance->jour_semaine = $request->jour_semaine;
        $seance->heure = $request->heure;
        $seance->groupe = $request->groupe;
        $seance->salle_id = $request->salle_id;
        $seance->ens_id = $request->ens_id;

        if ($seance->save()) {
            $request->session()->flash('success', 'La seance a été enregistré avec succès.');
            return redirect()->route('seances.index');
        } else {
            $request->session()->flash('error', 'Une erreur est survenue lors de l\'enregistrement de la seance.');
            return redirect()->route('seances.create')->withErrors($validator)->withInput();
        }
    }

    public function edit($id)
    {
        $seance = seance::findOrFail($id);
        $salles = Salle::all();
        $enseignants = Enseignant::all();
        return view('seances.edit', ['seance' => $seance, 'salles' => $salles, 'enseignants' => $enseignants]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'jour_semaine' => 'required',
            'heure' => 'required',
            'groupe' => 'required',
            'salle_id' => 'required|exists:salles,id',
            'ens_id' => 'required|exists:enseignants,id',
        ]);

        if ($validator->passes()) {
            $seance = Seance::find($id);
            $seance->jour_semaine = $request->jour_semaine;
            $seance->heure = $request->heure;
            $seance->groupe = $request->groupe;
            $seance->salle_id = $request->salle_id;
            $seance->ens_id = $request->ens_id;

            if ($seance->save()) {
                $request->session()->flash('success', 'La seance a été mis à jour avec succès.');
                return redirect()->route('seances.index');
            } else {
                $request->session()->flash('error', 'Une erreur est survenue lors de la mise à jour de la seance.');
                return redirect()->route('seances.edit', $id)->withErrors($validator)->withInput();
            }
        }
    }

    public function destroy(Request $request, $id)
    {
        $seance = Seance::findOrFail($id);
        $seance->delete();

        $request->session()->flash('success', 'L\'étudiant a été supprimé avec succès.');
        return redirect()->route('seances.index');
    }
}
