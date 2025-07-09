@extends('admin.layouts.app')
@section('title')
    {{__('messages.campaign.edit_campaign')}}
@endsection
@php $styleCss = 'style'; @endphp
@section('header_toolbar')
    <div class="container-fluid">
        <div class="col-12">
            @include('flash::message')
            @include('admin.layouts.errors')
        </div>
        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1 class="mb-0">@yield('title')</h1>
            <div class="text-end mt-4 mt-md-0">
                <a href="{{ route('campaigns.index') }}"
                   class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection

@section('content')
                <div class="container-fluid">
                    <div class="d-flex flex-column">
                        {{ Form::hidden('campaign_is_edit', true, ['id' => 'campaignIsEdit']) }}
                        {{ Form::hidden('edit_campaignDescription', $campaign['description'], ['id' => 'editCampaignDescriptionData']) }}
                        <div class="mt-7 overflow-hidden">
                            <ul class="nav nav-tabs mb-5 pb-1 overflow-auto flex-nowrap text-nowrap" id="myTab" role="tablist">
                                <li class="nav-item position-relative me-7 mb-3" role="presentation">
                                    <button class="nav-link p-0" id="add-basic-details-tab" data-bs-toggle="tab" data-bs-target="#addBasicDetails"
                                            type="button" role="tab" aria-controls="addBasicDetails" aria-selected="true" >
                                        {{ __('messages.campaign.basic_details') }}
                                    </button>
                                </li>
                                <li class="nav-item position-relative me-7 mb-3" role="presentation">
                                    <button class="nav-link p-0 active" id="add-define-goal" data-bs-toggle="tab" data-bs-target="#addDefineGoal"
                                            type="button" role="tab" aria-controls="addDefineGoal" aria-selected="false">
                                        {{ __('messages.campaign.define_goal') }}
                                    </button>
                                </li>
                                <li class="nav-item position-relative me-7 mb-3" role="presentation">
                                    <button class="nav-link p-0" id="add-gallery-tab" data-bs-toggle="tab" data-bs-target="#addGallery"
                                            type="button" role="tab" aria-controls="addGallery" aria-selected="false">
                                        {{ __('messages.campaign.gallery') }}
                                    </button>
                                </li>
                                <li class="nav-item position-relative me-7 mb-3" role="presentation">
                                    <button class="nav-link p-0" id="add-gallery-tab" data-bs-toggle="tab" data-bs-target="#addLang"
                                            type="button" role="tab" aria-controls="addLang" aria-selected="false">
                                        {{ __('messages.campaign.languages') }}
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                <div class="card">
                    @include('admin.campaigns.edit_fields')
                </div>
            </div>
@endsection



@section('js')
    {{-- <script src="https://cdn.tiny.cloud/1/1urw5cscdnze9hew8gcr7tyxcb4b6u92tly1h2xe433kvw92/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
    <script src="https://cdn.tiny.cloud/1/cpq4h32dxb9rg2ml9lmj4dnh5l4mv681a1p9cnxh51kt9k3p/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- إعدادات TinyMCE -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const commonSettings = {
                height: 300,
                menubar: false,
                content_css: 'default',
                plugins: 'advlist autolink lists link charmap preview anchor ' +
                    'searchreplace visualblocks code fullscreen ' +
                    'insertdatetime media table code help wordcount',
                toolbar: 'undo redo | styles | bold italic underline forecolor backcolor | ' +
                    'alignleft aligncenter alignright alignjustify | ' +
                    'bullist numlist outdent indent | link image | removeformat | help',
                block_formats: 'Paragraph=p;Heading 1=h1;Heading 2=h2;Heading 3=h3',
            };
    
            // ENGLISH (description)
            if (document.querySelector('#description')) {
                tinymce.init({
                    ...commonSettings,
                    selector: '#description',
                    directionality: 'ltr',
                    language: 'en',
                });
            }
    
            // ARABIC (description_ar)
            if (document.querySelector('#description_ar')) {
                tinymce.init({
                    ...commonSettings,
                    selector: '#description_ar',
                    directionality: 'rtl',
                    language: 'ar',
                });
            }
    
            // TURKISH (description_tr)
            if (document.querySelector('#description_tr')) {
                tinymce.init({
                    ...commonSettings,
                    selector: '#description_tr',
                    directionality: 'ltr',
                    language: 'tr',
                });
            }
        });
    </script>

<script>
    // تحقق إن لم يتم إعادة تحميل الصفحة بعد
    if (!window.location.href.includes('?reloaded=true')) {
        console.log(true);
        
        // أضف ?reloaded=true للرابط وقم بعمل ريفريش
        const url = new URL(window.location.href);
        url.searchParams.set('reloaded', 'true');
        window.location.replace(url.toString());
    }
</script>
@endsection