<html lang="en" style="margin: 0px auto; font-size: 107.1px;"><head>
  <meta charset="UTF-8">
  <link rel="icon" href="/favicon.ico">
  <link rel="stylesheet" href="at.alicdn.com/t/font_3353145_az0dbuzh42s.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
  <base href="{{ asset('') }}">
  <link rel="modulepreload" as="script" crossorigin="" href="assets/layout.b5f6c65d.js">
  <link rel="stylesheet" href="assets/Security.04481b86.css">
  <link rel="stylesheet" href="assets/layout.323f08e7.css">
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
    <div class="main-container" data-v-08abc850="">
      <div class="van-config-provider" data-v-08abc850="" style="--van-primary-color: #00f2fe; --van-button-primary-background-color: #00f2fe;">

      <div class="dark-page">
        <!-- Nav -->
        <div class="dark-nav">
          <a href="journey" class="dark-nav-back">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#00f2fe" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
          </a>
          <span class="dark-nav-title">Security</span>
          <span style="width: 36px;"></span>
        </div>

        <!-- Error/Success Messages -->
        <?php if(isset($errror)): ?>
          <div class="dark-alert-error"><?php echo $errror; ?></div>
        <?php endif; ?>
        <?php if(isset($errro['bad'])): ?>
          <div class="dark-alert-error"><?php echo $errro['bad']; ?></div>
        <?php endif; ?>
        <?php if(isset($errro['success'])): ?>
          <div class="dark-alert-success"><?php echo $errro['success']; ?></div>
        <?php endif; ?>

        <!-- Password Change Form -->
        <div class="dark-section">
          <div class="dark-section-title">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#00f2fe" stroke-width="2" style="margin-right: 4px;"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
            Change Login Password
          </div>

          <form action="security/passchange" method="post">
            @csrf
            <div class="dark-form-group">
              <label class="dark-form-label">Old Password</label>
              <div class="dark-input-wrap">
                <svg class="dark-input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#00f2fe" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                <input type="password" name="oldpassword" placeholder="Enter old password" class="dark-input" required>
              </div>
            </div>

            <div class="dark-form-group">
              <label class="dark-form-label">New Password</label>
              <div class="dark-input-wrap">
                <svg class="dark-input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#00f2fe" stroke-width="2"><path d="M12 17a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"></path><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                <input type="password" name="newfpassword" placeholder="Enter new password" class="dark-input" required>
              </div>
            </div>

            <div class="dark-form-group">
              <label class="dark-form-label">Confirm New Password</label>
              <div class="dark-input-wrap">
                <svg class="dark-input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#00f2fe" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                <input type="password" name="newcpassword" placeholder="Confirm new password" class="dark-input" required>
              </div>
            </div>

            <div class="dark-submit-wrap">
              <button type="submit" class="dark-submit-btn">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                <span>Update Password</span>
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
