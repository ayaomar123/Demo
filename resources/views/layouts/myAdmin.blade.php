@extends('layouts.admin')
@section('content')

    <div class="col-lg-12">
        <!--begin::List Widget 11-->
                <div class="d-flex align-items-center mb-9 bg-success rounded p-5">
                    <div class="d-flex flex-column flex-grow-1 mr-2">
                        <a href="{{url('categories')}}" class="font-weight-bold text-dark-75 text-hover-danger font-size-lg mb-1">Category</a>
                    </div>
                </div>
            <div class="d-flex align-items-center mb-9 bg-success rounded p-5">
                <div class="d-flex flex-column flex-grow-1 mr-2">
                    <a href="{{url('articles')}}" class="font-weight-bold text-dark-75 text-hover-danger font-size-lg mb-1">Articles</a>
                </div>
            </div>
            <div class="d-flex align-items-center mb-9 bg-success rounded p-5">
                <div class="d-flex flex-column flex-grow-1 mr-2">
                    <a href="{{url('slider')}}" class="font-weight-bold text-dark-75 text-hover-danger font-size-lg mb-1">Slider</a>
                </div>
            </div>
            <div class="d-flex align-items-center mb-9 bg-success rounded p-5">
                <div class="d-flex flex-column flex-grow-1 mr-2">
                    <a href="{{url('ads')}}" class="font-weight-bold text-dark-75 text-hover-danger font-size-lg mb-1">Ads</a>
                </div>
            </div>
            <div class="d-flex align-items-center mb-9 bg-success rounded p-5">
                <div class="d-flex flex-column flex-grow-1 mr-2">
                    <a href="{{url('Endpage')}}" class="font-weight-bold text-dark-75 text-hover-danger font-size-lg mb-1">Pages</a>
                </div>
            </div>
            <div class="d-flex align-items-center mb-9 bg-success rounded p-5">
                <div class="d-flex flex-column flex-grow-1 mr-2">
                    <a href="{{url('contact')}}" class="font-weight-bold text-dark-75 text-hover-danger font-size-lg mb-1">Contact</a>
                </div>
            </div>
            </div>
@endsection
