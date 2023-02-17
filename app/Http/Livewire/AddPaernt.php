<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\My_Parent;
use Illuminate\Support\Facades\Hash;

class AddPaernt extends Component
{
    public $successMessage = '';

    public $catchError;

    public $currentStep = 1,

    // Father_INPUTS
    $Email, $Password,
    $Name_Father, $Employer,
    $Job_Father, $Father_Phone,
    $Jop_Phone, $Home_Phone, 
    $Address_Father,

    // Mother_INPUTS
    $Name_Mother, $Phone_Mother,
    $Job_Mother, $show_table = true, $updateMode = false, $Parent_id;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'Email' => 'required|email',
            'Jop_Phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:8|max:8',
            'Home_Phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:8|max:8',
            'Father_Phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:9',
            'Phone_Mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:9'
        ]);
    }

public function render()
{
    return view('livewire.add-paernt', [
        'my_parents' => My_Parent::all(),
    ]);
}

public function showformadd(){
    $this->show_table = false;
}

//firstStepSubmit
public function firstStepSubmit()
{

    $this->validate([
        'Email' => 'required|unique:my__parents,Email,'.$this->id,
        'Password' => 'required',
        'Name_Father' => 'required',
        'Father_Phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
        'Job_Father' => 'required',
        'Address_Father' => 'required',
    ]);

    $this->currentStep = 2;
}

//secondStepSubmit
public function secondStepSubmit()
{

    
    $this->validate([
        'Name_Mother' => 'required',
        'Job_Mother' => 'required',
    ]);

    $this->currentStep = 3;
}


public function submitForm(){

    try {
        $My_Parent = new My_Parent();
        // Father_INPUTS
        $My_Parent->Email = $this->Email;
        $My_Parent->Password = Hash::make($this->Password);
        $My_Parent->Name_Father = $this->Name_Father;
        $My_Parent->Employer = $this->Employer;
        $My_Parent->Jop_Phone = $this->Jop_Phone;
        $My_Parent->Father_Phone = $this->Father_Phone;
        $My_Parent->Job_Father = $this->Job_Father;
        $My_Parent->Home_Phone = $this->Home_Phone;
        $My_Parent->Address_Father = $this->Address_Father;

        // Mother_INPUTS
        $My_Parent->Name_Mother = $this->Name_Mother;
        $My_Parent->Phone_Mother = $this->Phone_Mother;
        $My_Parent->Job_Mother = $this->Job_Mother;

        $My_Parent->save();
        $this->successMessage = trans('main_trans.success');
        $this->clearForm();
        $this->currentStep = 1;
    }

    catch (\Exception $e) {
        $this->catchError = $e->getMessage();
    };

}

public function edit($id)
{
    $this->show_table =false;
    $this->updateMode = true;
    $My_Parent = My_Parent::where('id',$id)->first();
    $this->Parent_id = $id;
    $this->Email = $My_Parent->Email;
    $this->Password = $My_Parent->Password;
    $this->Name_Father = $My_Parent->Name_Father;
    $this->Employer = $My_Parent->Employer;
    $this->Jop_Phone = $My_Parent->Jop_Phone;
    $this->Father_Phone = $My_Parent->Father_Phone;
    $this->Job_Father = $My_Parent->Job_Father;
    $this->Home_Phone = $My_Parent->Home_Phone;
    $this->Address_Father = $My_Parent->Address_Father;
    $this->Name_Mother = $My_Parent->Name_Mother;
    $this->Phone_Mother = $My_Parent->Phone_Mother;
    $this->Job_Mother = $My_Parent->Job_Mother;


}

public function firstStepSubmit_edit()
{
    $this->updateMode = true;
    $this->currentStep = 2;
}

public function secondStepSubmit_edit()
{
    $this->updateMode = true;
    $this->currentStep = 3;
}

public function submitForm_edit()
{
    if($this->Parent_id)
    {
        $parent = My_Parent::findOrFail($this->Parent_id);
        $parent->update([
            'Email' => $this->Email,
            'Password' => Hash::make($this->Password),
            'Name_Father' => $this->Name_Father,
            'Employer' => $this->Employer,
            'Jop_Phone' => $this->Jop_Phone,
            'Father_Phone' => $this->Father_Phone,
            'Job_Father' => $this->Job_Father,
            'Home_Phone' => $this->Home_Phone,
            'Address_Father' => $this->Address_Father,
            'Name_Mother' => $this->Name_Mother,
            'Phone_Mother' => $this->Phone_Mother,
            'Job_Mother' => $this->Job_Mother,
        ]);

        // $this->successMessage = trans('main_trans.update');
        toastr()->success(trans('main_trans.update'));
        return redirect()->to('/add_parent');
    }
}

public function delete($id){
    My_Parent::findOrFail($id)->delete();
    toastr()->error(trans('main_trans.delete'));
    return redirect()->to('/add_parent');
}

 //clearForm
public function clearForm()
{
    $this->Email = '';
    $this->Password = '';
    $this->Name_Father = '';
    $this->Employer = '';
    $this->Job_Father = '';
    $this->Father_Phone = '';
    $this->Jop_Phone = '';
    $this->Home_Phone = '';
    $this->Address_Father = '';


    $this->Name_Mother = '';
    $this->Phone_Mother = '';
    $this->Job_Mother = '';

}

//back
public function back($step)
{
    $this->currentStep = $step;
}

}
