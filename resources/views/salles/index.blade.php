@extends('layouts')
@section('content')

<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">La liste des salles</h5>
                        <div class="col-sm-12">
                            <div class="mb-3 d-flex justify-content-end">
                              <a href="{{route('salles.create')}}" class="btn  btn-block btn-primary mx-5 " >Nouveau</a>
                            </div>
                          </div>
                        <!-- Table with stripped rows -->
                        <table class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th><b>C</b>ode Salle</th>
                                    <th>Superficie.</th>
                                    <th>Action.</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($salles as $salle)
                                <tr>
                                    <td>{{$salle ->created_at}}</td>
                                    <td>{{$salle ->id}}</td>
                                    <td>{{$salle ->superficie}}</td>

                                    <td>
                                    <a class='btn btn-sm btn-outline-warning' href='{{route('salles.edit', $salle ->id)}}' role='button'>Editer</a>

                                    <a class='btn btn-sm btn-outline-danger' href='#'  role='button' onClick="deleteSalle({{$salle ->id}});">Supprimer</a>

                                    <form action="{{route('salles.destroy', $salle ->id)}}" method="post" id="delete-{{$salle->id}}">
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
        function deleteSalle(id) {
            if(confirm('Etes vous sure de vouloir supprimer cette enregistrement ?')){
                document.getElementById('delete-' + id).submit();
            }
        }
    </script>


