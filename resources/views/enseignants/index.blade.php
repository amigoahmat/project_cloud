@extends('layouts')
@section('content')

<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">La liste des enseignants</h5>
                        <div class="col-sm-12">
                            <div class="mb-3 d-flex justify-content-end">
                              <a href="{{route('enseignants.create')}}" class="btn  btn-block btn-primary mx-5 " >Nouveau</a>
                            </div>
                          </div>
                        <!-- Table with stripped rows -->
                        <table class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Nom.</th>
                                    <th>Prenom.</th>
                                    <th>Grade.</th>
                                    <th>Action.</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($enseignants as $enseignant)
                                <tr>
                                    <td>{{$enseignant ->created_at}}</td>
                                    <td>{{$enseignant ->nom}}</td>
                                    <td>{{$enseignant ->prenom}}</td>
                                    <td>{{$enseignant ->grade}}</td>

                                    <td>
                                    <a class='btn btn-sm btn-outline-warning' href='{{route('enseignants.edit', $enseignant ->id)}}' role='button'>Editer</a>

                                    <a class='btn btn-sm btn-outline-danger' href='#'  role='button' onClick="deleteEnseignant({{$enseignant ->id}});">Supprimer</a>

                                    <form action="{{route('enseignants.destroy', $enseignant ->id)}}" method="post" id="delete-{{$enseignant->id}}">
                                    @csrf
                                                @method('delete')

                                   </form>
                                </td>

                                </tr>
                                @endforeach
                                <!-- Ajoutez d'autres lignes pour vos données -->
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>

@endsection


 <script>
        function deleteEnseignant(id) {
            if(confirm('Etes vous sure de vouloir supprimer cette enregistrement ?')){
                document.getElementById('delete-' + id).submit();
            }
        }
    </script>


