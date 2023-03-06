@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    اضافة سؤال جديد
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> اضافة سؤال جديد</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ trans('main_trans.sid') }}</a></li>
                <li class="breadcrumb-item active">اضافة سؤال جديد</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@section('PageTitle')
    اضافة سؤال جديد
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
            <form action="{{ route('Questions.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="form-row">

                    <div class="col">
                        <label for="title">اسم السؤال</label>
                        <input type="text" name="title" id="input-name"
                                class="form-control form-control-alternative" autofocus>
                        <input type="hidden" value="{{$exam_id}}" name="exam_id">
                    </div>
                </div>
                <br>

                <div class="form-row">
                    <div class="col">
                        <label for="title">الاجابات</label>
                        <textarea name="answers" class="form-control" id="exampleFormControlTextarea1"
                                    rows="4"></textarea>
                    </div>
                </div>
                <br>

                <div class="form-row">
                    <div class="col">
                        <label for="title">الاجابة الصحيحة</label>
                        <input type="text" name="right_answer" id="input-name"
                                class="form-control form-control-alternative" autofocus>
                    </div>
                </div>
                <br>

                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="Grade_id">الدرجة : <span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="score">
                                <option selected disabled> حدد الدرجة...</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <button class="btn btn-outline-success btn-sm nextBtn btn-lg pull-right" type="submit">حفظ البيانات</button>
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
@endsection