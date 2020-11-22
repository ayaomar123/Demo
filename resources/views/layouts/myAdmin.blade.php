@extends('layouts.admin')
@section('content')
    <div class="col-lg-12">
        <!--begin::List Widget 11-->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0">
                <h3 class="card-title font-weight-bolder text-dark">Crud</h3>
                </div>
                <!--begin::Item-->
                <div class="d-flex align-items-center mb-9 bg-light-primary rounded p-5">
                    <div class="d-flex flex-column flex-grow-1 mr-2">
                        <a href="{{url('categories')}}" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">Category</a>
                    </div>
                </div>
            <div class="d-flex align-items-center mb-9 bg-light-primary rounded p-5">
                <div class="d-flex flex-column flex-grow-1 mr-2">
                    <a href="{{url('articles')}}" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">Articles</a>
                </div>
            </div>
            <div class="d-flex align-items-center mb-9 bg-light-primary rounded p-5">
                <div class="d-flex flex-column flex-grow-1 mr-2">
                    <a href="#" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">Group lunch celebration</a>
                </div>
            </div>
                <!--end::Item-->
            </div>
        </div>
@endsection
