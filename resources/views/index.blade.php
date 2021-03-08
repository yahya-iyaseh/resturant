@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($cat as $item)

        <div class="col-md-12">
            <h2 style="color: blue">{{ $item->name }}</h2>
            <div class="jumbotron">
                <div class="row">
                    @if (count(App\Models\Food::where('categoryId',$item->id)->get())>0)
                    @foreach (App\Models\Food::where('categoryId',$item->id)->get() as $item)


                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 text-center">
                        <img src="{{ asset('images') }}/{{ $item->imgae }}" width="100%" alt="" class="text-center" style="width: 50vw;
                        height: calc( 50vw * 1.25);max-width: 200px; max-height:250px; ">
                        <p class="h3">{{ $item->name }}
                            <span>{{ $item->price }}$</span>
                        </p>
                        <p class="text-center"><a class="btn btn-outline-primary" href="{{ route('food.view', [$item->id]) }}">view</a></p>
                    </div>

                    @endforeach
                    @else
                    <p>Nothing</p>
                    @endif

                </div>
            </div>


        </div>
        @endforeach
    </div>
</div>
@endsection
