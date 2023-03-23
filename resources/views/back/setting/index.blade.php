@extends('layouts.admin')

@section('title', 'Setting')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Setting</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Info
                    </div>
                    <div class="panel-body">

                        <form role="form" action="{{ route('update.info', $setting->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Website Name</label>
                                <input type="text" class="form-control" name="website_name" id="website_name" value="{{ $setting->website_name }}">
                                @if($errors->has('website_name'))
                                <span style="color: red">{{ $errors->first('website_name') }}</span>
                                @endif
                                
                            </div>
                            <div class="form-group">
                                <label>Website Link</label>
                                <input type="text" class="form-control" name="website" id="website" value="{{ $setting->website }}">
                                @if($errors->has('website'))
                                <span style="color: red">{{ $errors->first('website') }}</span>
                                @endif
                                
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" value="{{ $setting->phone }}">
                                @if($errors->has('phone'))
                                <span style="color: red">{{ $errors->first('phone') }}</span>
                                @endif
                                
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ $setting->email }}">
                                @if($errors->has('email'))
                                <span style="color: red">{{ $errors->first('email') }}</span>
                                @endif
                                
                            </div>
                            <div class="form-group">
                                <label>Logo</label>
                                <input type="file" class="form-control" name="logo" id="logo" @if($setting->logo != null) data-default-file="{{ url('uploads/images', $setting->logo)}}" @endif>
                                @if($errors->has('logo'))
                                <span style="color: red">{{ $errors->first('logo') }}</span>
                                @endif
                                
                            </div>
                            
                            
                            <button type="submit" class="btn btn-default">Save</button>
                        </form>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Change Password
                    </div>
                    <div class="panel-body">

                        <form role="form" action="{{ route('password', Auth::user()->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Current Password</label>
                                <input class="form-control" name="c_password" id="c_password" required>
                                @if (Session::has('danger'))
                                <span style="color: red">{{ Session::get('danger') }}</span>
                                @endif
                                
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" name="password" id="password" required>
                                @if ($errors->has('title'))
                                <span style="color: red">{{ $errors->first('title') }}</span>
                                @endif
                                
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input class="form-control" name="confirm_password" id="confirm_password" required>
                                <div id="msg"></div>
                            </div>
                            <button type="submit" class="btn btn-default">Save</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>

            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Pdf Heading Image
                    </div>
                    <div class="panel-body">

                        <form role="form" action="{{ route('update.pdf', $setting->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                                <input type="file" class="form-control" name="pad_head" id="pad_head" @if($setting->pad_head != null) data-default-file="{{ url('uploads/images', $setting->pad_head)}}" @endif>
                                @if($errors->has('pad_head'))
                                <span style="color: red">{{ $errors->first('pad_head') }}</span>
                                @endif
                                
                            </div>
                            
                            <button type="submit" class="btn btn-default">Save</button>
                        </form>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            
            <!-- /.col-lg-6 -->
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Banner
                    </div>
                    <div class="panel-body">

                        <form role="form" action="{{ route('update.banner', $setting->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Banner text (1)</label>
                                <input type="text" class="form-control" name="banner_text_1" id="banner_text_1" value="{{ $setting->banner_text_1 }}">
                                @if($errors->has('banner_text_1'))
                                <span style="color: red">{{ $errors->first('banner_text_1') }}</span>
                                @endif
                                
                            </div>

                            <div class="form-group">
                                <label>Banner text (2)</label>
                                <input type="text" class="form-control" name="banner_text_2" id="banner_text_2" value="{{ $setting->banner_text_2 }}">
                                @if($errors->has('banner_text_2'))
                                <span style="color: red">{{ $errors->first('banner_text_2') }}</span>
                                @endif
                                
                            </div>

                            <div class="form-group">
                                <label>Banner text (3)</label>
                                <input type="text" class="form-control" name="banner_text_3" id="banner_text_3" value="{{ $setting->banner_text_3 }}">
                                @if($errors->has('banner_text_3'))
                                <span style="color: red">{{ $errors->first('banner_text_3') }}</span>
                                @endif
                                
                            </div>
                            

                            
                            <div class="form-group">
                                <label>Banner Image</label>
                                <input type="file" class="form-control" name="banner_image" id="banner_image" @if($setting->banner_image != null) data-default-file="{{ url('uploads/images', $setting->banner_image)}}" @endif>
                                @if($errors->has('banner_image'))
                                <span style="color: red">{{ $errors->first('banner_image') }}</span>
                                @endif
                                
                            </div>
                            
                            
                            <button type="submit" class="btn btn-default">Save</button>
                        </form>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>

            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection
@section('script')


<script>

    $("#confirm_password").keyup(function(){
        if ($("#password").val() != $("#confirm_password").val()) {
            $("#msg").html("Password do not match").css("color","red");
        }else{
            $("#msg").html("Password matched").css("color","green");
        }
    });

    $('#logo').dropify();
    $('#banner_image').dropify();
    $('#pad_head').dropify();


</script>

@endsection