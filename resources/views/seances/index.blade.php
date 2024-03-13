@extends('layouts')
@section('content')

<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">La liste des seances</h5>
                        <div class="col-sm-12">
                            <div class="mb-3 d-flex justify-content-end">
                              <a href="{{route('seances.create')}}" class="btn  btn-block btn-primary mx-5 " >Nouveau</a>
                            </div>
                          </div>
                        <!-- Table with stripped rows -->
                        <table class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Jour.</th>
                                    <th>Heure.</th>
                                    <th>Groupe.</th>
                                    <th><b>C</b>ode Salle</th>
                                    <th><b>E</b>nseignant</th>
                                    <th>Action.</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($seances as $seance)
                                <tr>
                                    <td>{{$seance ->created_at}}</td>
                                    <td>{{$seance ->jour_semaine}}</td>
                                    <td>{{$seance ->heure}}</td>
                                    <td>{{$seance ->groupe}}</td>
                                    <td>{{$seance ->salle_id}}</td>
                                    <td>{{$seance ->nom}}  {{$seance ->prenom}}</td>

                                    <td>
                                    <a class='btn btn-sm btn-outline-warning' href='{{route('seances.edit', $seance ->id)}}' role='button'>Editer</a>

                                    <a class='btn btn-sm btn-outline-danger' href='#'  role='button' onClick="deleteSeance({{$seance ->id}});">Supprimer</a>

                                    <form action="{{route('seances.destroy', $seance ->id)}}" method="post" id="delete-{{$seance->id}}">
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
        function deleteSeance(id) {
            if(confirm('Etes vous sure de vouloir supprimer cette enregistrement ?')){
                document.getElementById('delete-' + id).submit();
            }
        }
    </script>


