@extends('layouts.fe')
@section('content')
<div id="ads-container"><!--Bắt Đầu Khối Quảng cáo -->
    <div class="ads1"><a href="#"><img src="./images/banner1.png"></a></div>
    <div class="ads1"><a href="#"><img src="./images/banner2.jpg"></a></div>
    <div class="ads1"><a href="#"><img src="./images/banner3.jpg"></a></div>
</div><!--Kết thúc khối quảng cáo-->
<div id="main-body"><!--Bắt đầu khối nội dung main-body-->
    <div id="body-content"><!-- Bắt đầu nội dung khác biệt của Post-thongbao.html với các khối khác-->
        <div id="gioithieu-post">
            <div class="gioithieu-left">
                <img src="./images/truong-dai-hoc-kinh-te.jpg">
            </div>
            <div class="gioithieu-right">
                <h1>Trường Đại Học Kinh Tế – Đại Học Quốc Gia Hà Nội</h1>
                <button type="submit" class="gioithieu">VIDEO GIỚI THIỆU TRƯỜNG</button>
                <button type="submit" class="tailieu">NHẬN TÀI LIỆU ÔN MIỄN PHÍ</button>
                <p><strong>Mã trường:</strong>QHE</p>
                <p><strong>Loại hình đào tạo:</strong>Công Lập</p>
                <p><strong>Địa chỉ:</strong>144 Xuân Thủy - Cầu Giấy - Hà Nội</p>
                <p><strong>Website:</strong>http://ueb.edu.vn/</p>
                <p><strong>Điện thoại:</strong>(04) 37 547 506</p>
            </div>
        </div>
        <div id="wap-post">
            <div id="content">
                <div class="content-post">
                    <div class="nav-post">
                        <div class="search">
                            <form>
                                <input type="input" name="search" placeholder="Thanh Search tìm kiếm nội trung do Google Adsen cấp mã..">
                                <button type="submit"> Tìm Kiếm </button>
                            </form>
                        </div> <!--Kết thúc search-->
                        <div class="quangcao-adsense">
                            <!--Đặt Mã quảng cáo Goolge Adsense tại đây-->
                            <img src="./images/adsense1.jpeg">
                        </div>
                        <div class="noidung-post"><!--Bắt đầu nội dung trong một bài Post-->
                            <img src="./images/chxh-dai-hoc-kinh-te.png">
                            <h2 class="tentruong-post">ĐẠI HỌC KINH TẾ THÔNG BÁO TUYỂN SINH NĂM 2019</h2>
                            <p class="tuyen-sinh"><a href="#"><i class="fa fa-hand-o-right" aria-hidden="true"></i>Cao Đẳng Y Hà Nội Xét Tuyển Học Bạ Năm 2019<img src="./images/new.gif"></a></p>
                            <p class="tuyen-sinh"><a href="#"><i class="fa fa-hand-o-right" aria-hidden="true"></i>Đăng Ký Học Cao Đẳng Sư Phạm Mầm Non, Sư Phạm Tiểu Học 2019 Xét Học Bạ<img src="./images/new.gif"></a></p>
                            <p>Trường Đại học Kinh tế thông báo tuyển sinh hệ đại học chính quy với các khối ngành và chỉ tiêu cụ thể từng ngành như sau:</p>
                            <h3>I. Trường Đại Học Kinh Tế Đại Học Quốc Gia Hà Nội Tuyển Sinh Các Ngành</h3>
                            <table width="485">
                            <tbody>
                            <tr>
                            <td style="text-align: center;" rowspan="3" width="152"><strong>Mã xét tuyển</strong></td>
                            <td style="text-align: center;" rowspan="3" width="172"><strong>Tên ngành</strong></td>
                            <td style="text-align: center;" colspan="2" width="161"><strong>Chỉ tiêu</strong></td>
                            </tr>
                            <tr>
                            <td style="text-align: center;" colspan="2"><strong>(Dự kiến)</strong></td>
                            </tr>
                            <tr>
                            <td style="text-align: center;" width="60"><strong>Theo KQ thi THPT QG</strong></td>
                            <td style="text-align: center;" width="101"><strong>Theo phương thức khác</strong></td>
                            </tr>
                            <tr>
                            <td><strong>QHE40</strong></td>
                            <td><strong>Quản trị kinh doanh</strong></td>
                            <td style="text-align: center;">180</td>
                            <td style="text-align: center;">20</td>
                            </tr>
                            <tr>
                            <td><strong>QHE41</strong></td>
                            <td><strong>Tài chính - Ngân hàng</strong></td>
                            <td style="text-align: center;">121</td>
                            <td style="text-align: center;">13</td>
                            </tr>
                            <tr>
                            <td><strong>QHE42</strong></td>
                            <td><strong>Kế toán</strong></td>
                            <td style="text-align: center;">121</td>
                            <td style="text-align: center;">13</td>
                            </tr>
                            <tr>
                            <td><strong>QHE43</strong></td>
                            <td><strong>Kinh tế quốc tế</strong></td>
                            <td style="text-align: center;">216</td>
                            <td style="text-align: center;">24</td>
                            </tr>
                            <tr>
                            <td><strong>QHE02</strong></td>
                            <td><strong>Kinh tế</strong></td>
                            <td style="text-align: center;">221</td>
                            <td style="text-align: center;">25</td>
                            </tr>
                            <tr>
                            <td><strong>QHE01</strong></td>
                            <td><strong>Kinh tế phát triển</strong></td>
                            <td style="text-align: center;">221</td>
                            <td style="text-align: center;">25</td>
                            </tr>
                            </tbody>
                            </table>
                            <h3>II. Đối tượng tuyển sinh</h3>
                            <span>Trường Đại Học Kinh Tế Đại Học Quốc Gia hà Nội thực hiện tuyển sinh đối với những thí sinh tốt nghiệp trung học phổ thông</span>
                            <h3>III. Phương thức tuyển sinh</h3>
                            <span>Nhà trường xét tuyển dựa trên kết quả kì thi đánh giá năng lực do trường Đại học Quốc gia Hà Nội tổ chức</span>
                            <ul>
                                 <li>Thí sinh nộp hồ sơ đăng kí xét tuyển vào trường cần có điểm bài thi đánh giá năng lự tiên)</li>
                                 <li>Các chương trình đào tạo chất lượng cao thí sinh cần đáp ứng được thông tư 23 của Bộ Giáo dục và Đào tạo.</li>
                                 <li>Điểm ưu tiên được cộng với kết quả bài thi đánh giá năng lực và mức chênh lệch điểm giữa hai nhóm đối tượng kế </li>
                            </ul>
                            <h3>IV. Phương thức đăng kí xét tuyển</h3>
                            <p>Thí sinh đăng kí xét tuyển tại trang website của Đại học Quốc gia Hà Nội hoặc tại trang web của trường đại học kinh tế Đánh giá về chế tài xử phạt đối với hành vi đi ngược chiều trên cao tốc, các luật sư cho rằng, cần nhanh chóng sửa đổi Nghị định 46/2016/NĐ-CP theo hướng tăng mức phạt, thậm chí tước bằng lái vĩnh viễn để đảm bảo tính răn đe, phòng ngừa chung vì hành động này có tính chất nguy hiểm cao, nguy cơ mất an toàn giao thông nghiêm trọng.</p>
                            <p>Lệ phí đăng kí xét tuyển 30.000 đồng/ hồ sơ. Thí sinh phải hoàn thành việc nộp lệ phí ngay sau 48h đăng kí xét tuyển. về chế tài xử phạt đối với hành vi đi ngược chiều trên cao tốc, các luật sư cho rằng, cần nhanh chóng sửa đổi Nghị định 46/2016/NĐ-CP theo hướng tăng mức phạt, thậm chí tước bằng lái vĩnh viễn để đảm bảo tính răn đe, phòng ngừa chung vì hành động này có tính chất nguy hiểm cao, nguy cơ mất an toàn giao thông nghiêm trọng.</p>
                            <p>Nhà trường thu lệ phí qua ngân hàng TMCP đầu tư và Phát triển BIDV theo 1 trong 2 hình thức:</p>
                            <ul>
                                 <li>Thanh toán tại quầy giao dịch BIDV</li>
                                 <li>Internet banking</li>
                            </ul>
                        </div><!-- Kết thúc nội dung của bài Post-->
                        <div class="link-post">
                            <p><a href="#"><i class="fa fa-hand-o-right" aria-hidden="true"></i>Học Phí Đại Học Kinh Tế Hà Nội</a> </p>
                            <p><a href="#"><i class="fa fa-hand-o-right" aria-hidden="true"></i>Điểm chuẩn trường Đại học Kinh tế Hà Nội</a></p>
                            <p><a href="#"><i class="fa fa-hand-o-right" aria-hidden="true"></i>Điểm Chuẩn Trường Đại Học Quốc Gia Hà Nội</a></p>
                        </div>
                    </div>
                    <div id="comments" class="comments-area">
                        <h3>Bình luận của bạn:</h3>
                        <p>Nếu bạn có thắc mắc, ý kiến đóng góp của bạn xung quanh vấn đề này. Vui lòng điền thông tin theo mẫu dưới đây rồi nhấn nút GỬI BÌNH LUẬN. Mọi ý kiến của bạn đều được Kenhtuyensinh24h.vn đón đợi và quan tâm.</p>
                        <div id="nav-coment">
                            <div class="title-coment">
                                <p class="title-form"><span class="header_text">18 Bình luận</span> ở "Trường Đại Học Kinh Tế – Đại Học Quốc Gia Hà Nội"</p>
                            </div>
                            <div class="nav-form-coment">
                                <form class="form-coment">
                                    <div class="wc-field-comment">
                                        <div class="avata-coment">
                                            <img src="./images/avata.png">
                                        </div>
                                        <div class="wpdiscuz-item wc-field-textarea">
                                            <div class="wpdiscuz-textarea-wrap">
                                                <textarea id="wc-textarea-0_0" placeholder="Nội dung bình luận của bạn..." class="wc_comment wpd-field"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-footer">
                                        <div class="form-row">
                                            <div class="form-col-left">
                                                <div class="wpdiscuz-item">
                                                    <div class="wpd-field-icon"><i class="fa fa-user"></i></div>
                                                    <input class="wpd-field" type="text" name="wc-name" placeholder="Họ và tên">
                                                </div>
                                                <div class="wpdiscuz-item">
                                                    <div class="wpd-field-icon"><i class="fa fa-phone"></i></div>
                                                    <input class="wpd-field" type="text" name="wc-name" placeholder="Số điện thoại">
                                                </div>
                                                <div class="wpdiscuz-item">
                                                    <div class="wpd-field-icon"><i class="fa fa-at"></i></div>
                                                    <input class="wpd-field" type="email" name="wc-name" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-col-right">
                                            <div class="field-captcha wpdiscuz-item">
                                                        <div class="captcha-input">
                                                            <input type="text" class="wpd-field field_captcha" name="wc_captcha" placeholder="Code">
                                                        </div>
                                                        <div class="wc-label wc-captcha-label"><img src="./images/code.jpeg"></div>
                                                    </div>
                                                <div class="field-submit">
                                                    <div class="wc_notification_checkboxes">
                                                        <input type="checkbox" name="wpdiscuz_notification_type" value="comment">
                                                        <label class="wc-label-comment-notify">Thông báo khi có trả lời</label>
                                                    </div>
                                                    <input class="wc_comm_submit wc_not_clicked button alt" type="submit" name="submit" value="Gửi bình Luận">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="wpdiscuz-front-actions">
                                <div class="wpdiscuz-sort-buttons">Sắp xếp theo:
                                    <span class="wpdiscuz-sort-button wpdiscuz-date-sort-desc">Mới Nhất | </span>
                                    <span class="wpdiscuz-sort-button wpdiscuz-date-sort-asc wpdiscuz-sort-button-active">Cũ Nhất | </span>
                                    <span class="wpdiscuz-sort-button wpdiscuz-vote-sort-up">Bình chọn nhiều nhất</span>
                                </div>
                            </div>
                            <div id="wcThreadWrapper" class="wc-thread-wrapper">
                                <div id="wc-comm-1872_0" class="wc-comment wc-blog-guest wc_comment_level-1">
                                    <div class="wc-comment-left ">
                                        <img src="./images/avata.png">
                                        <div class="wc-blog-guest wc-comment-label">
                                            <span>Khách</span>
                                        </div>
                                    </div>
                                    <div id="comment-1872" class="wc-comment-right">
                                        <div class="wc-comment-header"></div>
                                        <div class="wc-comment-text"></div>
                                        <div class="wc-comment-footer"></div>
                                    </div>
                                    <div id="wc-comm-1912_1872" class="wc-comment wc-reply wc-blog-user wc-blog-post_author wc_comment_level-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="quangcao-2">
                        <div class="quangcao-left">
                            <img src="./images/ads12.png">
                        </div>
                        <div class="quangcao-right">
                            <img src="./images/ads23.png">
                        </div>
                    </div>
                    <div class="lienquan-post">
                        <span class="box4"><a href="#">BÀI VIẾT CÙNG CHUYÊN MỤC</a></span>
                        <ul>
                             <li><a href="#">Đại Học Công Nghệ Đại Học Quốc Gia Hà Nội – Cơ Hội Học Tập Không Thể Bỏ Lỡ</a></li>
                            <li><a href="#">Tuyển Sinh Văn Bằng 2 Đại Học Kinh Tế Quốc Dân 2019 – Tất Cả Thông Tin Cần Biết</a></li>
                            <li><a href="#">Đại Học Kinh Tế ĐHQG Hà Nội Thông Báo Tuyển Sinh Sau Đại Học</a></li>
                            <li><a href="#">Học Viện Tòa Án</a></li>
                            <li><a href="#">Trường Đại Học Sư Phạm Hà Nội Tuyển Sinh 2019</a></li>
                            <li><a href="#">Trường Đại Học Phòng Cháy Chữa Cháy</a></li>
                            <li><a href="#">Học Viện Chính Trị Công An Nhân Dân</a></li>
                            <li><a href="#">Trường Đại Học Văn Hóa Nghệ Thuật Quân Đội</a></li>
                            <li><a href="#">Trường Sĩ Quan Phòng Hóa Tuyển Sinh</a></li>
                            <li><a href="#">Trường Sĩ Quan Pháo Binh Tuyển Sinh</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="sitebar">
                @include('fe.include.sidebar')
            </div>
        </div>
    </div><!--kết thúc khối Wap-post--><!-- Kết Thúc nội dung khác biệt của Post-thongbao.html với các khối khác-->
    <div id="sitebar-alt">
        <a href="#"><img src="./images/ba1.jpeg"></a>
        <a href="#"><img src="./images/ba1.jpeg"></a>
    </div>
</div><!--kết thúc khối Main-body-->
@endsection
