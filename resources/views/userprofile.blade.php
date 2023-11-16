<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website</title>

    <!--
      - favicon
    -->
    <link rel="shortcut icon" href="./assets/images/logo/favicon.ico" type="image/x-icon">

    <!--
      - custom css link
    -->
    <link rel="stylesheet" href="{{asset('css/style-prefix.css')}}">

    <!--
      - google font link*
    -->

    <script src="//code.tidio.co/2l8awmiopxub2rsj7vuajrnkxy2xnqln.js" async></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <script src="https://kit.fontawesome.com/a87236255f.js" crossorigin="anonymous"></script>

</head>

<body>
<header>

    <div class="header-top">

        <div class="container">

            <ul class="header-social-container">

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a>
                </li>

            </ul>

            <div class="header-alert-news">
                <p>
                    <b>Free Shipping</b>
                    This Week Order Over - $55
                </p>
            </div>

            <div class="header-top-actions">

                <select name="currency" id="currency">

                    <option value="usd">USD &dollar;</option>
                    <option value="eur">EUR &euro;</option>
                    <option value="bdt">BDT &#2547;</option>

                </select>

                <select name="language">

                    <option value="en-US">English</option>
                    <option value="es-ES">Espa&ntilde;ol</option>
                    <option value="fr">Fran&ccedil;ais</option>

                </select>

            </div>

        </div>

    </div>

    <div class="header-main">

        <div class="container">

            <a href="#" class="header-logo">
                <img src="{{asset('logo/logo.svg')}}" alt="Anon's logo" width="120" height="36">
            </a>

            <div class="header-search-container">
                <form action="{{route('allproduct2',['id'=>$user->id])}}" method="get">
                    @csrf
                    <input type="search" name="search" class="search-field" placeholder="Enter your product...">

                    <button class="search-btn" type="submit">
                        <ion-icon name="search-outline"></ion-icon>
                    </button>
                </form>
            </div>

            <div class="header-user-actions">

                <!-- <a href="{{route('login')}}" class="action-btn">
            <ion-icon name="person-outline"></ion-icon>
        </a> -->

                <a class="action-btn" style="font-size: 14px;">Hello, {{ implode(' ', array_slice(explode(' ', $user->name), 0, 3)) }}</a>

                <a class="action-btn" href="{{ route('cart',['id' => $user->id]) }}">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="count">{{$total}}</span>
                </a>

            </div>

        </div>

    </div>

    <nav class="desktop-navigation-menu">

        <div class="container">

            <ul class="desktop-menu-category-list">

                <li class="menu-category">
                    <a href="#" class="menu-title" style="color: blue;">Home</a>

                <li class="menu-category">
                    <a href="{{route('aboutus',['id'=>$user->id])}}" class="menu-title">About Us</a>
                </li>
                <li class="menu-category">
                    <a href="#" class="menu-title">Categories</a>
                    <ul class="dropdown-list">

                        @foreach($category as $cata)
                            <li class="dropdown-item">
                                <a href="{{route('productlist2',['id'=>$user->id,'category'=>$cata->Category_Name])}}">{{$cata->Category_Name}}</a>
                            </li>
                        @endforeach

                    </ul>
                </li>

                <li class="menu-category">
                    <a href="#" class="menu-title">Special Offers</a>
                </li>
                <li class="menu-category">
                    <a href="#" class="menu-title">Contact Us</a>
                </li>


                {{--                <li class="menu-category">--}}
                {{--                    <a href="#" class="menu-title">Categories</a>--}}

                {{--                    <div class="dropdown-panel">--}}

                {{--                        <ul class="dropdown-panel-list">--}}

                {{--                            <li class="menu-title">--}}
                {{--                                <a href="#">Kids</a>--}}
                {{--                            </li>--}}

                {{--                            <li class="panel-list-item">--}}
                {{--                                <a href="#">Shirt</a>--}}
                {{--                            </li>--}}

                {{--                            <li class="panel-list-item">--}}
                {{--                                <a href="#">T-Shirt</a>--}}
                {{--                            </li>--}}

                {{--                            <li class="panel-list-item">--}}
                {{--                                <a href="#">Shoes</a>--}}
                {{--                            </li>--}}

                {{--                            <li class="panel-list-item">--}}
                {{--                                <a href="#">Diaper</a>--}}
                {{--                            </li>--}}

                {{--                            <li class="panel-list-item">--}}
                {{--                                <a href="#">Toy</a>--}}
                {{--                            </li>--}}

                {{--                            <li class="panel-list-item">--}}
                {{--                                <a href="#">--}}
                {{--                                    <img src="{{asset('logo/electronics-banner-1.jpg')}}" alt="headphone collection" width="250"--}}
                {{--                                         height="119">--}}
                {{--                                </a>--}}
                {{--                            </li>--}}

                {{--                        </ul>--}}

                {{--                        <ul class="dropdown-panel-list">--}}

                {{--                            <li class="menu-title">--}}
                {{--                                <a href="#">Men's</a>--}}
                {{--                            </li>--}}

                {{--                            <li class="panel-list-item">--}}
                {{--                                <a href="#">Formal</a>--}}
                {{--                            </li>--}}

                {{--                            <li class="panel-list-item">--}}
                {{--                                <a href="#">Casual</a>--}}
                {{--                            </li>--}}

                {{--                            <li class="panel-list-item">--}}
                {{--                                <a href="#">Sports</a>--}}
                {{--                            </li>--}}

                {{--                            <li class="panel-list-item">--}}
                {{--                                <a href="#">Jacket</a>--}}
                {{--                            </li>--}}

                {{--                            <li class="panel-list-item">--}}
                {{--                                <a href="#">Sunglasses</a>--}}
                {{--                            </li>--}}

                {{--                            <li class="panel-list-item">--}}
                {{--                                <a href="#">--}}
                {{--                                    <img src="{{asset('logo/mens-banner.jpg')}}" alt="men's fashion" width="250" height="119">--}}
                {{--                                </a>--}}
                {{--                            </li>--}}

                {{--                        </ul>--}}

                {{--                        <ul class="dropdown-panel-list">--}}

                {{--                            <li class="menu-title">--}}
                {{--                                <a href="#">Women's</a>--}}
                {{--                            </li>--}}

                {{--                            <li class="panel-list-item">--}}
                {{--                                <a href="#">Formal</a>--}}
                {{--                            </li>--}}

                {{--                            <li class="panel-list-item">--}}
                {{--                                <a href="#">Casual</a>--}}
                {{--                            </li>--}}

                {{--                            <li class="panel-list-item">--}}
                {{--                                <a href="#">Perfume</a>--}}
                {{--                            </li>--}}

                {{--                            <li class="panel-list-item">--}}
                {{--                                <a href="#">Cosmetics</a>--}}
                {{--                            </li>--}}

                {{--                            <li class="panel-list-item">--}}
                {{--                                <a href="#">Bags</a>--}}
                {{--                            </li>--}}

                {{--                            <li class="panel-list-item">--}}
                {{--                                <a href="#">--}}
                {{--                                    <img src="{{asset('logo/womens-banner.jpg')}}" alt="women's fashion" width="250" height="119">--}}
                {{--                                </a>--}}
                {{--                            </li>--}}

                {{--                        </ul>--}}

                {{--                        <ul class="dropdown-panel-list">--}}

                {{--                            <li class="menu-title">--}}
                {{--                                <a href="#">Electronics</a>--}}
                {{--                            </li>--}}

                {{--                            <li class="panel-list-item">--}}
                {{--                                <a href="#">Smart Watch</a>--}}
                {{--                            </li>--}}

                {{--                            <li class="panel-list-item">--}}
                {{--                                <a href="#">Smart TV</a>--}}
                {{--                            </li>--}}

                {{--                            <li class="panel-list-item">--}}
                {{--                                <a href="#">Keyboard</a>--}}
                {{--                            </li>--}}

                {{--                            <li class="panel-list-item">--}}
                {{--                                <a href="#">Mouse</a>--}}
                {{--                            </li>--}}

                {{--                            <li class="panel-list-item">--}}
                {{--                                <a href="#">Microphone</a>--}}
                {{--                            </li>--}}

                {{--                            <li class="panel-list-item">--}}
                {{--                                <a href="#">--}}
                {{--                                    <img src="{{asset('logo/electronics-banner-2.jpg')}}" alt="mouse collection" width="250" height="119">--}}
                {{--                                </a>--}}
                {{--                            </li>--}}

                {{--                        </ul>--}}

                {{--                    </div>--}}
                {{--                </li>--}}



                <li class="menu-category">
                    {{--                    <a href="#" class="menu-title">{{ $user->name }}</a>--}}
                    <ul class="dropdown-list">

                        <li class="dropdown-item">
                            <a href="{{ route('purchase',['id'=>$user->id]) }}">Purchase History</a>
                        </li>

                        <li class="dropdown-item">

                            <a href="/">Logout</a>
                        </li>

                    </ul>
                </li>

            </ul>

        </div>

    </nav>



    <div class="mobile-bottom-navigation">

        <button class="action-btn" data-mobile-menu-open-btn>
            <ion-icon name="menu-outline"></ion-icon>
        </button>

        <a href="{{ route('cart', ['id' => $user->id]) }}" class="action-btn">
            <ion-icon name="bag-handle-outline"></ion-icon>
            <span class="count"></span>
        </a>


        <button class="action-btn">
            <ion-icon name="home-outline"></ion-icon>
        </button>

        <button class="action-btn">
            <ion-icon name="heart-outline"></ion-icon>

            <span class="count">0</span>
        </button>

        <button class="action-btn" data-mobile-menu-open-btn>
            <ion-icon name="grid-outline"></ion-icon>
        </button>

    </div>

    <nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>

        <div class="menu-top">
            <h2 class="menu-title">Menu</h2>

            <button class="menu-close-btn" data-mobile-menu-close-btn>
                <ion-icon name="close-outline"></ion-icon>
            </button>
        </div>

        <ul class="mobile-menu-category-list">

            <li class="menu-category">
                <a href="#" class="menu-title">Home</a>
            </li>

            <li class="menu-category">

                <button class="accordion-menu" data-accordion-btn>
                    <p class="menu-title">Men's</p>

                    <div>
                        <ion-icon name="add-outline" class="add-icon"></ion-icon>
                        <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                    </div>
                </button>

                <ul class="submenu-category-list" data-accordion>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Shirt</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Shorts & Jeans</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Safety Shoes</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Wallet</a>
                    </li>

                </ul>

            </li>

            <li class="menu-category">

                <button class="accordion-menu" data-accordion-btn>
                    <p class="menu-title">Women's</p>

                    <div>
                        <ion-icon name="add-outline" class="add-icon"></ion-icon>
                        <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                    </div>
                </button>

                <ul class="submenu-category-list" data-accordion>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Dress & Frock</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Earrings</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Necklace</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Makeup Kit</a>
                    </li>

                </ul>

            </li>



            <li class="menu-category">
                <a href="{{route('aboutus',['id'=>$user->id])}}" class="menu-title">About Us</a>
            </li>

            <li class="menu-category">
                <a href="#" class="menu-title">Hot Offers</a>
            </li>

            <li class="menu-category">

                <button class="accordion-menu" data-accordion-btn>
                    <p class="menu-title">{{ $user->name }}</p>

                    <div>
                        <ion-icon name="add-outline" class="add-icon"></ion-icon>
                        <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                    </div>
                </button>

                <ul class="submenu-category-list" data-accordion>

                    <li class="submenu-category">
                        <a href="{{ route('purchase',['id'=>$user->id]) }}" class="submenu-title">Purchase History</a>
                    </li>

                    <li class="submenu-category">
                        <a href="/" class="submenu-title">Logout</a>
                    </li>

                </ul>

            </li>


        </ul>

        <div class="menu-bottom">

            <ul class="menu-category-list">

                <li class="menu-category">

                    <button class="accordion-menu" data-accordion-btn>
                        <p class="menu-title">Language</p>

                        <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
                    </button>

                    <ul class="submenu-category-list" data-accordion>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">English</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Espa&ntilde;ol</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Fren&ccedil;h</a>
                        </li>

                    </ul>

                </li>

                <li class="menu-category">
                    <button class="accordion-menu" data-accordion-btn>
                        <p class="menu-title">Currency</p>
                        <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
                    </button>

                    <ul class="submenu-category-list" data-accordion>
                        <li class="submenu-category">
                            <a href="#" class="submenu-title">USD &dollar;</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">EUR &euro;</a>
                        </li>
                    </ul>
                </li>

            </ul>

            <ul class="menu-social-container">

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a>
                </li>

            </ul>

        </div>

    </nav>

</header>

<section class="user-profile">
    <div class="container">
        <div class="user-info">
            <img src="{{ asset('path-to-user-image.jpg') }}" alt="User Avatar" class="avatar">
            <div class="user-details">
                <h3>{{ $user->name }}</h3>
                <p>Email: {{ $user->email }}</p>
                <p>Phone: {{$user->phone}}</p>
            </div>
        </div>
        <!-- You can add more elements here based on your design -->
    </div>
</section>

</body>
</html>
