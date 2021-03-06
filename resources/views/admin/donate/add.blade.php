<?php
?>
@extends('layout.admin_layout')
@section('admin_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Add Donate
        </header>

        <div class="panel-body">
            <div class="position-center text-center">
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}} <br>
                        @endforeach
                    </div>
                @endif
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert alert" >'.$message.'</span>';
                    Session::put('message', null);
                }
                ?>
            </div>

            <div class="position-center">
                <form role="form" action="{{URL::to('admin/donate/save')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="">Comment</label>
                        <textarea class="form-control" id="content-1"  style="resize: none" rows="8" name="comment" placeholder="Enter your content...">
                        </textarea>
                        <script type="text/javascript">

                            config={};
                            config.entities_latin = false;
                            config.uiColor = '#AADC6E';
                            config.language = 'en';
                            config.toolbarGroups = [
                                { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                                { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                                { name: 'document', groups: [ 'document', 'doctools', 'mode' ] },
                                { name: 'links', groups: [ 'links' ] },
                                { name: 'forms', groups: [ 'forms' ] },
                                { name: 'tools', groups: [ 'tools' ] },
                                '/',
                                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                                { name: 'insert', groups: [ 'insert' ] },
                                { name: 'styles', groups: [ 'styles' ] },
                                { name: 'about', groups: [ 'about' ] },
                                '/',
                                { name: 'colors', groups: [ 'colors' ] },
                                { name: 'others', groups: [ 'others' ] }
                            ];

                            config.removeButtons = 'Checkbox,Radio,HiddenField,Button,ImageButton,Select,TextField,Textarea,Form,CreateDiv,Language,Anchor,Table,Flash,Image,HorizontalRule,Iframe,ShowBlocks,Font,FontSize,TextColor,BGColor,Subscript,Superscript,CopyFormatting,RemoveFormat,Preview,Link,Unlink,NewPage,Print,Indent,Outdent,BidiLtr,BidiRtl,Smiley,SpecialChar,PageBreak';

                            CKEDITOR.replace('content-1', config);
                        </script>
                    </div>
                    <div class="form-group">
                    <label for="">Category</label>
                    <select class="form-control input-m m-bot15" name="category_type">
                        <option value="1">Education</option>
                        <option value="2">Health Care</option>
                        <option value="3">Privileged Children</option>
                        <option value="4">Other</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="">Total Donate(donate amount target)</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" name="total_donate" placeholder="Enter goal of total donate">
                    </div>
                    <div class="form-group" name="imageName">
                        <label for="exampleInputFile">Image input</label>
                        <input type="file" name="post_image" id="exampleInputFile">
                    </div>
                    <select class="form-control input-m m-bot15" name="post_status">
                        <option value="1">Show</option>
                        <option value="0">Hidden</option>
                    </select>
                    <button type="submit" name="add_new_post" class="btn mt-10 btn-info ">Submit</button>
                </form>
            </div>

        </div>
    </section>

</div>
@endsection
