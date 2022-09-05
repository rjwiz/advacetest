<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class Form extends Component
{
    
    public $family_name;
    public $first_name;
    public $gender;
    public $email;
    public $postcode;
    public $address;
    public $building_name;
    public $opinion;

    public $postal_code, $region, $locality, $street_address, $extended_address;

    protected $rules = [
        'family_name' => ['required','max:8'],
        'first_name' => ['required'],
        'gender' => ['required'],
        'email' => ['required','email'],
        'postcode' => ['required'],
        'address' => ['required'],
        'opinion' => ['required'],
    ];

    public function updated($key)
    {
        $this->validateOnly($key);
    }

    public function store()
    {
        $data = $this->validate();

        Contact::create($data);
        return view('thanks');
    }

    public function render()
    {
        return view('livewire.form');
    }

    public function inputYubinbango($postal_code, $region, $locality, $street_address, $extended_address)
    {
        $this->postal_code = $postal_code;
        $this->region = $region;
        $this->locality = $locality;
        $this->street_address = $street_address;
        $this->extended_address = $extended_address;
    }
}
