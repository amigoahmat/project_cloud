@extends('layouts')
@section('content')

<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">La liste des etudiants</h5>
                        <div class="col-sm-12">
                            <div class="mb-3 d-flex justify-content-end">
                              <a href="{{route('etudiants.create')}}" class="btn  btn-block btn-primary mx-5 " >Nouveau</a>
                            </div>
                          </div>
                        <!-- Table with stripped rows -->
                        <table class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Nom.</th>
                                    <th>Prenom.</th>
                                    <th>Groupe.</th>
                                    <th><b>C</b>ode Salle</th>
                                    <th>Action.</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($etudiants as $etudiant)
                                <tr>
                                    <td>{{$etudiant ->created_at}}</td>
                                    <td>{{$etudiant ->nom}}</td>
                                    <td>{{$etudiant ->prenom}}</td>
                                    <td>{{$etudiant ->groupe}}</td>
                                    <td>{{$etudiant ->salle_id}}</td>

                                    <td>
                                    <a class='btn btn-sm btn-outline-warning' href='{{route('etudiants.edit', $etudiant ->id)}}' role='button'>Editer</a>

                                    <a class='btn btn-sm btn-outline-danger' href='#'  role='button' onClick="deleteEtudiant({{$etudiant ->id}});">Supprimer</a>

                                    <form action="{{route('etudiants.destroy', $etudiant ->id)}}" method="post" id="delete-{{$etudiant->id}}">
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
        function deleteEtudiant(id) {
            if(confirm('Etes vous sure de vouloir supprimer cette enregistrement ?')){
                document.getElementById('delete-' + id).submit();
            }
        }
    </script>


