@extends('layouts')

@section('content')

<main id="main" class="main">

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Ajouter une seance</h5>

                        <form action="{{ route('seances.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="jour_semaine" class="form-label">jour de la semaine</label>
                                <input type="text" class="form-control" id="jour_semaine" name="jour_semaine">
                            </div>

                            <div class="mb-3">
                                <label for="heure" class="form-label">Prénom</label>
                                <input type="time" class="form-control" id="heure" name="heure">
                            </div>

                            <div class="mb-3">
                                <label for="groupe" class="form-label">Groupe</label>
                                <input type="text" class="form-control" id="groupe" name="groupe">
                            </div>

                            <div class="mb-3">
                                <label for="salle_id" class="form-label">Salle</label>
                                <select class="form-select" id="salle_id" name="salle_id">
                                    @foreach($salles as $salle)
                                        <option value="{{ $salle->id }}">{{ $salle->id }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="ens_id" class="form-label">Enseignants</label>
                                <select class="form-select" id="ens_id" name="ens_id">
                                    @foreach($enseignants as $enseignants)
                                        <option value="{{ $enseignants->id }}">{{ $enseignants->nom }}</option>
                                    @endforeach
                                </select>
                            </div>



                            <div class="mb-3 text-center">
                                <button type="submit" class="btn btn-primary">Soumettre</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection
