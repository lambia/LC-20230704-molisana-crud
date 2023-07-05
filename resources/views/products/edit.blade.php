@extends('layouts.app')

@section('content')
<div class="container my-3">
    <h1>Create product</h1>
    <div class="row g-4 py-4">
        <div class="col">
            <form action="{{ route('products.update', $product->id ) }}" method="post">
                @csrf

                @method("PUT")
            
                <label for="name">title</label>
                <input class="form-control" type="text" name="title" value="{{$product->title}}">

                <label for="name">description</label>
                <textarea name="description" class="form-control" cols="30" rows="5">{{$product->description}}</textarea>

                {{-- Senza direttiva @selected dovremmo gestire manualmente le casistiche: è orribile e non sostenibile --}}
                {{--
                <label for="name">type</label>
                <select class="form-control" name="type">
                    @if ($product->type=="cortissima")
                        <option value="cortissima" selected >Pasta cortissima</option>
                        <option value="corta" >Pasta corta</option>
                        <option value="lunga" >Pasta lunga</option>
                    @elseif ($product->type=="corta")
                        <option value="cortissima" >Pasta cortissima</option>
                        <option value="corta" selected>Pasta corta</option>
                        <option value="lunga" >Pasta lunga</option>
                    @elseif ($product->type=="lunga")
                        <option value="cortissima" >Pasta cortissima</option>
                        <option value="corta" >Pasta corta</option>
                        <option value="lunga" selected>Pasta lunga</option>
                    @endif
                </select>
                --}}

                <label for="name">type</label>
                <select class="form-control" name="type">
                    <option value="cortissima" @selected($product->type=="cortissima") >Pasta cortissima</option>
                    <option value="corta" @selected($product->type=="corta") >Pasta corta</option>
                    <option value="lunga" @selected($product->type=="lunga") >Pasta lunga</option>
                </select>
                
                {{-- @php
                    //questo array potrebbe provenire da config("tipiPasta") oppure da altro dato su db (esempio Model PastaType)
                    $tipiPasta = ["cortissima", "corta", "lunga"];
                @endphp

                <label for="name">type</label>
                <select class="form-control" name="type">
                    @foreach ($tipiPasta as $tipoPasta)
                        <option value="{{$tipoPasta}}" @selected($product->type==$tipoPasta) >Pasta {{$tipoPasta}}</option>
                    @endforeach
                </select> --}}

                <label for="name">image</label>
                <input class="form-control" type="text" name="image" value="{{$product->image}}">

                <label for="name">cooking_time</label>
                <input class="form-control" type="text" name="cooking_time" value="{{$product->cooking_time}}">

                <label for="name">weight</label>
                <input class="form-control" type="text" name="weight" value="{{$product->weight}}">

                <input class="form-control mt-4 btn btn-primary" type="submit" value="Invia">
             </form>
        </div>
    </div>

</div>
@endsection