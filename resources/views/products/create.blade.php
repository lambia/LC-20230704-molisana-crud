@extends('layouts.app')

@section('content')
<div class="container my-3">
    <h1>Create product</h1>
    	
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
            <form action="{{ route('products.store') }}" method="post" class="needs-validation">
                @csrf
            
                <label>title</label>
                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ old("title") }}">
                @error("title")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="5">{{ old("description") }}</textarea>
                @error("description")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>type</label>
                <select class="form-control @error('type') is-invalid @enderror" name="type">
                    <option value="" @selected(!old("type")) disabled hidden>Seleziona un opzione</option>
                    <option value="cortissima" @selected(old("type")=="cortissima") >Pasta cortissima</option>
                    <option value="corta" @selected(old("type")=="corta")>Pasta corta</option>
                    <option value="lunga" @selected(old("type")=="lunga")>Pasta lunga</option>
                </select>
                @error("type")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>image</label>
                <input class="form-control @error('image') is-invalid @enderror" type="text" name="image" value="{{old("image")}}">
                @error("image")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>cooking_time</label>
                <input class="form-control @error('cooking_time') is-invalid @enderror" type="text" name="cooking_time" value="{{old("cooking_time")}}">
                @error("cooking_time")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>weight</label>
                <input class="form-control @error('weight') is-invalid @enderror" type="text" name="weight" value="{{old("weight")}}">
                @error("weight")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <input class="form-control mt-4 btn btn-primary" type="submit" value="Invia">
             </form>
        </div>
    </div>

</div>
@endsection