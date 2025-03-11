@extends('layouts.app')

@section('content')
<div class="container" style="margin:40px;">
    <h1 class="display-3">Bewerk Huis</h1>  

    <form method="post" action="/huis/update/{{$huis->id}}">
        @csrf
        <div class="form-group">
            <label for="naam">Huis naam:*</label>
            <input type="text" class="form-control" name="naam" value="{{ $huis->naam }}" required />
        </div>

        <div class="form-group">
            <label for="beschrijving">Beschrijving:*</label>
            <input type="text" class="form-control" name="beschrijving" value="{{ $huis->beschrijving }}" required />
        </div>

        <div class="form-group">
            <label for="oppervlakte_m2">Oppervlakte (m²):*</label>
            <input type="number" class="form-control" name="oppervlakte_m2" value="{{ $huis->oppervlakte_m2 }}" required />
        </div>

        <div class="form-group">
            <label for="huur_per_week">Huur per week (€):*</label>
            <input type="number" class="form-control" name="huur_per_week" value="{{ $huis->huur_per_week }}" required />
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
