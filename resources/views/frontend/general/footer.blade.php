
        <footer class="col-sm-12">
            <div class="row">
                <div class="newletter-subscribe-container">
                    <div class="container">
                        <div class="container-inner">
                            <div class="newletter-subscribe">
                                <div id="boxes-normal" class="newletter-container">
                                    <div style="" id="dialog-normal" class="window">
                                        <div class="box">
                                            <div class="row">
                                                <div class="col-sm-5 col-xs-12">
                                                    <div class="newletter-title">
                                                        <h3>
                                                            Nhận<span> bản tin </span>                                                
                                                        </h3>
                                                        <label>Đăng ký email để nhanh chóng nhận được các thông báo về khuyến mại, chương trình giảm giá của chúng tôi</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-7 col-xs-12">
                                                    <div class="box-content newleter-content footer-newsletter1375268279">
                                                        <div class="des-testimonial"></div>
                                                        <div id="frm_subscribe-normal">
                                                            <form name="subscribe" id="subscribe-normal" class="formNewLestter1375268279">
                                                                <input type="text" value="" class="email" name="email" id="subscribe_email-normal" placeholder="Email">
                                                                <input type="hidden" value="1" name="action" id="subscribe_name-normal">
                                                                <a name="submitNewsletter" class="btn">Đăng ký!</a>
                                                            </form>
                                                        </div>
                                                        <!-- /#frm_subscribe -->
                                                        <div id="notification-normal"></div>
                                                    </div>
                                                    <!-- /.box-content -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $('.formNewLestter1375268279 a[name="submitNewsletter"]').on('click', function () {
                                                $('.formNewLestter1375268279').trigger('submit');
                                            });
                                            $('.formNewLestter1375268279').on('submit', function () {
                                                var email = $('.formNewLestter1375268279 .email').val();
                                        
                                                $(".success, .warning, .error").remove();
                                                if (!isValidEmailAddress(email)) {
                                                    $('.footer-newsletter1375268279 #notification-normal').html("<div class=\"error\">Email không hợp lệ</div>");
                                                    $('.formNewLestter1375268279 .email').focus();
                                                    return false;
                                                }
                                        
                                                var url = "index.php?route=tool/newsletter";
                                                $.ajax({
                                                    type: "post",
                                                    url: url,
                                                    data: $(".formNewLestter1375268279").serialize(),
                                                    dataType: 'json',
                                                    success: function (json) {
                                                        $(".success, .warning, .error").remove();
                                                        if (json['error']) {
                                                            $('.footer-newsletter1375268279 #notification-normal').html("<div class=\"warning\">" + json['error'] + "</div>");
                                                        }
                                                        if (json['success']) {
                                                            $('.footer-newsletter1375268279 #notification-normal').html("<div class=\"success\">" + json['success'] + "</div>");
                                                        }
                                                    }
                                                });
                                                return false;
                                        
                                            }); /*end submmit*/
                                        }); /* end document */
                                        
                                        function isValidEmailAddress(emailAddress) {
                                            var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
                                            return pattern.test(emailAddress);
                                        }
                                        
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-footer">
                                <div class="footer-title">Giới thiệu</div>
                                <div class="footer-content">
                                    <p class="des">Chúng tôi là một nhóm các nhà thiết kế và phát triển tạo ra chất lượng cao Magento, Prestashop, Opencart chủ đề và cung cấp hỗ trợ cao cấp và hỗ trợ cho các sản phẩm của chúng tôi.</p>
                                    <div class="footer-payment">
                                        <label>Thanh toán</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-footer">
                                <div class="footer-title">Liên hệ</div>
                                <div class="footer-content">
                                    <ul class="list-unstyled text-content">
                                        <li><strong>Địa chỉ</strong>: A12, Đinh Tiên Hoàng, Q. Hoàn Kiếm, Hà Nội</li>
                                        <li><strong>Điện thoại</strong>: 0123456789</li>
                                        <li><strong>Email</strong>: contact@yourdomain.com</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6 col-footer">
                                <div class="footer-title">Thông tin</div>
                                <div class="footer-content">
                                    <ul class="list-unstyled text-content">
                                        <li><a href="https://bigone.myzozo.net/gioi-thieu">Giới thiệu</a></li>
                                        <li><a href="https://bigone.myzozo.net/huong-dan-dat-hang">Hướng dẫn đặt hàng</a></li>
                                        <li><a href="https://bigone.myzozo.net/huong-dan-thanh-toan">Hướng dẫn thanh toán</a></li>
                                        <li><a href="https://bigone.myzozo.net/chinh-sach-bao-mat">Chính sách bảo mật</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-footer">
                                <!--<div class="footer-title"></div>-->
                                <div class="footer-content">
                                    <ul class="list-unstyled text-content">
                                        <li>
                                            <div class="fb-page" data-href="https://www.facebook.com/FacebookVietNam" data-small-header="false"
                                                data-adapt-container-width="true" data-hide-cover="false"
                                                data-show-facepile="true"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="footer-middle">
                    <div class="container">
                        <div class="container-inner"></div>
                    </div>
                    </div>-->
                <div class="footer-bottom">
                    <div class="container">
                        <div class="container-inner">
                            <div class="footer-copyright">
                                <span>&copy; Copyright 2018 Big One. Thiết kế bởi <a target="_blank" href="https://www.zozo.vn?utm_source=bigone.myzozo.net&utm_medium=referral&utm_campaign=copyrightwebdesign&utm_term=footerurl&utm_content=footer">Zozo</a></span>
                            </div>
                            <div class="follow">
                                <ul class="link-follow">
                                    <li><a href="https://www.facebook.com/FacebookVietNam" class="facebook fa fa-facebook" title="Facebook"><span>facebook</span></a></li>
                                    <li><a href="#" class="twitter fa fa-twitter" title="Twitter"><span>twitter</span></a></li>
                                    <li><a href="#" class="google fa fa-google-plus" title="Google"><span>google</span></a></li>
                                    <li><a href="#" class="youtube fa fa-youtube" title="Youtube"><span>youtube</span></a></li>
                                    <li><a href="#" class="flickr fa fa-instagram" title="Instagram"><span>instagram</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="back-top"><i class="fa fa-angle-up"></i></div>
            </div>
        </footer>
        <link rel="stylesheet" href="assets/frontend/catalog/view/theme/default/stylesheet/social_login_button.css"/>
        <!-- Facebook Login -->
        <!-- Google Login -->
        <!-- Facebook script -->
        <div id="fb-root"></div>
        <script type="text/javascript">
            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=829732533863539";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        @yield('script')
    </body>
</html>