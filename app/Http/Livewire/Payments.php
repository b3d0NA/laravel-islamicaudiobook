<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\UserPayment;
use Livewire\Component;
use Livewire\WithPagination;

class Payments extends Component
{
    use WithPagination;
    
    protected $listeners = ["PaymentDeletedSuccessfully" => '$refresh', "PaymentStatusChangedSuccessfully" => '$refresh'];

    public $search;
    public $payment_status;

    public function getPaymentsProperty(){
        return UserPayment::with("user")
                    ->when($this->search >= 2 , function ($query){
                        $query->Where("name", 'LIKE', '%' . $this->search . '%');
                        $query->orWhere("email", 'LIKE', '%' . $this->search . '%');
                        $query->orWhere("paid_from", 'LIKE', '%' . $this->search . '%');
                        return $query;
                    })
                    ->when($this->payment_status != "" , function ($query){
                        $query->Where("status", $this->payment_status);
                    })
                    
                    ->latest()
                    ->paginate(15);
    }

    public function updatedSearch(){
        $this->resetPage();
    }

    public function updatedPaidStatus(){
        $this->resetPage();
    }

    public function statusChange(UserPayment $payment, $value)
    {
        $this->emit("preparePaymentStatus", $payment, $value);
    }
    
    public function delete($id){
        $this->emit("preparePaymentDelete", UserPayment::findOrFail($id));
    }
    public function render()
    {
        return view('livewire.payments');
    }
}