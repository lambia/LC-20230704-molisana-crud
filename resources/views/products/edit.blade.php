@extends('layouts.app')

@section('content')
<div class="container my-3">
    <h1>Edit product</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row g-4 py-4">
        <div class="col">
            <form action="{{ route('products.update', $product->id ) }}" method="post" class="needs-validation">
                @csrf

                @method("PUT")
            
                <label>title</label>
                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ old("title") ?? $product->title}}" required>
                {{-- OPPURE: ...value="{{ old("title") ? old("title") : $product->title}}"> --}}
                @error("title")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="5">{{ old('description') ?? $product->description }}</textarea>
                @error("description")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>type</label>
                <select class="form-control @error('type') is-invalid @enderror" name="type">
                    {{-- il metodo old() si può usare vari modi:
                        1. old("type") --> restituisce un precedente valore di "type" immesso nel form
                        2. old("type", "valore di default") --> come il precedente, ma in caso non ci siano valori precedenti usa "valore di default"
                        3. old("type", $product->type) --> come il precedente, ma come valore di default usa quanto c'è ATTUALMENTE scritto nel prodotto
                        4. old("type", $product) --> come il precedente, sintassi abbreviata: cerca "type" nei dati usati nell'ultimo form OPPURE nel modello attuale
                    --}}
                    <option value="cortissima" @selected(old('type', $product) == 'cortissima') >Pasta cortissima</option>
                    <option value="corta" @selected(old('type', $product) == 'corta') >Pasta corta</option>
                    <option value="lunga" @selected(old('type', $product) == 'lunga') >Pasta lunga</option>
                </select>
                @error("type")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>image</label>
                <input class="form-control @error('image') is-invalid @enderror" type="text" name="image" value="{{ old('image') ?? $product->image }}">
                @error("image")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>cooking_time</label>
                <input class="form-control @error('cooking_time') is-invalid @enderror" type="text" name="cooking_time" value="{{ old('cooking_time') ?? $product->cooking_time }}">
                @error("cooking_time")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>weight</label>
                <input class="form-control @error('weight') is-invalid @enderror" type="text" name="weight" value="{{ old('weight') ?? $product->weight }}">
                @error("weight")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <input class="form-control mt-4 btn btn-primary" type="submit" value="Invia">
             </form>
        </div>
    </div>

</div>
@endsection