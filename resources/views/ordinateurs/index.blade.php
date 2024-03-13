@extends('layouts')
@section('content')

<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">La liste des ordinateurs</h5>
                        <div class="col-sm-12">
                            <div class="mb-3 d-flex justify-content-end">
                              <a href="{{route('ordinateurs.create')}}" class="btn  btn-block btn-primary mx-5 " >Nouveau</a>
                            </div>
                          </div>
                        <!-- Table with stripped rows -->
                        <table class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Model.</th>
                                    <th>Ram.</th>
                                    <th>Disque dur.</th>
                                    <th>Action.</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ordinateurs as $ordinateur)
                                <tr>
                                    <td>{{$ordinateur ->created_at}}</td>
                                    <td>{{$ordinateur ->model}}</td>
                                    <td>{{$ordinateur ->ram}}</td>
                                    <td>{{$ordinateur ->disquedur}}</td>

                                    <td>
                                    <a class='btn btn-sm btn-outline-warning' href='{{route('ordinateurs.edit', $ordinateur ->id)}}' role='button'>Editer</a>

                                    <a class='btn btn-sm btn-outline-danger' href='#'  role='button' onClick="deleteOrdinateur({{$ordinateur ->id}});">Supprimer</a>

                                    <form action="{{route('ordinateurs.destroy', $ordinateur ->id)}}" method="post" id="delete-{{$ordinateur->id}}">
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
        function deleteOrdinateur(id) {
            if(confirm('Etes vous sure de vouloir supprimer cette enregistrement ?')){
                document.getElementById('delete-' + id).submit();
            }
        }
    </script>


