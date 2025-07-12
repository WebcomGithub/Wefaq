<div class="row">
    <div class="mb-5">
        {{ Form::label('name', __('messages.page.page_name').':', ['class' => 'required form-label fs-6']) }}
        {{ Form::text('name', isset($page) ? $page->name:null, ['class' => 'form-control', 'placeholder' => __('messages.page.page_name'),'maxlength'=>'25']) }}
    </div>
    <div class="col-lg-12">
        <div class="mb-5">
            {{ Form::label('title', __('messages.common.title').':', ['class' => 'required form-label']) }}
            {{ Form::text('title', isset($page) ? $page->title:null, ['class' => 'form-control', 'placeholder' => __('messages.common.title'),'maxlength'=>'25']) }}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-5">
            {{ Form::label('description', __('messages.common.description').':', ['class' => 'form-label']) }}
            <div id="pageEditDescription"
                 class="vh-ql-container"></div> {{ Form::hidden('description',isset($page) ? $page->title: null, ['class' => 'form-control', 'name'=>'description']) }}
        </div>
    </div>
    <div id="attachments-wrapper">

        {{-- 🟢 اولا : عرض المرفقات القديمة --}}
        @if (!empty($pageFiles))
            @foreach ($pageFiles as $index => $file)
                <div class="attachment-item mb-3 row existing-attachment">
                    <div class="col-md-5">
                        <input type="text" name="existing_attachments[{{ $index }}][title]"
                               class="form-control mb-2"
                               value="{{ $file['title'] }}"
                               placeholder="File Title">
                    </div>
                    <div class="col-md-5">
                        <a href="{{ asset('uploads/' . $file['filename']) }}" target="_blank">
                            📎 تحميل الملف الحالي
                        </a>
                        <input type="hidden" name="existing_attachments[{{ $index }}][filename]"
                               value="{{ $file['filename'] }}">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger remove-attachment">Remove</button>
                    </div>
                </div>
            @endforeach
        @endif

        {{-- 🟢 ثانيا : النموذج الفارغ لاضافة جديدة --}}
        <div class="attachment-item mb-3 row">
            <div class="col-md-5">
                <input type="text" name="attachments[0][title]" class="form-control mb-2" placeholder="File Title">
            </div>
            <div class="col-md-5">
                <input type="file" name="attachments[0][file]" class="form-control mb-2">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-attachment">Remove</button>
            </div>
        </div>

    </div>
    <button type="button" class="btn btn-success col-lg-3" id="add-attachment">Add Another File</button>


    <div class="d-flex col-lg-12">
        <div class="mb-5">
            {{ Form::label('is_active',__('messages.common.is_active').(':'), ['class' => 'form-label']) }}
            <label class="form-check form-switch ">
                <input type="checkbox" name="is_active"
                       class="form-check-input form-check-custom form-check-solid form-switch-sm cursor-pointer"
                       value="1"
                       id="active" {{ isset($page->is_active) && $page->is_active == 1 ? 'checked':''}}>
                <span class="custom-switch-indicator"></span>
            </label>
        </div>
    </div>
    <div class="d-flex">
        {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-2', "id" => "btnPagedEditSave"]) }}
        <a href="{{ route('pages.index') }}" type="reset"
           class="btn btn-secondary">{{__('messages.common.discard')}}</a>
    </div>
</div>

@section('js')
        <script>
            let attachmentIndex = {{ !empty($pageFiles) ? count($pageFiles) : 1 }};

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
