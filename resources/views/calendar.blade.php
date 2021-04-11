@extends('templates.carcass')

@section('title', 'Horoscope calendar')

@section('body')

<div style="text-align:center;margin-bottom:18px;">
    <a class="calendar-nav" style="float:left;" href="/calendar?year={{ $prevMonth->year }}&month={{ $prevMonth->month }}&zodiac={{ $zodiac->id }}"><<</a>
    <span class="calendar-nav">{{ $zodiac->name }} - {{ $date->shortEnglishMonth }} {{ $date->year }}</span>
    <a class="calendar-nav" style="float:right;" href="/calendar?year={{ $nextMonth->year }}&month={{ $nextMonth->month }}&zodiac={{ $zodiac->id }}">>></a>
</div>

<table class="calendar">
    <thead>
        <tr>
            <td>Mon</td>
            <td>Tue</td>
            <td>Wed</td>
            <td>Thu</td>
            <td>Fri</td>
            <td>Sat</td>
            <td>Sun</td>
        </tr>
    </thead>
    <tbody>
        <tr>
        @for($i = 1; $i < $date->daysInMonth + $date->dayOfWeek; $i++)

            @if ($i < $date->dayOfWeek)
            <td></td>
            @else

            @if(isset($horoscopes[$i - $date->dayOfWeek]))
            <td class="clickable" style="background-color:{{ $horoscopes[$i - $date->dayOfWeek]->color }};" onclick="horoscopePredict({{$date->year}},{{$date->month}},{{$i - $date->dayOfWeek + 1}},{{$horoscopes[$i - $date->dayOfWeek]->score}},{{$zodiac->id}})">{{ $i - $date->dayOfWeek + 1 }}</td>
            @else
            <td style="background-color:'#ffffff';">{{ $i - $date->dayOfWeek + 1 }}</td>
            @endif

            @endif

            @if ($i % 7 == 0 && $i != $date->daysInMonth + $date->dayOfWeek)
            </tr>
            <tr>
            @endif

        @endfor
        </tr>
    </tbody>
</table>

<p style="width:576px;color:#ffffff;" id="prediction"></p>

@endsection