@extends('layouts.app') <!-- Dit verwijst naar je app.blade.php layout, je hoeft dit niet te wijzigen, tenzij je een andere naam hebt voor je layout bestand -->

@section('content')
  <div class="container" style="margin:40px;">
    <h1 class="display-3">Huis</h1>
    <div>
      <a href="/huis/create" class="btn btn-primary mb-3">Add Huis</a>
    </div> 
    <table class="table">
      <thead class="thead-light">
          <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Oppervlakte in m2</th>
            <th>Huur per week</th>
            <th>Updated at</th>
            <th>Acties</th>
            <th></th>
            <th>Beschrijving</th>
          </tr>
      </thead>
      <tbody>
          @foreach($huis as $huis)
          <tr>
              <td>{{ $huis->id }}</td>
              <td>{{ $huis->naam }} </td>
              <td>{{ $huis->oppervlakte_m2 }}</td>
              <td>{{ $huis->huur_per_week }}</td>
              <td>{{ $huis->updated_at }}</td>
              <td><a href="/huis/edit/{{ $huis->id }}" class="btn btn-primary">Edit</a></td>
              <td>
                <form action="/huis/destroy/{{ $huis->id }}" method="post">
                  @csrf
                  <button onclick="return confirm('Are you sure?')" class="btn btn-danger" type="submit">Delete</button>
                </form>
              </td>
              <td>
                <a href="/huis/{{ $huis->id }}/beschrijving" class="btn btn-info">Beschrijving huis</a>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>

   <!-- Modal to display description -->
   <div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="descriptionModalLabel">Huis Beschrijving</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p id="huisDescription">Loading...</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection
