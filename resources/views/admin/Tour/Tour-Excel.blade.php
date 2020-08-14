<table class="table" ui-jq="footable" ui-options='{
    "paging": {
      "enabled": true
    },
    "filtering": {
      "enabled": true
    },
    "sorting": {
      "enabled": true
    }}'>
    @php
        $a = 1;
    @endphp
    <thead>
      <tr>
        <th data-breakpoints="xs">id</th>
        <th>Họ tên</th>
        <th>Giới tính</th>
        <th>Tuổi</th>
        <th>Quan hệ</th>
        <th>Công đoàn viên đăng ký</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($info as $key => $info)
            <tr data-expanded="true">
            <td>{{$a}}</td>
            <td>{{$info->ttndk_ten}}</td>
            <td>
                @if ($info->ttndk_gt == 1)
                    Nam
                @else
                    Nữ    
                @endif
            </td>
        <td>{{$info->ttndk_tuoi}}</td>
        <td>   
            @if($info->ttndk_cv == 1)
                Ngươi thân
            @else
                Công đoàn viên
            @endif
        </td>
        <td>{{$info->cdv_ten}}</td>
        </tr>
       @php
           $a = $a+1;
       @endphp
      @endforeach
    </tbody>
  </table>