@extends('admin.layout.master')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <?php
        foreach($tochuc as $key => $tc){
        $tc_ten = $tc->tc_ten;
        $tc_tructhuoc = $tc->tc_tructhuoc;
        }
        ?>
        <div class="panel-heading">
            <h4 style="text-align: center; color: #fe980f ">Thông tin Tổ chức</h4>
        </div>
        <div class="table-responsive">
        <?php 
        $message = Session::get('message');
        if($message){
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',null);
        }
        ?>
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Tên tổ chức</th>
              <th>Trực thuộc</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <td>{{$tc_ten}}</td>
            <td>{{$tc_tructhuoc}}</td>
            </tr>
          </tbody>
        </table>
      </div>
	</div>
</div>
@endsection