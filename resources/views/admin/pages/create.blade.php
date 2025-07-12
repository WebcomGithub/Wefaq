@extends('admin.layouts.app')
@section('title')
    {{__('messages.page.add_page')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="col-12">
                @include('admin.layouts.errors')
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-end mb-5">
                        <h1>@yield('title')</h1>
                        <a class="btn btn-outline-primary float-end"
                           href="{{ route('pages.index') }}">{{ __('messages.common.back') }}</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        {{ Form::hidden('page_description', null, ['id' => 'pageDescriptionData']) }}
                        {{ Form::open(['route' => 'pages.store','files' => 'true','id'=>'pageCreateForm','enctype' => 'multipart/form-data']) }}
                        @include('admin.pages.fields')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        let attachmentIndex = 1;
        document.getElementById('add-attachment').addEventListener('click', function() {
            let wrapper = document.getElementById('attachments-wrapper');
            let newItem = document.createElement('div');
            newItem.classList.add('attachment-item', 'mb-3', 'row');
            newItem.innerHTML = `
            <div class="col-md-5">
                <input type="text" name="attachments[${attachmentIndex}][title]" class="form-control mb-2" placeholder="File Title">
            </div>
            <div class="col-md-5">
                <input type="file" name="attachments[${attachmentIndex}][file]" class="form-control mb-2">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-attachment">Remove</button>
            </div>
        `;
            wrapper.appendChild(newItem);
            attachmentIndex++;
        });

        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-attachment')) {
                e.target.closest('.attachment-item').remove();
            }
        });
    </script>
@endsection

