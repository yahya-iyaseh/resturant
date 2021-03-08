@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            @if (Session::has('message'))
                <div class="alert alert-success">
                   {{ Session::get('message') }}
                </div>

            @endif
            <form method="POST" action="{{ route('category.store') }}">@csrf
                <div class="card">
                    <div class="card-header">Manage food Category</div>

                      <div class="card-body">
                        <div class="form-group">
                            <input type="name" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-dark">Add</button>
                            <a href="{{ route('category.index') }}" class="btn btn-dark">Go Back</a>
                        </div>
                      </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
