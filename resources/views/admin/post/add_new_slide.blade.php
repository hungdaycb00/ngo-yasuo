<?php
?>
@extends('layout.admin_layout')
@section('admin_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Add new post
        </header>

        <div class="panel-body">
            <div class="position-center text-center">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert alert" >'.$message.'</span>';
                    Session::put('message', null);
                }
                ?>
            </div>

            <div class="position-center">
                <form role="form" action="{{URL::to('admin/slide/save_new_slide')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="category_name" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="category_name" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="category_name" placeholder="Enter title">
                    </div>
                    <button type="submit" name="add_new_post" class="btn mt-10 btn-info ">Submit</button>
                </form>
            </div>

        </div>
    </section>

</div>
@endsection
