<nav class="navbar" id="slide-nav">
    <div class="container">
        <div class="navbar-header">
            <div class="mobile-topline"><button type="button" class="navbar-toggle"><i
                        class="icon icon-interface icon-menu"></i><i class="icon icon-cancel"></i></button>
                <div class="phone-number"><span>{{$main_phone}}</span></div>
            </div>
            <div class="header-top">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="logo"><a href="index.html"><span class="hidden-xs"><img src="/assets/images/logo.gif"
                                        alt="Logo"></span><span class="visible-xs"><img src="/assets/images/logo-mobile.png"
                                        alt="Logo"></span></a></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="phone">
                            <div class="phone-wrapper">
                                <div class="under-number">Горячая линия</div>
                            <div class="number"><span>{{$main_phone}}</span></div>
                            </div>
                            <div class="right-text">
                                <div class="item arrow hoveranimation" data-animation="rotateInUpRight"
                                    data-animation-delay="0.5s" style="animation-delay: 0.5s;"><img
                                        src="/assets/images/call-us-arrow-1.png" alt="macbook-reparatur-service-berlin">
                                </div>
                                <div class="item text1 hoveranimation" data-animation="fadeInUp"
                                    data-animation-delay="0.75s" style="animation-delay: 0.75s;"><img
                                        src="/assets/images/call-us-arrow-2.png" alt="laptop-reparatur-service-berlin">
                                </div>
                                <div class="item text2 hoveranimation" data-animation="fadeInUp"
                                    data-animation-delay="1s" style="animation-delay: 1s;"><img
                                        src="/assets/images/call-us-arrow-3.png" alt="notebook-reparatur-service-berlin">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="slidemenu" data-hover="dropdown" data-animations="fadeIn">
        <ul class="nav navbar-nav">
        <li class="active"><a href="index.html" class="shadow-effect">{{ $slot }}</a></li>
            <li><a href="laptop-reparatur-berlin-spandau.html" class="shadow-effect">Über uns</a></li>
            <li class="dropdown"><a href="service.html" data-toggle="dropdown" data-submenu=""
                    class="shadow-effect">Service<span class="ecaret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="laptop-reparatur-berlin.html">Laptop Reparatur Berlin</a></li>
                    <li><a href="pc-reparatur-berlin.html">Notebook Reparatur Berlin</a></li>
                    <li><a href="macbook-reparatur-berlin.html">MacBook Reparatur Berlin</a></li>
                    <li><a href="acer-notebook-reparatur-berlin.html">Datenrettung</a></li>
                    <li><a href="asus-notebook-reparatur-berlin.html">Malware -und Virusentfernung</a></li>
                    <li><a href="hp-notebook-reparatur-berlin.html">Softwareinstallation</a></li>
                    <li><a href="notebook-reparatur-berlin.html">Hardware Updates</a></li>
                    <li><a href="notebook-reparatur-berlin-spandau.html">Individuelle PC/Laptop Systeme</a></li>
                    <li><a href="lenovo-notebook-reparatur-berlin.html">Netzwerk / Server</a></li>
                </ul>
            </li>
            <li><a href="preise.html" class="shadow-effect">Preise</a></li>
            <li class="dropdown"><a href="dell-notebook-reparatur-berlin.html" data-toggle="dropdown"
                    data-submenu="" class="shadow-effect">Blog<span class="ecaret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="dell-notebook-reparatur-berlin.html">Blog Notebook Service</a></li>
                    <li><a href="blog-card.html">Blog Laptop Service</a></li>
                    <li><a href="blog-single.html">Blog MacBook Service</a></li>
                </ul>
            </li>
            <li><a href="testimonials.html" class="shadow-effect">Referenzen</a></li>
            <li><a href="faq.html" class="shadow-effect">Tips &amp; FAQ</a></li>
            <li><a href="shop.html" class="shadow-effect">Shop</a> </li>
            <li><a href="contact.html" class="shadow-effect">Kontakt</a></li>
        </ul>
    </div>
</nav>
<div id="navbar-height-col"></div>