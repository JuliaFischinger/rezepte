@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>Wilkommen bei <strong>RezeptBuch!</h2>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Hier findest du die besten Rezepte und kannst selbst deine Lieblinsrezepte beitragen.

                </div>
            </div>
        </div>
    </div>
</div>
@endsection