@extends('templates.default', [
'title'=>'User',
'background_default'=>'',
'edit' => 'false'
])


@section('body')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<style>
    .home{
        background-color: #f1f2f7;
    }
</style>

<?php 
    $emailGetCookie = $_COOKIE["email"];
?>

@include('templates.navbar') 


<div class="app__profile">
    <div class="profile__banner">
        <div class="banner__img">
            <img class="banner__img--tag" src="https://vcdn1-dulich.vnecdn.net/2021/07/16/3-1-1626444927.jpg?w=460&h=0&q=100&dpr=2&fit=crop&s=KU8IkmrM5HbtYIyyS5k1qQ" alt="">
        </div>
        <div class="banner__avt">
            <img src="https://bloganchoi.com/wp-content/uploads/2022/02/avatar-trang-y-nghia.jpeg" alt="">
            <span>Trinh Nhat Anh</span>
        </div>
    </div>

    <div class="profile__container container bootstrap snippets bootdey mt-5">
        <div class="row">
            <div class="profile-nav col-md-4">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">Profile</a>
                    <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list" href="#list-settings" role="tab" aria-controls="list-settings">Settings</a>
                </div>
            </div>
            <div class="profile-info col-md-8">
                <div class="container tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                        <div class="row">
                            <div class="col-4 ">First Name</div>
                            <div class="col-8 ">: {{$user->first_name}} </div>
                        </div>
                        <div class="row">
                            <div class="col-4 ">Last Name</div>
                            <div class="col-8 ">: {{$user->last_name}}</div>
                        </div>
                        <div class="row">
                            <div class="col-4 ">Gender</div>
                            <div class="col-8 ">: {{($user->gender)?"Nam":"Nữ"}}</div>
                        </div>
                        <div class="row">
                            <div class="col-4 ">Birthday</div>
                            <div class="col-8 ">: {{$user->birthday}}</div>
                        </div>
                        <div class="row">
                            <div class="col-4 ">Phone</div>
                            <div class="col-8 ">: {{$user->phone}}</div>
                        </div>
                        <div class="row">
                            <div class="col-4 ">Email</div>
                            <div class="col-8 ">: {{$user->email}}</div>
                        </div>
                        <div class="row">
                            <div class="col-4 ">Country</div>
                            <div class="col-8 ">: {{$user->country}}</div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                        <form method="POST" action="">
                        @method('PATCH')
                        @csrf
                            <div class="input-group mb-3 mt-3">
                                <span class="input-group-text">First and last name</span>
                                <input type="text" aria-label="First name" class="form-control" name="first_name" value="{{$user->first_name}}">
                                <input type="text" name="last_name" value="{{$user->last_name}}" aria-label="Last name" class="form-control">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Gender</label>
                                <select class="form-select" id="inputGroupSelect01" name="gender">
                                    <option selected>{{$user->gender}}</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="3">Orther</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="start">Birthday</label>
                                <input class="form-control" type="date" id="start" name="birthday" value="{{$user->birthday}}" min="1950-01-01" max="2024-01-01" />
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Phone</span>
                                <input type="text" class="form-control" name="phone" aria-label="Sizing example input" value="{{$user->phone}}" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                                <input type="text" class="form-control" name="email" aria-label="Sizing example input" value="{{$user->email}}" aria-describedby="inputGroup-sizing-default" disabled>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Country</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" name="country" value="{{$user->country}}" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="post-create__submit mb-3">
                                <input type="submit" value="Cập Nhật" class="submit__input">
                            </div>
                        </form >
                    </div>
                </div> 
            </div>
            
        </div>
    </div>
</div>

@endsection
