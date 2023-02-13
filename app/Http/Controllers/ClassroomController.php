<?php 

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Requests\ClassroomRequest;

class ClassroomController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $My_Classes = Classroom::all();
    $Grades = Grade::all();
    return view('pages.Classrooms.index',compact('My_Classes','Grades'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(ClassroomRequest $request)
  {
    $List_Classes = $request->List_Classes;
    try
        {
          $validated = $request->validated();
          foreach ($List_Classes as $list) {
            $My_Classes = new Classroom();
            $My_Classes->Name_Class = $list['Name'];
            $My_Classes->Grade_id = $list['Grade_id'];

            $My_Classes->save();
          }
            toastr()->success(trans('main_trans.success'));
            return redirect()->route('Classrooms.index');
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
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(ClassroomRequest $request)
  {


    try
    {
      $validated = $request->validated();
      $Classrooms = Classroom::findOrFail($request->id);
      $Classrooms->update([
        $Classrooms->Name_Class = $request->Name,
        $Classrooms->Grade_id = $request->Grade_id,
      ]);
        toastr()->success(trans('main_trans.success'));
        return redirect()->route('Classrooms.index');
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
   * @return Response
   */
  public function destroy(ClassroomRequest $request)
  {
    $Classrooms = Classroom::findOrFail($request->id)->delete(); 
    toastr()->warning(trans('main_trans.delete'));
    return redirect()->route('Classrooms.index');
  }

  public function delete_all(Request $request)
  {
      $delete_all_id = explode(",", $request->delete_all_id);

      Classroom::whereIn('id', $delete_all_id)->Delete();
      toastr()->error(trans('messages.Delete'));
      return redirect()->route('Classrooms.index');
  }


  public function Filter_Classes(Request $request)
  {
      $Grades = Grade::all();
      $Search = Classroom::select('*')->where('Grade_id','=',$request->Grade_id)->get();
      return view('pages.Classrooms.index',compact('Grades'))->withDetails($Search);

  }

  
}

?>