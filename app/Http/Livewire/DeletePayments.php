<?php

namespace App\Http\Livewire;

use App\Models\UserPayment;
use Livewire\Component;

class DeletePayments extends Component
{
    public $isLoading = true;
    public $payment;
    protected $listeners = ["preparePaymentDelete"];

    public function preparePaymentDelete(UserPayment $payment){
        $this->payment = $payment;
        $this->isLoading = false;
    }

    public function delete(){
        $this->payment->delete();
        $this->emit("PaymentDeletedSuccessfully", "Alhamdulillah! Payment deleted succesfully");
    }

    public function render()
    {
        return view('livewire.delete-payments');
    }
}