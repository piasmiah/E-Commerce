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
    <h2 class="text-center">Ecommerce: Privacy and Policy</h2>
    <div class="row justify-content-center">
        <div class="col-md-8 text-justify">
            <strong>Introduction<strong>
                    <p class="text-justify" style="font-size: 14px; text-align: justify;font-weight:normal">

                        We value the trust you place in us and recognize the importance of secure transactions and information privacy. This Privacy Policy describes how <strong>Ecommerce</strong> Designs Private Limited and its affiliates (collectively "<strong>Ecommerce</strong>, we, our, us") collect, use, share, protect or otherwise process your personal information through <strong>Ecommerce</strong> website https://www.<strong>Ecommerce</strong>.com. While you may be able to browse certain sections of the Platform without registering with us, however, please note we do not offer any product/service under this Platform outside India. Your personal information will primarily be stored and processed in India and may have data protection laws that are different from those that apply in the country in which you are located. By visiting this Platform, providing your information or availing any product/service offered on the Platform, you expressly agree to be bound by the terms and conditions of this Privacy Policy, the Terms of Use and the applicable service/product terms and conditions, and agree to be governed by the laws of India including but not limited to the laws applicable to data protection and privacy. If you do not agree please do not use or access our Platform.</p>

                    <strong>Collection</strong>
                    <p class="text-justify" style="font-size: 14px; text-align: justify;font-weight:normal">We collect your personal information relating to your identity, demographics and when you use our Platform, services or otherwise interact with us during the course of our relationship and related information provided from time to time. Some of the information that we may collect includes but is not limited to Information provided to us during sign-up/registering or using our Platform such as name, date of birth, address, telephone/mobile number, email ID, occupation and any such information shared as proof of identity or address. We may also request you to share your PAN, GST number, Government issued ID cards/number and Know-You-Customer (KYC) details to check your eligibility for certain products, services or events including but not limited to credit and payment products. Some of the sensitive personal information such as your bank account or credit or debit card or other payment instrument information or biometric information such as your facial features or physiological information (in order to enable use of certain features available on the Platform to assist you with your shopping experience) or password etc. Some of the information such as your shopping behaviour, preferences, call data records, device location, voice, your browsing history, and other information that you may provide to us from time to time. Our primary goal in doing so is to provide you a safe, efficient, smooth, and customized experience. This allows us to provide services and features that most likely meet your needs, and to customize our Platform to make your experience safer and easier. In general, you can browse the Platform without telling us who you are or revealing any personal information about yourself. Once you give us your personal information, you are not anonymous to us. Where possible, we indicate which fields are required and which fields are optional. You always have the option to not provide information, by choosing not to use a particular service or feature on the Platform. We may track your buying behaviour, preferences, and other information that you choose to provide on our Platform. We use this information to do research on our users' demographics, interests, and behaviour to better understand and serve our users. This information is compiled and analysed on an aggregated basis. This information may include the URL that you just came from (whether this URL is on our Platform or not), which URL you next go to (whether this URL is on our Platform or not), your computer browser information, and your IP address. If you enrol into our loyalty program or participate in third party loyalty program offered by us, we will collect and store your personal information such as name, contact number, email address, communication address, date of birth, gender, zip code, lifestyle information, demographic and work details which is provided by you to us or a third-party business partner that operates platforms where you can earn loyalty points for purchase of goods and services, and/or also redeem them. We will also collect your information related to your transactions on Platform and such third-party business partner platforms. When such a third-party business partner collects your personal information directly from you, you will be governed by their privacy policies. We shall not be responsible for the third-party business partner’s privacy practices or the content of their privacy policies, and we request you to read their privacy policies prior to disclosing any information. If you set up an account or transact with us, we may seek some additional information, such as billing address, credit/debit card number and a credit/debit card expiration date and/ or other payment instrument details and tracking information from cheques or money orders to provide services, enable transactions or to refund for cancelled transactions. If you choose to post messages on our message boards, personalised messages, images, photos, gift card message box, chat rooms or other message areas or leave feedback/product review or if you use voice commands to shop on the Platform, we will collect that information you provide to us. Please note such messages posted by you will be in public domain and can be read by others as well, please exercise caution while posting such messages, personal details, photos and reviews. We retain this information as necessary to resolve disputes, provide customer support, internal research and troubleshoot problems as permitted by law. If you send us personal correspondence, such as emails or letters, or if other users or third parties send us correspondence about your activities or postings on the Platform, we may collect such information into a file specific to you. While you can browse some sections of our Platform without being a registered member, certain activities (such as placing an order or consuming our online content or services or participating in any event) requires registration. We may use your contact information to send you offers based on your previous orders or preferences and your interests. If you receive an e-mail, a call from a person/association claiming to be from <strong>Ecommerce</strong> seeking sensitive personal information like debit/credit card PIN, net-banking or mobile banking password, we request you to never provide such information. We at <strong>Ecommerce</strong> or our affiliate logistics partner do not at any time connect with you requesting for such information. If you have already revealed such information, report it immediately to an appropriate law enforcement agency.</p>

                    <strong>Use</strong>
                    <p class="text-justify" style="font-size: 14px; text-align: justify;font-weight:normal">We use personal information to provide the services you request. To the extent we use your personal information to market to you, we will provide you the ability to opt-out of such uses. We use your personal information to assist sellers and business partners in handling and fulfilling orders; enhancing customer experience; to resolve disputes; troubleshoot problems; help promote a safe service; collect money; measure consumer interest in our products and services, inform you about online and offline offers, products, services, and updates; customize your experience; detect and protect us against error, fraud and other criminal activity; enforce our terms and conditions; conduct marketing research, analysis and surveys; and as otherwise described to you at the time of collection of information. We will ask for your permission to allow us access to your text messages (SMS), instant messages, contacts in your directory, camera, photo gallery, location and device information: (i) to send commercial communication regarding your orders or other products and services (ii) enhance your experience on the platform and provide you access to the products and services offered on the Platform by sellers, affiliates, partners or lending partners. You understand that your access to these products/services may be affected in the event permission is not provided to us. In our efforts to continually improve our product and service offerings, we collect and analyse demographic and profile data about users' activity on our Platform. We identify and use your IP address to help diagnose problems with our server, and to administer our Platform. Your IP address is also used to help identify you and to gather broad demographic information. We will occasionally ask you to complete surveys conducted either by us or through a third- party market research agency. These surveys may ask you for personal information, contact information, gender, date of birth, demographic information (like pin code, age or income level) attributes such as your interests, household or lifestyle information, your purchasing behaviour or history preference and other such information that you may choose to provide. The survey may involve collection of voice data or video recordings. Participation in these surveys are purely voluntary in nature. We use this data to tailor your experience at our Platform, providing you with content that we think you might be interested in and to display content according to your preferences.</p>

                    <strong>Cookies</strong>
                    <p class="text-justify" style="font-size: 14px; text-align: justify;font-weight:normal">We use data collection devices such as "cookies" on certain pages of the Platform to help analyse our web page flow, measure promotional effectiveness, and promote trust and safety. "Cookies" are small files placed on your hard drive that assist us in providing our services. Cookies do not contain any of your personal information. We offer certain features that are only available through the use of a "cookie". We also use cookies to allow you to enter your password less frequently during a session. Cookies can also help us provide information that is targeted to your interests. Most cookies are "session cookies," meaning that they are automatically deleted from your hard drive at the end of a session. You are always free to decline/delete our cookies if your browser permits, although in that case you may not be able to use certain features on the Platform and you may be required to re-enter your password more frequently during a session. Additionally, you may encounter "cookies" or other similar devices on certain pages of the Platform that are placed by third parties. We do not control the use of cookies by third parties. We use cookies from third-party partners such as Google Analytics for marketing and analytical purposes. Google Analytics helps us understand how our customers use the site. You can read more about how Google uses your Personal Information here: https://www.google.com/intl/en/policies/privacy/. You can also opt-out of Google Analytics here:https://tools.google.com/dlpage/gaoptout</p>

                    <strong>Sharing</strong>
                    <p class="text-justify" style="font-size: 14px; text-align: justify;font-weight:normal">We may share your personal information internally within <strong>Ecommerce</strong> Group entities, our other corporate entities, and affiliates to provide you access to the services and products offered by them, such as the deferred payment options Flipkart Pay Later offered by Flipkart Advanz Private Limited through its lending partners. These entities and affiliates may market to you as a result of such sharing unless you explicitly opt-out. We may disclose personal information to third parties. This disclosure may be required for us to provide you access to our services and products offered to you, to comply with our legal obligations, to enforce our user agreement, to facilitate our marketing and advertising activities, to prevent, detect, mitigate, and investigate fraudulent or illegal activities related to our services. We may disclose personal and sensitive personal information to government agencies or other authorised law enforcement agencies if required to do so by law or in the good faith belief that such disclosure is reasonably necessary to respond to subpoenas, court orders, or other legal process. We may disclose personal information to law enforcement offices, third party rights owners, or others in the good faith belief that such disclosure is reasonably necessary to: enforce our Terms or Privacy Policy; respond to claims that an advertisement, posting or other content violates the rights of a third party; or protect the rights, property or personal safety of our users or the general public. We and our affiliates will share / sell some or all of your personal information with another business entity should we (or our assets) plan to merge with, or be acquired by that business entity, or re-organization, amalgamation, restructuring of business. Should such a transaction occur, that other business entity (or the new combined entity) will be required to follow this privacy policy with respect to your personal information.</p>

                    <strong>Links to Other Sites<strong>
                            <p class="text-justify" style="font-size: 14px; text-align: justify;font-weight:normal">Our Platform links to other websites that may collect personal information about you. <strong>Ecommerce</strong> is not responsible for the privacy practices or the content of those linked websites.</p>

                            <strong>Security Precautions<strong>
                                    <p class="text-justify" style="font-size: 14px; text-align: justify;font-weight:normal">To protect your personal information from unauthorised access or disclosure, loss or misuse we adopt reasonable security practices and procedures, in line with international standards ISO/IEC 27001:2013 which is recognised as one of the highest information security standards. Whenever you access your account information, we offer the use of a secure server. The transmission of information is not completely secure for reasons beyond our control. We adopt industry standard security measures and keep updating our systems from time to time to protect your personal information against any hacking or virus dissemination. However, by using the Platform, the users accept the security implications of data transmission over the internet and the World Wide Web which cannot always be guaranteed as completely secure, and therefore, there would always remain certain inherent risks regarding use of the Platform. Users are responsible for ensuring the protection of login and password records for their account.</p>

                                    <strong>Choice/Opt-Out<strong>
                                            <p class="text-justify" style="font-size: 14px; text-align: justify;font-weight:normal">We provide all users with the opportunity to opt-out of receiving non-essential (promotional, marketing-related) communications from us after setting up an account. If you do not wish to receive promotional communications from us, then please unsubscribe by clicking on the unsubscribe link in the email or visit our Help Center at https://www.<strong>Ecommerce</strong>.com/contactus/generic?query=manage-your-account&details=unsubscribe-from-promotions to unsubscribe/opt-out.</p>

                                            <strong>Use of Children Information<strong>
                                                    <p class="text-justify" style="font-size: 14px; text-align: justify;font-weight:normal">Use of our Platform is available only to persons who can form a legally binding contract under the Indian Contract Act, 1872. We do not knowingly solicit or collect personal information from children under the age of 18 years. If you have shared any personal information of children under the age of 18 years, you represent that you have the authority to do so and permit us to use the information in accordance with this Privacy Policy.</p>

                                                    <strong>Data Retention<strong>
                                                            <p class="text-justify" style="font-size: 14px; text-align: justify;font-weight:normal">We retain your personal information for a period no longer than is required for the purpose for which it was collected or as required under any applicable law. However, we may retain data related to you if there is a legal obligation to retain the data; if required to comply with any applicable statutory or regulatory retention requirement by law; if we believe it may be necessary to prevent fraud or future abuse; to enable <strong>Ecommerce</strong> to exercise its legal rights and/or defend against legal claims; or for other legitimate purposes. We may continue to retain your data in anonymised form for analytical and research purposes.</p>

                                                            <strong>Your Rights<strong>
                                                                    <p class="text-justify" style="font-size: 14px; text-align: justify;font-weight:normal">We take every reasonable step to ensure that your personal information that we process is accurate and, where necessary, kept up to date, and any of your personal information that we process that you inform us is inaccurate (having regard to the purposes for which they are processed) is erased or rectified. You may access, correct, and update your personal information directly through the functionalities provided on the Platform. You may delete certain non-mandatory information by logging into our website and visiting Profile and Settings sections. You can also write to us at the contact information provided below to assist you with these requests. You have an option to withdraw your consent that you have already provided by writing to us at the contact information provided below. Please mention “for withdrawal of consent” in the subject line of your communication. We will verify such requests before acting upon your request. Please note, however, that withdrawal of consent will not be retroactive and will be in accordance with the terms of this Privacy Policy, related Terms of Use and applicable laws. In the event you withdraw consent given to us under this Privacy Policy, such withdrawal may hamper your access to the Platform or restrict provision of our services to you for which we consider that information to be necessary.</p>

                                                                    <strong>Consent<strong>
                                                                            <p class="text-justify" style="font-size: 14px; text-align: justify;font-weight:normal">By visiting our Platform or by providing your information, you consent to the collection, use, storage, disclosure and otherwise processing of your information (including sensitive personal information) on the Platform in accordance with this Privacy Policy. If you disclose to us any personal information relating to other people, you represent that you have the authority to do so and permit us to use the information in accordance with this Privacy Policy. You, while providing your personal information over the Platform or any partner platforms or establishments, consent to us (including our other corporate entities, affiliates, lending partners, technology partners, marketing channels, business partners and other third parties) to contact you through SMS, instant messaging apps, call and/or e-mail for the purposes specified in this Privacy Policy. You have an option to withdraw your consent that you have already provided by writing to the Grievance Officer at the contact information provided below. Please mention “Withdrawal of consent for processing personal information” in your subject line of your communication. We will verify such requests before acting on our request. Please note, however, that withdrawal of consent will not be retroactive and will be in accordance with the terms of this Privacy Policy, related terms of use and applicable laws. In the event you withdraw consent given to us under this Privacy Policy, we reserve the right to restrict or deny the provision of our services for which we consider such information to be necessary.</p>

                                                                            <strong>Changes to this Privacy Policy<strong>
                                                                                    <p class="text-justify" style="font-size: 14px; text-align: justify;font-weight:normal">Please check our Privacy Policy periodically for changes. We may update this Privacy Policy to reflect changes to our information practices. We will alert you to significant changes by posting the date our Privacy Policy got last updated, placing a notice on our Platform, or by sending you an email when we are required to do so by applicable law.</p>

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
