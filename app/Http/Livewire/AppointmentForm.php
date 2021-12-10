<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Appointment;

class AppointmentForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $subject;

    protected $rules = [
        'name' => 'required|string|min:2|max:20',
        'phone' => 'required|string|min:10|max:20',
        'email' => 'required|string|email',
        'subject' => 'required|string|min:3|max:20',
    ];

    public function render()
    {
        return view('livewire.appointment-form');
    }

    public function submit(){
        $vaildData = $this->validate();
        $app = Appointment::create($vaildData);
        if ($app) {
            session()->flash('success', 'Appointment booked succefully, we would get back to you');
            return $this->clear();
        } else {            
            session()->flash('error', 'Something went wrong. Refresh and try again');
        }
        
    }


    public function clear(){
        $this->name="";
        $this->email="";
        $this->phone="";
        $this->subject="";
    }
}
