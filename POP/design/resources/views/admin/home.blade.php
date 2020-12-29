@extends('layouts.back')

@section('content')
@endsection

@section('scripts')
<script>
    @can('admin.ad')
        location.href = '/ad';
    @endcan
    @can('admin.news')
        location.href = '/news';
    @endcan
    @can('admin.users')
        location.href = '/users';
    @endcan
</script>
@endsection
