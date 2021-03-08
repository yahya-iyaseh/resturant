@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('message'))
            <div class="alert alert-success">
               {{ Session::get('message') }}
            </div>

        @endif
            <div class="card">
                <div class="card-header">All Category</div>

                <div class="card-body text-center">
                    <table class="table">

                            @if (count($categories) > 0)
                            @foreach ($categories as $key=>$item)
                            <tr >
                                <th class="pt-3 h2" scope="row">{{ $key + 1}}</th>
                                <td class="h2">{{ $item->name }}</td>
                                <td><a class="btn btn-outline-primary" href="{{ route('category.edit', [$item->id]) }}">Edit</a></td>
                                <td>

                                        <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$item->id}}">
                                            Delete
                                          </button>
                                          <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('category.destroy',[$item->id]) }}" method="POST">@csrf
                                                    {{ method_field('DELETE')}}
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body text-center text-muted">
                                                  <h2>Are you Want to delete {{ $item->name }}?</h2>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  <button type="submit" class="btn btn-primary">Delete</button>
                                                </div>
                                              </div>
                                                </form>
                                            </div>
                                          </div>

                                </td>
                            </tr>

                            @endforeach
                            @else
                              <td>No Category to Display </td>
                            @endif


                      </table>
                      <div class="text-center">
                        <a href="{{ route('category.create') }}" class="btn btn-success btn-lg">Add New</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
