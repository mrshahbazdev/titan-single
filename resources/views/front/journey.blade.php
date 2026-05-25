<html lang="en" style="margin: 0px auto; font-size: 107.1px;"><head>
  <meta charset="UTF-8">
  <link rel="icon" href="/favicon.ico">
  <link rel="stylesheet" href="at.alicdn.com/t/font_3353145_az0dbuzh42s.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
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
  <link rel="modulepreload" as="script" crossorigin="" href="assets/notice-icon.d521a667.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/logo.5f4029de.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/My.24dd7f65.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/date-icon.ca17ac52.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/My.vue_vue_type_style_index_0_scoped_true_lang.4ef297a9.js"><link rel="stylesheet" href="assets/My.vue_vue_type_style_index_0_scoped_true_lang.b055621c.css"><link rel="modulepreload" as="script" crossorigin="" href="assets/cell-icon-6.487544f7.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/index.df31b0f6.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/clipboard.40f7df85.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/auth.4a81d264.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/Login.3610fde4.js"><link rel="stylesheet" href="assets/Login.6c7bf6ec.css"><link rel="modulepreload" as="script" crossorigin="" href="assets/Index.8594bc53.js"><link rel="stylesheet" href="assets/Index.d3868fad.css"><link rel="modulepreload" as="script" crossorigin="" href="assets/user.d0d43c87.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/hotel-6.813ec2bf.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/booking.2149056b.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/pagination.min.917afa28.js"><link rel="stylesheet" href="assets/pagination.min.eb72427d.css">
</head><body style="font-size: 12px; background: #07090e !important; min-height: 100vh;">

<?php $query_announcements = \DB::table('announcements')->orderBy('id', 'DESC')->limit(1)->get();
if($query_announcements->count() > 0){
  $announcement = $query_announcements->first();
?>
<div class="jrn-announcement" id="announcementBar" data-announcement-id="<?php echo $announcement->id; ?>">
  <div class="jrn-announcement-content">
    <span class="jrn-announcement-icon">📢</span>
    <span class="jrn-announcement-text"><?php echo $announcement->message; ?></span>
  </div>
  <button class="jrn-announcement-close" id="closeButton">
    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
  </button>
</div>
<?php } ?>

<style>
  @media screen and (min-width: 750px){ html { font-size: 60px !important; } }
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
      <div class="van-badge__wrapper" data-v-b585d98c=""></div>
    </a>
  </div>
  <div class="main-container" data-v-08abc850="">
    <div class="van-config-provider" data-v-08abc850="" style="--van-primary-color: #00f2fe; --van-button-primary-background-color: #00f2fe;">

    <?php
      $vales = 0;
      if (isset($rewards)) {
        foreach ($rewards as $key => $value) {
          $vales += (float) $value['reward'];
        }
      }
      $trial_user = \DB::table('user_trials')->where('user_id', $user->id)->where('payment_status', 'pending')->get();
      $trial_period = \DB::table('trial_periods')->first();
    ?>

    <div class="dark-page">
      <!-- Nav -->
      <div class="dark-nav">
        <a href="home" class="dark-nav-back">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#00f2fe" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
        </a>
        <span class="dark-nav-title">Journey</span>
        <a href="jhistory" class="dark-nav-action">History</a>
      </div>

      <!-- Hero Banner -->
      <div class="jrn-hero">
        <div class="jrn-hero-bg"></div>
        <div class="jrn-hero-content">
          <h2>✈ CrownBridge Travel</h2>
          <p>Complete journeys & earn rewards</p>
        </div>
      </div>

      <!-- Balance Card -->
      <div class="jrn-balance-card">
        <div class="jrn-balance-icon">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#00f2fe" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
        </div>
        <div class="jrn-balance-info">
          <div class="jrn-balance-label">Account Balance</div>
          <div class="jrn-balance-amount">PKR <?php echo number_format($user->balance, 2); ?></div>
        </div>
      </div>

      <!-- Stats Grid -->
      <div class="jrn-stats-grid">
        <?php if ($user->withdrawalStatus !== '0') { ?>
        <div class="jrn-stat-card">
          <div class="jrn-stat-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#4cdb8f" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
          </div>
          <div class="jrn-stat-value">Rs <?php echo $vales; ?></div>
          <div class="jrn-stat-label">Today's Rewards</div>
        </div>
        <?php } else { ?>
        <div class="jrn-stat-card jrn-stat-blocked">
          <div class="jrn-stat-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ff4d4f" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line></svg>
          </div>
          <div class="jrn-stat-value" style="color: #ff4d4f;">Blocked</div>
          <div class="jrn-stat-label">Withdrawal Status</div>
        </div>
        <?php } ?>

        <?php if ($user->orderStatus !== '0') {
          $levels = \DB::table('memberlevels')->where('level', $user->memberLevel)->first();
        ?>
        <div class="jrn-stat-card">
          <div class="jrn-stat-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#00f2fe" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
          </div>
          <div class="jrn-stat-value">
            <?php if ($trial_user->count() > 0) {
              echo $trial_period->tasks;
            } else {
              echo $levels ? $levels->orderReciveLimit : 0;
            } ?>
          </div>
          <div class="jrn-stat-label">Daily Journey</div>
        </div>
        <?php } else { ?>
        <div class="jrn-stat-card jrn-stat-blocked">
          <div class="jrn-stat-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ff4d4f" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line></svg>
          </div>
          <div class="jrn-stat-value" style="color: #ff4d4f;">Blocked</div>
          <div class="jrn-stat-label">Journey Status</div>
        </div>
        <?php } ?>

        <div class="jrn-stat-card">
          <div class="jrn-stat-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffc107" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
          </div>
          <div class="jrn-stat-value"><?php echo $totals; ?></div>
          <div class="jrn-stat-label">Completed</div>
        </div>
      </div>

      <!-- Start Journey Button -->
      <?php
      if ($trial_user->count() > 0) {
        $trial = $trial_user->first();
        $currentDate = date('Y-m-d');
        if ($currentDate > $trial->trial_end_date) {
          if ($trial->payment_status == 'pending') { ?>
            <button type="button" class="jrn-start-btn jrn-start-btn-disabled" disabled>
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
              Trial Expired
            </button>
          <?php }
        } else { ?>
          <a href="jsubmission" style="text-decoration:none;">
            <button type="button" id="journey" class="jrn-start-btn">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
              Start Journey
            </button>
          </a>
        <?php }
      } else { ?>
        <a href="jsubmission" style="text-decoration:none;">
          <button type="button" id="journey" class="jrn-start-btn">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
            Start Journey
          </button>
        </a>
      <?php } ?>

      <!-- Level Cards -->
      <div class="dark-section" style="margin-top: 20px;">
        <div class="dark-section-title">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#00f2fe" stroke-width="2" style="margin-right: 4px;"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
          Membership Levels
        </div>

        <?php
          $referral = \DB::table('referrals')->where('referrer_id', $user->id)->get();
          $totalReferrals = $referral->count();
          $claimedReferrals = $user->claimedReferrals ?? 0;
          $row = $totalReferrals - $claimedReferrals;
          $user_balance = $user->balance;

          if ($trial_user->count() > 0) {
            $user->memberLevel = '0';
          }
          $querys = \DB::table('memberlevels')->orderBy('level', 'asc')->get();

          foreach ($querys as $key => $value) {
            $canClaim = ($row >= $value->ordersGrabbed && $user_balance >= $value->price);
            $alreadyClaimed = ($value->level <= $user->memberLevel);
        ?>
        <div class="jrn-level-card <?php echo $alreadyClaimed ? 'jrn-level-claimed' : ($canClaim ? 'jrn-level-available' : 'jrn-level-locked'); ?>">
          <div class="jrn-level-header">
            <div class="jrn-level-img">
              <img src="/backend/level/<?php echo $value->levelImage; ?>" alt="<?php echo $value->levelName; ?>">
            </div>
            <div class="jrn-level-info">
              <div class="jrn-level-name"><?php echo $value->levelName; ?></div>
              <?php if ($alreadyClaimed) { ?>
                <span class="dark-badge dark-badge-approved">Claimed</span>
              <?php } elseif ($canClaim) { ?>
                <span class="dark-badge" style="background: rgba(0,242,254,0.12); color: #00f2fe;">Available</span>
              <?php } else { ?>
                <span class="dark-badge" style="background: rgba(255,255,255,0.06); color: rgba(255,255,255,0.4);">Locked</span>
              <?php } ?>
            </div>
          </div>
          <div class="jrn-level-details">
            <div class="jrn-level-detail-row">
              <span>Min Balance</span>
              <span><?php echo number_format($value->price); ?> PKR</span>
            </div>
            <div class="jrn-level-detail-row">
              <span>Referrals</span>
              <span><?php echo $row; ?>/<?php echo $value->ordersGrabbed; ?></span>
            </div>
            <div class="jrn-level-detail-row">
              <span>Daily Journey</span>
              <span><?php echo $value->orderReciveLimit; ?></span>
            </div>
            <div class="jrn-level-detail-row">
              <span>Commission</span>
              <span><?php echo $value->commissionRate; ?> PKR</span>
            </div>
          </div>
          <?php if ($alreadyClaimed) { ?>
            <button class="jrn-level-btn jrn-level-btn-claimed" disabled>Already Claimed</button>
          <?php } elseif ($canClaim) { ?>
            <button class="jrn-level-btn jrn-level-btn-claim claim" id="<?php echo $value->level; ?>">Claim Now</button>
          <?php } else { ?>
            <button class="jrn-level-btn jrn-level-btn-locked" disabled>
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
              Locked
            </button>
          <?php } ?>
        </div>
        <?php } ?>
      </div>

      <?php if ($trial_user->count() > 0) { ?>
      <div class="jrn-notice" style="margin-top: 16px;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ffc107" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
        You are currently on a trial period. Complete levels to unlock full access.
      </div>
      <?php } ?>
    </div>

    </div>
  </div>
</div>
</div>

<!-- Guide Overlay -->
<div id="guide-overlay">
  <button id="skip-btn" onclick="hideGuide()">Skip Guide</button>
</div>

<style>
  /* Announcement */
  .jrn-announcement {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 16px;
    background: linear-gradient(135deg, #0d1a2e, #162040);
    border-bottom: 1px solid rgba(0,242,254,0.1);
    gap: 10px;
  }
  .jrn-announcement-content {
    display: flex;
    align-items: center;
    gap: 10px;
    flex: 1;
    min-width: 0;
  }
  .jrn-announcement-icon { font-size: 18px; flex-shrink: 0; }
  .jrn-announcement-text {
    font-size: 13px;
    color: rgba(255,255,255,0.85);
    line-height: 1.4;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  .jrn-announcement-close {
    background: none;
    border: none;
    padding: 4px;
    cursor: pointer;
    flex-shrink: 0;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  /* Hero Banner */
  .jrn-hero {
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    height: 140px;
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .jrn-hero-bg {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, #0a2a4a, #0d3a5c, #0a2030);
    z-index: 0;
  }
  .jrn-hero-bg::after {
    content: '';
    position: absolute;
    inset: 0;
    background: url('assets/hotel-6.813ec2bf.png') center/cover no-repeat;
    opacity: 0.2;
  }
  .jrn-hero-content {
    position: relative;
    z-index: 1;
    text-align: center;
    color: #fff;
  }
  .jrn-hero-content h2 {
    font-size: 20px;
    font-weight: 800;
    margin: 0 0 6px;
    text-shadow: 0 2px 8px rgba(0,0,0,0.5);
  }
  .jrn-hero-content p {
    font-size: 13px;
    margin: 0;
    opacity: 0.8;
  }

  /* Balance Card */
  .jrn-balance-card {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 18px;
    background: linear-gradient(135deg, #0e1a2e 0%, #0a1628 50%, #0d1f35 100%);
    border: 1px solid rgba(0,242,254,0.15);
    border-radius: 14px;
    margin-bottom: 14px;
  }
  .jrn-balance-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    background: rgba(0,242,254,0.08);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }
  .jrn-balance-label {
    font-size: 11px;
    color: rgba(255,255,255,0.45);
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 600;
    margin-bottom: 4px;
  }
  .jrn-balance-amount {
    font-size: 22px;
    font-weight: 800;
    background: linear-gradient(135deg, #00f2fe, #4facfe);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  /* Stats Grid */
  .jrn-stats-grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 10px;
    margin-bottom: 16px;
  }
  .jrn-stat-card {
    background: linear-gradient(135deg, #0f1320, #0d1018);
    border: 1px solid rgba(255,255,255,0.06);
    border-radius: 12px;
    padding: 14px 10px;
    text-align: center;
  }
  .jrn-stat-icon {
    margin-bottom: 8px;
    display: flex;
    justify-content: center;
  }
  .jrn-stat-value {
    font-size: 18px;
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 4px;
  }
  .jrn-stat-label {
    font-size: 10px;
    color: rgba(255,255,255,0.4);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
  }
  .jrn-stat-blocked {
    border-color: rgba(255,77,79,0.2);
    background: linear-gradient(135deg, #1a0a0a, #140808);
  }

  /* Start Journey Button */
  .jrn-start-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    padding: 16px;
    border: none;
    border-radius: 14px;
    background: linear-gradient(135deg, #00f2fe 0%, #4facfe 100%);
    color: #07090e;
    font-size: 16px;
    font-weight: 800;
    cursor: pointer;
    box-shadow: 0 4px 25px rgba(0,242,254,0.3);
    transition: all 0.2s;
    letter-spacing: 0.5px;
  }
  .jrn-start-btn:active { transform: scale(0.98); }
  .jrn-start-btn-disabled {
    background: linear-gradient(135deg, #333, #444) !important;
    color: rgba(255,255,255,0.4) !important;
    box-shadow: none !important;
    cursor: not-allowed;
  }

  /* Level Cards */
  .jrn-level-card {
    background: rgba(255,255,255,0.02);
    border: 1px solid rgba(255,255,255,0.06);
    border-radius: 14px;
    padding: 16px;
    margin-bottom: 12px;
    transition: all 0.2s;
  }
  .jrn-level-available {
    border-color: rgba(0,242,254,0.2);
    background: rgba(0,242,254,0.03);
  }
  .jrn-level-claimed {
    border-color: rgba(76,219,143,0.2);
    background: rgba(76,219,143,0.03);
  }
  .jrn-level-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 14px;
  }
  .jrn-level-img {
    width: 52px;
    height: 52px;
    border-radius: 12px;
    overflow: hidden;
    flex-shrink: 0;
    background: rgba(255,255,255,0.04);
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .jrn-level-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .jrn-level-info {
    display: flex;
    flex-direction: column;
    gap: 4px;
  }
  .jrn-level-name {
    font-size: 15px;
    font-weight: 700;
    color: #ffffff;
  }
  .jrn-level-details {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 8px;
    margin-bottom: 14px;
  }
  .jrn-level-detail-row {
    display: flex;
    justify-content: space-between;
    padding: 8px 10px;
    background: rgba(255,255,255,0.03);
    border-radius: 8px;
    font-size: 12px;
  }
  .jrn-level-detail-row span:first-child {
    color: rgba(255,255,255,0.4);
  }
  .jrn-level-detail-row span:last-child {
    color: #ffffff;
    font-weight: 600;
  }
  .jrn-level-btn {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    transition: all 0.2s;
  }
  .jrn-level-btn-claim {
    background: linear-gradient(135deg, #00f2fe 0%, #4facfe 100%);
    color: #07090e;
    box-shadow: 0 4px 15px rgba(0,242,254,0.25);
  }
  .jrn-level-btn-claim:active { transform: scale(0.98); }
  .jrn-level-btn-claimed {
    background: rgba(76,219,143,0.1);
    color: #4cdb8f;
    cursor: default;
  }
  .jrn-level-btn-locked {
    background: rgba(255,255,255,0.04);
    color: rgba(255,255,255,0.3);
    cursor: default;
  }

  /* Notice */
  .jrn-notice {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 14px 16px;
    background: rgba(255,193,7,0.06);
    border: 1px solid rgba(255,193,7,0.15);
    border-radius: 12px;
    font-size: 12px;
    color: rgba(255,255,255,0.6);
    line-height: 1.5;
  }
  .jrn-notice svg { flex-shrink: 0; }

  /* Guide Overlay */
  #guide-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.85);
    z-index: 1000;
    display: none;
  }
  .highlight {
    position: absolute;
    border: 2px solid #00f2fe;
    background-color: rgba(0, 242, 254, 0.1);
    border-radius: 10px;
    z-index: 1001;
    box-shadow: 0 0 15px rgba(0, 242, 254, 0.3);
    animation: guideGlow 1.5s infinite;
  }
  @keyframes guideGlow {
    0% { box-shadow: 0 0 0 0 rgba(0, 242, 254, 0.3); }
    70% { box-shadow: 0 0 0 10px rgba(0, 242, 254, 0); }
    100% { box-shadow: 0 0 0 0 rgba(0, 242, 254, 0); }
  }
  .guide-tooltip {
    position: absolute;
    background-color: #0f1320;
    border: 1px solid rgba(0, 242, 254, 0.2);
    padding: 16px 20px;
    border-radius: 12px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.5);
    z-index: 1002;
    max-width: 280px;
    text-align: center;
  }
  .guide-tooltip p {
    margin: 0 0 12px 0;
    font-size: 14px;
    color: rgba(255,255,255,0.8);
    line-height: 1.5;
  }
  .guide-tooltip button {
    padding: 10px 20px;
    background: linear-gradient(135deg, #00f2fe, #4facfe);
    color: #07090e;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 13px;
    font-weight: 700;
  }
  #skip-btn {
    position: absolute;
    top: 16px;
    right: 16px;
    padding: 8px 16px;
    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(255,255,255,0.15);
    color: rgba(255,255,255,0.6);
    border-radius: 8px;
    cursor: pointer;
    z-index: 1003;
    font-size: 13px;
    font-weight: 600;
  }

  /* SweetAlert dark theme */
  .swal2-popup {
    background: #0f1320 !important;
    color: #ffffff !important;
    border: 1px solid rgba(255,255,255,0.1) !important;
    border-radius: 16px !important;
  }
  .swal2-title { color: #ffffff !important; }
  .swal2-html-container { color: rgba(255,255,255,0.7) !important; }

  @media (max-width: 500px) {
    .swal2-popup { width: 90% !important; font-size: 13px; }
  }
  @media (min-width: 501px) {
    .swal2-popup { width: 400px !important; }
  }

  /* Responsive */
  @media (max-width: 400px) {
    .jrn-stats-grid { grid-template-columns: 1fr 1fr; gap: 8px; }
    .jrn-stat-value { font-size: 15px; }
    .jrn-balance-amount { font-size: 18px; }
    .jrn-hero { height: 110px; }
    .jrn-hero-content h2 { font-size: 16px; }
    .jrn-level-details { grid-template-columns: 1fr; }
    .jrn-level-img { width: 42px; height: 42px; }
  }
</style>

</van-number-keyboard></van-nav-bar><!----><!---->
<div data-v-app=""></div><!---->
<div class="van-popup van-popup--center van-toast van-toast--middle van-toast--loading custom-toast" style="z-index: 2001; display: none;">
  <div class="van-loading van-loading--circular van-toast__loading"><span class="van-loading__spinner van-loading__spinner--circular" style="width: 20px; height: 20px;"><svg class="van-loading__circular" viewBox="25 25 50 50"><circle cx="50" cy="50" r="20" fill="none"></circle></svg></span><!----></div><!----><!---->
</div>
@include('front.sidebar')
</body></html>

@include('front.partials.dark-theme-styles')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  <?php
  if (isset($error)) {
    echo "Swal.fire({
      icon: 'error',
      title: 'Error',
      text: '" . $error . "',
      showConfirmButton: false,
      timer: 5000
    });";
  }
  if (isset($errortoday)) {
    echo 'Swal.fire({
      icon: "error",
      title: "Hands up!",
      text: "' . $errortoday . '",
      showConfirmButton: false,
      timer: 5000
    });';
  }
  ?>

  $('.claim').click(function() {
    var level = $(this).attr('id');
    $.ajax({
      url: '{{ url("proxy/level_claim") }}',
      type: 'POST',
      data: {
        _token: '{{ csrf_token() }}',
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
            timer: 5000
          });
          setTimeout(function() { window.location.reload(); }, 5000);
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: data.message,
            showConfirmButton: false,
            timer: 5000
          });
        }
      },
      error: function(xhr, status, error) {
        console.log(error);
      }
    });
  });
</script>

<script>
  const guideSteps = [
    { target: "#menu", message: "Step 1: This is the navigation bar. Use it to explore the website." },
    { target: "#journey", message: "Step 2: Click this button to start your journey." },
    { target: ".jrn-level-btn", message: "Step 3: Check out available levels and claim the ones you qualify for." }
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
    if (currentStep >= guideSteps.length) { hideGuide(); return; }
    guideOverlay.innerHTML = "";
    const skipButton = document.createElement("button");
    skipButton.id = "skip-btn";
    skipButton.textContent = "Skip Guide";
    skipButton.onclick = hideGuide;
    guideOverlay.appendChild(skipButton);

    const step = guideSteps[currentStep];
    const targetElement = document.querySelector(step.target);

    if (targetElement) {
      targetElement.scrollIntoView({ behavior: "smooth", block: "center", inline: "center" });
      setTimeout(() => {
        const targetRect = targetElement.getBoundingClientRect();
        const highlight = document.createElement("div");
        highlight.className = "highlight";
        highlight.style.top = `${targetRect.top + window.scrollY}px`;
        highlight.style.left = `${targetRect.left + window.scrollX}px`;
        highlight.style.width = `${targetRect.width}px`;
        highlight.style.height = `${targetRect.height}px`;
        guideOverlay.appendChild(highlight);

        const tooltip = document.createElement("div");
        tooltip.className = "guide-tooltip";
        tooltip.innerHTML = `<p>${step.message}</p><button onclick="nextStep()">${currentStep === guideSteps.length - 1 ? "Finish" : "Next"}</button>`;
        guideOverlay.appendChild(tooltip);

        const tooltipWidth = tooltip.offsetWidth;
        const tooltipHeight = tooltip.offsetHeight;
        let tooltipTop = targetRect.bottom + 10;
        let tooltipLeft = targetRect.left + targetRect.width / 2 - tooltipWidth / 2;
        if (tooltipLeft + tooltipWidth > window.innerWidth) tooltipLeft = window.innerWidth - tooltipWidth - 10;
        if (tooltipLeft < 0) tooltipLeft = 10;
        if (tooltipTop + tooltipHeight > window.innerHeight) tooltipTop = targetRect.top - tooltipHeight - 10;
        tooltip.style.top = `${tooltipTop + window.scrollY}px`;
        tooltip.style.left = `${tooltipLeft + window.scrollX}px`;
      }, 500);
    }
    currentStep++;
  }

  function hideGuide() {
    guideOverlay.style.display = "none";
    currentStep = 0;
    localStorage.setItem("guideSkipped", "true");
  }

  window.onload = showGuide;

  // Announcement bar
  const announcementBar = document.getElementById('announcementBar');
  if (announcementBar) {
    const closeButton = document.getElementById('closeButton');
    const announcementId = announcementBar.getAttribute('data-announcement-id');
    const closedAnnouncementId = localStorage.getItem('closedAnnouncementId');
    if (closedAnnouncementId !== announcementId) {
      announcementBar.style.display = 'flex';
    } else {
      announcementBar.style.display = 'none';
    }
    closeButton.addEventListener('click', () => {
      announcementBar.style.transform = 'translateY(-100%)';
      announcementBar.style.opacity = '0';
      setTimeout(() => { announcementBar.style.display = 'none'; }, 300);
      localStorage.setItem('closedAnnouncementId', announcementId);
    });
  }
</script>
