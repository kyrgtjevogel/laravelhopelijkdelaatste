@extends('layouts.app')

@section('content')
<div class="container" style="margin:40px;">
  <h1 class="display-3">Nieuw Huis Toevoegen</h1>

  @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  <form method="post" action="/huis/store">
      @csrf
      <div class="form-group">    
          <label for="naam">Huis naam:*</label>
          <input type="text" class="form-control" name="naam" required />
      </div>

      <div class="form-group">
          <label for="beschrijving">Beschrijving:*</label>
          <input type="text" class="form-control" name="beschrijving" required />
      </div>

      <div class="form-group">
          <label for="oppervlakte_m2">Oppervlakte (m²):*</label>
          <input type="number" class="form-control" name="oppervlakte_m2" required />
      </div>

      <div class="form-group">
          <label for="huur_per_week">Huur per week (€):*</label>
          <input type="number" class="form-control" name="huur_per_week" required />
      </div>

      <button type="submit" class="btn btn-primary">Voeg Huis Toe</button>
  </form>
</div>
@endsection
