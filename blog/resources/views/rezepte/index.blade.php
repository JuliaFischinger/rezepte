@extends('layouts.app')

@section('content')
<head>
    <title>Die besten Rezepte auf <strong>RezeptBuch </strong></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left my-4">
                <h1>Die besten Rezepte auf <strong>RezepteBuch </strong></h1>
            </div>
            <div class="pull-right mb-4">
                <a class="btn btn-success" href="{{ route('rezepte.create') }}"> Füge ein neues Rezept hinzu.</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    

    <table class="table table-bordered">
        <tr>
            <th>Nr.</th>
            <th>Gericht</th>
            <th>Beschreibung</th>
            <th width="280px">Aktion</th>
        </tr>
        @foreach ($rezepte as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>
                <form action="{{ route('rezepte.destroy',$product->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('rezepte.show',$product->id) }}">Details</a>

                    <a class="btn btn-primary" href="{{ route('rezepte.edit',$product->id) }}">Bearbeiten</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Löschen</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $rezepte->links() !!}
</div>

@endsection