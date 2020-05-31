@extends('layouts.main')

@section('css_before')
<style>
    /*body {*/
    /*    height: 300px;*/
    /*    width: 300px;*/
    /*    !* to centre page on screen*!*/
    /*    margin-left: auto;*/
    /*    margin-right: auto;*/
    /*}*/

    /*@page {*/
    /*    size: 7in 9.25in;*/
    /*    margin: 27mm 16mm 27mm 16mm;*/
    /*}*/
</style>

@endsection

@section('body_block')
<div class="float-left">
    <div class="text-center">
    {!! QrCode::size(300)->generate( $patient_accompany->id); !!}
{{--    {!! QrCode::size(300)->phoneNumber('012-210-427'); !!}--}}
{{--    {!! QrCode::size(300)->SMS('111-222-6666', 'Body of the message'); !!}--}}
{{--    {!! QrCode::format('png')->merge('http://www.google.com/someimage.png')->generate(); !!}--}}

    <h2>{{ $patient_accompany->name}}</h2>
    </div>
</div>

@endsection

@section('js_after')
    <script>
        window.onload = function () {
            window.print();
            window.onfocus=function(){ window.close();}
        }
    </script>
@endsection


