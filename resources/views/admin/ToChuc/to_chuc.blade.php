@extends('admin.layout.master')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <?php
        foreach($tochuc as $key => $tc){
        $tc_ten = $tc->tc_ten;
        $tc_tructhuoc = $tc->tc_tructhuoc;
        $tc_gioithieu = $tc->tc_gioithieu;
        $tc_nhiemvu = $tc->tc_nhiemvu;
        }
        ?>
        <div class="panel-heading">
            <h4 style="text-align: center; color: #fe980f; display: inline-block">Thông tin Tổ chức</h4>
        </div>
        <div class="table-responsive">
        <?php 
        $message = Session::get('message');
        if($message){
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',null);
        }
        ?>
        <!-- <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <a style="font-weight: bold; color: #777;">Tên tổ chức: </a>{{$tc_ten}}
            </div>
            <div class="col-sm-6">
              <a style="font-weight: bold; color: #777;">Tên tổ chức: </a>{{$tc_ten}}
            </div>
          </div> -->
        <table class="table">
          <tbody>
            <tr>
            <td><a style="font-weight: bold; color: #777;">Tên tổ chức: </a>{!!$tc_ten!!}</td>
            <td><a style="font-weight: bold; color: #777;">Trực thuộc: </a>{!!$tc_tructhuoc!!}</td>
            <tr>
            <td colspan="2"><a style="font-weight: bold; color: #777;">Giới Thiệu: </a>{!!$tc_gioithieu!!}</td>
            </tr>
            <tr>
            <td colspan="2"><a style="font-weight: bold; color: #777;">Nhiệm vụ: </a>{!!$tc_nhiemvu!!}</td>
            </tr>
          </tbody>
        </table>
        </div>
      </div>
	</div>
</div>
@endsection