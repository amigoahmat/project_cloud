@extends('layouts')
@section('content')

<main id="main" class="main">

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Modifier une Salle</h5>

                        <form action="{{ route('salles.update', $salle->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="superficie" class="form-label">Superficie</label>
                                <input type="number" class="form-control" id="superficie" name="superficie" value="{{ $salle->superficie }}">
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
