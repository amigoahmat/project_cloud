@extends('lay')
@section('content')




<main>
    <div class="container">

      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h1 style="font-size: 60px">Bienvenue!!!</h1>
        <h2>Application de gestion des TP</h2>
       <p>Cliquez ici pour le</p> <a class="btn" href="{{route('salles.index')}}">Dashboard</a>
        <img src="assets/img/not-found.svg" class="img-fluid py-5" alt="Page Not Found" width="110", height="120">
                <h2>Les membres de groupe 6</h2>
             <!-- Default Table -->

             <table class="table  ">
                <thead>
                  <tr>
                    <th scope="col">Numero</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Amine</td>
                    <td>Ahmat Yacoub</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Ridouane</td>
                    <td>Mahamat Sadadine</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Moussa</td>
                    <td>Djame</td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>Amine</td>
                    <td>Ahmat Yacoub</td>
                  </tr>
                </tbody>
              </table>
              <!-- End Default Table Example -->
            <


      </section>

    </div>
  </main><!-- End #main -->



@endsection
