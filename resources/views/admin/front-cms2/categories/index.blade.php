@extends('admin.layouts.app')
@section('title')
    {{__('messages.categories.categories')}}
@endsection
@php $styleCss = 'style'; @endphp
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="col-12">
                @include('admin.layouts.errors')
                @include('flash::message')
            </div>
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-end mb-5">
                    <h1>@yield('title')</h1>
                </div>
                <div class="card">
                    <div class="card-body">
                        {{ Form::open(['route' => 'categories.update', 'files' => true]) }}
                        @include('admin.front-cms2.categories.fields')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
 
