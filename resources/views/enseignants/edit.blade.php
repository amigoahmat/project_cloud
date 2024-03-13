@extends('layouts')
@section('content')

<main id="main" class="main">

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Modifier une Salle</h5>

                        <form action="{{ route('enseignants.update', $enseignant->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="{{ $enseignant->nom }}">
                            </div>
                            <div class="mb-3">
                                <label for="prenom" class="form-label">Prenom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $enseignant->prenom }}">
                            </div>
                            <div class="mb-3">
                                <label for="grade" class="form-label">Grade</label>
                                <input type="text" class="form-control" id="grade" name="grade" value="{{ $enseignant->grade }}">
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
