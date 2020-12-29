@extends('layouts.back')

@section('content')
<div class="content">
    <div class="login-page-inner">
        <p class="title">登陆</p>
        <form class="el-form" method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="el-form-item">
                <label
                    for="weight"
                    class="el-form-item__label"
                    style="width: 100px;"
                    >用户名</label
                >
                <div class="el-form-item__content" style="margin-left: 100px;">
                    <div class="el-input">
                        <input
                            id="name"
                            type="text"
                            class="el-input__inner @error('name') is-invalid @enderror"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="请输入用户名"
                            required
                            autocomplete="name"
                            autofocus
                        />
                        @error('name')
                        <div class="el-form-item__error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="el-form-item">
                <label
                    for="weight"
                    class="el-form-item__label"
                    style="width: 100px;"
                    >密码</label
                >
                <div class="el-form-item__content" style="margin-left: 100px;">
                    <div class="el-input">
                        <input
                            id="password"
                            type="password"
                            class="el-input__inner @error('password') is-invalid @enderror"
                            name="password"
                            placeholder="请输入密码"
                            required
                            autocomplete="current-password"
                        />
                        @error('password')
                        <div class="el-form-item__error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('记住用户') }}
                        </label>
                    </div>
                </div>
            </div> -->
            <div class="el-form-item">
                <div class="el-form-item__content" style="margin-left: 100px;">
                    <button type="submit" class="el-button el-button--primary">
                        <span>登陆</span>
                    </button>
                    @if (Route::has('password.request'))
                    <a
                        class="el-button el-button--text"
                        href="{{ route('password.request') }}"
                    >
                        {{ __("忘记密码?") }}
                    </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
