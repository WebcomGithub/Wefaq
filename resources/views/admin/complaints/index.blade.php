@extends('admin.layouts.app')
@section('title')
    {{__('messages.inquiries.inquiries')}}
@endsection
@section('content')
<div class="container-fluid">
    @include('flash::message')
    <div class="d-flex flex-column">
        <livewire:complaints-table/>
    </div>
</div>
@include('admin.complaints.show_modal')
@endsection

