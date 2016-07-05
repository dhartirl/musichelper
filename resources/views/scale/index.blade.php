@extends('common.layout')
@section('content')
    @foreach ($scales as $scale)
    <div class="progression progression-{{$scale->id}}">
        <div class="progression-title"><a class="blockyLink" href="/scales/{{$scale->id}}">{{ $scale->name }}</a></div>
    </div>
    @endforeach
@endsection
