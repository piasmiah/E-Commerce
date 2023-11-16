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

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="shortcut icon" href="{{asset('logo/favicon.ico')}}" type="image/x-icon">

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="{{asset('css/style-prefix.css')}}">
    <script src="//code.tidio.co/2l8awmiopxub2rsj7vuajrnkxy2xnqln.js" async></script>
    <script src="https://kit.fontawesome.com/a87236255f.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

</head>



<body>


  <div class="overlay" data-overlay></div>

  <!--
    - MODAL
  -->

{{--  <div class="modal" data-modal>--}}

{{--    <div class="modal-close-overlay" data-modal-overlay></div>--}}

{{--    <div class="modal-content">--}}

{{--      <button class="modal-close-btn" data-modal-close>--}}
{{--        <ion-icon name="close-outline"></ion-icon>--}}
{{--      </button>--}}

{{--      <div class="newsletter-img">--}}
{{--        <img src="{{asset('logo/cam-morin-knKm7u_7Ihw-unsplash.jpg')}}" alt="subscribe newsletter" width="400" height="400">--}}
{{--      </div>--}}

{{--      <div class="newsletter">--}}

{{--        <form action="{{route('subscribe')}}" method="post">--}}
{{--            @csrf--}}
{{--          <div class="newsletter-header">--}}

{{--            <h3 class="newsletter-title">Subscribe Newsletter.</h3>--}}

{{--            <p class="newsletter-desc">--}}
{{--              Subscribe the <b>Ecommrece</b> to get latest products and discount update.--}}
{{--            </p>--}}

{{--          </div>--}}

{{--          <input type="email" name="email" class="email-field" placeholder="Email Address" required>--}}

{{--          <button type="submit" class="btn-newsletter">Subscribe</button>--}}

{{--        </form>--}}

{{--      </div>--}}

{{--    </div>--}}

{{--  </div>--}}





  <!--
    - NOTIFICATION TOAST
  -->

{{--  <div class="notification-toast" data-toast>--}}

{{--    <button class="toast-close-btn" data-toast-close>--}}
{{--      <ion-icon name="close-outline"></ion-icon>--}}
{{--    </button>--}}

{{--    <div class="toast-banner">--}}
{{--      <img src="{{asset('storage/' . $product3->pro_pic)}}" alt="Lafz Perfume" width="80" height="70">--}}
{{--    </div>--}}

{{--    <div class="toast-detail">--}}

{{--      <p class="toast-message">--}}
{{--          {{$product3->customer_name}} just bought--}}
{{--      </p>--}}

{{--      <p class="toast-title">--}}
{{--      {{$product3->pro_des}}--}}
{{--      </p>--}}

{{--      <p class="toast-meta" id="timeElapsed">--}}
{{--        <time datetime="PT2M">2 Minutes</time> ago--}}
{{--      </p>--}}

{{--    </div>--}}

{{--  </div>--}}





  <!--
    - HEADER
  -->

  <header>

    <div class="header-top">

      <div class="container">

        <ul class="header-social-container">

{{--          <li>--}}
{{--            <a href="#" class="social-link">--}}
{{--              <ion-icon name="logo-facebook"></ion-icon>--}}
{{--            </a>--}}
{{--          </li>--}}

{{--          <li>--}}
{{--            <a href="#" class="social-link">--}}
{{--              <ion-icon name="logo-twitter"></ion-icon>--}}
{{--            </a>--}}
{{--          </li>--}}

{{--          <li>--}}
{{--            <a href="#" class="social-link">--}}
{{--              <ion-icon name="logo-instagram"></ion-icon>--}}
{{--            </a>--}}
{{--          </li>--}}

{{--          <li>--}}
{{--            <a href="#" class="social-link">--}}
{{--              <ion-icon name="logo-linkedin"></ion-icon>--}}
{{--            </a>--}}
{{--          </li>--}}
            <li>
                <a href="{{route('delivaryregistration')}}" class="social-link">
                    <p style="font-size: 10px;">Want to our Delivary Boy?</p>
                </a>
            </li>
            <li>
                <a href="{{route('sellerregistration')}}" class="social-link">
                    <p style="font-size: 10px;">Become a seller?</p>
                </a>
            </li>

        </ul>



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

            <form action="{{route('allproduct')}}" method="get">
                @csrf
          <input type="search" name="search" class="search-field" value="" placeholder="Enter your product...">

          <button class="search-btn" type="submit">
            <ion-icon name="search-outline"></ion-icon>
          </button>
            </form>

        </div>

        <div class="header-user-actions">
{{--            <a href="{{route('login')}}" class="action-btn">--}}
{{--            <ion-icon name="person-outline"></ion-icon>--}}
{{--        </a>--}}



          <button class="action-btn">
              <i class="fa-solid fa-cart-shopping"></i>
            <span class="count">0</span>
          </button>

        </div>

      </div>

    </div>

    <nav class="desktop-navigation-menu">


      <div class="container">

        <ul class="desktop-menu-category-list">

          <li class="menu-category">
            <a href="#" class="menu-title" style="color: blue;">Home</a>
          </li>

            <li class="menu-category">
                <a href="{{route('login')}}" class="menu-title">Sign in</a>
            </li>

            <li class="menu-category">
                <a href="{{route('register')}}" class="menu-title">Sign up</a>
            </li>

            <li class="menu-category">
                <a href="#" class="menu-title">Categories</a>
                <ul class="dropdown-list">

                    @foreach($category as $cata)
                    <li class="dropdown-item">
                        <a href="{{route('productlist',['category'=>$cata->Category_Name])}}">{{$cata->Category_Name}}</a>
                    </li>
                    @endforeach

                </ul>
            </li>

{{--          <li class="menu-category">--}}
{{--            <a href="#" class="menu-title">Categories</a>--}}

{{--            <div class="dropdown-panel">--}}

{{--              <ul class="dropdown-panel-list">--}}

{{--                <li class="menu-title">--}}
{{--                  <a href="#">Kids</a>--}}
{{--                </li>--}}

{{--                <li class="panel-list-item">--}}
{{--                  <a href="#">Shirt</a>--}}
{{--                </li>--}}

{{--                <li class="panel-list-item">--}}
{{--                  <a href="#">T-Shirt</a>--}}
{{--                </li>--}}

{{--                <li class="panel-list-item">--}}
{{--                  <a href="#">Shoes</a>--}}
{{--                </li>--}}

{{--                <li class="panel-list-item">--}}
{{--                  <a href="#">Diaper</a>--}}
{{--                </li>--}}

{{--                <li class="panel-list-item">--}}
{{--                  <a href="#">Toy</a>--}}
{{--                </li>--}}

{{--                <li class="panel-list-item">--}}
{{--                  <a href="#">--}}
{{--                    <img src="{{asset('logo/electronics-banner-1.jpg')}}" alt="headphone collection" width="250"--}}
{{--                      height="119">--}}
{{--                  </a>--}}
{{--                </li>--}}

{{--              </ul>--}}

{{--              <ul class="dropdown-panel-list">--}}

{{--                <li class="menu-title">--}}
{{--                  <a href="#">Men's</a>--}}
{{--                </li>--}}

{{--                <li class="panel-list-item">--}}
{{--                  <a href="#">Formal</a>--}}
{{--                </li>--}}

{{--                <li class="panel-list-item">--}}
{{--                  <a href="#">Casual</a>--}}
{{--                </li>--}}

{{--                <li class="panel-list-item">--}}
{{--                  <a href="#">Sports</a>--}}
{{--                </li>--}}

{{--                <li class="panel-list-item">--}}
{{--                  <a href="#">Jacket</a>--}}
{{--                </li>--}}

{{--                <li class="panel-list-item">--}}
{{--                  <a href="#">Sunglasses</a>--}}
{{--                </li>--}}

{{--                <li class="panel-list-item">--}}
{{--                  <a href="#">--}}
{{--                    <img src="{{asset('logo/mens-banner.jpg')}}" alt="men's fashion" width="250" height="119">--}}
{{--                  </a>--}}
{{--                </li>--}}

{{--              </ul>--}}

{{--              <ul class="dropdown-panel-list">--}}

{{--                <li class="menu-title">--}}
{{--                  <a href="#">Women's</a>--}}
{{--                </li>--}}

{{--                <li class="panel-list-item">--}}
{{--                  <a href="#">Formal</a>--}}
{{--                </li>--}}

{{--                <li class="panel-list-item">--}}
{{--                  <a href="#">Casual</a>--}}
{{--                </li>--}}

{{--                <li class="panel-list-item">--}}
{{--                  <a href="#">Perfume</a>--}}
{{--                </li>--}}

{{--                <li class="panel-list-item">--}}
{{--                  <a href="#">Cosmetics</a>--}}
{{--                </li>--}}

{{--                <li class="panel-list-item">--}}
{{--                  <a href="#">Bags</a>--}}
{{--                </li>--}}

{{--                <li class="panel-list-item">--}}
{{--                  <a href="#">--}}
{{--                    <img src="{{asset('logo/womens-banner.jpg')}}" alt="women's fashion" width="250" height="119">--}}
{{--                  </a>--}}
{{--                </li>--}}

{{--              </ul>--}}

{{--              <ul class="dropdown-panel-list">--}}

{{--                <li class="menu-title">--}}
{{--                  <a href="#">Electronics</a>--}}
{{--                </li>--}}

{{--                <li class="panel-list-item">--}}
{{--                  <a href="#">Smart Watch</a>--}}
{{--                </li>--}}

{{--                <li class="panel-list-item">--}}
{{--                  <a href="#">Smart TV</a>--}}
{{--                </li>--}}

{{--                <li class="panel-list-item">--}}
{{--                  <a href="#">Keyboard</a>--}}
{{--                </li>--}}

{{--                <li class="panel-list-item">--}}
{{--                  <a href="#">Mouse</a>--}}
{{--                </li>--}}

{{--                <li class="panel-list-item">--}}
{{--                  <a href="#">Microphone</a>--}}
{{--                </li>--}}

{{--                <li class="panel-list-item">--}}
{{--                  <a href="#">--}}
{{--                    <img src="{{asset('logo/electronics-banner-2.jpg')}}" alt="mouse collection" width="250" height="119">--}}
{{--                  </a>--}}
{{--                </li>--}}

{{--              </ul>--}}

{{--            </div>--}}
{{--          </li>--}}

          <li class="menu-category">
              <a class="menu-title" href="{{route('aboutuser')}}">About Us</a>
          </li>

          <li class="menu-category">
            <a href="#" class="menu-title">Special Offers</a>
          </li>
            <li class="menu-category">
                <a href="{{route('contactus')}}" class="menu-title">Contact Us</a>
            </li>



        </ul>

      </div>

    </nav>

    <div class="mobile-bottom-navigation">

      <button class="action-btn" data-mobile-menu-open-btn>
        <ion-icon name="menu-outline"></ion-icon>
      </button>

      <button class="action-btn">
        <ion-icon name="bag-handle-outline"></ion-icon>

        <span class="count">0</span>
      </button>

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
          <a href="#" class="menu-title" data-section="main">Home</a>
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
            <a class="menu-title" href="{{route('aboutuser')}}">About Us</a>
        </li>

        <li class="menu-category">
          <a href="#" class="menu-title">Hot Offers</a>
        </li>

          <li class="menu-category">
              <a href="{{route('login')}}" class="menu-title">Sign in</a>
          </li>

          <li class="menu-category">
              <a href="{{route('register')}}" class="menu-title">Sign up</a>
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





  <!--
    - MAIN
  -->

  <main>

    <!--
      - BANNER
    -->

    <div class="banner">

{{--        <div class="product-main">--}}

{{--            <h2 class="title">New Products</h2>--}}

{{--            <div class="product-grid">--}}
{{--                @foreach($product5 as $prod)--}}
{{--                    <div class="showcase">--}}

{{--                        <div class="showcase-banner">--}}

{{--                            <img src="{{asset('storage/' .$prod->pro_pic)}}" alt="Mens Winter Leathers Jackets" width="300" class="product-img default">--}}
{{--                            <img src="{{asset('storage/' .$prod->pro_pic)}}" alt="Mens Winter Leathers Jackets" width="300" class="product-img hover">--}}

{{--                            --}}{{--                    <p class="showcase-badge">15%</p>--}}

{{--                            <div class="showcase-actions">--}}

{{--                                <button class="btn-action">--}}
{{--                                    <ion-icon name="heart-outline"></ion-icon>--}}
{{--                                </button>--}}

{{--                                <button class="btn-action">--}}
{{--                                    <ion-icon name="eye-outline"></ion-icon>--}}
{{--                                </button>--}}

{{--                                <button class="btn-action">--}}
{{--                                    <ion-icon name="repeat-outline"></ion-icon>--}}
{{--                                </button>--}}

{{--                                <button class="btn-action">--}}
{{--                                    <ion-icon name="bag-add-outline"></ion-icon>--}}
{{--                                </button>--}}

{{--                            </div>--}}

{{--                        </div>--}}

{{--                        <div class="showcase-content">--}}

{{--                            <a href="#" class="showcase-category">{{$prod->pro_name}}</a>--}}

{{--                            <a href="#">--}}
{{--                                <h3 class="showcase-title">{{$prod->pro_des}}</h3>--}}
{{--                            </a>--}}

{{--                            @if($averageRatings[$prod->pro_id] > 0)--}}
{{--                                {{ $averageRatings[$prod->pro_id] }}--}}


{{--                                <div class="showcase-rating">--}}
{{--                                    @for ($i = 1; $i <= 5; $i++)--}}
{{--                                        @if ($i <= $averageRatings[$prod->pro_id])--}}
{{--                                            <ion-icon name="star"></ion-icon>--}}
{{--                                        @else--}}
{{--                                            <ion-icon name="star-outline"></ion-icon>--}}
{{--                                        @endif--}}
{{--                                    @endfor--}}
{{--                                </div>--}}
{{--                            @else--}}

{{--                            @endif--}}

{{--                            <div class="price-box">--}}
{{--                                <p class="price" data-price-usd="{{$prod->price}}">${{$prod->price}}</p>--}}
{{--                                @if($prod->Previous_Price === NULL)--}}

{{--                                @elseif($prod->Previous_Price !== NULL)--}}
{{--                                    <del data-previous-price-usd="{{$prod->Previous_Price}}">${{$prod->Previous_Price}}</del>--}}
{{--                                @endif--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                    </div>--}}
{{--                @endforeach--}}


{{--            </div>--}}
{{--            <div class="swiper-pagination"></div>--}}
{{--        </div>--}}

    </div>





    <!--
      - CATEGORY
    -->






    <!--
      - PRODUCT
    -->

    <div class="product-container">

      <div class="container">


        <!--
          - SIDEBAR
        -->




        <div class="product-box">

          <!--
            - PRODUCT MINIMAL
          -->

          <div class="product-minimal">

            <div class="product-showcase">

              <h2 class="title">Special Offers</h2>

              <div class="showcase-wrapper has-scrollbar">

                <div class="showcase-container">

                @foreach($special_offers as $pro)
                  <div class="showcase">

                    <a href="#" class="showcase-img-box">
                      <img src="{{asset('storage/' .$pro->pro_pic)}}" alt="relaxed short full sleeve t-shirt" width="70" class="showcase-img">
                    </a>

                    <div class="showcase-content">

                      <a href="{{route('login')}}">
                        <h4 class="showcase-title">{{$pro->pro_des}}</h4>
                      </a>

                      <a href="#" class="showcase-category">{{$pro->category}}</a>

                      <div class="price-box">
                          <p class="price" data-price-usd="{{$pro->price}}">${{$pro->price}}</p>
                          @if($pro->Previous_Price === NULL)

                          @elseif($pro->Previous_Price !== NULL)
                              <del data-previous-price-usd="{{$pro->Previous_Price}}">${{$pro->Previous_Price}}</del>
                          @endif
                      </div>

                    </div>

                  </div>
                  @endforeach


                </div>

                <div class="showcase-container">
                @foreach($special_offers2 as $pro)
                <div class="showcase">

                        <a href="#" class="showcase-img-box">
                          <img src="{{asset('storage/' .$pro->pro_pic)}}" alt="relaxed short full sleeve t-shirt" width="70" class="showcase-img">
                        </a>

                        <div class="showcase-content">

                          <a href="{{route('login')}}">
                            <h4 class="showcase-title">{{$pro->pro_des}}</h4>
                          </a>

                          <a href="#" class="showcase-category">{{$pro->category}}</a>

                          <div class="price-box">
                              <p class="price" data-price-usd="{{$pro->price}}">${{$pro->price}}</p>
                              @if($pro->Previous_Price === NULL)

                              @elseif($pro->Previous_Price !== NULL)
                                  <del data-previous-price-usd="{{$pro->Previous_Price}}">${{$pro->Previous_Price}}</del>
                              @endif
                          </div>

                        </div>

                        </div>
                  @endforeach
                </div>

              </div>

            </div>

              <div class="product-showcase">

                  <h2 class="title">Upcoming Product</h2>


                  <div class="showcase-wrapper has-scrollbar">

                      <div class="showcase-container">

                          @foreach($upcoming as $pro)

                              <div class="showcase">

                                  <a href="#" class="showcase-img-box">
                                      <img src="{{asset('storage/' .$pro->pro_pic)}}" alt="relaxed short full sleeve t-shirt" width="70" class="showcase-img">
                                  </a>

                                  <div class="showcase-content">

                                      <a href="{{route('login')}}">
                                          <h4 class="showcase-title">{{$pro->pro_des}}</h4>
                                      </a>

                                      <a href="#" class="showcase-category">{{$pro->category}}</a>

                                      <div class="price-box">
                                          <p class="price" data-price-usd="{{$pro->price}}">${{$pro->price}}</p>
                                          @if($pro->Previous_Price === NULL)

                                          @elseif($pro->Previous_Price !== NULL)
                                              <del data-previous-price-usd="{{$pro->Previous_Price}}">${{$pro->Previous_Price}}</del>
                                          @endif
                                          <p>{{ $pro->upcoming_date }}</p>
                                          <span id="countdown_{{ $pro->pro_id }}"></span>
                                      </div>

                                  </div>

                              </div>

                          @endforeach


                      </div>

                      <div class="showcase-container">
                          @foreach($upcoming2 as $pro)
                              <div class="showcase">

                                  <a href="#" class="showcase-img-box">
                                      <img src="{{asset('storage/' .$pro->pro_pic)}}" alt="relaxed short full sleeve t-shirt" width="70" class="showcase-img">
                                  </a>

                                  <div class="showcase-content">

                                      <a href="{{route('login')}}">
                                          <h4 class="showcase-title">{{$pro->pro_des}}</h4>
                                      </a>

                                      <a href="#" class="showcase-category">{{$pro->category}}</a>

                                      <div class="price-box">
                                          <p class="price" data-price-usd="{{$pro->price}}">${{$pro->price}}</p>
                                          @if($pro->Previous_Price === NULL)

                                          @elseif($pro->Previous_Price !== NULL)
                                              <del data-previous-price-usd="{{$pro->Previous_Price}}">${{$pro->Previous_Price}}</del>
                                          @endif

                                          <p>{{ $pro->upcoming_date }}</p>
                                      </div>

                                  </div>

                              </div>
                          @endforeach

                      </div>

                  </div>

              </div>

            <div class="product-showcase">

              <h2 class="title">Trending</h2>

              <div class="showcase-wrapper  has-scrollbar">

                <div class="showcase-container">
                    @foreach($trending_products as $pro)
                        <div class="showcase">

                            <a href="#" class="showcase-img-box">
                                <img src="{{asset('storage/' .$pro->pro_pic)}}" alt="relaxed short full sleeve t-shirt" width="70" class="showcase-img">
                            </a>

                            <div class="showcase-content">

                                <a href="{{route('login')}}">
                                    <h4 class="showcase-title">{{$pro->pro_des}}</h4>
                                </a>

                                <a href="#" class="showcase-category">{{$pro->category}}</a>

                                <div class="price-box">
                                    <p class="price" data-price-usd="{{$pro->price}}">${{$pro->price}}</p>
                                    @if($pro->Previous_Price === NULL)

                                    @elseif($pro->Previous_Price !== NULL)
                                        <del data-previous-price-usd="{{$pro->Previous_Price}}">${{$pro->Previous_Price}}</del>
                                    @endif
                                </div>

                            </div>

                        </div>
                    @endforeach
                </div>

                <div class="showcase-container">

                    @foreach($trending_products2 as $pro)
                        <div class="showcase">

                            <a href="#" class="showcase-img-box">
                                <img src="{{asset('storage/' .$pro->pro_pic)}}" alt="relaxed short full sleeve t-shirt" width="70" class="showcase-img">
                            </a>

                            <div class="showcase-content">

                                <a href="{{route('login')}}">
                                    <h4 class="showcase-title">{{$pro->pro_des}}</h4>
                                </a>

                                <a href="#" class="showcase-category">{{$pro->category}}</a>

                                <div class="price-box">
                                    <p class="price" data-price-usd="{{$pro->price}}">${{$pro->price}}</p>
                                    @if($pro->Previous_Price === NULL)

                                    @elseif($pro->Previous_Price !== NULL)
                                        <del data-previous-price-usd="{{$pro->Previous_Price}}">${{$pro->Previous_Price}}</del>
                                    @endif
                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>

              </div>

            </div>


          </div>



          <!--
            - PRODUCT FEATURED
          -->

            <div class="product-featured">

                <h2 class="title">Deal of the day</h2>

                <div class="showcase-wrapper has-scrollbar">

                    <div class="showcase-container">

                        <div class="showcase">

                            <div class="showcase-banner">
                                <img src="{{asset('storage/'.$dealoftheDay->pro_pic)}}" alt="shampoo, conditioner & facewash packs" class="showcase-img" width="30%" height="30%">
                            </div>

                            <div class="showcase-content">

                                {{--                                    <div class="showcase-rating">--}}
                                {{--                                        <ion-icon name="star"></ion-icon>--}}
                                {{--                                        <ion-icon name="star"></ion-icon>--}}
                                {{--                                        <ion-icon name="star"></ion-icon>--}}
                                {{--                                        <ion-icon name="star-outline"></ion-icon>--}}
                                {{--                                        <ion-icon name="star-outline"></ion-icon>--}}
                                {{--                                    </div>--}}

                                <a href="#">
                                    <h3 class="showcase-title">{{$dealoftheDay->pro_name}}</h3>
                                </a>

                                <p class="showcase-desc">
                                    {{$dealoftheDay->pro_des}}
                                </p>

                                <div class="price-box">
                                    <p class="price" data-price-usd="{{$dealoftheDay->price}}">${{$dealoftheDay->price}}</p>

                                    @if($dealoftheDay->Previous_Price === NULL)

                                    @elseif($dealoftheDay->Previous_Price !== NULL)
                                        <del data-previous-price-usd="{{$dealoftheDay->Previous_Price}}">${{$dealoftheDay->Previous_Price}}</del>
                                    @endif
                                </div>

                                <a class="add-cart-btn" href="{{route('login')}}" style="text-align: center">add to cart</a>

                                <div class="showcase-status">
                                    <div class="wrapper">
                                        <p>
                                            already sold: <b>20</b>
                                        </p>

                                        <p>
                                            available: <b>{{$dealoftheDay->Stock}}</b>
                                        </p>
                                    </div>

                                    <div class="showcase-status-bar"></div>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="showcase-container">

                        <div class="showcase">

                            <div class="showcase-banner">
                                <img src="{{asset('storage/'.$dealoftheDay2->pro_pic)}}" alt="Rose Gold diamonds Earring" class="showcase-img" width="30%" height="30%">
                            </div>

                            <div class="showcase-content">

                                {{--                                    <div class="showcase-rating">--}}
                                {{--                                        <ion-icon name="star"></ion-icon>--}}
                                {{--                                        <ion-icon name="star"></ion-icon>--}}
                                {{--                                        <ion-icon name="star"></ion-icon>--}}
                                {{--                                        <ion-icon name="star-outline"></ion-icon>--}}
                                {{--                                        <ion-icon name="star-outline"></ion-icon>--}}
                                {{--                                    </div>--}}

                                <h3 class="showcase-title">
                                    <a href="#" class="showcase-title">{{$dealoftheDay2->pro_name}}</a>
                                </h3>

                                <p class="showcase-desc">
                                    {{$dealoftheDay2->pro_des}}
                                </p>

                                <div class="price-box">
                                    <p class="price" data-price-usd="{{$dealoftheDay2->price}}">${{$dealoftheDay2->price}}</p>

                                    @if($dealoftheDay2->Previous_Price === NULL)

                                    @elseif($dealoftheDay2->Previous_Price !== NULL)
                                        <del data-previous-price-usd="{{$dealoftheDay2->Previous_Price}}">${{$dealoftheDay2->Previous_Price}}</del>
                                    @endif
                                </div>

                                <a class="add-cart-btn" href="{{route('login')}}" style="text-align: center">add to cart</a>

                                <div class="showcase-status">
                                    <div class="wrapper">
                                        <p> already sold: <b>15</b> </p>

                                        <p> available: <b>{{$dealoftheDay2->Stock}}</b> </p>
                                    </div>

                                    <div class="showcase-status-bar"></div>
                                </div>



                            </div>

                        </div>

                    </div>

                </div>

            </div>



          <!--
            - PRODUCT GRID
          -->

          <div class="product-main">

            <h2 class="title">New Products</h2>

            <div class="product-grid">
                @foreach($product4 as $prod)
                    @if($prod->date_status !== 'upcoming')
              <div class="showcase">

                <div class="showcase-banner">

                    <img src="{{asset('storage/' .$prod->pro_pic)}}" alt="Mens Winter Leathers Jackets" width="300" class="product-img default">
                    <img src="{{asset('storage/' .$prod->pro_pic)}}" alt="Mens Winter Leathers Jackets" width="300" class="product-img hover">

{{--                    <p class="showcase-badge">15%</p>--}}

                  <div class="showcase-actions">

                    <button class="btn-action">
                      <ion-icon name="heart-outline"></ion-icon>
                    </button>

                    <button class="btn-action">
                      <ion-icon name="eye-outline"></ion-icon>
                    </button>

                    <button class="btn-action">
                      <ion-icon name="repeat-outline"></ion-icon>
                    </button>

                    <button class="btn-action">
                      <ion-icon name="bag-add-outline"></ion-icon>
                    </button>

                  </div>

                </div>

                <div class="showcase-content">

                  <a href="#" class="showcase-category">{{$prod->pro_name}}</a>

                  <a href="#">
                    <h3 class="showcase-title">{{$prod->pro_des}}</h3>
                  </a>

                    @if($averageRatings[$prod->pro_id] > 0)
                        {{ $averageRatings[$prod->pro_id] }}


                        <div class="showcase-rating">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $averageRatings[$prod->pro_id])
                                    <ion-icon name="star"></ion-icon>
                                @else
                                    <ion-icon name="star-outline"></ion-icon>
                                @endif
                            @endfor
                        </div>
                    @else

                    @endif

                  <div class="price-box">
                      <p class="price" data-price-usd="{{$prod->price}}">${{$prod->price}}</p>
                      @if($prod->Previous_Price === NULL)

                      @elseif($prod->Previous_Price !== NULL)
                          <del data-previous-price-usd="{{$prod->Previous_Price}}">${{$prod->Previous_Price}}</del>
                      @endif
                  </div>

                </div>

              </div>
                    @endif
                @endforeach


            </div>

          </div>

        </div>

      </div>

    </div>





    <!--
      - TESTIMONIALS, CTA & SERVICE
    -->

    <div>

      <div class="container">

        <div class="testimonials-box">

          <!--
            - TESTIMONIALS
          -->

          <div class="testimonial">

            <h2 class="title">testimonial</h2>

            <div class="testimonial-card">

              <img src="{{asset('logo/testimonial-1.jpg')}}" alt="alan doe" class="testimonial-banner" width="80" height="80">


              <p class="testimonial-name">Sheikh Rubayet Islam</p>

              <p class="testimonial-title">CEO & Founder Invision</p>

              <img src="{{asset('logo/icons/quotes.svg')}}" alt="quotation" class="quotation-img" width="26">

              <p class="testimonial-desc">
                Lorem ipsum dolor sit amet consectetur Lorem ipsum
                dolor dolor sit amet.
              </p>

            </div>

            <div class="testimonial-card">

              <img src="{{asset('logo/IMG_2194.jpg')}}" alt="alan doe" class="testimonial-banner" width="80" height="80">


              <p class="testimonial-name">Pias Miah</p>

              <p class="testimonial-title">CEO & Founder Invision</p>

              <img src="{{asset('logo/icons/quotes.svg')}}" alt="quotation" class="quotation-img" width="26">

              <p class="testimonial-desc">
                Lorem ipsum dolor sit amet consectetur Lorem ipsum
                dolor dolor sit amet.
              </p>

            </div>

          </div>





          <!--
            - CTA
          -->

          <div class="cta-container">

            <img src="{{asset('logo/cta-banner.jpg')}}" alt="summer collection" class="cta-banner">

            <a href="#" class="cta-content">

              <p class="discount">25% Discount</p>

              <h2 class="cta-title">Gaming Season</h2>

              <p class="cta-text">Starting @ $10</p>

              <button class="cta-btn">Shop now</button>

            </a>

          </div>



          <!--
            - SERVICE
          -->

          <div class="service">

            <h2 class="title">Our Services</h2>

            <div class="service-container">

              <a href="#" class="service-item">

                <div class="service-icon">
                  <ion-icon name="boat-outline"></ion-icon>
                </div>

                <div class="service-content">

                  <h3 class="service-title">Worldwide Delivery</h3>
                  <p class="service-desc">For Order Over $100</p>

                </div>

              </a>

              <a href="#" class="service-item">

                <div class="service-icon">
                  <ion-icon name="rocket-outline"></ion-icon>
                </div>

                <div class="service-content">

                  <h3 class="service-title">Next Day delivery</h3>
                  <p class="service-desc">BD Orders Only</p>

                </div>

              </a>

              <a href="#" class="service-item">

                <div class="service-icon">
                  <ion-icon name="call-outline"></ion-icon>
                </div>

                <div class="service-content">

                  <h3 class="service-title">Best Online Support</h3>
                  <p class="service-desc">Hours: 8AM - 11PM</p>

                </div>

              </a>

              <a href="#" class="service-item">

                <div class="service-icon">
                  <ion-icon name="arrow-undo-outline"></ion-icon>
                </div>

                <div class="service-content">

                  <h3 class="service-title">Return Policy</h3>
                  <p class="service-desc">Easy & Free Return</p>

                </div>

              </a>

              <a href="#" class="service-item">

                <div class="service-icon">
                  <ion-icon name="ticket-outline"></ion-icon>
                </div>

                <div class="service-content">

                  <h3 class="service-title">30% money back</h3>
                  <p class="service-desc">For Order Over $100</p>

                </div>

              </a>

            </div>

          </div>

        </div>

      </div>

    </div>





    <!--
      - BLOG
    -->

    <div class="blog">

      <div class="container">

        <div class="blog-container has-scrollbar">

          <div class="blog-card">

            <a href="#">
              <img src="{{asset('logo/blog-1.jpg')}}" alt="Clothes Retail KPIs 2021 Guide for Clothes Executives" width="300" height="200" class="blog-banner">
            </a>

            <div class="blog-content">

              <a href="#" class="blog-category">Fashion</a>

              <a href="#">
                <h3 class="blog-title">Clothes Retail KPIs 2021 Guide for Clothes Executives.</h3>
              </a>

              <p class="blog-meta">
                By <cite>Mr Admin</cite> / <time datetime="2022-04-06">Apr 06, 2022</time>
              </p>

            </div>

          </div>

          <div class="blog-card">

            <a href="#">
              <img src="{{asset('logo/blog-2.jpg')}}" alt="Curbside fashion Trends: How to Win the Pickup Battle."
                class="blog-banner" width="300" height="200">
            </a>

            <div class="blog-content">

              <a href="#" class="blog-category">Clothes</a>

              <h3>
                <a href="#" class="blog-title">Curbside fashion Trends: How to Win the Pickup Battle.</a>
              </h3>

              <p class="blog-meta">
                By <cite>Mr Robin</cite> / <time datetime="2022-01-18">Jan 18, 2022</time>
              </p>

            </div>

          </div>

          <div class="blog-card">

            <a href="#">
              <img src="{{asset('logo/blog-3.jpg')}}" alt="EBT vendors: Claim Your Share of SNAP Online Revenue."
                class="blog-banner" width="300" height="200">
            </a>

            <div class="blog-content">

              <a href="#" class="blog-category">Shoes</a>

              <h3>
                <a href="#" class="blog-title">EBT vendors: Claim Your Share of SNAP Online Revenue.</a>
              </h3>

              <p class="blog-meta">
                By <cite>Mr Selsa</cite> / <time datetime="2022-02-10">Feb 10, 2022</time>
              </p>

            </div>

          </div>

          <div class="blog-card">

            <a href="#">
              <img src="{{asset('logo/blog-4.jpg')}}" alt="Curbside fashion Trends: How to Win the Pickup Battle."
                class="blog-banner" width="300" height="200">
            </a>

            <div class="blog-content">

              <a href="#" class="blog-category">Electronics</a>

              <h3>
                <a href="#" class="blog-title">Curbside fashion Trends: How to Win the Pickup Battle.</a>
              </h3>

              <p class="blog-meta">
                By <cite>Mr Pawar</cite> / <time datetime="2022-03-15">Mar 15, 2022</time>
              </p>

            </div>

          </div>

        </div>

      </div>

    </div>

{{-- --}}
  </main>





  <!--
    - FOOTER
  -->

  <footer>

    <div class="footer-category">

      <div class="container">

        <h2 class="footer-category-title">Brand directory</h2>

        <div class="footer-category-box">

          <h3 class="category-box-title">Fashion :</h3>

          <a href="#" class="footer-category-link">T-shirt</a>
          <a href="#" class="footer-category-link">Shirts</a>
          <a href="#" class="footer-category-link">shorts & jeans</a>
          <a href="#" class="footer-category-link">jacket</a>
          <a href="#" class="footer-category-link">dress & frock</a>
          <a href="#" class="footer-category-link">innerwear</a>
          <a href="#" class="footer-category-link">hosiery</a>

        </div>

        <div class="footer-category-box">
          <h3 class="category-box-title">footwear :</h3>

          <a href="#" class="footer-category-link">sport</a>
          <a href="#" class="footer-category-link">formal</a>
          <a href="#" class="footer-category-link">Boots</a>
          <a href="#" class="footer-category-link">casual</a>
          <a href="#" class="footer-category-link">cowboy shoes</a>
          <a href="#" class="footer-category-link">safety shoes</a>
          <a href="#" class="footer-category-link">Party wear shoes</a>
          <a href="#" class="footer-category-link">Branded</a>
          <a href="#" class="footer-category-link">Firstcopy</a>
          <a href="#" class="footer-category-link">Long shoes</a>
        </div>

        <div class="footer-category-box">
          <h3 class="category-box-title">jewellery :</h3>

          <a href="#" class="footer-category-link">Necklace</a>
          <a href="#" class="footer-category-link">Earrings</a>
          <a href="#" class="footer-category-link">Couple rings</a>
          <a href="#" class="footer-category-link">Pendants</a>
          <a href="#" class="footer-category-link">Crystal</a>
          <a href="#" class="footer-category-link">Bangles</a>
          <a href="#" class="footer-category-link">bracelets</a>
          <a href="#" class="footer-category-link">nosepin</a>
          <a href="#" class="footer-category-link">chain</a>
          <a href="#" class="footer-category-link">Earrings</a>
          <a href="#" class="footer-category-link">Couple rings</a>
        </div>

        <div class="footer-category-box">
          <h3 class="category-box-title">cosmetics :</h3>

          <a href="#" class="footer-category-link">Shampoo</a>
          <a href="#" class="footer-category-link">Bodywash</a>
          <a href="#" class="footer-category-link">Facewash</a>
          <a href="#" class="footer-category-link">makeup kit</a>
          <a href="#" class="footer-category-link">liner</a>
          <a href="#" class="footer-category-link">lipstick</a>
          <a href="#" class="footer-category-link">prefume</a>
          <a href="#" class="footer-category-link">Body soap</a>
          <a href="#" class="footer-category-link">scrub</a>
          <a href="#" class="footer-category-link">hair gel</a>
          <a href="#" class="footer-category-link">hair colors</a>
          <a href="#" class="footer-category-link">hair dye</a>
          <a href="#" class="footer-category-link">sunscreen</a>
          <a href="#" class="footer-category-link">skin loson</a>
          <a href="#" class="footer-category-link">liner</a>
          <a href="#" class="footer-category-link">lipstick</a>
        </div>

      </div>

    </div>

    <div class="footer-nav">

      <div class="container">

        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">Popular Categories</h2>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Fashion</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Electronic</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Cosmetic</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Health</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Watches</a>
          </li>

        </ul>

        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">Products</h2>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Prices drop</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">New products</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Best sales</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Contact us</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Sitemap</a>
          </li>

        </ul>

        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">Our Company</h2>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Delivery</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Legal Notice</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Terms and conditions</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">About us</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Secure payment</a>
          </li>

        </ul>

        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">Services</h2>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Prices drop</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">New products</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Best sales</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Contact us</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Sitemap</a>
          </li>

        </ul>

        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">Contact</h2>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="location-outline"></ion-icon>
            </div>

            <address class="content">
              Mirpur-2, Dhaka - 1216
            </address>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="call-outline"></ion-icon>
            </div>

            <a href="tel:+607936-8058" class="footer-nav-link">016 42 88 92 75 </a>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="mail-outline"></ion-icon>
            </div>

            <a href="mailto:example@gmail.com" class="footer-nav-link">rubayetislam16@gmail.com</a>
          </li>

        </ul>

        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">Follow Us</h2>
          </li>

          <li>
            <ul class="social-link">

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-twitter"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-linkedin"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-instagram"></ion-icon>
                </a>
              </li>

            </ul>
          </li>

        </ul>

      </div>

    </div>

    <div class="footer-bottom">

      <div class="container">

        <img src="{{asset('logo/payment.png')}}" alt="payment method" class="payment-img">

        <p class="copyright">
          Copyright &copy; <a href="#">E-Commerce</a> all rights reserved.
        </p>

      </div>

    </div>

  </footer>






  <!--
    - custom js link
  -->
  <script src="{{asset('js/script.js')}}"></script>

  <!--
    - ionicon link
  -->
  <script>
      // JavaScript code to calculate and update the time elapsed
      var soldTime = new Date("{{$product3->created_at}}");
      var currentTime = new Date();
      var timeDifference = currentTime - soldTime;

      var timeElapsed = document.getElementById("timeElapsed");

      function updateElapsedTime() {
          var timeDifferenceMinutes = Math.floor(timeDifference / 60000); // Convert milliseconds to minutes
          if (timeDifferenceMinutes < 120) {
              // Less than 2 hours, show in minutes
              timeElapsed.textContent = timeDifferenceMinutes + " Minute(s) ago";
          } else {
              // More than 2 hours, switch to hours
              var timeDifferenceHours = Math.floor(timeDifferenceMinutes / 60); // Convert minutes to hours
              timeElapsed.textContent = timeDifferenceHours + " Hour(s) ago";
          }
      }

      // Update the time every minute
      setInterval(updateElapsedTime, 60000); // Update every minute (60,000 milliseconds)
      updateElapsedTime();

      const exchangeRates = {
          usd: 1,    // 1 USD to USD (base currency)
          eur: 0.85, // Example: 1 USD to EUR is 0.85
          bdt: 110.32 // Example: 1 USD to BDT is 110.32
          // Add more currencies and exchange rates as needed
      };

      // Function to update the displayed price
      function updatePrice(currency) {
          const priceElements = document.querySelectorAll('.price');
          const previousPriceElements = document.querySelectorAll('del[data-previous-price-usd]');
          const selectedCurrency = document.getElementById('currency').value;
          const exchangeRate = exchangeRates[selectedCurrency];
          const currencySymbol = getCurrencySymbol(selectedCurrency);

          priceElements.forEach(priceElement => {
              const priceInUSD = parseFloat(priceElement.getAttribute('data-price-usd'));
              const convertedPrice = (priceInUSD * exchangeRate).toFixed(2);
              const formattedPrice = currency === 'usd' ? `$${priceInUSD}` : `${currencySymbol}${convertedPrice}`;
              priceElement.textContent = formattedPrice;
          });

          previousPriceElements.forEach(previousPriceElement => {
              const previousPriceInUSD = parseFloat(previousPriceElement.getAttribute('data-previous-price-usd'));
              const convertedPreviousPrice = (previousPriceInUSD * exchangeRate).toFixed(2);
              const formattedPreviousPrice = currency === 'usd' ? `$${previousPriceInUSD}` : `${currencySymbol}${convertedPreviousPrice}`;
              previousPriceElement.textContent = formattedPreviousPrice;
          });
      }

      // Function to get the currency symbol
      function getCurrencySymbol(currency) {
          switch (currency) {
              case 'usd':
                  return '$';
              case 'eur':
                  return '€'; // Euro symbol
              case 'bdt':
                  return '৳'; // BDT symbol
              default:
                  return currency;
          }
      }


      document.getElementById('currency').addEventListener('change', function() {
          const selectedCurrency = this.value;
          updatePrice(selectedCurrency);
      });

      updatePrice('usd');

      $(document).ready(function() {
          function fetchProduct5() {
              $.ajax({
                  url: '{{ route("/") }}',
                  type: 'GET',
                  dataType: 'json',
                  success: function(response) {
                      displayProduct5(response.products);
                  },
                  error: function(xhr, status, error) {
                      console.error(error);
                  }
              });
          }

          function displayProduct5(products) {
              var product5Container = $('#product5Container');
              product5Container.empty();

              products.forEach(function(product) {
                  product5Container.append('<p>' + product.name + '</p>'); // Adjust according to your product display logic
              });
          }

          // Fetch product5 initially and then every 30 seconds
          fetchProduct5();
          setInterval(fetchProduct5, 30000); // 30 seconds (in milliseconds)
      });


      @foreach($upcoming as $product)
      var releaseDate_{{ $product->pro_id }} = moment("{{ $product->upcoming_date }}");
      var countdownElement_{{ $product->pro_id }} = document.getElementById('countdown_{{ $product->pro_id }}');

      function updateCountdown_{{ $product->pro_id }}() {
          var now = moment();
          var diffSeconds = releaseDate_{{ $product->pro_id }}.diff(now, 'seconds');

          if (diffSeconds > 0) {
              var duration = moment.duration(diffSeconds, 'seconds');
              var hours = duration.hours();
              var minutes = duration.minutes();
              var seconds = duration.seconds();

              countdownElement_{{ $product->pro_id }}.innerText = hours + 'h ' + minutes + 'm ' + seconds + 's';
          } else {
              countdownElement_{{ $product->pro_id }}.innerText = 'Product released!';
              clearInterval(interval_{{ $product->pro_id }});
          }
      }

      updateCountdown_{{ $product->pro_id }}();
      var interval_{{ $product->pro_id }} = setInterval(updateCountdown_{{ $product->pro_id }}, 1000);
      @endforeach

  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




</body>

</html>
