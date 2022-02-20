<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Visitors extends Component
{
    use WithPagination;

    protected $listeners = ["refreshCompo" => '$refresh'];

    public function getVisitorProperty()
    {
        return DB::table(config('visitor.table_name'))
            ->latest()
            ->paginate(15);
    }

    public function delete($id)
    {
        DB::table(config('visitor.table_name'))->where('id', $id)->delete();
        $this->emitSelf("refreshCompo");
    }

    public function view(?int $id = 0)
    {
        $this->emit("prepareUserView", User::findOrFail($id));
    }

    public function deleteAll()
    {
        DB::table(config('visitor.table_name'))->delete();
        $this->emitSelf("refreshCompo");
    }

    public function render()
    {
        return view('livewire.visitors');
    }
}
