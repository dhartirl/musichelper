@extends('common.layout')
@section('content')
    @foreach ($scales as $scale)
    <div class="scale scale-{{$scale->id}}">
        <div class="scale-title">{{ $scale->name }}</div>
    </div>
    @endforeach
@endsection
