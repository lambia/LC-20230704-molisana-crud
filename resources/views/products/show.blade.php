@extends('layouts.app')

@section('content')
<div class="container my-3">
    <h1>Dettagli: {{$product->title}}</h1>
    <div class="row g-4">
        <div class="col">
            <a href="{{ route("home") }}">Torna alla lista prodotti</a>
        </div>
    </div>

</div>
@endsection