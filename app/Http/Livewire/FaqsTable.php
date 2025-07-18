<?php

namespace App\Http\Livewire;

use App\Models\Faqs;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class FaqsTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    protected $listeners = ['refresh' => '$refresh', 'resetPageTable'];

    public string $primaryKey = 'faqs_id';

    protected string $pageName = 'faqs-table';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.title'), 'title')->searchable()
                ->sortable(),
            Column::make(__('messages.common.created_at'), 'created_at')
                ->sortable()->searchable(),
            Column::make(__('messages.common.action'))->addClass('w-125px text-center'),
        ];
    }

    public function query(): Builder
    {
        return Faqs::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.faqs_table';
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
                'componentName' => 'admin.faqs.add-button',
            ]);
    }

    public function resetPageTable($pageName = 'faqs-table')
    {
        $this->customResetPage($pageName);
    }
}
