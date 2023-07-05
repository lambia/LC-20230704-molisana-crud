@extends('layouts.app')

@section('content')
<div class="container my-3">
    
    <div class="row g-4">
        <div class="col">
            <a class="btn btn-primary" href="{{ route("home") }}">Torna alla lista prodotti</a>
            <a class="btn btn-primary" href="{{ route("products.edit", $product) }}">Modifica questo prodotto</a>
            <form action="{{ route('products.destroy', $product) }}" method="post">
                @csrf
                @method('DELETE')
                <input class="btn btn-danger" type="submit" value="Cancella il prodotto">
            </form>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12">
            <h1>{{$product->title}}</h1>
            <div>
                <small>Tempo di cottura: {{$product->cooking_time}} - Confezione da: {{$product->weight}} - Pasta di tipo: {{$product->type}}</small>
            </div>
            <p>{{$product->description}}</p>
            {{-- Nel caso si tratti di risorse interne usate src="{{ Vite::asset('resources/img/file.png') }}" --}}
            @if ($product->image)
                <img src="{{$product->image}}" alt="{{$product->title}}">
            @else
                <img src="https://i0.wp.com/theperfectroundgolf.com/wp-content/uploads/2022/04/placeholder.png" alt="{{$product->title}}">
            @endif
        </div>
    </div>

</div>
@endsection