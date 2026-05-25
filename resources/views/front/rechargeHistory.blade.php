<html lang="en" style="margin: 0px auto; font-size: 107.1px;"><head>
  <meta charset="UTF-8">
  <link rel="icon" href="/favicon.ico">
  <link rel="stylesheet" href="at.alicdn.com/t/font_3353145_az0dbuzh42s.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
  <base href="{{ asset('') }}">
  <link rel="modulepreload" as="script" crossorigin="" href="assets/layout.b5f6c65d.js">
  <link rel="stylesheet" href="assets/Withdrawal.d6dba5e0.css">
  <link rel="stylesheet" href="assets/WithdrawalForm.a643eb88.css">
  <link rel="stylesheet" href="assets/WithdrawalHistory.1896dc95.css">
  <link rel="stylesheet" href="assets/BindCard.b6b5acd9.css">
  <link rel="stylesheet" href="assets/DealingSlip.36399a95.css">
  <link rel="stylesheet" href="assets/Invitation.6bb1120f.css">
  <link rel="stylesheet" href="assets/layout.323f08e7.css">
  <link rel="stylesheet" href="assets/Recharge.ad970ee6.css">
  <link rel="stylesheet" href="assets/Service.4cd184a4.css">
  <link rel="modulepreload" as="script" crossorigin="" href="assets/notice-icon.d521a667.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/logo.5f4029de.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/My.24dd7f65.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/date-icon.ca17ac52.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/My.vue_vue_type_style_index_0_scoped_true_lang.4ef297a9.js"><link rel="stylesheet" href="assets/My.vue_vue_type_style_index_0_scoped_true_lang.b055621c.css"><link rel="modulepreload" as="script" crossorigin="" href="assets/cell-icon-6.487544f7.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/index.df31b0f6.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/clipboard.40f7df85.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/auth.4a81d264.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/Login.3610fde4.js"><link rel="stylesheet" href="assets/Login.6c7bf6ec.css"><link rel="modulepreload" as="script" crossorigin="" href="assets/Index.8594bc53.js"><link rel="stylesheet" href="assets/Index.d3868fad.css"><link rel="modulepreload" as="script" crossorigin="" href="assets/user.d0d43c87.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/hotel-6.813ec2bf.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/booking.2149056b.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/pagination.min.917afa28.js"><link rel="stylesheet" href="assets/pagination.min.eb72427d.css">
</head><body style="font-size: 12px; background: #07090e !important; min-height: 100vh;">
  <style>
    @media screen and (min-width: 750px){ html { font-size: 60px !important; } }
  </style>
  <script type="module" crossorigin="" src="assets/index.3fb3bc1b.js"></script>
  <link rel="modulepreload" href="assets/vendor.a9caa298.js">
  <link rel="stylesheet" href="assets/index.171c870c.css">

  <div id="app" class="safe-area-inset-bottom" data-v-app="">
  <div class="main-layout" data-v-08abc850="">
    <div class="top-bar flex" data-v-b585d98c="" data-v-08abc850="">
      <img src="assets/menu.1d08c9f4.png" alt="" class="menu" data-v-b585d98c="">
      <div class="logo" data-v-b585d98c="">
        <img src="<?php echo $query->siteLogo; ?>" alt="" data-v-b585d98c="">
      </div>
      <a href="javascript:void(0)" class="activity" data-v-b585d98c="">
        <div class="van-badge__wrapper" data-v-b585d98c=""></div>
      </a>
    </div>

    <div class="main-container no-footer" data-v-08abc850="">
      <div class="van-config-provider" data-v-08abc850="" style="--van-primary-color: #00f2fe; --van-button-primary-background-color: #00f2fe;">

      <div class="dark-page">
        <!-- Nav -->
        <div class="dark-nav">
          <a href="withdrawal" class="dark-nav-back">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#00f2fe" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
          </a>
          <span class="dark-nav-title">Withdrawal History</span>
          <span style="width: 36px;"></span>
        </div>

        <!-- History List -->
        <?php if(!empty($users)){ foreach ($users as $user): ?>
          <div class="dark-history-item">
            <div class="dark-history-header">
              <span class="dark-history-amount">Rs <?php echo $user['orderAmount']; ?></span>
              <?php if($user['oprate'] == 2){ ?>
                <span class="dark-badge dark-badge-approved">Approved</span>
              <?php }elseif($user['oprate'] == 0){ ?>
                <span class="dark-badge dark-badge-pending">Pending</span>
              <?php }else{ ?>
                <span class="dark-badge dark-badge-rejected">Declined</span>
              <?php } ?>
            </div>
            <div class="dark-history-detail">
              <span class="dark-history-label">Account</span>
              <span class="dark-history-value"><?php echo ($user['accountNumber'] ?? '') .' '. ($user['name'] ?? '') .' '. ($user['fullname'] ?? ''); ?></span>
            </div>
            <div class="dark-history-detail">
              <span class="dark-history-label">Date</span>
              <span class="dark-history-value"><?php echo $user['created_at'] ? date('Y-m-d H:i:s', $user['created_at']) : ''; ?></span>
            </div>
          </div>
        <?php endforeach;
        } else { ?>
          <div class="dark-empty">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.15)" stroke-width="1.5" style="margin-bottom: 12px;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
            <p>No Records Found</p>
          </div>
        <?php } ?>
      </div>

      </div>
    </div>
  </div>
</div>

</van-number-keyboard></van-nav-bar><!----><!----><div data-v-app=""></div><!----><div class="van-popup van-popup--center van-toast van-toast--middle van-toast--loading custom-toast" style="z-index: 2001; display: none;"><div class="van-loading van-loading--circular van-toast__loading"><span class="van-loading__spinner van-loading__spinner--circular" style="width: 20px; height: 20px;"><svg class="van-loading__circular" viewBox="25 25 50 50"><circle cx="50" cy="50" r="20" fill="none"></circle></svg></span><!----></div><!----><!----></div>@include('front.sidebar')
</body></html>

@include('front.partials.dark-theme-styles')
