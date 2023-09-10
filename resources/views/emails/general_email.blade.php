
@extends('layouts.base_email')



@section('company')
    SPREADIT
@endsection



@section('title')
    {{ $data['message_title'] ?? 'Spreadit Team' }}
@endsection



@section('content')
    {!! $data['message_body'] ?? 'No message available.' !!}
@endsection



@section('designation')
    {!! $data['message_designation'] ?? 'Spreadit Team' !!}
@endsection