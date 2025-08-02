@extends('admin.layouts.app')
@section('title')
    {{__('messages.brand.brands')}}
@endsection
@php $styleCss = 'style'; @endphp
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:media-section-table/>
        </div>
    </div>
    @include('admin.media_section.create')
    @include('admin.media_section.edit')
@endsection
