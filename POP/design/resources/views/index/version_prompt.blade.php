@extends('layouts.index')

@section('title', config('app.name'))

@section('styles')
<link href="{{ asset('css/views/version_prompt.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <header-com :show="false" :show-line="false"></header-com>

    <div class="content center">
        <img src="{{ asset('images/common/version_prompt.png') }}" alt="">
        <div class="title">您当前浏览器版本过低</div>
        <div class="info">为保证正常使用，请使用谷歌浏览器打开或升级浏览器</div>
        <span class="underline-btn js-continue-visit" onclick="continueFn()">继续访问</span>
    </div>
@endsection

@section('scripts')
<script defer>
function continueFn() {
    generalDef.fn.setSession('isContinue', 1);
    window.history.back();
}
</script>
@endsection
