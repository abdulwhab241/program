@extends('layouts.master')
@section('css')

@section('title')
  الاقسام الدراسية
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> الاقسام الدراسية</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ trans('main_trans.sid') }}</a></li>
                <li class="breadcrumb-item active">الاقسام الدراسية</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@section('PageTitle')
    الاقسام الدراسية
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card-body">

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم المرحلة</th>
                        <th>اسم القسم</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($sections as $section)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $section->Grades->Name }}</td>
                            <td>{{ $section->Name_Section }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
@section('js')
@endsection