@extends('layouts.master')
@section('css')

@section('title')
{{ trans('main_trans.Grades') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.Grades') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.Grades') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
  <!-- main body --> 
  <div class="row">   
    <div class="col-xl-12 mb-30">     
      <div class="card card-statistics h-100"> 
        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <button type="button" class="btn btn-outline-success x-small" data-toggle="modal" data-target="#exampleMadal">
                {{ trans('main_trans.add_Grade') }}
            </button>
            <br><br>
          <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered p-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ trans('main_trans.Name') }}</th>
                    <th>{{ trans('main_trans.Notes') }}</th>
                    <th>{{ trans('main_trans.Processes') }}</th>

                </tr>
            </thead>
            <tbody>
                @php
                    $i =0;
                @endphp
                @foreach ($grades as $grade)
                    @php$i++; @endphp
                    <td>{{ $i }}</td>
                    <td>{{ $grade->Name }}</td>
                    <td>{{ $grade->Notes }}</td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="model" 
                        data-target="#edit{{ $grade->id }}"
                        title="{{ trans('main_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="model" 
                        data-target="#delete{{ $grade->id }}"
                        title="{{ trans('main_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                    </td>
                @endforeach
            </table>
        </div>
        </div>
        </div>   
    </div>


    <!-- add_model_Grade -->
    <div class="modal fade" id="exampleMadal" tabindex="1" role="dialog"
    aria-Lableleby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                id="exampleModalLabel">
                {{ trans('main_trans.add_Grade') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('Grades.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 form-group p_star">
                        <label for="Name" class="mr-sm-2">
                            {{ trans('main_trans.stage_name_ar') }}:
                        </label>
                        <input id="Nmae" type="text" name="Nmae" class="form-control" >
                    </div>
                    {{-- <div class="row"> --}}
                        <div class="col-md-6 form-group p_star">
                            <label for="Name" class="mr-sm-2">
                                {{ trans('main_trans.stage_name_en') }}:
                            </label>
                            <input type="text" name="Nmae_en" class="form-control" required>
                        </div>
                {{-- </div> --}}
                <div class="col-md-12 form-group">
                    <label for="exampleFormControlTextarea1">
                        {{ trans('main_trans.Notes') }}
                    </label>
                    <textarea name="Notes" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <br><br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">
                        {{ trans('main_trans.Close') }}
                    </button>
                    <button type="submit" class="btn btn-outline-success">
                        {{ trans('main_trans.submit') }}
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>






</div> 
<!-- row closed -->
@endsection
@section('js')

@endsection
