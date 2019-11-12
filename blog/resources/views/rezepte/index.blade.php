@extends('rezepte.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left my-4">
                <h1>Mein erstes Laravel-Projekt</h1>
            </div>
            <div class="pull-right mb-4">
                <a class="btn btn-success" href="{{ route('rezepte.create') }}"> Neues Rezept hinzufügen</a>
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
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Aktion</th>
        </tr>
        @foreach ($rezepte as $rezept)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $rezept->name }}</td>
            <td>{{ $rezept->detail }}</td>
            <td>
                <form action="{{ route('rezepte.destroy',$rezept->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('rezepte.show',$rezept->id) }}">Details</a>

                    <a class="btn btn-primary" href="{{ route('rezepte.edit',$rezept->id) }}">Bearbeiten</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Löschen</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $rezepte->links() !!}

@endsection