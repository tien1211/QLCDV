<?php

use Illuminate\Database\Seeder;

class LichTrinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr=[
            [
                'lt_ten' => 'Tiền Giang - Vũng Tàu',
                'lt_file' => 'LichTrinhVungTau.xlsx',
                'lt_mota' => 'Tour du lịch Tiền Giang đi Vũng Tàu của Bazan Travel hứa hẹn sẽ đem đến cho bạn những trải nghiệm thú vị và các điểm đến hấp dẫn. Cùng Bazan Travel khám phá thành phố sương mù với những điểm check in tuyệt đẹp, khung cảnh thơ mộng cùng khí trời mát mẻ được mệnh danh như Paris thu nhỏ của Việt Nam. Với giá cả phải chăng, dịch vụ đảm bảo cùng cách phục vụ tận tâm, chuyên nghiệp, tour Tiền Giang đi Vũng Tàu của chúng tôi chắc chắn sẽ mang lại cho bạn những phút giây thư giãn thoải mái!',
                'lt_trangthai' => 1
            ],
            [
                'lt_ten' => 'Tiền Giang - Cần Thơ',
                'lt_file' => 'LichTrinhCanTho.xlsx',
                'lt_mota' => 'Được thiên nhiên ưu đãi cho yếu tố địa hình sông nước với những vườn trái cây trĩu quả, những cánh đồng lúa thẳng cánh cò bay, vì thế nên miền Tây luôn là điểm đến lý tưởng để du khách hòa mình vào thiên nhiên, sau những ngày làm việc bận rộn nơi phố thị ồn ào. Mỗi tỉnh miền Tây có một màu sắc riêng, mỗi đặc trưng riêng, cùng iVIVU khám phá ngay hôm nay!',
                'lt_trangthai' => 1
            ]
            ,
            [
                'lt_ten' => 'Tiền Giang - Đà Lạt',
                'lt_file' => 'LichTrinhDaLat.xlsx',
                'lt_mota' => 'Tour Tiền Giang – Đà Lạt khởi hành hàng tuần suốt năm 2020. Đà Lạt muôn sắc hoa luôn là tuyến tour thu hút lượng khách du lịch đông đảo nhất. Không chỉ bởi không khí se lạnh, mát mẻ của Đà Lạt; mà ở đó còn là nơi trăm hoa đua sắc. Hãy cùng Puolo Trip, đơn vị dẫn đầu các tuyến tour biển đảo và tour khách đoàn, tour ghép khách lẻ hàng tuần tuyến Đà Lạt, để cùng khám phá Đà Lạt với lịch trình vô cùng hấp dẫn, đặc sắc, mới mẻ cùng nhiều quà tặng kèm theo chương trình chỉ có tại Puolo Trip.',
                'lt_trangthai' => 1
            ]
            ,
            [
                'lt_ten' => 'Tiền Giang - Đà Nẵng',
                'lt_file' => 'LichTrinhDaNang.xlsx',
                'lt_mota' => 'Được mệnh danh là ‘’thành phố đáng đến’’ với dòng sông Hàn thơ mộng với cây cầu Rồng biểu tượng của Thành phố biển du lịch Đà Nẵng - nơi mà quý khách có thể cảm nhận được sự pha trộn giữa khí hậu miền Bắc, miền Nam.Ngoài ra Đà Nẵng còn sở hữu nhiều danh lam thắng cảnh làm say lòng người như: Bà Nà Hills, Bán Đảo Sơn Trà, Ngũ Hành Sơn, Đà Nẵng, phố cổ Hội An…. Tour du lịch Đà Nẵng sẽ đưa quý khách khám phá bãi biển được Forbes lựa chọn là bãi biển quyến rũ nhất hành tinh với bờ bi',
                'lt_trangthai' => 1
            ]
            ,
            [
                'lt_ten' => 'Tiền Giang - Hội An',
                'lt_file' => 'LichTrinhHoiAn.xlsx',
                'lt_mota' => 'Được mệnh danh là “hòn ngọc biển Đông”, Nha Trang luôn tự hào là lựa chọn hàng đầu của du khách trong và ngoài nước mỗi khi nắng hạ xuất hiện, khi cái nóng tràn về. Và mỗi chúng ta hẳn ai cũng muốn một lần được đến chiêm ngưỡng và tận hưởng vẻ đẹp diệu kì của bãi biển tuyệt diệu này. Nhưng không phải bạn nào cũng có điều kiện để được tận mắt ngắm nhìn và cảm nhận. Những bài văn dưới đây không chỉ là tư liệu hữu ích cho các bạn khi làm những bài văn miêu tả bãi biển mà đó chính là một hành trình thú vị đưa những bạn chưa có cơ hội tham quan có thể hiểu hơn về “hòn ngọc” tuyệt vời này.',
                'lt_trangthai' => 1
            ]

        ];
        DB::table('LichTrinh')->insert($arr);
    }
}
