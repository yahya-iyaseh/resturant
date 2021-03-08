@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
            @if (Session::has('message'))
            <div class="alert alert-success col">
                {{ Session::get('message') }}
            </div>
            @endif
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                      <th>No</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th>Category</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                @if (count($food)>0)
            @foreach ($food as $key=>$item)
                  <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td>
                <img  src="images/{{ $item->imgae }}" alt="{{ $item->name }}" width="70">
            </td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->price }} $</td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->category->name }}</td>
            <td>
                <a href="{{ route('food.edit', [$item->id]) }}" class="mt-2 btn btn-outline-primary">Edit</a>
                <button class="btn btn-danger mt-2 " data-toggle="modal" data-target="#exam{{$item->id}}">Delete</button>



                <div class="modal" tabindex="-1" id="exam{{$item->id}}" role="dialog">
                    <div class="modal-dialog" role="document">
                        <form action="{{ route('food.destroy',[$item->id]) }}" method="POST">@csrf
                            {{ method_field('DELETE')}}
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Are you Sure</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                            <div class="modal-body">
                          <p>Delete {{ $item->name }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>
                </td>
            </tr>
            @endforeach


            @else
            <tr>
                <td>No Foods</td>
            </tr>
            @endif



        </tbody>
    </table>
    {{ $food->links() }}
              <div class="text-center col-12">
                <a href="{{ route('food.create') }}" class="btn btn-success btn-lg mt-5">Add New</a>
              </div>

    </div>
</div>

@endsection
