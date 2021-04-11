@extends('templates.carcass')

@section('title', 'Generate horoscopes')

@section('body')

<h3 style="color:rgb(255,255,255);margin-top:0px;">Generate Horoscopes</h3>
<form method="post">
    <input type="text" id="year" name="year" placeholder="Year" value="{{ old('year') }}"><br>
    @csrf
    <button type="submit">Generate</button>
</form>
@if($errors->any())
    <br>
    @foreach ($errors->all() as $error)
        <span style="color:#ff2d20">{{ $error }}</span>
    @endforeach
@elseif(isset($success) && $success->any())
    <br>
    @foreach ($success->all() as $success)
        <span style="color:#42ff20">{{ $success }}</span>
    @endforeach
@endif

@endsection