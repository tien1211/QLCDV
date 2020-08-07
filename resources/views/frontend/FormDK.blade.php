@extends('frontend.layout.master')
@section('frontend_content')
<div class="row">
    <div class="col-12">
        <!-- Section Heading -->
        <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
            <h3>Thông tin người tham gia</h3>
        </div>
    </div>
</div>
<form class="form-inline" role="form" action="" method="post" >
    {{ csrf_field() }}
<div class="col-12">
    <!-- Form -->
    <div class="roberto-contact-form">
            <div class="row">
                <div class="col-12 col-lg-9 wow fadeInUp" data-wow-delay="100ms">
                    <input type="text" required name=""  class="form-control mb-30" placeholder="Tên người tham gia thứ ">
                </div>
                <div class="col-12 col-lg-3 wow fadeInUp" data-wow-delay="100ms">
                    <select class="form-control" name="" required>
                    <option value="">Chọn giới tính...</option>
                    <option value="1">Nam</option>
                    <option value="0">Nữ</option>
                    </select>
                </div>
                <div class="col-12 col-lg-9 wow fadeInUp" data-wow-delay="100ms">
                    <input type="text" required name=""  class="form-control mb-30" placeholder="Tuổi">
                </div>
                <div class="col-12 col-lg-3 wow fadeInUp" data-wow-delay="100ms">
                    <select class="form-control" name="" required>
                    <option value="">Chọn tình trạng</option>
                    <option value="1">Người thân</option>
                    <option value="0">Công đoàn viên</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn roberto-btn mt-15" style="float:right;">Đăng ký</button>
            </form>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <!-- Section Heading -->
        <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
            <h3>Người tham gia</h3>
        </div>
    </div>
</div>
<div class="room-service mb-50">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>STT</th>
                <th>Người tham gia</th>
                <th>Công đoàn viên đăng ký</th>
                <th>Giới tính</th>
                <th>Tuổi</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection