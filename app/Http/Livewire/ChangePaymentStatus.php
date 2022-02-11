<?php

namespace App\Http\Livewire;

use App\Models\UserPayment;
use Livewire\Component;

class ChangePaymentStatus extends Component
{
    public $isLoading = true;
    public $payment;
    public $value;
    protected $listeners = ["preparePaymentStatus"];

    public function preparePaymentStatus(UserPayment $payment, $value){
        $this->payment = $payment;
        $this->value = $value;
        $this->isLoading = false;
    }

    public function change(){
        $this->payment->update(["status" => $this->value]);
        if($this->value == 0){
            $this->payment->user()->update(["paid_status" => 0]);
        }else if($this->value == 1){
            $this->payment->user()->update(["paid_status" => 1]);
        }
        $this->emit("PaymentStatusChangedSuccessfully", "Alhamdulillah! Payment status changed succesfully");
    }
    
    public function render()
    {
        return view('livewire.change-payment-status');
    }
}