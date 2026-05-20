<html lang="en" style="margin: 0px auto; font-size: 107.1px;">

<head>
  <meta charset="UTF-8">
  <link rel="icon" href="/favicon.ico">
  <link rel="stylesheet" href="at.alicdn.com/t/font_3353145_az0dbuzh42s.css">
  <!-- 在 head 标签中添加 meta 标签，并设置 viewport-fit=cover 值 -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
  <!-- 开启顶部安全区适配 -->
  <base href="{{ asset('') }}">
  <link rel="modulepreload" as="script" crossorigin="" href="assets/layout.b5f6c65d.js">
  <link rel="stylesheet" href="assets/BoostingData.127675f2.css">
  <link rel="stylesheet" href="assets/Index.d3868fad.css">
  <link rel="stylesheet" href="assets/SubmitPending.b32f472b.css">
  <link rel="stylesheet" href="assets/DealingSlip.36399a95.css">
  <link rel="stylesheet" href="assets/My.vue_vue_type_style_index_0_scoped_true_lang.b055621c.css">
  <link rel="stylesheet" href="assets/layout.323f08e7.css">
  <link rel="stylesheet" href="assets/Recharge.ad970ee6.css">
  <link rel="stylesheet" href="assets/Service.4cd184a4.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>

  <link rel="modulepreload" as="script" crossorigin="" href="assets/notice-icon.d521a667.js">
  <link rel="modulepreload" as="script" crossorigin="" href="assets/logo.5f4029de.js">
  <link rel="modulepreload" as="script" crossorigin="" href="assets/My.24dd7f65.js">
  <link rel="modulepreload" as="script" crossorigin="" href="assets/date-icon.ca17ac52.js">
  <link rel="modulepreload" as="script" crossorigin="" href="assets/My.vue_vue_type_style_index_0_scoped_true_lang.4ef297a9.js">
  <link rel="stylesheet" href="assets/My.vue_vue_type_style_index_0_scoped_true_lang.b055621c.css">
  <link rel="modulepreload" as="script" crossorigin="" href="assets/cell-icon-6.487544f7.js">
  <link rel="modulepreload" as="script" crossorigin="" href="assets/index.df31b0f6.js">
  <link rel="modulepreload" as="script" crossorigin="" href="assets/clipboard.40f7df85.js">
  <link rel="modulepreload" as="script" crossorigin="" href="assets/auth.4a81d264.js">
  <link rel="modulepreload" as="script" crossorigin="" href="assets/Login.3610fde4.js">
  <link rel="stylesheet" href="assets/Login.6c7bf6ec.css">
  <link rel="modulepreload" as="script" crossorigin="" href="assets/Index.8594bc53.js">
  <link rel="stylesheet" href="assets/Index.d3868fad.css">
  <link rel="modulepreload" as="script" crossorigin="" href="assets/user.d0d43c87.js">
  <link rel="modulepreload" as="script" crossorigin="" href="assets/hotel-6.813ec2bf.js">
  <link rel="modulepreload" as="script" crossorigin="" href="assets/booking.2149056b.js">
  <link rel="modulepreload" as="script" crossorigin="" href="assets/pagination.min.917afa28.js">
  <link rel="stylesheet" href="assets/pagination.min.eb72427d.css">
</head>

<body style="font-size: 12px;">
<?php $query_announcements = \DB::table('announcements')->orderBy('id', 'DESC')->limit(1)->get();
        if($query_announcements->count() > 0){
          $announcement = $query_announcements->first();
          ?>
  <div class="announcement-bar" id="announcementBar" data-announcement-id="<?php echo $announcement->id; ?>">
    <div class="announcement-content">
      <span class="icon">🎉</span>
      <!-- get last announcements -->
      
          <?php
          echo $announcement->message;
        
      ?>
    </div>

    <button class="close-button" id="closeButton">
      <i class="fas fa-times"></i>
    </button>
  </div>
  <?php } ?>
  <svg id="__svg__icons__dom__1705120061777__" style="position: absolute; width: 0px; height: 0px;">
    <symbol xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20" id="icon-common-delete">
      <defs>
        <path id="icon-common-delete_b" d="M0 0h375v50H0z"></path>
        <path id="icon-common-delete_c" d="M0 0h19v20H0z"></path>
        <path id="icon-common-delete_e" d="M0 0h19v20H0z"></path>
        <filter x="-2.7%" y="-20%" width="105.3%" height="140%" filterUnits="objectBoundingBox" id="icon-common-delete_a">
          <feOffset dy="4" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
          <feGaussianBlur stdDeviation="8" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
          <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.08 0" in="shadowBlurOuter1"></feColorMatrix>
        </filter>
      </defs>
      <g fill="none" fill-rule="evenodd">
        <path fill="#FFF" d="M-15-957h375V292H-15z"></path>
        <path d="M0 0h20v20H0z"></path>
        <g transform="translate(1)">
          <mask id="icon-common-delete_d" fill="#fff">
            <use xlink:href="#icon-common-delete_c"></use>
          </mask>
          <path d="M12.805 15.417c0 .23-.186.417-.414.417a.414.414 0 0 1-.412-.417V6.25c0-.229.184-.417.412-.417.228 0 .414.188.414.417v9.167Zm-3.305 0c0 .23-.185.417-.413.417a.415.415 0 0 1-.413-.417V6.25c0-.229.185-.417.413-.417.228 0 .413.188.413.417v9.167ZM6.195 2.501h5.783V.834H6.195V2.5Zm0 12.916c0 .231-.184.417-.412.417a.415.415 0 0 1-.414-.417V6.25c0-.229.186-.417.414-.417.228 0 .412.188.412.418v9.166ZM18.587 2.501h-5.782V.417A.416.416 0 0 0 12.39 0H5.783a.416.416 0 0 0-.414.417V2.5H.412A.415.415 0 0 0 0 2.917c0 .23.184.417.412.417h1.653v16.25c0 .23.185.417.413.417h13.218a.415.415 0 0 0 .413-.417V3.334h2.478a.415.415 0 0 0 .414-.417.415.415 0 0 0-.414-.416Z" fill="#606063" mask="url(#icon-common-delete_d)"></path>
        </g>
        <path d="M0 0h20v20H0z"></path>
        <g transform="translate(1)">
          <mask id="icon-common-delete_f" fill="#fff">
            <use xlink:href="#icon-common-delete_e"></use>
          </mask>
          <path d="M12.805 15.417c0 .23-.186.417-.414.417a.414.414 0 0 1-.412-.417V6.25c0-.229.184-.417.412-.417.228 0 .414.188.414.417v9.167Zm-3.305 0c0 .23-.185.417-.413.417a.415.415 0 0 1-.413-.417V6.25c0-.229.185-.417.413-.417.228 0 .413.188.413.417v9.167ZM6.195 2.501h5.783V.834H6.195V2.5Zm0 12.916c0 .231-.184.417-.412.417a.415.415 0 0 1-.414-.417V6.25c0-.229.186-.417.414-.417.228 0 .412.188.412.418v9.166ZM18.587 2.501h-5.782V.417A.416.416 0 0 0 12.39 0H5.783a.416.416 0 0 0-.414.417V2.5H.412A.415.415 0 0 0 0 2.917c0 .23.184.417.412.417h1.653v16.25c0 .23.185.417.413.417h13.218a.415.415 0 0 0 .413-.417V3.334h2.478a.415.415 0 0 0 .414-.417.415.415 0 0 0-.414-.416Z" fill="#606063" mask="url(#icon-common-delete_f)"></path>
        </g>
      </g>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" id="icon-common-error">
      <path d="m9.645 8.554 1.359 1.358a.782.782 0 1 1-1.107 1.107L8.538 9.66a.782.782 0 0 0-1.106 0l-1.36 1.36a.782.782 0 1 1-1.106-1.108l1.359-1.358a.783.783 0 0 0 0-1.107l-1.359-1.36a.782.782 0 1 1 1.106-1.105l1.36 1.358c.305.305.8.305 1.106 0l1.36-1.358a.781.781 0 1 1 1.106 1.106l-1.36 1.359a.783.783 0 0 0 0 1.107M15.93 7.1C15.545 3.139 12.043-.002 8.013 0 3.095.002-.677 4.381.103 9.243c.13.823.474 1.617.775 2.403.188.493.499.5.846.088.066-.077.126-.162.204-.223.228-.178.473-.18.696-.003.23.182.26.428.134.682-.06.123-.15.235-.246.334-.7.728-1.415 1.443-2.102 2.182-.124.134-.229.386-.186.54.035.125.305.26.47.26 1.028.002 2.04-.124 3.026-.436a.872.872 0 0 1 .591.048c1.679.83 3.43 1.085 5.268.72 4.037-.802 6.758-4.546 6.35-8.738" fill="#FF2632" fill-rule="evenodd"></path>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 18" id="icon-common-footer-1">
      <path d="M3.374 14.145v-2.791c0-.525-.368-.828-1.018-.836-.428-.006-.858.013-1.284-.015C.277 10.45-.222 9.78.098 9.214c.061-.108.155-.207.254-.296C3.495 6.08 6.639 3.241 9.786.404c.6-.54 1.439-.538 2.041.005 3.144 2.839 6.284 5.68 9.429 8.519.321.29.44.615.26.982-.187.378-.556.582-1.054.605-.38.018-.763.008-1.145.01-.754.005-1.093.279-1.093.886v5.514c0 .678-.48 1.07-1.312 1.072-.624.002-1.248.001-1.87 0-.86 0-1.336-.385-1.337-1.076v-4.697c0-.561-.358-.857-1.043-.859a893.376 893.376 0 0 0-3.378 0c-.683.002-1.044.302-1.045.86v4.744c0 .62-.488 1.023-1.25 1.028-.79.004-1.581.005-2.373 0-.742-.006-1.24-.415-1.241-1.015-.002-.946 0-1.892 0-2.837" fill-rule="evenodd"></path>
    </symbol>
    <symbol class="icon" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" id="icon-common-footer-2">
      <path d="M871.673 770.813a53.393 53.393 0 0 1 0 75.42l-37.713 37.714c-27.867 27.866-64.52 44.84-108.947 50.46a264.333 264.333 0 0 1-33.213 2.04c-32.333 0-67.22-5.46-104.147-16.32C487.42 890.667 382 824.227 290.9 733.1S133.333 536.587 103.873 436.347c-14.666-49.94-19.493-96.154-14.28-137.334 5.62-44.426 22.594-81.08 50.46-108.946l37.714-37.714a53.393 53.393 0 0 1 75.42 0l165.94 165.934a53.4 53.4 0 0 1 0 75.426L381.413 431.4c-21.333 21.333-.1 90.413 60.34 150.847s129.487 81.7 150.847 60.34l37.713-37.714a53.4 53.4 0 0 1 75.427 0zM924.727 175.4c-8.8-17.84-21.334-33.8-37.247-47.44-32.073-27.487-74.5-42.627-119.48-42.627s-87.407 15.14-119.48 42.627c-15.913 13.64-28.447 29.6-37.247 47.44a132.833 132.833 0 0 0-13.94 59.267 135.093 135.093 0 0 0 19.46 69.38A152.84 152.84 0 0 0 646.933 340c-9.486 7.947-21.953 16.093-38.666 25.4a21.333 21.333 0 0 0 10.4 39.933c47.86 0 88.553-8.2 118.393-23.786A196.347 196.347 0 0 0 768 384c44.98 0 87.407-15.14 119.48-42.627 15.913-13.64 28.447-29.6 37.247-47.44a132.96 132.96 0 0 0 0-118.533z" fill-rule="evenodd"></path>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" id="icon-common-footer-3">
      <path d="M10.762 10.771c.033.05.06.085.082.124l3.481 6.2c.154.274.146.53-.033.714-.075.077-.176.128-.265.191H.422A.758.758 0 0 1 0 17.578v-.281l3.539-6.483c.448.38.88.747 1.313 1.111.606.509 1.35.593 1.99.225.096-.055.185-.123.239-.16.287.122.543.273.82.34.54.133 1.032-.015 1.458-.371.395-.331.786-.667 1.18-1l.223-.188zm2.717-1.018c.24-.003.42.112.54.328 1.293 2.347 2.59 4.691 3.884 7.037.206.373.1.649-.325.882h-2.11c.181-.596.038-1.126-.267-1.656-.93-1.618-1.834-3.252-2.752-4.876-.069-.121-.073-.213-.006-.336.185-.338.357-.684.53-1.03.106-.21.267-.346.506-.35zM11.4 0c.245 0 .435.1.54.322a.546.546 0 0 1-.09.622l-.796.932c.263.307.522.607.778.91.196.23.218.508.062.726-.136.19-.331.243-.554.242-1.142-.002-2.284 0-3.426 0h-.221v1.01l.003.497c.001.064.046.131.08.191l2.317 4.114c.035.06.068.122.11.197-.106.091-.21.182-.317.272-.402.34-.804.682-1.207 1.021-.325.274-.593.262-.894-.038-.215-.215-.427-.433-.66-.668-.218.222-.425.433-.634.642-.334.334-.586.346-.948.043-.444-.373-.884-.75-1.333-1.117-.105-.085-.105-.147-.043-.26.77-1.398 1.538-2.798 2.3-4.202a.8.8 0 0 0 .093-.364c.002-1.458-.004-2.916-.007-4.374 0-.082.003-.165.016-.245a.538.538 0 0 1 .543-.472L11.401 0z" fill-rule="evenodd"></path>
    </symbol>
    <symbol class="icon" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" id="icon-common-footer-4">
      <defs>
        <style>
          @font-face {
            font-family: element-icons;
            src: url(chrome-extension://moombeodfomdpjnpocobemoiaemednkg/fonts/element-icons.woff) format("woff"), url("chrome-extension://moombeodfomdpjnpocobemoiaemednkg/fonts/element-icons.ttf ") format("truetype")
          }

          @font-face {
            font-family: feedback-iconfont;
            src: url(//at.alicdn.com/t/font_1031158_u69w8yhxdu.woff2?t=1630033759944) format("woff2"), url(//at.alicdn.com/t/font_1031158_u69w8yhxdu.woff?t=1630033759944) format("woff"), url(//at.alicdn.com/t/font_1031158_u69w8yhxdu.ttf?t=1630033759944) format("truetype")
          }
        </style>
      </defs>
      <path d="M960 42.667H106.667a21.333 21.333 0 0 0 0 42.666h64V960a21.333 21.333 0 0 0 30.873 19.08l76.767-38.38 97.773 39.107a21.333 21.333 0 0 0 15.84 0l98.747-39.5 98.746 39.5a21.333 21.333 0 0 0 15.84 0L705.52 939.7l164 40.993a21.02 21.02 0 0 0 5.173.667 21.333 21.333 0 0 0 21.334-21.333V85.333h64a21.333 21.333 0 0 0 0-42.666zm-640 128h85.333a21.333 21.333 0 0 1 0 42.666H320a21.333 21.333 0 0 1 0-42.666zm298.667 426.666A21.333 21.333 0 0 1 640 618.667v128A21.333 21.333 0 0 1 618.667 768h-64v21.333a21.333 21.333 0 0 1-42.667 0V768h-64a21.333 21.333 0 0 1 0-42.667h149.333V640H448a21.333 21.333 0 0 1-21.333-21.333v-128A21.333 21.333 0 0 1 448 469.333h64V448a21.333 21.333 0 0 1 42.667 0v21.333h64a21.333 21.333 0 0 1 0 42.667H469.333v85.333zm128-256H320a21.333 21.333 0 0 1 0-42.666h426.667a21.333 21.333 0 0 1 0 42.666zm0-128h-256a21.333 21.333 0 0 1 0-42.666h256a21.333 21.333 0 0 1 0 42.666z"></path>
    </symbol>
    <symbol class="icon" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" id="icon-common-footer-5">
      <path d="M512 458.24c86.528 0 156.672-84.48 156.672-187.904S598.528 81.92 512 81.92 355.328 166.4 355.328 269.824 425.472 458.24 512 458.24zm0-335.36c63.488 0 115.712 66.048 115.712 146.944S575.488 417.28 512 417.28s-115.712-66.048-115.712-147.456S448.512 122.88 512 122.88zm300.032 461.824C731.648 536.064 624.64 508.928 512 508.928c-113.152 0-219.648 27.136-300.032 75.776C128 635.392 81.92 704 81.92 777.728c0 73.216 44.544 120.32 135.68 143.36 76.8 19.456 178.688 20.992 294.4 20.992s218.112-1.536 294.4-20.992c91.136-23.04 135.68-70.144 135.68-143.36 0-73.728-46.08-142.336-130.048-193.024zM512 901.12c-227.84 0-389.12-8.704-389.12-123.392 0-125.952 174.592-228.352 389.12-228.352s389.12 102.4 389.12 228.352c0 114.688-161.28 123.392-389.12 123.392z"></path>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" id="icon-common-success">
      <path d="m6.505 11.507-2.636-2.64c.427-.428.88-.88 1.343-1.341l1.192 1.25 4.283-4.282L12.1 5.909l-5.596 5.598M15.93 7.1C15.545 3.14 12.043-.002 8.013 0 3.095.003-.677 4.382.103 9.244c.13.821.474 1.616.775 2.402.188.492.499.5.847.088.065-.077.125-.162.203-.222.228-.178.473-.182.697-.003.228.181.258.427.133.68-.06.124-.15.236-.246.335-.7.728-1.415 1.443-2.102 2.182-.124.133-.229.386-.186.54.035.125.305.26.47.26 1.028.002 2.04-.124 3.026-.436a.875.875 0 0 1 .591.048c1.679.83 3.43 1.085 5.268.72 4.036-.802 6.758-4.547 6.35-8.738" fill="#00B25E" fill-rule="evenodd"></path>
    </symbol>
  </svg><van-nav-bar safe-area-inset-top="">
    <!-- 开启底部安全区适配 -->
    <van-number-keyboard safe-area-inset-bottom="">
      <title>sites</title>
      <style>
        @media screen and (min-width: 750px) {
          html {
            font-size: 60px !important;
          }
        }

        .content-box[data-v-dad6ad44] {
          opacity: 80%;

        }
      </style>
      <script type="module" crossorigin="" src="assets/index.3fb3bc1b.js"></script>
      <link rel="modulepreload" href="assets/vendor.a9caa298.js">
      <link rel="stylesheet" href="assets/index.171c870c.css">


      <div id="app" class="safe-area-inset-bottom" data-v-app="">
        <div class="main-layout" data-v-08abc850="">
          <div class="top-bar flex" data-v-b585d98c="" data-v-08abc850="">
            <img src="assets/menu.1d08c9f4.png" alt="" class="menu" id="menu" data-v-b585d98c="">
            <div class="logo" data-v-b585d98c="">
              <img src="<?php echo $query->siteLogo; ?>" alt="" data-v-b585d98c="">
            </div>
            <a href="javascript:void(0)" class="activity" data-v-b585d98c="">
              <div class="van-badge__wrapper" data-v-b585d98c="">

              </div>
            </a>
          </div>
          <div class="main-container" data-v-08abc850="">

            <?php
            $vales = 0;
            if (isset($rewards)) {
              $vales = 0;
              foreach ($rewards as $key => $value) {
                $vales += (float) $value['reward'];
              }
            }

            ?>
            <style>
              .main-container {
                position: relative;
                z-index: 1;
                /* Ensures content is above the video */
                color: white;
                /* Adjust text color for contrast */
                text-align: center;
              }

              #background-video {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 1200px;
                object-fit: cover;
                /* Ensures the video covers the whole area */
                z-index: -1;
                /* Places the video behind other content */

              }

              @media only screen and (min-width: 1450px) and (max-width: 3000px) {
                #background-video {
                  height: 1200px;
                  /* Adjust height for larger screens */
                }

                .swal2-popup {
                  width: 40% !important;
                  /* Adjust the width as needed */
                  font-size: 14px;
                  /* Adjust font size for smaller screens */
                  height: 30% !important;
                }
              }

              @media only screen and (min-width: 950px) and (max-width: 1449px) {
                #background-video {
                  height: 1600px;
                  /* Adjust height for larger screens */
                }
              }

              @media only screen and (min-width: 775px) and (max-width: 949px) {
                #background-video {
                  height: 2000px;
                  /* Adjust height for larger screens */
                }
              }

              @media only screen and (min-width: 100px) and (max-width: 774px) {
                #background-video {
                  height: 2700px;
                  /* Adjust height for larger screens */
                }

                .swal2-popup {
                  width: 90% !important;
                  /* Adjust the width as needed */
                  font-size: 11px;
                  /* Adjust font size for smaller screens */

                }
              }
            </style>

            <video autoplay muted loop id="background-video">
              <source src="assets/video.mp4" type="video/mp4">
              Your browser does not support the video tag.
            </video>
            <div class="van-config-provider" data-v-08abc850="" style="--van-primary-color: #00f2fe; --van-button-primary-background-color: #00f2fe;">
              <div class="container w100" data-v-dad6ad44="">
                <div class="van-nav-bar van-hairline--bottom" data-v-dad6ad44="">
                  <div class="van-nav-bar__content">
                    <!-- <a href="home">
                      <div class="van-nav-bar__left van-haptics-feedback"><i class="van-badge__wrapper van-icon van-icon-arrow-left van-nav-bar__arrow"></i>
                    </div>
                    </a> -->
                    <!-- <div class="van-nav-bar__title van-ellipsis">Journey</div> -->

                    <div class="van-nav-bar__right van-haptics-feedback"><a href="jhistory" class="history" data-v-dad6ad44="">History</a></div>
                  </div>
                </div>
                <div class="banner-top" data-v-dad6ad44=""></div>
                <div class="content-box" data-v-dad6ad44="">
                  <div class="list-top" data-v-dad6ad44=""><img src="assets/booking-1.d2bf80f8.png" alt="" data-v-dad6ad44="">
                    <div class="title" data-v-dad6ad44="">Account Balance</div>
                    <div class="subtitle" data-v-dad6ad44="">PKR <?php echo number_format($user->balance, 2); ?></div>
                  </div>
                  <div class="list-bottom" data-v-dad6ad44="">
                    <?php
                    $trial_user = \DB::table('user_trials')->where('user_id', $user->id)->where('payment_status', 'pending')->get();
                    $trial_period = \DB::table('trial_periods')->first();
                    if ($user->withdrawalStatus !== '0') {
                    ?>

                      <div class="list-item" data-v-dad6ad44="">
                        <div class="title" data-v-dad6ad44="">Today’s Rewards (PKR)</div>
                        <div class="subtitle" data-v-dad6ad44="">Rs <?php echo $vales; ?></div>
                      </div>
                    <?php } else { ?>
                      <div style="background: red;" class="list-item" data-v-dad6ad44="">
                        <div style="color: white;" class="title" data-v-dad6ad44="">Withdrawal Status</div>
                        <div style="color: white;" class="subtitle" data-v-dad6ad44="">Block By Admin</div>
                      </div>
                    <?php
                    }
                    if ($user->orderStatus !== '0') {
                      $levels = \DB::table('memberlevels')->where('level', $user->memberLevel)->first();
                    ?>

                      <div class="list-item" data-v-dad6ad44="">
                        <div class="title" data-v-dad6ad44="">Daily Journey</div>
                        <?php if ($trial_user->count() > 0) { ?>
                          <div class="subtitle" data-v-dad6ad44=""><?php echo $trial_period->tasks; ?></div>
                        <?php } else { ?>
                          <div class="subtitle" data-v-dad6ad44=""><?php echo $levels->orderReciveLimit; ?></div>
                        <?php } ?>
                      </div>

                    <?php } else { ?>
                      <div style="background: red;" class="list-item" data-v-dad6ad44="">
                        <div style="color: white;" class="title" data-v-dad6ad44="">Journey Status</div>
                        <div style="color: white;" class="subtitle" data-v-dad6ad44="">Block By Admin</div>
                      </div>
                      <
                        <?php } ?>
                        <div class="list-item" data-v-dad6ad44="">
                        <div class="title" data-v-dad6ad44="">Completed Journey</div>
                        <div class="subtitle" data-v-dad6ad44=""><?php echo $totals; ?></div>
                  </div>
                </div>
                <?php
                if ($trial_user->count() > 0) {
                  $trial = $trial_user->first();
                  $currentDate = date('Y-m-d');

                  if ($currentDate > $trial->trial_end_date) {
                    if ($trial->payment_status == 'pending') {
                ?>
                      <button type="button" id="journey" class="van-button van-button--primary van-button--normal van-button--block" data-v-dad6ad44="" style="background: var(--gradient-text); color: #07090e; border: none; box-shadow: 0 4px 20px rgba(0, 242, 254, 0.3);">
                        <div class="van-button__content"><!----><span class="van-button__text">Trial Expired</span><!----></div>
                      </button>
                    <?php }
                  } else { ?>
                    <a href="jsubmission">
                      <button type="button" id="journey" class="van-button van-button--primary van-button--normal van-button--block" data-v-dad6ad44="" style="background: var(--gradient-text); color: #07090e; border: none; box-shadow: 0 4px 20px rgba(0, 242, 254, 0.3);">
                        <div class="van-button__content"><!----><span class="van-button__text">Start Journey</span><!----></div>
                      </button>
                    </a>
                  <?php }
                } else { ?>
                  <a href="jsubmission">
                    <button type="button" id="journey" class="van-button van-button--primary van-button--normal van-button--block" data-v-dad6ad44="" style="background: var(--gradient-text); color: #07090e; border: none; box-shadow: 0 4px 20px rgba(0, 242, 254, 0.3);">
                      <div class="van-button__content"><!----><span class="van-button__text">Start Journey</span><!----></div>
                    </button>
                  </a>
                <?php } ?>

                <div class="content" data-v-9fe837d0="">

                  <style>
                    /* Announcement Bar Styles */
                    .announcement-bar {
                      background: linear-gradient(135deg, #07090e,rgb(97, 95, 97));
                      /* Gradient background */
                      color: white;
                      text-align: center;
                      padding: 15px 40px 15px 20px;
                      /* Extra padding for close button */
                      font-family: 'Arial', sans-serif;
                      font-size: 16px;
                      font-weight: bold;
                      box-shadow: 0 4px 10px rgba(219, 219, 219, 0.2);
                      position: relative;
                      overflow: hidden;
                      display: flex;
                      align-items: center;
                      justify-content: space-between;
                      transition: transform 0.3s ease, opacity 0.3s ease;
                    }

                    .announcement-bar::before {
                      content: '';
                      position: absolute;
                      top: 0;
                      left: -100%;
                      width: 100%;
                      height: 100%;
                      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
                      animation: shine 3s infinite;
                    }

                    @keyframes shine {
                      0% {
                        left: -100%;
                      }

                      100% {
                        left: 100%;
                      }
                    }

                    .announcement-content {
                      display: flex;
                      align-items: center;
                      justify-content: center;
                      gap: 10px;
                    }

                    .announcement-content p {
                      margin: 0;
                      font-size: 18px;
                    }

                    .announcement-content .icon {
                      font-size: 24px;
                      animation: bounce 2s infinite;
                    }

                    @keyframes bounce {

                      0%,
                      20%,
                      50%,
                      80%,
                      100% {
                        transform: translateY(0);
                      }

                      40% {
                        transform: translateY(-10px);
                      }

                      60% {
                        transform: translateY(-5px);
                      }
                    }

                    .announcement-content a.cta-button {
                      color: white;
                      background-color: rgba(255, 0, 0, 0.89);
                      padding: 8px 20px;
                      border-radius: 25px;
                      text-decoration: none;
                      transition: background-color 0.3s ease, transform 0.3s ease;
                      display: flex;
                      align-items: center;
                      gap: 8px;
                    }

                    .announcement-content a.cta-button:hover {
                      background-color: rgba(233, 63, 63, 0.5);
                      transform: translateY(-2px);
                    }

                    .announcement-content a.cta-button i {
                      font-size: 14px;
                    }

                    /* Close Button Styles */
                    .close-button {
                      background: red;
                      border: none;
                      color: red;
                      font-size: 20px;
                      cursor: pointer;
                      padding: 5px;
                      transition: transform 0.3s ease;
                    }

                    .close-button:hover {
                      transform: scale(1.2);
                      color: red;
                      background: rgba(255, 255, 255, 0.2);
                    }

                    /* Responsive Design */
                    @media (max-width: 768px) {
                      .announcement-bar {
                        flex-direction: column;
                        padding: 15px 20px;
                      }

                      .announcement-content {
                        flex-direction: column;
                        gap: 5px;
                      }

                      .announcement-content p {
                        font-size: 16px;
                      }

                      .announcement-content a.cta-button {
                        padding: 6px 15px;
                        font-size: 14px;
                      }

                      .close-button {
                        position: absolute;
                        top: 10px;
                        right: 10px;
                      }
                    }

                    /* Card Container */
                    .card-container {
                      display: flex;
                      flex-wrap: wrap;
                      justify-content: center;
                      gap: 20px;
                      /* Space between cards */
                      max-width: 1600px;
                      width: 100%;
                    }

                    /* Individual Card Styles */
                    .card {
                      background-color: #fff;
                      border-radius: 10px;
                      box-shadow: 0 4px 8px #07090e;
                      width: 100%;
                      max-width: 250px;
                      /* Fixed width for each card */
                      overflow: hidden;
                      text-align: center;
                      transition: transform 0.3s ease, box-shadow 0.3s ease;
                    }

                    .card:hover {
                      transform: translateY(-10px);
                      box-shadow: 0 8px 16px #07090e;
                    }

                    /* Card Header */
                    .card-header {
                      background-color: #07090e;
                      color: white;
                      padding: 20px;
                    }

                    .card-header h2 {
                      margin: 0;
                      font-size: 24px;
                    }

                    /* Card Image */
                    .card-image {
                      padding: 20px;
                    }

                    .card-image img {
                      width: 100px;
                      /* Adjust image size */
                      height: 100px;
                      border-radius: 50%;
                      /* Makes the image circular */
                      object-fit: cover;
                      /* Ensures the image fits well */
                      border: 3px solid #07090e;
                      /* Adds a border around the image */
                    }

                    /* Card Body */
                    .card-body {
                      padding: 20px;
                    }

                    .card-body p {
                      margin: 10px 0;
                      color: #333;
                      font-size: 12px;
                    }

                    /* Unlock Button */
                    .unlock-button {
                      background-color: #07090e;
                      color: white;
                      border: none;
                      padding: 10px 20px;
                      border-radius: 5px;
                      cursor: pointer;
                      font-size: 16px;
                      margin-top: 10px;
                      transition: background-color 0.3s ease;
                    }

                    .unlock-button:hover {
                      background-color: #07090e;
                    }

                    /* Card Footer */
                    .card-footer {
                      background-color: #f1f1f1;
                      padding: 10px;
                      font-size: 14px;
                      color: #666;
                    }

                    /* Responsive Design */
                    @media (max-width: 768px) {
                      .card-container {
                        flex-direction: column;
                        align-items: center;
                      }

                      .card {
                        max-width: 100%;
                        /* Cards take full width on small screens */
                      }
                    }

                    /* Guide Overlay */
                    #guide-overlay {
                      position: fixed;
                      top: 0;
                      left: 0;
                      width: 100%;
                      height: 100%;
                      background-color: rgba(0, 0, 0, 0.8);
                      z-index: 1000;
                      display: none;
                      /* Hidden by default */
                      /* backdrop-filter: blur(1px); /* Adds a blur effect to the background */
                    }

                    .highlight {
                      position: absolute;
                      border: 2px solid #ffcc00;
                      background-color: rgba(255, 204, 0, 0.2);
                      border-radius: 10px;
                      z-index: 1001;
                      box-shadow: 0 0 15px rgba(255, 204, 0, 0.5);
                      /* Adds a glowing effect */
                      animation: pulse 1.5s infinite;
                      /* Adds a pulsating animation */
                    }

                    @keyframes pulse {
                      0% {
                        box-shadow: 0 0 0 0 rgba(255, 204, 0, 0.4);
                      }

                      70% {
                        box-shadow: 0 0 0 10px rgba(255, 204, 0, 0);
                      }

                      100% {
                        box-shadow: 0 0 0 0 rgba(255, 204, 0, 0);
                      }
                    }

                    .guide-tooltip {
                      position: absolute;
                      background-color: #07090e;
                      padding: 20px;
                      border-radius: 10px;
                      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
                      z-index: 1002;
                      max-width: 250px;
                      text-align: center;
                      animation: fadeIn 0.5s ease;
                      /* Adds a fade-in animation */
                    }

                    @keyframes fadeIn {
                      from {
                        opacity: 0;
                        transform: translateY(-10px);
                      }

                      to {
                        opacity: 1;
                        transform: translateY(0);
                      }
                    }

                    .guide-tooltip p {
                      margin: 0 0 15px 0;
                      font-size: 16px;
                      color: #333;
                    }

                    .guide-tooltip button {
                      padding: 10px 20px;
                      background-color: #007bff;
                      color: white;
                      border: none;
                      border-radius: 5px;
                      cursor: pointer;
                      font-size: 14px;
                      transition: background-color 0.3s ease;
                    }

                    .guide-tooltip button:hover {
                      background-color: #0056b3;
                    }

                    #skip-btn {
                      position: absolute;
                      top: 20px;
                      right: 20px;
                      padding: 10px 20px;
                      background-color: #f44336;
                      color: white;
                      border: none;
                      border-radius: 5px;
                      cursor: pointer;
                      z-index: 1003;
                      /* Ensure it's above the overlay */
                      font-size: 14px;
                      transition: background-color 0.3s ease;
                    }

                    #skip-btn:hover {
                      background-color: #d32f2f;
                    }

                    /* Responsive Adjustments */
                    @media (max-width: 768px) {
                      .guide-tooltip {
                        max-width: 90%;
                        /* Make tooltip wider on smaller screens */
                        font-size: 14px;
                        /* Reduce font size for better fit */
                      }

                      .guide-tooltip button {
                        padding: 8px 16px;
                        /* Smaller buttons on mobile */
                      }

                      #skip-btn {
                        top: 10px;
                        right: 10px;
                        padding: 8px 16px;
                        /* Smaller skip button on mobile */
                      }
                    }

                    @media (max-width: 480px) {
                      .guide-tooltip {
                        max-width: 100%;
                        /* Full width on very small screens */
                        padding: 15px;
                        /* Reduce padding */
                      }

                      .guide-tooltip p {
                        font-size: 14px;
                        /* Smaller text for mobile */
                      }

                      .guide-tooltip button {
                        padding: 6px 12px;
                        /* Even smaller buttons */
                      }

                      #skip-btn {
                        font-size: 12px;
                        /* Smaller skip button text */
                      }
                    }
                  </style>

                  <div class="card-container">
                    <?php

                    $referral = \DB::table('referrals')->where('referrer_id', $user->id)->get();
                    $row = $referral->count();

                    // Assume $user_balance is already defined and holds the user's balance
                    $user_balance = $user->balance; // Replace with actual balance retrieval logic

                    if ($trial_user->count() > 0) {
                      $user->memberLevel = '0';
                      $querys = \DB::table('memberlevels')->orderBy('level', 'asc')->get();

                      #array_unshift($querys, (object) array('level' => 0, 'ordersGrabbed' => 0, 'minimumBalanceLimit' => 0, 'orderReciveLimit' => $trial_period->tasks, 'name' => 'Free Trial ', 'commissionRate' => $trial_period->commission, 'img' => 'trial.png'));
                      foreach ($querys as $key => $value) {
                        // commission rate add on key 0 is free trial equl to level 1


                    ?>
                        <!-- Card 1 -->
                        <div class="card">
                          <div class="card-header">
                            <h3><?php echo $value->levelName; ?></h3>
                          </div>
                          <div class="card-image">
                            <img src="livewire/public/backend/level/<?php echo $value->levelImage; ?>" alt="Level 1 Badge">
                          </div>
                          <div class="card-body">
                            <?php
                            if ($row >= $value->ordersGrabbed && $user_balance >= $value->price) {
                              echo "<p>Congratulations! You've reached Level " . $value->level . ". Claimed Now</p>";
                            } else {
                              echo "<p>Please complete basic requirements to unlock this level.</p>";
                            }  ?>
                            <p>Minimum Balance: <?php echo $value->price; ?> PKR</p>
                            <p>Minimum Referral: <?php echo $row; ?>/<?php echo $value->ordersGrabbed; ?></p>
                            <p>Featured </p>
                            <p>Daily Journey: <?php echo $value->orderReciveLimit; ?></p>
                            <p>Commission Rate: <?php echo $value->commissionRate; ?> PKR</p>
                            <button class="unlock-button <?php
                                                          if ($row >= $value->ordersGrabbed && $user_balance >= $value->price) {
                                                            if ($value->level <= $user->memberLevel) {
                                                            } else {
                                                              echo 'claim';
                                                            }
                                                          } ?>" <?php
                                                                if ($row >= $value->ordersGrabbed && $user_balance >= $value->price) {

                                                                  if ($value->level <= $user->memberLevel) {
                                                                  } else {
                                                                    echo 'id="' . $value->level . '"';
                                                                  }
                                                                } ?>><?php
                                                                      if ($row >= $value->ordersGrabbed && $user_balance >= $value->price) {
                                                                        if ($value->level <= $user->memberLevel) {
                                                                          echo "Already Claimed";
                                                                        } else {
                                                                          echo 'Claim Now';
                                                                        }
                                                                      } elseif ($value->level <= $user->memberLevel) {
                                                                        echo "Already Claimed";
                                                                      } else {
                                                                        echo '<img class="lock" src="assets/lock.png" width="12" style="color:#fff !important;">';
                                                                      }  ?></button>
                          </div>
                          <!-- <div class="card-footer">
                            <p><?php echo $value->level; ?></p>
                          </div> -->
                        </div>
                      <?php }
                    } else {

                       $querys = \DB::table('memberlevels')->orderBy('level', 'asc')->get();
                      # array_unshift($querys, (object) array('level' => 0, 'name' => 'Free Trial ', 'ordersGrabbed' => 0, 'minimumBalanceLimit' => 0, 'orderReciveLimit' => $trial_period->tasks, 'commissionRate' => $trial_period->commission, 'img' => 'trial.png'));
                      foreach ($querys as $key => $value) {
                        // commission rate add on key 0 is free trial equl to level 1
                      ?>

                        <!-- Card 1 -->
                        <div class="card">
                          <div class="card-header">
                            <h3><?php echo $value->levelName; ?></h3>
                          </div>
                          <div class="card-image">
                            <img src="livewire/public/backend/level/<?php echo $value->levelImage; ?>" alt="Level 1 Badge">
                          </div>
                          <div class="card-body">
                            <?php
                            if ($row >= $value->ordersGrabbed && $user_balance >= $value->price) {
                              echo "<p>Congratulations! You've reached Level " . $value->level . ". Claimed Now</p>";
                            } else {
                              echo "<p>Please complete your previous level to unlock this level.</p>";
                            }  ?>

                            <p>Minimum Balance: <?php echo $value->price; ?> PKR</p>
                            <p>Minimum Referral: <?php echo $row; ?>/<?php echo $value->ordersGrabbed; ?></p>
                            <p>Featured </p>
                            <p>Daily Journey: <?php echo $value->orderReciveLimit; ?></p>
                            <p>Commission Rate: <?php echo $value->commissionRate; ?> PKR</p>
                            <button class="unlock-button <?php
                                                          if ($row >= $value->ordersGrabbed && $user_balance >= $value->price) {
                                                            if ($value->level <= $user->memberLevel) {
                                                            } else {
                                                              echo 'claim';
                                                            }
                                                          } ?>" <?php
                                                                if ($row >= $value->ordersGrabbed && $user_balance >= $value->price) {

                                                                  if ($value->level <= $user->memberLevel) {
                                                                  } else {
                                                                    echo 'id="' . $value->level . '"';
                                                                  }
                                                                } ?>><?php
                                                                      if ($row >= $value->ordersGrabbed && $user_balance >= $value->price) {
                                                                        if ($value->level <= $user->memberLevel) {
                                                                          echo "Already Claimed";
                                                                        } else {
                                                                          echo 'Claim Now';
                                                                        }
                                                                      } elseif ($value->level <= $user->memberLevel) {
                                                                        echo "Already Claimed";
                                                                      } else {
                                                                        echo '<img class="lock" src="assets/lock.png" width="12" style="color:#fff !important;">';
                                                                      }  ?></button>
                          </div>

                          <!-- <div class="card-footer">
                          <p><?php echo $value->level; ?></p>
                          </div> -->
                        </div>
                    <?php }
                    }
                    ?>

                  </div>


                </div>
              </div>



            </div>
          </div>


        </div>
        <br><br>
      </div>
      </div>



    </van-number-keyboard></van-nav-bar><!----><!---->
  <div data-v-app=""></div><!---->
  <div class="van-popup van-popup--center van-toast van-toast--middle van-toast--loading custom-toast" style="z-index: 2001; display: none;">
    <div class="van-loading van-loading--circular van-toast__loading"><span class="van-loading__spinner van-loading__spinner--circular" style="width: 20px; height: 20px;"><svg class="van-loading__circular" viewBox="25 25 50 50">
          <circle cx="50" cy="50" r="20" fill="none"></circle>
        </svg></span><!----></div><!----><!---->
  </div>
  <!-- Guide Overlay -->
  <div id="guide-overlay">
    <!-- Skip Button -->
    <button id="skip-btn" onclick="hideGuide()">Skip Guide</button>
  </div>
@include('front.sidebar')
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(".van-radio--horizontal").click(function() {
    $(".van-radio--horizontal").removeClass('van-radio__icon--checked');
    $('.network').val($(this).find('span').text());
    //$(this).removeClass('van-radio__icon--checked');
    $(this).addClass('van-radio__icon--checked');
  })
  <?php
  if (isset($error)) {
    echo "Swal.fire({
                            icon: 'error',
                            title: 'error',
                            text: '" . $error . "',
                            showConfirmButton: false,
                            timer: 5000 // Automatically close after 1.5 seconds
                          });";
  }
  if (isset($errortoday)) {
    $message = "You've completed today's journeys. We can't wait to see you tomorrow";
    echo 'Swal.fire({
                            icon: "error",
                            title: "Hands up!",
                            text: "' . $errortoday . '",
                            showConfirmButton: false,
                            timer: 5000 // Automatically close after 1.5 seconds
                          });';
  }
  ?>
  $('.claim').click(function() {
    var level = $(this).attr('id');
    // ajex request
    $.ajax({
      url: '{{ asset('') }}proxy/level_claim',
      type: 'POST',
      data: {
        level: level
      },
      dataType: 'json',
      success: function(data) {
        if (data.status == 'success') {
          Swal.fire({
            icon: 'success',
            title: 'Success',
            text: data.message,
            showConfirmButton: false,
            timer: 5000 // Automatically close after 1.5 seconds
          });
          setTimeout(function() {
            window.location.reload();
          }, 5000);
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: data.message,
            showConfirmButton: false,
            timer: 5000 // Automatically close after 1.5 seconds
          });
        }
      },
      error: function(xhr, status, error) {
        // Handle error
        console.log(error);
      }
    });
  });
</script>
<script>
  // script.js
  const guideSteps = [{
      target: "#menu",
      message: "Step 1: This is the navigation bar. Use it to explore the website.",
    },
    {
      target: "#journey",
      message: "Step 2: Click this button to perform an action.",
    },
    {
      target: ".unlock-button",
      message: "Step 3: Check out your available levels and claim the ones you qualify for.",
    },
  ];

  let currentStep = 0;
  const guideOverlay = document.getElementById("guide-overlay");

  function showGuide() {
    const hasSkipped = localStorage.getItem("guideSkipped");
    if (!hasSkipped) {
      guideOverlay.style.display = "block";
      nextStep();
    }
  }

  function nextStep() {
    if (currentStep >= guideSteps.length) {
      hideGuide(); // Automatically hide the guide when all steps are completed
      return;
    }

    // Clear previous step
    guideOverlay.innerHTML = "";

    // Add the Skip button
    const skipButton = document.createElement("button");
    skipButton.id = "skip-btn";
    skipButton.textContent = "Skip Guide";
    skipButton.onclick = hideGuide;
    guideOverlay.appendChild(skipButton);

    const step = guideSteps[currentStep];
    const targetElement = document.querySelector(step.target);

    if (targetElement) {
      // Scroll the target element into view
      targetElement.scrollIntoView({
        behavior: "smooth", // Smooth scrolling
        block: "center", // Center the element vertically
        inline: "center", // Center the element horizontally
      });

      // Wait for the scroll to complete before showing the tooltip
      setTimeout(() => {
        const targetRect = targetElement.getBoundingClientRect();

        // Create highlight
        const highlight = document.createElement("div");
        highlight.className = "highlight";
        highlight.style.top = `${targetRect.top + window.scrollY}px`;
        highlight.style.left = `${targetRect.left + window.scrollX}px`;
        highlight.style.width = `${targetRect.width}px`;
        highlight.style.height = `${targetRect.height}px`;
        guideOverlay.appendChild(highlight);

        // Create tooltip
        const tooltip = document.createElement("div");
        tooltip.className = "guide-tooltip";
        tooltip.innerHTML = `
                <p>${step.message}</p>
                <button onclick="nextStep()">${currentStep === guideSteps.length - 1 ? "Finish" : "Next"}</button>
            `;
        guideOverlay.appendChild(tooltip);

        // Position the tooltip dynamically
        const tooltipWidth = tooltip.offsetWidth;
        const tooltipHeight = tooltip.offsetHeight;
        const windowWidth = window.innerWidth;
        const windowHeight = window.innerHeight;

        let tooltipTop = targetRect.bottom + 10;
        let tooltipLeft = targetRect.left + targetRect.width / 2 - tooltipWidth / 2;

        // Adjust tooltip position if it overflows the screen
        if (tooltipLeft + tooltipWidth > windowWidth) {
          tooltipLeft = windowWidth - tooltipWidth - 10; // Move left to fit
        }
        if (tooltipLeft < 0) {
          tooltipLeft = 10; // Move right to fit
        }
        if (tooltipTop + tooltipHeight > windowHeight) {
          tooltipTop = targetRect.top - tooltipHeight - 10; // Move above the target
        }

        tooltip.style.top = `${tooltipTop + window.scrollY}px`;
        tooltip.style.left = `${tooltipLeft + window.scrollX}px`;
      }, 500); // Wait for the scroll animation to complete
    }

    currentStep++;
  }

  function hideGuide() {
    guideOverlay.style.display = "none";
    currentStep = 0; // Reset step counter
    localStorage.setItem("guideSkipped", "true"); // Remember the skip
  }

  // Show the guide when the page loads
  window.onload = showGuide;
  // localStorage.removeItem("guideSkipped");
 
  // Get the announcement bar and close button
const announcementBar = document.getElementById('announcementBar');
const closeButton = document.getElementById('closeButton');

// Get the announcement ID from the data attribute
const announcementId = announcementBar.getAttribute('data-announcement-id');

// Check if the announcement has been closed before
const closedAnnouncementId = localStorage.getItem('closedAnnouncementId');

// If the announcement ID is different or not set, show the bar
if (closedAnnouncementId !== announcementId) {
    announcementBar.style.display = 'flex'; // Show the bar
} else {
    announcementBar.style.display = 'none'; // Hide the bar
}

// Add click event to the close button
closeButton.addEventListener('click', () => {
    // Hide the announcement bar with a smooth transition
    announcementBar.style.transform = 'translateY(-100%)';
    announcementBar.style.opacity = '0';
    setTimeout(() => {
        announcementBar.style.display = 'none';
    }, 300); // Wait for the transition to complete

    // Save the announcement ID to localStorage
    localStorage.setItem('closedAnnouncementId', announcementId);
});
</script>