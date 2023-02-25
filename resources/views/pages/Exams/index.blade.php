@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    قائمة الامتحانات
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">قائمة الامتحانات</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ trans('main_trans.sid') }}</a></li>
                <li class="breadcrumb-item active">قائمة الامتحانات</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@section('PageTitle')
    قائمة الامتحانات
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
<div class="col-md-12 mb-30">
<div class="card card-statistics h-100">
<div class="card-body">
<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card-body">
            <a href="{{route('Exams.create')}}" class="btn btn-outline-success btn-sm" role="button" style="margin: 5px; padding: 5px;"
                aria-pressed="true">اضافة امتحان جديد</a><br><br>
            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                        data-page-length="50"
                        style="text-align: center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الامتحان</th>
                        <th>الترم</th>
                        <th>العمليات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($exams as $exam)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{$exam->name}}</td>
                            <td>{{$exam->term}}</td>
                            <td>
                                <a href="{{route('Exams.edit',$exam->id)}}"
                                    class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                        class="fa fa-edit"></i></a>
                                <button type="button" class="btn btn-danger btn-sm"
                                        data-toggle="modal"
                                        data-target="#delete_exam{{ $exam->id }}" title="حذف"><i
                                        class="fa fa-trash"></i></button>
                            </td>
                        </tr>

                        <div class="modal fade" id="delete_exam{{$exam->id}}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{route('Exams.destroy','test')}}" method="post">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;"
                                                class="modal-title" id="exampleModalLabel">حذف امتحان</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p> {{ trans('My_Classes_trans.Warning_Grade') }} {{$exam->name}}</p>
                                            <input type="hidden" name="id" value="{{$exam->id}}">
                                        </div>
                                        <div class="modal-footer">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                                                <button type="submit"
                                                        class="btn btn-danger">{{ trans('My_Classes_trans.submit') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </table>
            </div>
        </div>
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