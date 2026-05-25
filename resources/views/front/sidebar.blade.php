<?php
if (!isset($user) || !$user) return;
$levelImg = '';
$memberLevelRecord = \DB::table('memberlevels')->where('level', $user->memberLevel)->first();
if ($memberLevelRecord && $memberLevelRecord->levelImage) {
    $levelImg = '/backend/level/' . $memberLevelRecord->levelImage;
} elseif ($user->memberLevel == 1) {
    $levelImg = 'assets/VIP1.e7fec648.png';
} elseif ($user->memberLevel == 2) {
    $levelImg = 'assets/VIP2.0540cb70.png';
} elseif ($user->memberLevel == 3) {
    $levelImg = 'assets/VIP3.3f2d6228.png';
} elseif ($user->memberLevel == 4) {
    $levelImg = 'assets/VIP4.5e9c4b1b.png';
}

$vales = 0;
if (is_array($rewards)) {
    if (isset($rewards)) {
        $vales = 0;
        foreach ($rewards as $key => $value) {
            $vales += (float) $value['reward'];
        }
    }
} else {
    if (isset($rewardd)) {
        $vales = 0;
        foreach ($rewardd as $key => $value) {
            $vales += (float) $value['reward'];
        }
    }
}

$querys = \DB::table('user_trials')->where('user_id', $user->id)->where('payment_status','paid')->get();
?>

<div class="van-popup van-popup--left sb-overlay" style="display:none; z-index: 2002; width: 85%; max-width: 340px; overflow: initial;">
  <div class="sb-container">
    <!-- Header / Profile -->
    <div class="sb-header">
      <div class="sb-close-btn" id="sbCloseBtn">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.5)" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
      </div>
      <div class="sb-profile">
        <div class="sb-avatar">
          <img src="assets/avatar.ca9e4964.png" alt="Avatar">
        </div>
        <div class="sb-user-info">
          <div class="sb-username">
            <span><?php echo $user->username; ?></span>
            <?php if($querys->count() > 0){ ?>
              <img width="24" src="<?php echo $levelImg; ?>" alt="Level">
            <?php }else{ ?>
              <img width="24" src="assets/trial.png" alt="Trial">
            <?php } ?>
          </div>
          <div class="sb-referral" onclick="copyReferralCode()">
            <span class="sb-referral-label">Referral:</span>
            <span id="textToCopy" class="sb-referral-code"><?php echo $user->myCode; ?></span>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#00f2fe" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
          </div>
        </div>
      </div>

      <!-- Balance Row -->
      <div class="sb-balance-row">
        <div class="sb-balance-item">
          <div class="sb-balance-value">Rs <?php echo number_format($user->balance, 2); ?></div>
          <div class="sb-balance-label">Balance</div>
        </div>
        <div class="sb-balance-divider"></div>
        <div class="sb-balance-item">
          <div class="sb-balance-value">Rs <?php echo $vales; ?></div>
          <div class="sb-balance-label">Commission</div>
        </div>
      </div>
    </div>

    <!-- Menu Items -->
    <div class="sb-menu">
      <a href="journey" class="sb-menu-item">
        <div class="sb-menu-icon sb-icon-journey">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#00f2fe" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
        </div>
        <span>Start Journey</span>
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.2)" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
      </a>
      <a href="jhistory" class="sb-menu-item">
        <div class="sb-menu-icon sb-icon-history">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#4facfe" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
        </div>
        <span>History</span>
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.2)" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
      </a>
      <a href="security" class="sb-menu-item">
        <div class="sb-menu-icon sb-icon-security">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ffc107" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
        </div>
        <span>Change Password</span>
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.2)" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
      </a>

      <div class="sb-menu-divider"></div>

      <a href="deposit" class="sb-menu-item">
        <div class="sb-menu-icon sb-icon-recharge">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#4cdb8f" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
        </div>
        <span>Recharge</span>
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.2)" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
      </a>
      <a href="withdrawal" class="sb-menu-item">
        <div class="sb-menu-icon sb-icon-withdrawal">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ff6b6b" stroke-width="2"><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line><path d="M20 21H4"></path></svg>
        </div>
        <span>Withdrawal</span>
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.2)" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
      </a>
      <a href="referral" class="sb-menu-item">
        <div class="sb-menu-icon sb-icon-referral">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#a78bfa" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
        </div>
        <span>Referral Chain</span>
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.2)" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
      </a>

      <div class="sb-menu-divider"></div>

      <a href="bank" class="sb-menu-item">
        <div class="sb-menu-icon sb-icon-bank">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#00f2fe" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
        </div>
        <span>Payment Method</span>
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.2)" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
      </a>
      <a href="wallet" class="sb-menu-item">
        <div class="sb-menu-icon sb-icon-wallet">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#4facfe" stroke-width="2"><path d="M21 12V7H5a2 2 0 0 1 0-4h14v4"></path><path d="M3 5v14a2 2 0 0 0 2 2h16v-5"></path><path d="M18 12a2 2 0 0 0 0 4h4v-4z"></path></svg>
        </div>
        <span>Withdrawal Info</span>
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.2)" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
      </a>

      <div class="sb-menu-divider"></div>

      <a href="auth/signoff" class="sb-menu-item sb-menu-logout">
        <div class="sb-menu-icon sb-icon-logout">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ff4d4f" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
        </div>
        <span>Log out</span>
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.2)" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
      </a>
    </div>

    <!-- Footer -->
    <div class="sb-footer">
      Copyright © <?php echo date('Y'); ?> <?php
        $query = \DB::table('systemsettings')->first();
        echo $query->siteTitle;
      ?>.<br>All Rights Reserved.
    </div>
  </div>
</div>

<style>
  .sb-overlay {
    background: #07090e !important;
    border-right: 1px solid rgba(0,242,254,0.08) !important;
  }
  .sb-container {
    display: flex;
    flex-direction: column;
    height: 100vh;
    overflow-y: auto;
    background: #07090e;
  }

  /* Header */
  .sb-header {
    padding: 20px 18px 16px;
    background: linear-gradient(180deg, #0d1a2e 0%, #07090e 100%);
    border-bottom: 1px solid rgba(255,255,255,0.04);
  }
  .sb-close-btn {
    position: absolute;
    top: 14px;
    right: 14px;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: rgba(255,255,255,0.05);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
  }
  .sb-profile {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-bottom: 18px;
  }
  .sb-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
    border: 2px solid rgba(0,242,254,0.25);
    flex-shrink: 0;
  }
  .sb-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .sb-user-info { flex: 1; min-width: 0; }
  .sb-username {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 16px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 6px;
  }
  .sb-referral {
    display: flex;
    align-items: center;
    gap: 6px;
    cursor: pointer;
    padding: 4px 10px;
    background: rgba(0,242,254,0.06);
    border-radius: 6px;
    width: fit-content;
  }
  .sb-referral-label {
    font-size: 11px;
    color: rgba(255,255,255,0.4);
  }
  .sb-referral-code {
    font-size: 12px;
    color: #00f2fe;
    font-weight: 600;
  }

  /* Balance */
  .sb-balance-row {
    display: flex;
    align-items: center;
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.06);
    border-radius: 12px;
    padding: 14px;
  }
  .sb-balance-item {
    flex: 1;
    text-align: center;
  }
  .sb-balance-divider {
    width: 1px;
    height: 32px;
    background: rgba(255,255,255,0.08);
  }
  .sb-balance-value {
    font-size: 16px;
    font-weight: 800;
    color: #00f2fe;
    margin-bottom: 4px;
  }
  .sb-balance-label {
    font-size: 10px;
    color: rgba(255,255,255,0.35);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
  }

  /* Menu */
  .sb-menu {
    flex: 1;
    padding: 10px 12px;
  }
  .sb-menu-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 13px 12px;
    border-radius: 10px;
    text-decoration: none;
    color: rgba(255,255,255,0.85);
    font-size: 14px;
    font-weight: 500;
    transition: all 0.15s;
  }
  .sb-menu-item:hover, .sb-menu-item:active {
    background: rgba(0,242,254,0.05);
  }
  .sb-menu-item span {
    flex: 1;
  }
  .sb-menu-icon {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }
  .sb-icon-journey { background: rgba(0,242,254,0.08); }
  .sb-icon-history { background: rgba(79,172,254,0.08); }
  .sb-icon-security { background: rgba(255,193,7,0.08); }
  .sb-icon-recharge { background: rgba(76,219,143,0.08); }
  .sb-icon-withdrawal { background: rgba(255,107,107,0.08); }
  .sb-icon-referral { background: rgba(167,139,250,0.08); }
  .sb-icon-bank { background: rgba(0,242,254,0.08); }
  .sb-icon-wallet { background: rgba(79,172,254,0.08); }
  .sb-icon-logout { background: rgba(255,77,79,0.08); }

  .sb-menu-logout span { color: #ff4d4f; }

  .sb-menu-divider {
    height: 1px;
    background: rgba(255,255,255,0.04);
    margin: 4px 12px;
  }

  /* Footer */
  .sb-footer {
    padding: 16px;
    text-align: center;
    font-size: 11px;
    color: rgba(255,255,255,0.2);
    line-height: 1.5;
    border-top: 1px solid rgba(255,255,255,0.04);
  }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.menu').click(function () {
      $('.van-popup--left').show();
    });
    $(document).click(function(event) {
      if (!$(event.target).closest('.van-popup--left').length && !$(event.target).hasClass('menu')) {
        $('.van-popup--left').hide();
      }
    });
    $('.van-popup--left').click(function(event){
      event.stopPropagation();
    });
    $('#sbCloseBtn').click(function() {
      $('.van-popup--left').hide();
    });
  });

  function copyReferralCode() {
    const textToCopy = document.getElementById('textToCopy').innerText;
    navigator.clipboard.writeText(textToCopy).then(function() {
      var el = document.querySelector('.sb-referral-code');
      el.textContent = 'Copied!';
      setTimeout(function() { el.textContent = textToCopy; }, 1500);
    }).catch(function(error) {
      console.error('Failed to copy text: ', error);
    });
  }
</script>

<?php
$chatbotSettings = \App\Models\SystemSetting::first();
if ($chatbotSettings && $chatbotSettings->chatbot_code) {
    echo $chatbotSettings->chatbot_code;
}
?>
