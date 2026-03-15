@extends('layout')
@section('content')

<h1>Name: {{ $mycontacts['name'] }}</h1>
<h2>Group: {{ $mycontacts['group'] }}</h2>
<h3>Phone: {{ $mycontacts['phone'] }}</h3>
<h1>ФОТО РЕАЛЬНОЕ!!!</h1>

<img src="{{ asset('additions/sf_arcana.gif') }}" 
     alt="Photo not found" 
     width="900" 
     height="600" 
     style="border-radius: 10px; margin-top: 20px;">

@endsection