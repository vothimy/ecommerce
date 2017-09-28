@extends('templates.public.master')
@section('main-content')
<img src="{{ $publicUrl}}/images/loi404.jpg" height="400px" width="600px">
<a href="{{ route('public.index.index') }}">Quay về trang chủ</a>
@stop		