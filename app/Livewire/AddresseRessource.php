<?php

namespace App\Livewire;

use App\Models\Adresse;
use Livewire\Component;

class AddresseRessource extends Component
{
    public $author = '';
    public $first_name = '';
    public $address = '';
    public $phone = '';
    public $email = '';
    public  $pin_code = '';
    public $type = '';

    public ?array $errors = [];

    public function render()
    {
        return view('livewire.addresse-ressource');
    }

    public function save()
    {
        $address =  Adresse::create([
            'author' => $this->author,
            'first_name' => $this->first_name,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'pin_code' => $this->pin_code,
            'type' => $this->type,
            'user_id' => auth()->user()->id
        ]);

        if ($address) {
            return redirect()->route('dashboard.client');
        }
    }
}
