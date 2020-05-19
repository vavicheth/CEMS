@extends('layouts.main')

@section('body_block')
<div class="text-center">
{{--    {!! QrCode::size(300)->generate( $patient_accompany->id); !!}--}}
    {!! QrCode::size(300)->phoneNumber('012-210-427'); !!}
    {!! QrCode::size(300)->SMS('111-222-6666', 'Body of the message'); !!}
{{--    {!! QrCode::format('png')->merge('http://www.google.com/someimage.png')->generate(); !!}--}}

    <h2>{{ $patient_accompany->name}}</h2>
</div>

@endsection


