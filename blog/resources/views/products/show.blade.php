@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left my-4">
                <h2> Detailansicht</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary mb-4" href="{{ route('products.index') }}"> zurück</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p><strong>Name:</strong>
                {{ $product->name }}</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p><strong>Details:</strong>
                {{ $product->detail }}</p>
            </div>
        </div>
    </div>
</div>
@endsection