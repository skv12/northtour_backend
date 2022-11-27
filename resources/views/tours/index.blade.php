@extends('layouts.header')
@section('content')
    <div>
        @foreach($tours as $tour)
        <div><a href="{{route('tour.show', $tour->id)}}">{{$tour->title}}</a></div>
        @endforeach
    </div>
@endsection
