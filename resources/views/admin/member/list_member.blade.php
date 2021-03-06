<?php
?>
@extends('layout.admin_layout')
@section('admin_content')

    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                List of member
            </div>
            <div class="position-center text-center">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert alert" >'.$message.'</span>';
                    Session::put('message', null);
                }
                ?>
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $key =>$cate_member)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{$cate_member->member_id}}</td>
                        <td>{{$cate_member->username}}</td>
                        <td>{{$cate_member->email}}</td>
                        <td>{{$cate_member->lastname}}</td>
                        <td>{{$cate_member->firstname}}</td>
                        <td>{{$cate_member->address}}</td>
                        <td>{{$cate_member->created_at}}</td>
                        <td>{{$cate_member->updated_at}}</td>
                        <td>
                            <a href="{{URL::to('edit_profile_member/'.$cate_member->member_id)}}" class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-success text-active"></i>
                            </a>
                            <a onclick="return confirm('Are you sure to delete ?')" href="{{URL::to('delete_profile_member/'.$cate_member->member_id)}}" class="active  styling-edit" ui-toggle-class="">
                                <i class="fa fa-times text-danger text"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
