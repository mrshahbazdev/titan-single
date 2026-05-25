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
          <span class="dark-nav-title">Referral Chain</span>
          <span style="width: 36px;"></span>
        </div>

        <!-- Stats Summary -->
        <?php
          $totalReferrals = isset($referralChain) ? count($referralChain) : 0;
        ?>
        <div class="ref-stats-row">
          <div class="ref-stat-card">
            <div class="ref-stat-value"><?php echo $totalReferrals; ?></div>
            <div class="ref-stat-label">Total Referrals</div>
          </div>
          <div class="ref-stat-card">
            <div class="ref-stat-value"><?php echo $user->myCode ?? '—'; ?></div>
            <div class="ref-stat-label">Your Code</div>
          </div>
        </div>

        <!-- Referral Tree -->
        <div class="dark-section">
          <div class="dark-section-title">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#00f2fe" stroke-width="2" style="margin-right: 4px;"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
            Referral Tree
          </div>

          <div class="ref-tree-notice">
            Tap on a member to expand their referrals
          </div>

          <?php if (!empty($referralTree)) { ?>
          <div class="ref-tree-wrap">
            <ul class="ref-tree">
              <?php function renderTree($tree) { ?>
                <?php foreach ($tree as $node) { ?>
                  <li>
                    <div class="ref-node" onclick="toggleTree(this)">
                      <div class="ref-node-avatar">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#00f2fe" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                      </div>
                      <div class="ref-node-info">
                        <div class="ref-node-name"><?= $node->username ?></div>
                        <div class="ref-node-code"><?= $node->myCode ?></div>
                      </div>
                      <div class="ref-node-meta">
                        <span class="ref-node-level">Lv <?= $node->memberLevel ?></span>
                        <span class="ref-node-balance">Rs <?= number_format($node->balance, 2) ?></span>
                      </div>
                      <?php if (!empty($node->children)) { ?>
                        <div class="ref-node-arrow">
                          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.4)" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </div>
                      <?php } ?>
                    </div>
                    <?php if (!empty($node->children)) { ?>
                      <ul>
                        <?php renderTree($node->children); ?>
                      </ul>
                    <?php } ?>
                  </li>
                <?php } ?>
              <?php } ?>
              <?php renderTree($referralTree); ?>
            </ul>
          </div>
          <?php } else { ?>
          <div class="dark-empty">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.15)" stroke-width="1.5" style="margin-bottom: 12px;"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
            <p>No referrals found</p>
          </div>
          <?php } ?>
        </div>

        <!-- Referral List (Flat) -->
        <?php if (!empty($referralChain) && count($referralChain) > 0) { ?>
        <div class="dark-section">
          <div class="dark-section-title">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#00f2fe" stroke-width="2" style="margin-right: 4px;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
            All Members
          </div>
          <?php foreach ($referralChain as $member) { ?>
          <div class="ref-list-item">
            <div class="ref-list-left">
              <div class="ref-list-avatar">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#00f2fe" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
              </div>
              <div>
                <div class="ref-list-name"><?php echo $member->username; ?></div>
                <div class="ref-list-code">Code: <?php echo $member->myCode; ?></div>
              </div>
            </div>
            <div class="ref-list-right">
              <span class="ref-list-level">Level <?php echo $member->level; ?></span>
              <span class="ref-list-balance">Rs <?php echo number_format($member->balance, 2); ?></span>
            </div>
          </div>
          <?php } ?>
        </div>
        <?php } ?>
      </div>

      </div>
    </div>
  </div>
</div>

<style>
  /* Stats Row */
  .ref-stats-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 20px;
  }
  .ref-stat-card {
    background: linear-gradient(135deg, #0e1a2e 0%, #0a1628 50%, #0d1f35 100%);
    border: 1px solid rgba(0, 242, 254, 0.15);
    border-radius: 14px;
    padding: 20px 16px;
    text-align: center;
  }
  .ref-stat-value {
    font-size: 22px;
    font-weight: 800;
    background: linear-gradient(135deg, #00f2fe, #4facfe);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 6px;
  }
  .ref-stat-label {
    font-size: 11px;
    color: rgba(255,255,255,0.45);
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 600;
  }

  /* Tree Notice */
  .ref-tree-notice {
    font-size: 12px;
    color: rgba(255,255,255,0.35);
    text-align: center;
    margin-bottom: 16px;
    font-style: italic;
  }

  /* Tree Wrapper */
  .ref-tree-wrap {
    overflow-x: auto;
    padding-bottom: 10px;
  }

  /* Tree Reset */
  .ref-tree, .ref-tree ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  .ref-tree ul {
    display: none;
    padding-left: 20px;
    margin-top: 4px;
    border-left: 2px solid rgba(0, 242, 254, 0.1);
  }
  .ref-tree li {
    margin-bottom: 6px;
  }

  /* Node */
  .ref-node {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 14px;
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.06);
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.2s;
  }
  .ref-node:hover {
    border-color: rgba(0, 242, 254, 0.2);
    background: rgba(0, 242, 254, 0.04);
  }
  .ref-node-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: rgba(0, 242, 254, 0.08);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }
  .ref-node-info {
    flex: 1;
    min-width: 0;
  }
  .ref-node-name {
    font-size: 14px;
    font-weight: 700;
    color: #ffffff;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  .ref-node-code {
    font-size: 11px;
    color: rgba(255,255,255,0.4);
    margin-top: 2px;
  }
  .ref-node-meta {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 3px;
    flex-shrink: 0;
  }
  .ref-node-level {
    font-size: 10px;
    font-weight: 700;
    color: #00f2fe;
    background: rgba(0, 242, 254, 0.1);
    padding: 2px 8px;
    border-radius: 10px;
    letter-spacing: 0.5px;
  }
  .ref-node-balance {
    font-size: 12px;
    font-weight: 600;
    color: rgba(255,255,255,0.6);
  }
  .ref-node-arrow {
    flex-shrink: 0;
    transition: transform 0.2s;
  }
  .ref-node.expanded .ref-node-arrow {
    transform: rotate(180deg);
  }
  .ref-node.expanded + ul {
    display: block;
  }
  .ref-node.expanded {
    border-color: rgba(0, 242, 254, 0.25);
    background: rgba(0, 242, 254, 0.06);
  }

  /* Flat List */
  .ref-list-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 0;
    border-bottom: 1px solid rgba(255,255,255,0.04);
  }
  .ref-list-item:last-child {
    border-bottom: none;
  }
  .ref-list-left {
    display: flex;
    align-items: center;
    gap: 10px;
    min-width: 0;
  }
  .ref-list-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: rgba(0, 242, 254, 0.08);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }
  .ref-list-name {
    font-size: 13px;
    font-weight: 600;
    color: #ffffff;
  }
  .ref-list-code {
    font-size: 11px;
    color: rgba(255,255,255,0.35);
    margin-top: 2px;
  }
  .ref-list-right {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 3px;
    flex-shrink: 0;
  }
  .ref-list-level {
    font-size: 10px;
    font-weight: 700;
    color: #4facfe;
    background: rgba(79, 172, 254, 0.1);
    padding: 2px 8px;
    border-radius: 10px;
  }
  .ref-list-balance {
    font-size: 12px;
    color: rgba(255,255,255,0.5);
    font-weight: 500;
  }

  @media (max-width: 400px) {
    .ref-stats-row { gap: 8px; }
    .ref-stat-card { padding: 14px 10px; }
    .ref-stat-value { font-size: 18px; }
    .ref-node { padding: 10px 10px; gap: 8px; }
    .ref-node-avatar { width: 30px; height: 30px; }
    .ref-node-name { font-size: 13px; }
    .ref-tree ul { padding-left: 14px; }
  }
</style>

<script>
  function toggleTree(element) {
    element.classList.toggle('expanded');
  }
</script>

</van-number-keyboard></van-nav-bar><!----><!----><div data-v-app=""></div><!----><div class="van-popup van-popup--center van-toast van-toast--middle van-toast--loading custom-toast" style="z-index: 2001; display: none;"><div class="van-loading van-loading--circular van-toast__loading"><span class="van-loading__spinner van-loading__spinner--circular" style="width: 20px; height: 20px;"><svg class="van-loading__circular" viewBox="25 25 50 50"><circle cx="50" cy="50" r="20" fill="none"></circle></svg></span><!----></div><!----><!----></div>@include('front.sidebar')
</body></html>

@include('front.partials.dark-theme-styles')
