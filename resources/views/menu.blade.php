@extends('templates.carcass')

@section('title', 'Menu')

@section('container-top')
<a href="/generate" class="text-gray-900 dark:text-white">Generate >></a>
@endsection

@section('body')

<div style="text-align:center;margin-bottom:18px;">
    <a class="calendar-nav" style="float:left;" href="/?year={{ $prevYear->year }}"><<</a>
    <span class="calendar-nav">{{ $date->year }}</span>
    <a class="calendar-nav" style="float:right;" href="/?year={{ $nextYear->year }}">>></a>
</div>
@foreach($zodiacs as $zodiac)
<div class="menu-item"><a href="/calendar?year={{ $date->year }}&month=1&zodiac={{ $zodiac->id }}">{{ $zodiac->name }} @if ($zodiac->isBest)<img src="/res/star.svg" width="17px" height="17px" style="vertical-align:baseline;"> @endif @if (isset($zodiac->bestMonth))<span style="font-weight:400;font-size:16px;color:#cccccc;">({{ $zodiac->bestMonth->shortEnglishMonth }})</span>@endif >></a></div>
@endforeach

@endsection