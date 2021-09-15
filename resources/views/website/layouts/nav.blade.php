<header>
    <!--TOP HEADER START-->
    <div class="top-header">
        <div class="container">
            <div class="header-left">
                <p><strong>Phone:</strong>{{ $nairobi_tel->value }}</p>
            </div>
            <div class="header-right">
                <div class="ht-right-email">
                    <p>{{ $nairobi_email->value }}</p>
                </div>
                <div class="ht-right-social">
                    <a href="{{ $facebook->value }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                </div>
                <div class="ht-right-social">
                    <a href="{{ $linkedin->value }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!--TOP HEADER END-->

    <!--MEGAMENU START-->
    <div class="main-nav" id="navbar">
        <div class="container">
            <nav id="navigation1" class="navigation">
                <div class="nav-header">
                    <a class="nav-logo" href="{{ url('/') }}">
                        <img src="{{ Storage::url($logo->value) }}"  class="white-logo" alt="">
                    </a>
                    <div class="nav-toggle"></div>
                </div>
                <div class="nav-menus-wrapper">
                    <ul class="nav-menu align-to-right">
                        <li><a href="{{ url('/') }}">HOME</a>
                        </li>
                        <li><a href="{{ url('/#about') }}">ABOUT</a>
                        </li>
                        <li><a href="{{ url('our-products') }}">PRODUCTS</a>
                        </li>
                        <li><a href="{{ url('blog') }}">INSIGHTS</a>
                        </li>
                        <li><a href="{{ url('contact-us') }}">CONTACT US</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!--MEGAMENU END-->
</header>
