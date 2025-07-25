<?php

namespace App\Http\Livewire;

use App\Models\NewsTags;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class NewsTagTable extends LivewireTableComponent
{
    public $paginationTheme = 'bootstrap-5';

    protected $listeners = ['refresh' => '$refresh', 'resetPageTable'];

    public string $primaryKey = 'news_tags_id';

    protected string $pageName = 'news-tag-table';

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.name'), 'name')
                ->sortable()->searchable(),
            Column::make(__('messages.common.action'))->addClass('w-125px text-start'),
        ];
    }

    public function query(): Builder
    {
        return NewsTags::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.news_tag_table';
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
                'componentName' => 'admin.news_tags.add-button',
            ]);
    }

    public function resetPageTable($pageName = 'news-tag-table')
    {
        $this->customResetPage($pageName);
    }
}
