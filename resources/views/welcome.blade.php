@extends('layouts.app')

@section('content')
  <div class="container py-20">
    <div class="mb-5">
        <h2>WELCOME</h2>
        <h3>{{ $user }}</h3>
    </div>
    <div>

    </div>
    <div class="space-y-3">
        <x-alert message="ERROR" type="error" />
        <x-alert message="SUCCESS" type="success" />
        <x-alert class="w-32"  type="success" >
            the alert massage from slot
        </x-alert>
    </div>  
  </div>
@endsection