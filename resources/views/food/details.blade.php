@extends('layouts.app')

@section('content')
    @if ($food)
    <div class="container">

    <div class="card mb-3">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="{{ asset('images') }}/{{ $food->imgae}}" alt="{{ $food->name }}" width="100%" >
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{ $food->name }}</h5>
              <p class="card-text">{{ $food->price }} $</p>
              <p class="card-text"><small class="text-muted">{{ $food->description }}</small></p>
            </div>
            <hr>
            <div class="d-flex justify-content-center">
                <a href="/" class="btn btn-outline-dark">Go Back</a>
            </div>
          </div>
        </div>

    </div>
</div>
    @else
    <h1>Ooops Nothing Here</h1>
    @endif

@endsection
