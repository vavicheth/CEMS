@extends('layouts.main')

@section('body_block')
<div class="text-center">
    {!! QrCode::size(300)->generate( $patient_accompany->id); !!}

    <h2>{{ $patient_accompany->name}}</h2>
</div>

@endsection


