@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    الرسوم الدراسية
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">    الرسوم الدراسية</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ trans('main_trans.sid') }}</a></li>
                <li class="breadcrumb-item active">   الرسوم الدراسية</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@section('PageTitle')
    الرسوم الدراسية
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
            <a href="{{route('Fees.create')}}" class="btn btn-outline-success btn-sm" role="button"
            style="margin: 5px; padding: 5px;" aria-pressed="true">اضافة رسوم جديدة</a><br><br>
            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                        data-page-length="50"
                        style="text-align: center">
                    <thead>
                    <tr class="alert-success">
                        <th>#</th>
                        <th>الاسم</th>
                        <th>المبلغ</th>
                        <th>المرحلة الدراسية</th>
                        <th>الصف الدراسي</th>
                        <th>السنة الدراسية</th>
                        <th>ملاحظات</th>
                        <th>العمليات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fees as $fee)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$fee->title}}</td>
                        <td>{{ number_format($fee->amount, 2) }}</td>
                        <td>{{$fee->grade->Name}}</td>
                        <td>{{$fee->classroom->Name_Class}}</td>
                        <td>{{$fee->year}}</td>
                        <td>{{$fee->description}}</td>
                            <td>
                                <a href="{{route('Fees.edit',$fee->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Fee{{ $fee->id }}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                <a href="#" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="far fa-eye"></i></a>

                            </td>
                        </tr>
                    @include('pages.Fees.Delete')
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