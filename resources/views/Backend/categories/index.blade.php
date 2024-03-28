@extends('layouts.Backend.master')
@section('css')

    @section('title')
        {{ trans('Backend/categories.Sections') }}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Backend/categories.Sections') }} </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{ trans('Backend/categories.Settings') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('Backend/categories.Sections') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('backend.massage')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <div class="row">
                        <div class="col mb-3">
                            <button class="btn btn-success" data-toggle="modal" data-target="#AddCategories">
                                {{ trans('Backend/categories.Add New Section') }}
                            </button>
                        </div>

                        @include('Backend.categories.create')

                    </div>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0 text-center table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('Backend/categories.Section name') }} </th>
                                <th>{{ trans('Backend/categories.Notes') }}</th>
                                <th>{{ trans('Backend/categories.Processes') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->notes == true ? $category->notes :  trans('Backend/categories.There is no notes') }}</td>
                                    <td>

                                        <button class="btn btn-success btn-sm" title="{{ trans('Backend/categories.Edit') }}" data-toggle="modal"
                                                data-target="#Editcategory{{$category->id}}"><i
                                                class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm" title="{{ trans('Backend/categories.Delete') }}" data-toggle="modal"
                                                data-target="#Deleted{{$category->id}}"><i class="fa fa-trash"></i>
                                        </button>

                                    </td>

                                </tr>

                            @include('Backend.categories.edit')
                            @include('Backend.categories.deleted')
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
@endsection
@section('js')



@endsection
