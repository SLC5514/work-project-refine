@extends('layouts.index')

@section('title', $tdk['t'])
@section('keywords', $tdk['k'])
@section('description', $tdk['d'])

@section('styles')
<link href="{{ asset('css/views/design_world_detail.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <header-com></header-com>

    @include('index.design_world_detail.'.$name, ['activities'=>$activities])

    <footer-com></footer-com>
@endsection

@section('scripts')
<script type="text/javascript" src="https://player.youku.com/jsapi" defer></script>
<script src="{{ asset('js/views/design_world_detail.js') }}" defer></script>
@endsection
