@php $styleCss = 'style'; @endphp
<div>
    <div
            @if (is_numeric($refresh))
            wire:poll.{{ $refresh }}ms
            @elseif(is_string($refresh))
            @if ($refresh === '.keep-alive' || $refresh === 'keep-alive')
            wire:poll.keep-alive
            @elseif($refresh === '.visible' || $refresh === 'visible')
            wire:poll.visible
            @else
            wire:poll="{{ $refresh }}"
            @endif
            @endif
            class="container-fluid p-0"
    >
        @include('livewire-tables::includes.debug')
        @include('livewire-tables::bootstrap-5.includes.offline')
        @include('livewire-tables::bootstrap-5.includes.sorting-pills')
        @include('livewire-tables::bootstrap-5.includes.filter-pills')

        <div class="d-sm-flex justify-content-between livewire-search-box mb-5">
            <div class="d-sm-flex align-items-center w-100">
                @include('livewire-tables::bootstrap-5.includes.reorder')

                @include('livewire-tables::bootstrap-5.includes.search')

                @if(isset($statusComponent))
                    @include($statusComponent)
                @endif

                @if(isset($componentName))
                    @include($componentName)
                @endif

                @if ($filtersEnabled && $showFilterDropdown)
                    <div class="{{ $showSearch ? 'ms-0 ms-md-2' : '' }} mb-3 mb-md-0">
                        @include('livewire-tables::bootstrap-5.includes.filters')
                    </div>
                @endif
            </div>

            <div class="d-md-flex">
                <div>@include('livewire-tables::bootstrap-5.includes.bulk-actions')</div>
                <div>@include('livewire-tables::bootstrap-5.includes.column-select')</div>
                <div>@include('livewire-tables::bootstrap-5.includes.per-page')</div>
            </div>
        </div>

        @include('livewire-tables::bootstrap-5.includes.table')
        @include('livewire-tables::bootstrap-5.includes.pagination')
    </div>

    @isset($modalsView)
        @include($modalsView)
    @endisset
</div>
