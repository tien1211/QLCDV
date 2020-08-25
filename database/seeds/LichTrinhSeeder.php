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
                'lt_ten' => 'Đảo Nam Du',
                'lt_file' => 'LichTrinhND.docx',
                'lt_mota' => 'Đảo Nam Du là một trong những hòn đảo đẹp nhất ở Kiên Giang. Với vẻ đẹp hoang sơ cùng bãi biển trong xanh, bãi cát trắng ngần, nơi đây đã làm say lòng biết bao du khách. Nam Du hội tụ đủ các yếu tố: cảnh đẹp, đồ ăn ngon, chi phí rẻ nên rất được lòng những đôi chân muốn đi lang thang khám phá những vùng đất lạ. Cùng iVIVU khám phá ngay hôm nay!',
                'lt_trangthai' => 1
            ],
            [
                'lt_ten' => 'Bình Ba',
                'lt_file' => 'LichTrinhBB.docx',
                'lt_mota' => 'Bình Ba đang ngày càng hot về độ đẹp, độ “chịu chơi”, nơi đây được mệnh danh là “quốc đảo tôm hùm” với biển xanh cát trắng thơ mộng. Khách du lịch tìm đến Bình Ba không chỉ để thưởng thức hải sản, trải nghiệm những hoạt động mà còn là cơ hội để nghỉ ngơi sau những ngày làm việc mệt mỏi. Với khung cảnh hoang sơ, thanh bình của những bãi biển xanh trong, cát trắng mịn trải dài đã trở thành địa điểm chụp hình Bình Ba dành cho ai muốn có được những album đẹp mê ly. Cùng đồng hành cùng iVIVU để có những khoảnh khắc tuyệt vời ngay hôm nay!',
                'lt_trangthai' => 1
            ]
            ,
            [
                'lt_ten' => 'Bình Hưng',
                'lt_file' => 'LichTrinhBH.docx',
                'lt_mota' => 'Bình Hưng là một mảnh ghép không thể thiếu trong bức tranh tứ bình mà thiên nhiên đặc biệt ưu đãi cho Nha Trang. Nằm ẩn dưới chân đèo trên cung đường biển Vĩnh Hy – Bình Tiên, hòn đảo xinh đẹp hiện ra với hang đá nước ngọt rất đặc biệt, làn nước trong xanh nhìn rõ những dải san hô tuyệt đẹp bên dưới, bãi biển thoai thoải với nhiều tảng đá hình thù, màu sắc sinh động, kiểu dáng phong phú, có những tảng đá còn phủ kín rêu xanh. Du khách sẽ được thưởng thức những món hải sản tươi ngon nhất vừa được đánh bắt từ biển về, ngoài ra còn món tôm hùm trứ danh bởi nơi này còn nổi tiếng với nghề nuôi tôm hùm. Cùng iVIVU khám phá ngay hôm nay!',
                'lt_trangthai' => 1
            ]
            ,
            [
                'lt_ten' => 'Đà Nẵng',
                'lt_file' => 'LichTrinhDN.docx',
                'lt_mota' => 'Được mệnh danh là ‘’thành phố đáng đến’’ với dòng sông Hàn thơ mộng với cây cầu Rồng biểu tượng của Thành phố biển du lịch Đà Nẵng - nơi mà quý khách có thể cảm nhận được sự pha trộn giữa khí hậu miền Bắc, miền Nam.Ngoài ra Đà Nẵng còn sở hữu nhiều danh lam thắng cảnh làm say lòng người như: Bà Nà Hills, Bán Đảo Sơn Trà, Ngũ Hành Sơn, Đà Nẵng, phố cổ Hội An…. Tour du lịch Đà Nẵng sẽ đưa quý khách khám phá bãi biển được Forbes lựa chọn là bãi biển quyến rũ nhất hành tinh với bờ bi',
                'lt_trangthai' => 1
            ]
            ,
            [
                'lt_ten' => 'Hội An',
                'lt_file' => 'LichTrinhHA.docx',
                'lt_mota' => 'Được mệnh danh là “hòn ngọc biển Đông”, Nha Trang luôn tự hào là lựa chọn hàng đầu của du khách trong và ngoài nước mỗi khi nắng hạ xuất hiện, khi cái nóng tràn về. Và mỗi chúng ta hẳn ai cũng muốn một lần được đến chiêm ngưỡng và tận hưởng vẻ đẹp diệu kì của bãi biển tuyệt diệu này. Nhưng không phải bạn nào cũng có điều kiện để được tận mắt ngắm nhìn và cảm nhận. Những bài văn dưới đây không chỉ là tư liệu hữu ích cho các bạn khi làm những bài văn miêu tả bãi biển mà đó chính là một hành trình thú vị đưa những bạn chưa có cơ hội tham quan có thể hiểu hơn về “hòn ngọc” tuyệt vời này.',
                'lt_trangthai' => 1
            ]
            ,
            [
                'lt_ten' => 'Đà Lạt',
                'lt_file' => 'LichTrinhDL.docx',
                'lt_mota' => 'Tour Tiền Giang – Đà Lạt khởi hành hàng tuần suốt năm 2020. Đà Lạt muôn sắc hoa luôn là tuyến tour thu hút lượng khách du lịch đông đảo nhất. Không chỉ bởi không khí se lạnh, mát mẻ của Đà Lạt; mà ở đó còn là nơi trăm hoa đua sắc. Hãy cùng Puolo Trip, đơn vị dẫn đầu các tuyến tour biển đảo và tour khách đoàn, tour ghép khách lẻ hàng tuần tuyến Đà Lạt, để cùng khám phá Đà Lạt với lịch trình vô cùng hấp dẫn, đặc sắc, mới mẻ cùng nhiều quà tặng kèm theo chương trình chỉ có tại Puolo Trip.',
                'lt_trangthai' => 1
            ]
            ,
            [
                'lt_ten' => 'Vũng Tàu',
                'lt_file' => 'LichTrinhVT.docx',
                'lt_mota' => 'Du lich Vũng Tàu: Những cung đường biển đẹp như mơ, ngọn Hải đăng cổ nổi tiếng, tượng Chúa giang tay bình yên, những góc phố thơ mộng, cùng những món ăn hấp dẫn là những gì du khách không thể bỏ qua khi đến với Vũng Tàu. Vũng Tàu trở thành đô thị loại I năm 2013, là một thành phố đáng tới, đáng sống và hạnh phúc',
                'lt_trangthai' => 1
            ]
            ,
            [
                'lt_ten' => 'Nha Tang',
                'lt_file' => 'LichTrinhNT.docx',
                'lt_mota' => 'Vốn nổi tiếng là thành phố biển du lịch của Việt Nam, Nha Trang có rất nhiều những danh lam thắng cảnh hút hồn các du khách bởi vẻ đẹp tuyệt vời. Khu giải trí Vinpearl Land với nhiều trò chơi thú vị và hấp dẫn, đảo Hòn Mun với những rặng san hô đẹp lộng lẫy, còn Hòn Tằm thu hút du khách với bãi tắm tuyệt đẹp hay dịch vụ tắm bùn khoáng tại I-Resort, khu du lịch Trăm Trứng sẽ giúp du khách thư giãn sau ngày dài. Đến Nha Trang không quên thưởng thức đặc sản nổi tiếng phố biển như bún sứa, nem nướng',
                'lt_trangthai' => 1
            ]
            ,
        ];
        DB::table('LichTrinh')->insert($arr);
    }
}
