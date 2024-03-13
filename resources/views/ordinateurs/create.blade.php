@extends('layouts')
@section('content')

<main id="main" class="main">

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Ajouter d'un ordinateur</h5>

                            <form action="{{ route('ordinateurs.store') }}" method="post"  enctype="multipart/form-data">
                                @csrf
                            <div class="mb-3">
                                <label for="model" class="form-label">Model</label>
                                <input type="text" class="form-control" id="model" name="model">
                            </div>
                            <div class="mb-3">
                                <label for="ram" class="form-label">Ram</label>
                                <input type="text" class="form-control" id="ram" name="ram">
                            </div>
                            <div class="mb-3">
                                <label for="disquedur" class="form-label">Disquedur</label>
                                <input type="text" class="form-control" id="disquedur" name="disquedur">
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
