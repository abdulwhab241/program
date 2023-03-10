@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
تعديل اختبار {{$exam->name}}
@stop
@endsection
@section('page-header')
   <!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">تعديل اختبار {{$exam->name}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ trans('main_trans.sid') }}</a></li>
                <li class="breadcrumb-item active">تعديل اختبار {{$exam->name}}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@section('PageTitle')
تعديل اختبار {{$exam->name}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
<div class="col-md-12 mb-30">
<div class="card card-statistics h-100">
    <div class="card-body">

        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>
                    <form action="{{route('Exams.update','test')}}" method="post">
                        {{ method_field('patch') }}
                    @csrf
                    <div class="form-row">

                        <div class="col">
                            <label for="title"> الامتحان</label>
                            <input type="text" name="Name_ar" value="{{ $exam->name }}" class="form-control">
                            <input type="hidden" name="id" value="{{$exam->id}}">
                        </div>

                    </div>
                    <br>
                    <div class="form-row">

                        <div class="col">
                            <div class="form-group">
                                <label for="Grade_id">المادة الدراسية : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="subject_id">
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{$subject->id == $exam->subject_id ? "selected":""}}>{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="Grade_id">اسم المعلم : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="teacher_id">
                                    @foreach($teachers as $teacher)
                                        <option  value="{{ $teacher->id }}" {{$teacher->id == $exam->teacher_id ? "selected":""}}>{{ $teacher->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="col">
                            <div class="form-group">
                                <label for="Grade_id">{{trans('Students_trans.Grade')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Grade_id">
                                    @foreach($grades as $grade)
                                        <option  value="{{ $grade->id }}" {{$grade->id == $exam->grade_id ? "selected":""}}>{{ $grade->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="Classroom_id">{{trans('Students_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Classroom_id">
                                    <option value="{{$exam->classroom_id}}">{{$exam->classroom->Name_Class}}</option>                                            </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="section_id">{{trans('Students_trans.section')}} : </label>
                                <select class="custom-select mr-sm-2" name="section_id">
                                    <option value="{{$exam->section_id}}">{{$exam->section->Name_Section}}</option>
                                </select>
                            </div>
                        </div>
                    </div><br>
                    <button class="btn btn-outline-success btn-sm nextBtn btn-lg pull-right" 
                    style="margin: 5px; padding: 5px;" type="submit">تاكيد البيانات</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
<script>
$(document).ready(function () {
$('select[name="Grade_id"]').on('change', function () {
    var Grade_id = $(this).val();
    if (Grade_id) {
        $.ajax({
            url: "{{ URL::to('classes') }}/" + Grade_id,
            type: "GET",
            dataType: "json",
            success: function (data) {
                $('select[name="Class_id"]').empty();
                $.each(data, function (key, value) {
                    $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
                });
            },
        });
    } else {
        console.log('AJAX load did not work');
    }
});
});
</script>
@endsection