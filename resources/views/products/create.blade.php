@extends('layouts.app')

@section('content')
<div class="container my-3">
    <h1>Create product</h1>
    <div class="row g-4 py-4">
        <div class="col">
            <form action="{{ route('products.store') }}" method="post">
                @csrf
            
                <label for="name">title</label>
                <input class="form-control" type="text" name="title">

                <label for="name">description</label>
                <input class="form-control" type="text" name="description">

                <label for="name">type</label>
                <input class="form-control" type="text" name="type">

                <label for="name">image</label>
                <input class="form-control" type="text" name="image">

                <label for="name">cooking_time</label>
                <input class="form-control" type="text" name="cooking_time">

                <label for="name">weight</label>
                <input class="form-control" type="text" name="weight">

                <input class="form-control mt-4 btn btn-primary" type="submit" value="Invia">
             </form>
        </div>
    </div>

</div>
@endsection