<!--// Main Content \\-->
		<div class="wm-main-content">

            <!--// Main Section \\-->
            <div class="wm-main-section wm-contact-full wm-contact-full-inner">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-md-12">
                            
                            <div class="wm-contact-tab">

                              <!-- Nav tabs -->
                              <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" aria-controls="home" data-toggle="tab">Kontak Kami</a></li>
                                <li><a href="#profile" aria-controls="profile" data-toggle="tab">Detail Informasi</a></li>
                              </ul>

                              <!-- Tab panes -->
                              <div class="tab-content">
                                <div class="tab-pane active" id="home">
                                    <div class="row">
                                        <div class="col-md-4"> <div class="wm-map"> <div id="map"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7905.82318077263!2d112.0098734!3d-7.7991846!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7ad89519a1d73140!2sPoliteknik+Kediri!5e0!3m2!1sen!2sid!4v1482287161850" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div> </div> </div>
                                        <div class="col-md-8">
                                            <div class="wm-contact-form">
                                                <span>Hubungi Kami</span>
                                               <form action="<?php echo base_url()."frontend/kontak/input_data_kontak"; ?> " method="POST" enctype="multipart/form-data">
                                                    <ul>
                                                        <li>
                                                            <i class="wmicon-black"></i>
                                                            <input id="nama" name="nama" type="text" class="text" placeholder="Nama" required />
                                                        </li>
                                                        <li>
                                                            <i class="wmicon-symbol3"></i>
                                                              <input id="email" name="email" type="text" class="text" placeholder="Email" required />
                                                        </li>
                                                        <li>
                                                            <i class="wmicon-technology4"></i>
                                                            <input id="tlp" name="tlp" type="text" class="text" placeholder="Tlp/Hp" required/>
                                                        </li>
                                                        <li>
                                                            <i class="wmicon-web2"></i>
                                                             <textarea id="pesan" name="pesan" value="" placeholder="Pesan..." required></textarea>
                                                        </li>
                                                        <li> <input name="submit" type="submit" id="submit" value="Submit"/><br> </li>
                                                    </ul>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="profile">
                                    <span class="wm-contact-title">Info Kontak</span>
                                    <div class="wm-contact-service">
                                        <ul class="row">
                                            <li class="col-md-4">
                                                <span class="wm-service-icon"><i class="wmicon-pin"></i></span>
                                                <h5 class="wm-color">Alamat</h5>
                                                <p>Jl. Mayor Bismo No. 27, Kota, Kediri - 64121</p>
                                            </li>
                                            <li class="col-md-4">
                                                <span class="wm-service-icon"><i class="wmicon-phone"></i></span>
                                                <h5 class="wm-color">Telepon</h5>
                                                <p>(0354) 683128</p>
                                            </li>
                                            <li class="col-md-4">
                                                <span class="wm-service-icon"><i class="wmicon-letter"></i></span>
                                                <h5 class="wm-color">E-mail</h5>
                                                <p><a href="mailto:info@poltek-kediri.ac.id">info@poltek-kediri.ac.id</a></p>
                                            </li>
                                        </ul>
                                    </div>
                                    <ul class="contact-social-icon">
                                        <li><a href="https://www.facebook.com/politeknikkediri/"><i class="wm-color wmicon-social5"></i> Facebook</a></li>
                                        <li><a href="http://twitter.com/poltekkediri"><i class="wm-color wmicon-social4"></i> Twitter</a></li>
                                        <li><a href="http://plus.google.com/100162413196228290739"><i class="fa fa-google-plus"></i>Google-plus</a></li>
                                        <li><a href="http://www.youtube.com/channel/UCTHVevjV4fYJSNmVL4dpKHQ"><i class="fa fa-youtube"></i> YouTube</a></li>
                                    </ul>
                                </div>
                              </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!--// Main Section \\-->
