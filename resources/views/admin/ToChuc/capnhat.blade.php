@extends('admin.layout.master')
@section('admin_content')
<?php
    foreach($tochuc as $key => $tc){
    $tc_ten = $tc->tc_ten;
    $tc_tructhuoc = $tc->tc_tructhuoc;
    $tc_gioithieu = $tc->tc_gioithieu;
    $tc_nhiemvu = $tc->tc_nhiemvu;
    }
?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật thông tin Tổ Chức
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form"action="{{route('LCN_ToChuc')}}" method="post">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="tc_ten">Tên tổ chức</label>
                        <input type="" class="form-control" id="tc_ten" placeholder="Tên tổ chức" value="{{$tc_ten}}" name="tc_ten">
                    </div>
                    <div class="form-group">
                        <label for="tc_tructhuoc">Trức thuộc</label>
                        <input type="" class="form-control" id="tc_tructhuoc" placeholder="Trực thuộc" value="{{$tc_tructhuoc}}" name="tc_tructhuoc">
                    </div>
                    <div class="form-group">
                        <label for="tc_gioithieu">Giới thiệu</label>
                        <textarea id="tc_gioithieu" class="form-control" rows="5" name="tc_gioithieu" >{{$tc_gioithieu}}</textarea>
                        <script type="text/javascript">
                            var editor = CKEDITOR.replace('tc_gioithieu',{
                                language:'vi',
                                filebrowserImageBrowseUrl: '../../ckfinder/ckfinder.html?Type=Images',
                                filebrowserFlashBrowseUrl: '../../ckfinder/ckfinder.html?Type=Flash',
                                filebrowserImageUploadUrl: '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                filebrowserFlashUploadUrl: '../../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                            });
                        </script>
                    </div>
                    <div class="form-group">
                        <label for="tc_nhiemvu">Nhiệm vụ</label>
                        <textarea id="tc_nhiemvu" class="form-control" rows="5" name="tc_nhiemvu" >{{$tc_nhiemvu}}</textarea>
                        <script type="text/javascript">
                            var editor = CKEDITOR.replace('tc_nhiemvu',{
                                language:'vi',
                                filebrowserImageBrowseUrl: '../../ckfinder/ckfinder.html?Type=Images',
                                filebrowserFlashBrowseUrl: '../../ckfinder/ckfinder.html?Type=Flash',
                                filebrowserImageUploadUrl: '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                filebrowserFlashUploadUrl: '../../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                            });
                        </script>
                    </div>
                    <button type="submit" class="btn btn-info">Cập nhật</button>
                </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection