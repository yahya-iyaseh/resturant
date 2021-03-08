@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::get('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
            @endif
            <form method="POST" action="{{ route('food.update', [$food->id]) }}" enctype="multipart/form-data">@csrf
              {{ method_field('PUT') }}
                <div class="card">
                    <div class="card-header">Update food Category</div>

                      <div class="card-body">
                        <div class="form-group">
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ $food->name }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <textarea type="text" id="description" name="description" class="mt-3 form-control @error('description') is-invalid @enderror" placeholder="description">{{ $food->description }}</textarea>
                                @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <input type="number" id="price" name="price" class="mt-3 form-control @error('price') is-invalid @enderror" placeholder="price" value="{{ $food->price }}" style="-moz-appearance: textfield;">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <select name="category" class="mt-3 form-control @error('category') is-invalid @enderror" >
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @foreach (App\Models\Category::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="input-group mb-3  mt-3">

                                <div class="custom-file">
                                  <input type="file" class="custom-file-input @error('imgae') is-invalid @enderror" id="imgae" name="imgae">
                                  <label class="custom-file-label" for="imgae">Choose Image</label>
                                </div>
                              </div>
                              @error('imgae')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-dark">Update</button>
                            <a href="{{ route('food.index') }}" class="btn btn-dark">Go Back</a>
                        </div>
                      </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
