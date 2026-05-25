<html lang="en" style="margin: 0px auto; font-size: 107.1px;"><head>
  <meta charset="UTF-8">
  <link rel="icon" href="/favicon.ico">
  <link rel="stylesheet" href="at.alicdn.com/t/font_3353145_az0dbuzh42s.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
  <base href="{{ asset('') }}">
  <link rel="modulepreload" as="script" crossorigin="" href="assets/layout.b5f6c65d.js">
  <link rel="stylesheet" href="assets/Withdrawal.d6dba5e0.css">
  <link rel="stylesheet" href="assets/WithdrawalForm.a643eb88.css">
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
          <a href="journey" class="dark-nav-back">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#00f2fe" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
          </a>
          <span class="dark-nav-title">Withdrawal</span>
          <a href="withdrawal/withdrawalhistory" class="dark-nav-action">History</a>
        </div>

        <!-- Notice -->
        <div class="dark-notice">
          Please be patient, your withdrawal will be processed within one hour.
        </div>

        <!-- Error/Success Messages -->
        <?php if(isset($error)): ?>
          <div class="dark-alert-error"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if(isset($errro['success'])): ?>
          <div class="dark-alert-success"><?php echo $errro['success']; ?></div>
        <?php endif; ?>
        <?php if(isset($success['success'])): ?>
          <div class="dark-alert-success"><?php echo $success['success']; ?></div>
        <?php endif; ?>

        <!-- Balance Card -->
        <div class="dark-balance-card">
          <div class="dark-balance-label">Account Balance</div>
          <div class="dark-balance-amount">Rs <?php echo number_format($balance->balance, 2); ?></div>
          <div class="glow"></div>
        </div>

        <!-- Bank Details -->
        <div class="dark-section">
          <div class="dark-section-title">Withdrawal Method</div>
          <p style="color: rgba(255,255,255,0.5); font-size: 13px; margin-bottom: 14px;">Transfer To Bank Address</p>
          <div class="dark-info-card">
            <div class="dark-info-row">
              <span class="dark-info-label">Username</span>
              <span class="dark-info-value"><?php echo session('username'); ?></span>
            </div>
            <div class="dark-info-row">
              <span class="dark-info-label">Bank Name</span>
              <span class="dark-info-value"><?php if(isset($bank)){ echo $bank->bankName; } else { echo '—'; } ?></span>
            </div>
            <div class="dark-info-row">
              <span class="dark-info-label">Card Number</span>
              <span class="dark-info-value"><?php if(isset($bank)){ echo $bank->cardNumber; } else { echo '—'; } ?></span>
            </div>
            <div class="dark-info-row">
              <span class="dark-info-label">Phone Number</span>
              <span class="dark-info-value"><?php if(isset($bank)){ echo $bank->phoneNumber; } else { echo '—'; } ?></span>
            </div>
          </div>
        </div>

        <!-- Withdrawal Form -->
        <div class="dark-section">
          <div class="dark-section-title">Withdrawal Amount</div>
          <form action="withdrawal/request" method="post">
            @csrf
            <input type="hidden" name="mybalance" value="<?php echo $balance->balance; ?>">
            <div class="dark-form-group">
              <label class="dark-form-label">Amount</label>
              <div class="dark-input-wrap">
                <span class="dark-input-prefix">Rs</span>
                <input type="number" step="any" name="orderd" placeholder="0.00" class="dark-input" required>
              </div>
            </div>

            <div class="dark-submit-wrap">
              <button type="submit" class="dark-submit-btn">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                <span>Submit Withdrawal</span>
              </button>
            </div>
          </form>
        </div>
      </div>

      </div>
    </div>
  </div>
</div>

</van-number-keyboard></van-nav-bar><!----><!----><div data-v-app=""></div><!----><div class="van-popup van-popup--center van-toast van-toast--middle van-toast--loading custom-toast" style="z-index: 2001; display: none;"><div class="van-loading van-loading--circular van-toast__loading"><span class="van-loading__spinner van-loading__spinner--circular" style="width: 20px; height: 20px;"><svg class="van-loading__circular" viewBox="25 25 50 50"><circle cx="50" cy="50" r="20" fill="none"></circle></svg></span><!----></div><!----><!----></div>@include('front.sidebar')
</body></html>

@include('front.partials.dark-theme-styles')
