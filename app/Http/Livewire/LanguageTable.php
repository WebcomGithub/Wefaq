<?php

namespace App\Http\Livewire;

use App\Models\Language;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class LanguageTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    protected $listeners = ['refresh' => '$refresh', 'resetPageTable'];

    public string $primaryKey = 'language_id';

    protected string $pageName = 'language-table';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.name'), 'name')
                ->sortable()->searchable(),
            Column::make(__('messages.language.iso_code'), 'iso_code')
                ->sortable()->searchable(),
            Column::make(__('messages.language.translation')),
            Column::make(__('messages.common.action'))->addClass('text-center'),
        ];
    }

    public function query(): Builder
    {
        return Language::query()->select('languages.*');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.language_table';
    }

    public function render()
    {
        return view('livewire-tables::'.config('livewire-tables.theme').'.datatable')
            ->with([
                'columns' => $this->columns(),
                'rowView' => $this->rowView(),
                'filtersView' => $this->filtersView(),
                'customFilters' => $this->filters(),
                'rows' => $this->rows,
                'modalsView' => $this->modalsView(),
                'bulkActions' => $this->bulkActions,
                'componentName' => 'admin.languages.add-button',
            ]);
    }

    public function resetPageTable($pageName = 'language-table')
    {
        $this->customResetPage($pageName);
    }
}
