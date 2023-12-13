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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

    <style>
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination .pagination-list {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .pagination .pagination-list li {
            margin: 0 5px;
        }

        .pagination .pagination-list li a,
        .pagination .pagination-list li span {
            display: block;
            padding: 8px 12px;
            border: 1px solid #ccc;
            color: #333;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .pagination .pagination-list li.active span {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .pagination .pagination-list li a:hover {
            background-color: #f0f0f0;
        }
    </style>


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
              <i class="fa-solid fa-magnifying-glass" style="color: #ffae19;"></i>
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


            <li class="menu-category">
                <a href="#" class="menu-title">Special Offers</a>
            </li>



            <li class="menu-category">
                <a href="" class="menu-title">Looking for something?</a>
                <ul class="dropdown-list">

                    <li class="dropdown-item">
                        <a class="menu-title" href="{{route('delivaryregistration')}}">Want to our delivery man?</a>
                    </li>

                    <li class="dropdown-item">
                        <a href="{{route('sellerregistration')}}" class="menu-title">Become a seller?</a>
                    </li>

                </ul>
            </li>

            <li class="menu-category">
                <a href="" class="menu-title">More..</a>
                <ul class="dropdown-list">

                    <li class="dropdown-item">
                        <a class="menu-title" href="{{route('aboutuser')}}">About Us</a>
                    </li>

                    <li class="dropdown-item">
                        <a href="{{route('contactus')}}" class="menu-title">Contact Us</a>
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

                                      </div>

                                      <div>
                                          <p>{{ $pro->upcoming_date }}</p>
                                          <div class="countdown" data-end-date="{{ $pro->upcoming_date }}"></div>
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
                                          <div class="countdown" data-end-date="{{ $pro->upcoming_date }}"></div>
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
                                            available: <b>{{$dealoftheDay->Stock}}</b>
                                        </p>
                                    </div>

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
                                        <p> available: <b>{{$dealoftheDay2->Stock}}</b> </p>
                                    </div>
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

              <div class="showcase">

                <div class="showcase-banner">

                    <img src="{{asset('storage/' .$prod->pro_pic)}}" alt="Mens Winter Leathers Jackets" width="300" class="product-img default">
                    <img src="{{asset('storage/' .$prod->pro_pic)}}" alt="Mens Winter Leathers Jackets" width="300" class="product-img hover">

{{--                    <p class="showcase-badge">15%</p>--}}



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

                      @if($prod->date_status==='upcoming')
                          <p class="price">{{$prod->date_status}}</p>
                      @endif
                  </div>

                </div>

              </div>

                @endforeach


            </div>
              <div class="pagination-links">
                  {{ $product4->links() }}
              </div>
          </div>

        </div>

      </div>

    </div>





    <!--
      - TESTIMONIALS, CTA & SERVICE
    -->







    <!--
      - BLOG
    -->

      <div class="blog">

          <div class="container">

              <h3 class="text-center">Our Services</h3>
              <div class="blog-container has-scrollbar">

                  <div class="blog-card">

                      <div class="service-icon" >
                          <ion-icon name="boat-outline"></ion-icon>
                      </div>

                      <div class="blog-content">


                          <a href="#">
                              <h3 class="blog-title">Worldwide Delivery</h3>
                          </a>

                          <p class="blog-meta">
                              For Order Over $100
                          </p>

                      </div>

                  </div>

                  <div class="blog-card">

                      <div class="service-icon" >
                          <ion-icon name="rocket-outline"></ion-icon>
                      </div>

                      <div class="blog-content">


                          <a href="#">
                              <h3 class="blog-title">Next Day delivery</h3>
                          </a>

                          <p class="blog-meta">
                              BD orders only
                          </p>

                      </div>

                  </div>

                  <div class="blog-card">

                      <div class="service-icon" >
                          <ion-icon name="call-outline"></ion-icon>
                      </div>

                      <div class="blog-content">


                          <a href="#">
                              <h3 class="blog-title">Best Online Support</h3>
                          </a>

                          <p class="blog-meta">
                              Hours: 8AM-11PM
                          </p>

                      </div>

                  </div>

                  <div class="blog-card">

                      <div class="service-icon" >
                          <ion-icon name="boat-outline"></ion-icon>
                      </div>

                      <div class="blog-content">


                          <a href="#">
                              <h3 class="blog-title">Return Policy</h3>
                          </a>

                          <p class="blog-meta">
                              Easy and Free Return
                          </p>

                      </div>

                  </div>

                  <div class="blog-card">

                      <div class="service-icon" >
                          <ion-icon name="boat-outline"></ion-icon>
                      </div>

                      <div class="blog-content">


                          <a href="#">
                              <h3 class="blog-title">30% money back</h3>
                          </a>

                          <p class="blog-meta">
                              or Order Over $100
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
                      <h2 class="nav-title">Usefull Links</h2>
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
                      <h2 class="nav-title">Customer Policy</h2>
                  </li>

                  <li class="footer-nav-item">
                      <a href="{{route('privacypolicy')}}" class="footer-nav-link">Privacy Policy</a>
                  </li>

                  <li class="footer-nav-item">
                      <a href="#" class="footer-nav-link">FAQ</a>
                  </li>

                  <li class="footer-nav-item">
                      <a href="#" class="footer-nav-link">Track Order</a>
                  </li>

                  <li class="footer-nav-item">
                      <a href="#" class="footer-nav-link">Return Policy</a>
                  </li>

                  <li class="footer-nav-item">
                      <a href="{{route('termsandcondition')}}" class="footer-nav-link">Term and Condition</a>
                  </li>

              </ul>

              <ul class="footer-nav-list">

                  <li class="footer-nav-item">
                      <h2 class="nav-title">Services</h2>
                  </li>

                  <li class="footer-nav-item">
                      <a href="#" class="footer-nav-link">World Wide Delivery</a>
                  </li>

                  <li class="footer-nav-item">
                      <a href="#" class="footer-nav-link">Next Day delivery</a>
                  </li>

                  <li class="footer-nav-item">
                      <a href="#" class="footer-nav-link">Best online support</a>
                  </li>

                  <li class="footer-nav-item">
                      <a href="#" class="footer-nav-link">Return policy</a>
                  </li>

                  <li class="footer-nav-item">
                      <a href="#" class="footer-nav-link">30% money back</a>
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
                          <ion-icon name="call-outline"></ion-icon>
                      </div>

                      <a href="tel:+607936-8058" class="footer-nav-link">016 38 75 23 71 </a>
                  </li>

                  <li class="footer-nav-item flex">
                      <div class="icon-box">
                          <ion-icon name="mail-outline"></ion-icon>
                      </div>

                      <a href="mailto:example@gmail.com" class="footer-nav-link">customer.support@gmail.com</a>
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
      {{--var soldTime = new Date("{{$product3->created_at}}");--}}
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




  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




</body>

</html>
