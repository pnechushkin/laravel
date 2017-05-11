@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            @if(Auth::check())

                @foreach($task as $value)
               {{$value->id}}<br>
               {{--{{$task->task}}<br>--}}
               {{--{{$task->status}}<br>--}}
               {{--{{$task->created_at}}<br>--}}
               {{--{{$task->updated_at}}<br>--}}
                @endforeach
                @else
                Нет
            @endif
        </div>
    </div>
@endsection