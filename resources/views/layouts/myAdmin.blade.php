@extends('layouts.admin')
@section('content')
<div class="container row">
    <div class="container text-center col-lg-10 ">
        <!--begin::List Widget 11-->
        <div class="d-flex align-items-center mb-9 bg-success rounded p-5">
            <div class="d-flex flex-column flex-grow-1 mr-2">
                <a href="{{url('home/users')}}" class=" font-weight-bold text-dark-75 text-hover-danger font-size-lg mb-1">Manage Users</a>
            </div>
        </div>
        <div class="d-flex align-items-center mb-9 bg-success rounded p-5">
            <div class="d-flex flex-column flex-grow-1 mr-2">
                <a href="{{url('home/roles')}}" class="font-weight-bold text-dark-75 text-hover-danger font-size-lg mb-1">Mange Roles</a>
            </div>
        </div>
                <div class="d-flex align-items-center mb-9 bg-success rounded p-5">
                    <div class="d-flex flex-column flex-grow-1 mr-2">
                        <a href="{{url('categories')}}" class="font-weight-bold text-dark-75 text-hover-danger font-size-lg mb-1">Manage Category</a>
                    </div>
                </div>
            <div class="d-flex align-items-center mb-9 bg-success rounded p-5">
                <div class="d-flex flex-column flex-grow-1 mr-2">
                    <a href="{{url('articles')}}" class="font-weight-bold text-dark-75 text-hover-danger font-size-lg mb-1">Manage Articles</a>
                </div>
            </div>
            <div class="d-flex align-items-center mb-9 bg-success rounded p-5">
                <div class="d-flex flex-column flex-grow-1 mr-2">
                    <a href="{{url('slider')}}" class="font-weight-bold text-dark-75 text-hover-danger font-size-lg mb-1">Manage Slider</a>
                </div>
            </div>
            <div class="d-flex align-items-center mb-9 bg-success rounded p-5">
                <div class="d-flex flex-column flex-grow-1 mr-2">
                    <a href="{{url('ads')}}" class="font-weight-bold text-dark-75 text-hover-danger font-size-lg mb-1">Manage Ads</a>
                </div>
            </div>
            <div class="d-flex align-items-center mb-9 bg-success rounded p-5">
                <div class="d-flex flex-column flex-grow-1 mr-2">
                    <a href="{{url('Endpage')}}" class="font-weight-bold text-dark-75 text-hover-danger font-size-lg mb-1">Manage Pages</a>
                </div>
            </div>
            <div class="d-flex align-items-center mb-9 bg-success rounded p-5">
                <div class="d-flex flex-column flex-grow-1 mr-2">
                    <a href="{{url('contact')}}" class="font-weight-bold text-dark-75 text-hover-danger font-size-lg mb-1">Manage Contact</a>
                </div>
            </div>
            </div>
           {{--  <div class="col-lg-6">
                <img src="../img/A.jpg" alt="">
            </div> --}}
        </div>
@endsection
