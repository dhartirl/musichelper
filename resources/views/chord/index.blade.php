@extends('common.layout')
@section('content')
    @foreach ($chords as $chord)
    <div class="progression progression-{{$chord->id}}">
        <div class="progression-title"><a class="blockyLink" href="/chords/{{$chord->id}}/">{{ $chord->name }}</a></div>
    </div>
    @endforeach
@endsection
