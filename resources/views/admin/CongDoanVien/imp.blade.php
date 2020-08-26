@extends('admin.layout.master')
@section('admin_content')
<!-- page start-->


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
            IMPORT DANH SÁCH CÔNG ĐOÀN VIÊN
            </header>
            <div class="panel-body">
                <div class="form">
                    <form class="cmxform form-horizontal " enctype="multipart/form-data" id="signupForm" method="post" action="{{route('Import')}}" novalidate="novalidate">
                        @csrf
                        <div class="form-group" style="mt-6">
                            <div class="flash-message">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="" class="close" d
                                ata-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                        </div>
                        </div>
                        <div class="form-group ">
                            <label for="username" class="control-label col-lg-3">FILE IMPORT</label>
                                <div class="col-lg-6">
                                    <input class="form-control" name="file" type="file">                 
                {{------------------- SHOW ERROR ------------------}}
                                    @if($errors->has('file'))
                                    <div class="alert alert-warning" style="color: red">
                                        <ul>ERROR FILE IMPORT:</ul>
                                            <li style="color: red">{{ $errors->first('file')}}</li>    
                                    </div>
                                @endif
                                    @if (isset($f))
                                        <div class="alert alert-warning mt-10" style="color: red;">ERROR FILE IMPORT:
                                            @foreach ($f as $f1)
                                                <ul>
                                                    @foreach ($f1->errors() as $error)
                                                    <li style="color: red; margin-left:5%">{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                                @break
                                            @endforeach
                                        </div>



                                    @endif


                                </div>
                {{------------------- SHOW ERROR ------------------}}           
            </div>
                        <div class="form-group">
                            {{-- <div class="col-lg-offset-3 col-lg-6"> --}}
                                <button class="btn btn-primary" style="margin-left:332px " type="submit">SUBMIT</button>
                                <a href="{{route('LT_DanhSach')}}"><button class="btn btn-default" type="button">Thoát</button></a>
                            </div>
                            <div class="form-group">
                            <label for="username" style="margin-left:205px ">DOWNLOAD FILE EXCEL:</label>
                            <a href="samp/Form.xlsx"><label for="username" > TẠI ĐÂY </label></a>
                            </div>
                            <div class="form-group">
                            <label for="username"  style="margin-left:205px ">DOWNLOAD FILE MẪU:</label>
                            <a href="samp/Example.xlsx" ><label for="username" >TẠI ĐÂY </label></a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
