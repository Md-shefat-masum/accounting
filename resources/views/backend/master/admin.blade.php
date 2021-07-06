@extends('backend.layouts.app')

@section('content')
    <transition name="fade" mode="out-in">
        <router-view></router-view>
    </transition>
@endsection
