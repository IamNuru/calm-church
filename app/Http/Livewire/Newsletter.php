<?php

namespace App\Http\Livewire;

use App\Mail\SubscriptionWelcomeMail;
use Livewire\Component;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;

class Newsletter extends Component
{

    public $email;


    public function render()
    {
        return view('livewire.newsletter');
    }

    public function submit(){
        $datas = $this->validate([
            'email' => 'required|string|min:5|email|unique:subscribers,email',
        ]);
        $sub = new Subscriber;
        $sub->email = $this->email;
        $sub->save();
        if ($sub) {
            session()->flash('success', 'Thanks for subscribing to our newsletter');
            $this->welcomeEmail($sub);
            return $this->clear();
        } else {            
            session()->flash('error', 'Something went wrong. Refresh and try again');
        }
        
    }


    public function clear(){
        $this->email="";
    }

    public function welcomeEmail($data){
        Mail::to($this->email)->send(new SubscriptionWelcomeMail($data));
        return new SubscriptionWelcomeMail($data);
    }
}
