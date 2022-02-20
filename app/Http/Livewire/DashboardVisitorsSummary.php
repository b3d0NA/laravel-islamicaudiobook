<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DashboardVisitorsSummary extends Component
{
    public $visitorCounts;
    public $visitorCategories;

    public $filter = "today";

    protected $listeners = ["jsLoaded" => "emitValues"];

    public function getQueryProperty()
    {
        return DB::table(config('visitor.table_name'))
            ->when($this->filter == "today", function ($q) {
                return $q->select(
                    DB::raw("COUNT(id) as visitor"),
                    DB::raw("DATE(created_at) as categories"),
                )
                    ->whereDate('created_at', now()->toDateString())
                    ->groupBy('categories');
            })
            ->when($this->filter == "month", function ($q) {
                return $q->select(
                    DB::raw("(COUNT(id)) as visitor"),
                    DB::raw("(CONCAT(MONTHNAME(created_at), ' ' ,YEAR(created_at))) as categories")
                )
                    ->groupBy('categories')
                    ->orderBy("id", "ASC");
            })
            ->when($this->filter == "year", function ($q) {
                return $q->select(
                    DB::raw("(COUNT(id)) as visitor"),
                    DB::raw("YEAR(created_at) as categories")
                )
                    ->groupBy('categories')
                    ->orderBy("id", "ASC");
            });
    }

    public function mount()
    {
        $this->visitorCounts = $this->query->pluck("visitor");
        $this->visitorCategories = $this->query->pluck("categories");
        $this->emitValues();
    }

    public function updatedFilter()
    {
        $this->visitorCounts = $this->query->pluck("visitor");
        $this->visitorCategories = $this->query->pluck("categories");
        $this->emitValues();
    }

    public function emitValues()
    {
        $this->dispatchBrowserEvent("summaryUpdate", json_encode(["values" => $this->visitorCounts, "categories" => $this->visitorCategories]));
    }

    public function render()
    {
        return view('livewire.dashboard-visitors-summary');
    }
}
