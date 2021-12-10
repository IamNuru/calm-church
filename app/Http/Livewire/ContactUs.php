<?php

namespace App\Http\Livewire;

use App\Models\Inmail;
use Livewire\Component;

class ContactUs extends Component
{
    public $name;
    public $email;
    public $phone;
    public $message;

    protected $rules = [
        'name' => 'required|string|min:2|max:20',
        'phone' => 'required|string|min:10|max:20',
        'email' => 'required|string|email',
        'message' => 'required|string|min:3|max:500',
    ];

    public function render()
    {
        return view('livewire.contact-us');
    }

    public function submit(){
        $vaildData = $this->validate();
        $app = Inmail::create($vaildData);
        if ($app) {
            session()->flash('success', 'Thank you for concting us, we would get back to you very soon... shalom');
            return $this->clear();
        } else {            
            session()->flash('error', 'Something went wrong. Refresh and try again');
        }
        
    }


    public function clear(){
        $this->name="";
        $this->email="";
        $this->phone="";
        $this->message="";
    }
}
