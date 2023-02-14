<?php

namespace App\Http\Controllers;

use toastr;
use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Requests\GradeRequest;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();
        return view('pages.Grades.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GradeRequest $request)
    {
        try
        {
            $validated = $request->validated();
            $Grade = new Grade();
            // $Grade->Nmae = ['en' => $request->Name_en, 'ar' => $request->Name];
            $Grade->Name = $request->Name;
            $Grade->Notes = $request->Notes;
            $Grade->save();
            toastr()->success(trans('main_trans.success'));
            return redirect()->route('Grades.index');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GradeRequest $request)
    {
        try
        {
            $validated = $request->validated();
            $Grade = Grade::findOrFail($request->id);
            $Grade->update([
                $Grade->Name = $request->Name,
                $Grade->Notes = $request->Notes,
            ]);
            toastr()->success(trans('main_trans.update'));
            return redirect()->route('Grades.index');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // $Grade = Grade::findOrFail($request->id)->delete(); 
        // toastr()->warning(trans('main_trans.delete'));
        // return redirect()->route('Grades.index');
    $MyClass_id = Classroom::where('Grade_id',$request->id)->pluck('Grade_id');

    if($MyClass_id->count() == 0){

        $Grades = Grade::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Grades.index');
    }

    else{

        toastr()->error(trans('main_trans.delete_Grade_Error'));
        return redirect()->route('Grades.index');
    }
}

}
