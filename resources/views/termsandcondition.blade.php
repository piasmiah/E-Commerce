<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-Commerce Website</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{asset('logo/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/style-prefix.css')}}">
    <script src="//code.tidio.co/2l8awmiopxub2rsj7vuajrnkxy2xnqln.js" async></script>
    <script src="https://kit.fontawesome.com/a87236255f.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

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
{{--                <li>--}}
{{--                    <a href="{{route('delivaryregistration')}}" class="social-link">--}}
{{--                        <p style="font-size: 10px;">Want to our Delivary Boy?</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="{{route('sellerregistration')}}" class="social-link">--}}
{{--                        <p style="font-size: 10px;">Become a seller?</p>--}}
{{--                    </a>--}}
{{--                </li>--}}

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

<div class="container">
<h2 class="text-center"><strong>Ecommerce</strong>: Terms and Condition</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
    <p class="text-justify" style="font-size: 14px; text-align: justify;font-weight:normal">
        Welcome to <strong>Ecommerce</strong>.This document is an electronic record in terms of Information Technology Act, 2000 and published in accordance with the provisions of Rule 3 ) of the Information Technology (Intermediaries guidelines) Rules, 2011 that require publishing the rules and regulations, privacy policy and Terms of Use for access or usage of <strong>Ecommerce</strong> marketplace platform - www.<strong>Ecommerce</strong>.com (hereinafter referred to as "Platform")

        The Platform is owned by <strong>Ecommerce</strong> Designs Private Limited, having its registered office at Buildings Alyssa, Begonia and Clover situated in Embassy Tech Village, Outer Ring Road, Devarabeesanahalli Village, Varthur Hobli, Bengaluru – 560103, India and its branch office at Plot 82 A - 2nd and 3rd Floor, Sector 18 Gurugram Haryana, India.

        Your use of the <strong>Ecommerce</strong> and services and tools are governed by the following terms and conditions ("Terms of Use") as applicable to the <strong>Ecommerce</strong> including the applicable policies which are incorporated herein by way of reference. By mere use of the <strong>Ecommerce</strong>, You shall be contracting with <strong>Ecommerce</strong> Designs Private Limited, the owner of the Platform. These terms and conditions including the policies constitute Your binding obligations, with <strong>Ecommerce</strong>.

        For the purpose of these Terms of Use, wherever the context so requires "You" or "User" shall mean any natural or legal person who has agreed to become a buyer on Platform by providing data while registering on the Platform as Registered User. The term "<strong>Ecommerce</strong>","We","Us","Our" shall mean <strong>Ecommerce</strong> Designs Private Limited and its affiliates.

        When You use any of the services provided by Us through the Platform, including but not limited to, (e.g. Product Reviews, Seller Reviews), You will be subject to the rules, guidelines, policies, terms, and conditions applicable to such service, and they shall be deemed to be incorporated into this Terms of Use and shall be considered as part and parcel of this Terms of Use. We reserve the right, at Our sole discretion, to change, modify, add or remove portions of these Terms of Use, at any time without any prior written notice to You. You shall ensure to review these Terms of Use periodically for updates/changes. Your continued use of the Platform following the posting of changes will mean that You accept and agree to the revisions. As long as You comply with these Terms of Use, We grant You a personal, non-exclusive, non-transferable, limited privilege to enter and use the Platform. By impliedly or expressly accepting these Terms of Use, You also accept and agree to be bound by <strong>Ecommerce</strong> Policies including but not limited to Privacy Policy as amended from time to time.
    </p>
            <strong>1. User Account, Password, and Security:</strong>
            <p class="text-justify" style="font-size: 14px; text-align: justify;font-weight:normal">
                If You use the Platform, You shall be responsible for maintaining the confidentiality of your Display Name and Password and You shall be responsible for all activities that occur under your Display Name and Password. You agree that if You provide any information that is untrue, inaccurate, not current or incomplete or not in accordance with this Terms of Use, We shall have the right to indefinitely suspend or terminate or block Your access on the Platform.

                If there is reason to believe that there is likely to be a breach of security or misuse of Your account, We may request You to change the password or we may suspend Your account without any liability to <strong>Ecommerce</strong>, for such period of time as we deem appropriate in the circumstances. We shall not be liable for any loss or damage arising from Your failure to comply with this provision.

                In the event of a device being associated with multiple logins or sign ups, as a measure to enhance customer's security and privacy as well as safeguarding your sensitive information for any potential risks, <strong>Ecommerce</strong> sometimes consider moderating users and their association with devices while using the <strong>Ecommerce</strong> app or website.

                Your mobile phone number is treated as Your primary identifier on the Platform. It is your responsibility to ensure that Your mobile phone number and your email address is up to date on the Platform at all times. You agree to notify Us promptly if your mobile phone number or e-mail address changes by updating the same on the Platform through an OTP verification. You agree that <strong>Ecommerce</strong> shall not be liable or responsible for the activities or consequences of use or misuse of any information that occurs under your Account in cases, including, where You have failed to update Your revised mobile phone number and/or e-mail address on the Platform. You agree to immediately notify <strong>Ecommerce</strong> of any unauthorized use/breach of your password or account.

                If You share or allow others to have access to Your account on the Platform ("Account"), by creating separate profiles under Your Account, or otherwise, they will be able to view and access Your Account information, You shall be solely liable and responsible for all the activities undertaken under Your Account, and any consequences therefrom.

                If You have not accessed Platform for a period of 2 (two) Years, Your data (including transactional data) will be deleted from Our record and You will not be able to access such data.
            </p>

            <strong>2. Services Offered:</strong>
            <p class="text-justify" style="font-size: 14px; text-align: justify;font-weight:normal">
                <strong>Ecommerce</strong> provides a number of Internet-based services through the Platform. One such Service enables Users to purchase original merchandise such as clothing, footwear and accessories from various fashion and lifestyle brands (collectively, "Products"). The Products can be purchased through the Platform through various methods of payments offered. The sale/purchase of Products shall be additionally governed by specific policies of sale, like cancellation policy, exchange policy, return policy, etc. (which are found on the FAQ tab on the Platform and all of which are incorporated here by reference). It is clarified that at the time of creating a return request, users are required to confirm (via a check box click) that the product being returned is unused and has the original tags intact. If the product returned by the user is used, damaged or if the original tags are missing, the user’s return request shall be declined, and the said product shall be re-shipped back to the customer. In the event that the return request is declined, the user shall not be eligible for a refund, and <strong>Ecommerce</strong> assumes no liability in this regard. Further, in the event that the user fails to accept the receipt of the said re-shipped product, the user shall continue to be not eligible for a refund, and <strong>Ecommerce</strong> assumes no liability with respect to the return or refund for the said re-shipped product. In addition, these Terms of Use may be further supplemented by Product specific conditions, which may be displayed with that Product.

                <strong>Ecommerce</strong> does not warrant that Product description or other content on the Platform is accurate, complete, reliable, current, or error-free and assumes no liability in this regard.
            </p>

            <strong>3. Platform for Transaction and Communication:</strong>
            <p class="text-justify" style="font-size: 14px; text-align: justify;font-weight:normal">
                The Users utilize to meet and interact with one another for their transactions on the Platform. <strong>Ecommerce</strong> is not and cannot be a party to or control in any manner any transaction between the <strong>Ecommerce</strong>'s Users. Henceforward:

                All commercial/contractual terms are offered by and agreed to between Buyers and Sellers alone. The commercial/contractual terms include without limitation price, shipping costs, payment methods, payment terms, date, period and mode of delivery, warranties related to products and services and after sales services related to products and services. <strong>Ecommerce</strong> does not have any control or does not determine or advise or in any way involve itself in the offering or acceptance of such commercial/contractual terms between the Buyers and Sellers.

                <strong>Ecommerce</strong> does not make any representation or Warranty as to specifics (such as quality, value, salability, etc) of the products or services proposed to be sold or offered to be sold or purchased on the Platform.

                <strong>Ecommerce</strong> is not responsible for any non-performance or breach of any contract entered into between Buyers and Sellers. <strong>Ecommerce</strong> cannot and does not guarantee that the concerned Buyers and/or Sellers will perform any transaction concluded on the Platform.

                At no time shall <strong>Ecommerce</strong> hold any right, title or interest over the products nor shall <strong>Ecommerce</strong> have any obligations or liabilities in respect of such contract entered into between Buyers and Sellers.

                The <strong>Ecommerce</strong> is only a platform that can be utilized by Users to reach a larger base to buy and sell products or services. <strong>Ecommerce</strong> is only providing a platform for communication and it is agreed that the contract for sale of any of the products or services shall be a strictly bipartite contract between the Seller and the Buyer. At no time shall <strong>Ecommerce</strong> hold any any right, title or interest over the products nor shall <strong>Ecommerce</strong> have any obligations or liabilities in respect of such contract. <strong>Ecommerce</strong> is not responsible for unsatisfactory or delayed performance of services or damages or delays as a result of products which are out of stock, unavailable or back ordered.

                Pricing on any product(s) as is reflected on the Platform may due to some technical issue, typographical error or product information published by seller may be incorrectly reflected and in such an event seller may cancel such your order(s).

                You release and indemnify <strong>Ecommerce</strong> and/or any of its officers and representatives from any cost, damage, liability or other consequence of any of the actions of the Users of the <strong>Ecommerce</strong> and specifically waive any claims that you may have in this behalf under any applicable law. Notwithstanding its reasonable efforts in that behalf, <strong>Ecommerce</strong> cannot take responsibility or control the information provided by other Users which is made available on the Platform
            </p>
            <strong>4. User Conduct and Rules on the Platform:</strong>
            <p class="text-justify" style="font-size: 14px; text-align: justify;font-weight:normal">
                You agree, undertake and confirm that Your use of the Platform shall be strictly governed by the following binding principles:

                You shall not host, display, upload, modify, publish, transmit, update or share any information which:

                belongs to another person and to which You do not have any right to

                is grossly harmful, harassing, blasphemous, defamatory, obscene, pornographic, paedophilic, libellous, invasive of another's privacy, hateful, or racially, ethnically objectionable, disparaging, relating or encouraging money laundering or gambling, or otherwise unlawful in any manner whatever

                is misleading in any way

                involves the transmission of "junk mail", "chain letters", or unsolicited mass mailing or "spamming"

                promotes illegal activities or conduct that is abusive, threatening, obscene, defamatory or libellous

                infringes upon or violates any third party's rights including, but not limited to, intellectual property rights, rights of privacy (including without limitation unauthorized disclosure of a person's name, email address, physical address or phone number) or rights of publicity

                contains restricted or password-only access pages, or hidden pages or images (those not linked to or from another accessible page)

                provides instructional information about illegal activities such as making or buying illegal weapons, violating someone's privacy, or providing or creating computer viruses

                contains video, photographs, or images of another person (with a minor or an adult).

                tries to gain unauthorized access or exceeds the scope of authorized access to the Platform or to profiles, blogs, communities, account information, bulletins, friend request, or other areas of the Platform or solicits passwords or personal identifying information for commercial or unlawful purposes from other users

                interferes with another USER's use and enjoyment of the Platform or any other individual's User and enjoyment of similar services

                infringes any patent, trademark, copyright or other proprietary rights or third party's trade secrets or rights of publicity or privacy or shall not be fraudulent or involve the sale of counterfeit or stolen products

                violates any law for the time being in force

                threatens the unity, integrity, defence, security or sovereignty of India, friendly relations with foreign states, or public order or causes incitement to thecommission of any cognizable offence or prevents investigation of any offence or is insulting any other nation

                shall not be false, inaccurate or misleading

                shall not create liability for Us or cause Us to lose (in whole or in part) the services of Our internet service provider ("ISPs") or other suppliers

                A User may be considered fraudulent or loss to business due to fraudulent activity if any of the following scenarios are met:

                Users doesn't reply to the payment verification mail sent by <strong>Ecommerce</strong>

                Users fails to produce adequate documents during the payment details verification

                Misuse of another Users's phone/email

                Users uses invalid address, email and phone no.

                Overuse of a voucher code

                Use of a special voucher not tagged to the email ID used.

                Users returns the wrong product

                Users refuses to pay for an order

                Users involved in the snatch and run of any order

                Miscellaneous activities conducted with the sole intention to cause loss to business/revenue to <strong>Ecommerce</strong>

                User with excessive returns

                Repeated request for monetary compensation for fake/used order

                <strong>Ecommerce</strong> may cancel any order that classify as 'Bulk Orders'/'Fraud orders' under certain criteria at any stage of the product delivery. An order can be classified as 'Bulk Order'/'Fraud Order' if it meets with the below mentioned criteria, and any additional criteria as defined by <strong>Ecommerce</strong>:

                Products ordered are not for self-consumption but for commercial resale

                Multiple orders placed for same product at the same address, depending on the product category.

                Bulk quantity of the same product ordered

                Invalid address given in order details

                Any malpractice used to place the order

                Any promotional voucher used for placing the 'Bulk Order' may not be refunded

                Any order paced using a technological glitch/loophole.

                <strong>Ecommerce</strong> does not facilitate business to business transaction between Sellers and business customers. You are advised to refrain from transacting on the Platform if You intend to avail the benefits of input tax credit.

                You shall not use the Platform for any unlawful and fraudulent purposes, which may cause annoyance and inconvenience and abuses any policy and rules of the company and interrupt or causes to interrupt, damages the use by other Users of <strong>Ecommerce</strong>.

                You shall not use any false e-mail address, impersonates any person or entity, or otherwise misleads <strong>Ecommerce</strong> by sharing multiple address and phone numbers or transacting with malafide intentions.

                We on certain landing page even allow our Users to experience free exchange of ideas and observations regarding interest in the field of fashion, including ‘viewing user generated content’ and/or ‘videos’ and ‘posting comments’. By accessing, viewing and/or posting any user generated content to any specific dedicated page on the Platform, you accept and consent to the practices described in these ‘Terms of Service’ and ‘Privacy Policies’, as well as any other terms of prescribed by the <strong>Ecommerce</strong> on the Platform. You agree and undertake that when accessing, viewing and/or posting any user generated content on these pages You will not imitate, abuse, harass, any Customer/User or violate and exploit, any of these ‘Terms of Service’ of the Platform.

                You shall not use any "deep-link", "page-scrape", "robot", "spider" or other automatic device, program, algorithm or methodology, or any similar or equivalent manual process, to access, acquire, copy or monitor any portion of the Platform or any Content, or in any way reproduce or circumvent the navigational structure or presentation of the Platform or any Content, to obtain or attempt to obtain any materials, documents or information through any means not purposely made available through the Platform. We reserve Our right to bar any such activity.

                You shall not attempt to gain unauthorized access to any portion or feature of the Platform, or any other systems or networks connected to the Platform or to any server, computer, network, or to any of the services offered on or through the Platform, by hacking, password "mining" or any other illegitimate means.

                You may not pretend that You are, or that You represent, someone else, or impersonate any other individual or entity

                You shall at all times ensure full compliance with the applicable provisions of the Information Technology Act, 2000 and rules thereunder as applicable and as amended from time to time and also all applicable Domestic laws, rules and regulations (including the provisions of any applicable Exchange Control Laws or Regulations in Force) and International Laws, Foreign Exchange Laws, Statutes, Ordinances and Regulations (including, but not limited to Sales Tax/VAT, Income Tax, Octroi, Service Tax, Central Excise, Custom Duty, Local Levies) regarding Your use of Our service and Your listing, purchase, solicitation of offers to purchase, and sale of products or services. You shall not engage in any transaction in an item or service, which is prohibited by the provisions of any applicable law including exchange control laws or regulations for the time being in force.

                From time to time, You shall be responsible for providing information relating to the products or services proposed to be sold by You. In this connection, You undertake that all such information shall be accurate in all respects. You shall not exaggerate or over emphasize the attributes of such products or services so as to mislead other Users in any manner.

                You shall not engage in advertising to, or solicitation of, other Users of the Platform to buy or sell any products or services, including, but not limited to, products or services related to that being displayed on the Platform or related to us.

                The Content posted does not necessarily reflect <strong>Ecommerce</strong> views. In no event shall <strong>Ecommerce</strong> assume or have any responsibility or liability for any Content posted or for any claims, damages or losses resulting from use of Content and/or appearance of Content on the Platform. You hereby represent and warrant that You have all necessary rights in and to all Content which You provide and all information it contains and that such Content shall not infringe any proprietary or other rights of third parties or contain any libellous, tortious, or otherwise unlawful information.

                Maya is powered by ChatGPT from OpenAI and Microsoft. Maya may respond with inaccurate or insensitive information, exercise discretion and avoid sharing personal information.

                <strong>Ecommerce</strong> hereby disclaims any guarantees of exactness as to the finish, appearance, size, color etc., of the final Product as ordered by the User. <strong>Ecommerce</strong> Return & Exchange Policy offers you the option to return or exchange items purchased on <strong>Ecommerce</strong> within the return/exchange period (Please read the Product Detail Page to see the number of days upto which a product can be returned/exchanged, post-delivery). In case of return or exchange of the purchased item, please refer to the "Return and Exchange Policy" available on https://www.<strong>Ecommerce</strong>.com/faqs#returns.

                Please note that you can only use <strong>Ecommerce</strong> Credits to buy products from your registered account on the <strong>Ecommerce</strong> app or website. <strong>Ecommerce</strong> Credits cannot be:

                Used for payment of orders placed on other <strong>Ecommerce</strong> accounts.

                Transferred to any other <strong>Ecommerce</strong> user's account, bank account, or wallets, etc.

                <strong>Ecommerce</strong> may unilaterally terminate Your account on any event as mentioned in the Terms Of Use under the point no. 4. User Conduct and Rules on the Platform. Any <strong>Ecommerce</strong> credits earned as goodwill compensation, earned via loyalty or referral program or promotional campaigns or earned through gift cards purchased on other platforms will be forfeited in such cases.
            </p>

</div>
    </div>
</div>

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
                    <a href="#" class="footer-nav-link">Privacy Policy</a>
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
                    <a href="#" class="footer-nav-link">Term and Condition</a>
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

<script src="{{asset('js/script.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




</body>

</html>
