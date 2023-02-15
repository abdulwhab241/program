<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddPaernt extends Component
{
    // public function render()
    // {
    //     return view('livewire.add-paernt');
    // }


    public $currentStep = 1,

    // Father_INPUTS
    $Email, $Password,
    $Name_Father, $Employer,
    $Job_Father, $Father_Phone,
    $Jop_Phone, $Home_Phone, 
    $Address_Father,

    // Mother_INPUTS
    $Name_Mother, $Phone_Mother,
    $Job_Mother;

public function render()
{
    return view('livewire.add-paernt');

}

//firstStepSubmit
public function firstStepSubmit()
{
    $this->currentStep = 2;
}

//secondStepSubmit
public function secondStepSubmit()
{
    $this->currentStep = 3;
}


//back
public function back($step)
{
    $this->currentStep = $step;
}

}
