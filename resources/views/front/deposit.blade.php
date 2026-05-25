<html lang="en" style="margin: 0px auto; font-size: 107.1px;"><head>
  <meta charset="UTF-8">
  <link rel="icon" href="/favicon.ico">
	<link rel="stylesheet" href="at.alicdn.com/t/font_3353145_az0dbuzh42s.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
	<base href="{{ asset('') }}">
	<link rel="modulepreload" as="script" crossorigin="" href="assets/layout.b5f6c65d.js">
  <link rel="stylesheet" href="assets/layout.323f08e7.css">
  <link rel="stylesheet" href="assets/Recharge.ad970ee6.css">
  <link rel="modulepreload" as="script" crossorigin="" href="assets/notice-icon.d521a667.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/logo.5f4029de.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/My.24dd7f65.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/date-icon.ca17ac52.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/My.vue_vue_type_style_index_0_scoped_true_lang.4ef297a9.js"><link rel="stylesheet" href="assets/My.vue_vue_type_style_index_0_scoped_true_lang.b055621c.css"><link rel="modulepreload" as="script" crossorigin="" href="assets/cell-icon-6.487544f7.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/index.df31b0f6.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/clipboard.40f7df85.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/auth.4a81d264.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/Login.3610fde4.js"><link rel="stylesheet" href="assets/Login.6c7bf6ec.css"><link rel="modulepreload" as="script" crossorigin="" href="assets/Index.8594bc53.js"><link rel="stylesheet" href="assets/Index.d3868fad.css"><link rel="modulepreload" as="script" crossorigin="" href="assets/user.d0d43c87.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/hotel-6.813ec2bf.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/booking.2149056b.js"><link rel="modulepreload" as="script" crossorigin="" href="assets/pagination.min.917afa28.js"><link rel="stylesheet" href="assets/pagination.min.eb72427d.css"></head><body style="font-size: 12px; background: #07090e !important; min-height: 100vh;"><svg id="__svg__icons__dom__1705120061777__" style="position: absolute; width: 0px; height: 0px;"><symbol xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20" id="icon-common-delete"><defs><path id="icon-common-delete_b" d="M0 0h375v50H0z"></path><path id="icon-common-delete_c" d="M0 0h19v20H0z"></path></defs><g fill="none" fill-rule="evenodd"><mask id="icon-common-delete_a" fill="#fff"><use xlink:href="#icon-common-delete_b"></use></mask><g mask="url(#icon-common-delete_a)"><mask id="icon-common-delete_d" fill="#fff"><use xlink:href="#icon-common-delete_c"></use></mask><g mask="url(#icon-common-delete_d)" stroke="#999" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"><path d="M14.25 7.25v8.5a1 1 0 0 1-1 1h-7.5a1 1 0 0 1-1-1v-8.5M3.75 4.75h11.5M7.75 4.75v-1.5a1 1 0 0 1 1-1h1.5a1 1 0 0 1 1 1v1.5M7.75 9v4.5M11.25 9v4.5"></path></g></g></g></symbol></svg>
	<van-number-keyboard safe-area-inset-bottom="">
  <title>Recharge</title>
	<style>
      @media screen and (min-width: 750px){
		html {
			font-size: 60px !important;
		}
      }
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
        <div class="van-badge__wrapper" data-v-b585d98c="">
          
        </div>
      </a>
    </div>
    <div class="main-container" data-v-08abc850="">
      <div class="van-config-provider" data-v-08abc850="" style="--van-primary-color: #00f2fe; --van-button-primary-background-color: #00f2fe;">
      <div class="recharge-page">

      <!-- Nav Bar -->
      <div class="recharge-nav">
        <a href="journey" class="recharge-nav-back">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#00f2fe" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
        </a>
        <span class="recharge-nav-title">Recharge</span>
        <a href="deposit/deposithistory" class="recharge-nav-history">History</a>
      </div>

      <form method="post" enctype="multipart/form-data">
      @csrf

      <!-- Balance Card -->
      <div class="balance-card">
        <div class="balance-card-label">Account Balance</div>
        <div class="balance-card-amount">Rs <?php echo number_format($user->balance, 2); ?></div>
        <div class="balance-card-glow"></div>
      </div>

      <!-- Quick Amount Section -->
      <div class="recharge-section">
        <div class="section-title">Select Amount</div>
        <div class="quick-amounts">
          <div class="quick-amount-btn" data-amount="100">Rs 100</div>
          <div class="quick-amount-btn" data-amount="200">Rs 200</div>
          <div class="quick-amount-btn" data-amount="500">Rs 500</div>
          <div class="quick-amount-btn" data-amount="1000">Rs 1,000</div>
          <div class="quick-amount-btn" data-amount="2000">Rs 2,000</div>
          <div class="quick-amount-btn" data-amount="5000">Rs 5,000</div>
        </div>
      </div>

      <!-- Form Fields -->
      <div class="recharge-section">
        <div class="section-title">Recharge Details</div>

        <div class="form-group">
          <label class="form-label">Amount</label>
          <div class="form-input-wrap">
            <span class="input-prefix">Rs</span>
            <input type="number" name="amount" placeholder="0.00" class="form-input deposit" required>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Transaction ID</label>
          <div class="form-input-wrap">
            <svg class="input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#00f2fe" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
            <input type="text" name="tid" placeholder="Enter Transaction ID" class="form-input" required>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Payment Method</label>
          <div class="form-input-wrap select-wrapper">
            <select name="paymentmethod" class="form-select" required>
              <option value="" disabled selected>Select Payment Method</option>
              <?php if(!empty($bankData)){ foreach($bankData as $bank){ ?>
              <option value="<?php echo $bank->name; ?>"><?php echo $bank->name; ?></option>
              <?php } } else { ?>
              <option value="0">No Bank Found</option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Payment Screenshot</label>
          <div class="file-upload-area" id="fileUploadArea">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#00f2fe" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
            <span class="file-upload-text">Tap to upload screenshot</span>
            <span class="file-upload-hint">JPG, PNG, GIF up to 5MB</span>
            <input type="file" name="screenshot" accept="image/*" class="file-input" id="screenshotInput">
          </div>
          <div class="file-preview" id="filePreview" style="display:none;">
            <img id="previewImg" src="" alt="Preview">
            <button type="button" class="file-remove" id="removeFile">&times;</button>
          </div>
        </div>
      </div>

      <!-- Bank Accounts Section -->
      <div class="recharge-section">
        <div class="section-title">Bank Accounts</div>
        <div class="bank-cards">
          <?php if(!empty($bankData)){ foreach($bankData as $bank){ ?>
          <div class="bank-card">
            <div class="bank-card-header">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#00f2fe" stroke-width="2"><path d="M3 21h18M3 10h18M5 6l7-3 7 3M4 10v11M20 10v11M8 14v3M12 14v3M16 14v3"></path></svg>
              <span class="bank-card-name"><?php echo $bank->name; ?></span>
            </div>
            <div class="bank-card-detail">
              <span class="bank-detail-label">Account Number</span>
              <span class="bank-detail-value"><?php echo $bank->account_number; ?></span>
            </div>
            <div class="bank-card-detail">
              <span class="bank-detail-label">Account Holder</span>
              <span class="bank-detail-value"><?php echo $bank->account_name; ?></span>
            </div>
          </div>
          <?php } } else { ?>
          <div class="bank-card empty">
            <span>No Bank Accounts Found</span>
          </div>
          <?php } ?>
        </div>
      </div>

      <!-- Submit Button -->
      <div class="recharge-submit-wrap">
        <button type="submit" class="recharge-submit-btn">
          <span>Recharge Now</span>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </button>
      </div>

      </form>
      </div>
      </div>
    </div>
  </div>
</div>

</van-number-keyboard></van-nav-bar><!----><!----><div data-v-app=""></div><!----><div class="van-popup van-popup--center van-toast van-toast--middle van-toast--loading custom-toast" style="z-index: 2001; display: none;"><div class="van-loading van-loading--circular van-toast__loading"><span class="van-loading__spinner van-loading__spinner--circular" style="width: 20px; height: 20px;"><svg class="van-loading__circular" viewBox="25 25 50 50"><circle cx="50" cy="50" r="20" fill="none"></circle></svg></span><!----></div><!----><!----></div>@include('front.sidebar')
</body></html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>

<script type="text/javascript">
  // Quick amount buttons
  $('.quick-amount-btn').click(function() {
    $('.quick-amount-btn').removeClass('active');
    $(this).addClass('active');
    var amount = $(this).data('amount');
    $('.deposit').val(amount);
  });

  // Clear active when typing custom amount
  $('.deposit').on('input', function() {
    $('.quick-amount-btn').removeClass('active');
  });

  // File upload preview
  $('#screenshotInput').on('change', function() {
    var file = this.files[0];
    if (file) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#previewImg').attr('src', e.target.result);
        $('#filePreview').show();
        $('#fileUploadArea').hide();
      };
      reader.readAsDataURL(file);
    }
  });

  // Remove file
  $('#removeFile').click(function() {
    $('#screenshotInput').val('');
    $('#filePreview').hide();
    $('#fileUploadArea').show();
  });

  // Click upload area to trigger file input
  $('#fileUploadArea').click(function() {
    $('#screenshotInput').click();
  });
</script>

<?php if(session('success')): ?>
<script>
  Swal.fire({
    icon: 'success',
    title: 'Success',
    text: '<?php echo session('success'); ?>',
    showConfirmButton: true,
    confirmButtonText: 'OK',
    customClass: { popup: 'dark-swal' }
  });
</script>
<?php endif; ?>

<style>
/* ============================================
   RECHARGE PAGE - COMPLETE STYLES
   ============================================ */

/* Reset & Base */
body {
  background: #07090e !important;
  color: #ffffff;
  font-family: 'Instrument Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
  -webkit-font-smoothing: antialiased;
}

.recharge-page {
  max-width: 600px;
  margin: 0 auto;
  padding: 0 16px 100px 16px;
  background: #07090e;
  min-height: 100vh;
}

/* Nav Bar */
.recharge-nav {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 14px 0;
  margin-bottom: 8px;
  border-bottom: 1px solid rgba(0, 242, 254, 0.08);
}

.recharge-nav-back {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 36px;
  height: 36px;
  border-radius: 10px;
  background: rgba(0, 242, 254, 0.08);
  text-decoration: none;
  transition: background 0.2s;
}

.recharge-nav-back:hover {
  background: rgba(0, 242, 254, 0.15);
}

.recharge-nav-title {
  font-size: 18px;
  font-weight: 700;
  color: #ffffff;
  letter-spacing: 0.5px;
}

.recharge-nav-history {
  font-size: 13px;
  font-weight: 600;
  color: #00f2fe;
  text-decoration: none;
  padding: 6px 14px;
  border-radius: 8px;
  background: rgba(0, 242, 254, 0.08);
  transition: background 0.2s;
}

.recharge-nav-history:hover {
  background: rgba(0, 242, 254, 0.15);
}

/* Balance Card */
.balance-card {
  position: relative;
  background: linear-gradient(135deg, #0e1a2e 0%, #0a1628 50%, #0d1f35 100%);
  border: 1px solid rgba(0, 242, 254, 0.15);
  border-radius: 16px;
  padding: 24px;
  margin-bottom: 24px;
  overflow: hidden;
}

.balance-card-glow {
  position: absolute;
  top: -30px;
  right: -30px;
  width: 100px;
  height: 100px;
  background: radial-gradient(circle, rgba(0, 242, 254, 0.12) 0%, transparent 70%);
  border-radius: 50%;
  pointer-events: none;
}

.balance-card-label {
  font-size: 13px;
  color: rgba(255, 255, 255, 0.5);
  text-transform: uppercase;
  letter-spacing: 1.5px;
  font-weight: 600;
  margin-bottom: 8px;
}

.balance-card-amount {
  font-size: 28px;
  font-weight: 800;
  background: linear-gradient(135deg, #00f2fe, #4facfe);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

/* Section */
.recharge-section {
  background: linear-gradient(135deg, #0f1320 0%, #0d1018 100%);
  border: 1px solid rgba(255, 255, 255, 0.06);
  border-radius: 16px;
  padding: 20px;
  margin-bottom: 20px;
}

.section-title {
  font-size: 15px;
  font-weight: 700;
  color: #ffffff;
  margin-bottom: 16px;
  padding-bottom: 12px;
  border-bottom: 1px solid rgba(255, 255, 255, 0.06);
  display: flex;
  align-items: center;
  gap: 8px;
}

.section-title::before {
  content: '';
  display: inline-block;
  width: 3px;
  height: 16px;
  background: linear-gradient(180deg, #00f2fe, #4facfe);
  border-radius: 2px;
}

/* Quick Amount Buttons */
.quick-amounts {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 10px;
}

.quick-amount-btn {
  background: rgba(255, 255, 255, 0.04);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 12px;
  padding: 14px 8px;
  text-align: center;
  font-size: 14px;
  font-weight: 600;
  color: #e0e0e0;
  cursor: pointer;
  transition: all 0.25s ease;
  user-select: none;
}

.quick-amount-btn:hover {
  border-color: rgba(0, 242, 254, 0.3);
  background: rgba(0, 242, 254, 0.05);
  color: #ffffff;
}

.quick-amount-btn.active {
  background: linear-gradient(135deg, rgba(0, 242, 254, 0.15), rgba(79, 172, 254, 0.15));
  border-color: #00f2fe;
  color: #00f2fe;
  box-shadow: 0 0 20px rgba(0, 242, 254, 0.1);
}

/* Form Groups */
.form-group {
  margin-bottom: 18px;
}

.form-group:last-child {
  margin-bottom: 0;
}

.form-label {
  display: block;
  font-size: 13px;
  font-weight: 600;
  color: rgba(255, 255, 255, 0.6);
  margin-bottom: 8px;
  letter-spacing: 0.3px;
}

.form-input-wrap {
  display: flex;
  align-items: center;
  background: rgba(255, 255, 255, 0.04);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 12px;
  padding: 0 14px;
  transition: all 0.2s ease;
  height: 48px;
}

.form-input-wrap:focus-within {
  border-color: #00f2fe;
  box-shadow: 0 0 0 3px rgba(0, 242, 254, 0.08);
  background: rgba(0, 242, 254, 0.03);
}

.input-prefix {
  font-size: 14px;
  font-weight: 700;
  color: #00f2fe;
  margin-right: 10px;
  flex-shrink: 0;
}

.input-icon {
  margin-right: 10px;
  flex-shrink: 0;
  opacity: 0.7;
}

.form-input {
  flex: 1;
  background: transparent;
  border: none;
  outline: none;
  color: #ffffff;
  font-size: 14px;
  font-weight: 500;
  width: 100%;
  height: 100%;
}

.form-input::placeholder {
  color: rgba(255, 255, 255, 0.25);
}

/* Select */
.select-wrapper {
  padding: 0;
  height: auto;
}

.form-select {
  width: 100%;
  padding: 14px;
  font-size: 14px;
  font-weight: 500;
  color: #ffffff;
  background: transparent;
  border: none;
  outline: none;
  cursor: pointer;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%2300f2fe' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 14px center;
  padding-right: 40px;
}

.form-select option {
  background-color: #0f1320;
  color: #ffffff;
  padding: 12px;
}

/* File Upload */
.file-upload-area {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 28px 16px;
  background: rgba(255, 255, 255, 0.02);
  border: 2px dashed rgba(0, 242, 254, 0.15);
  border-radius: 12px;
  cursor: pointer;
  transition: all 0.25s ease;
  position: relative;
  gap: 8px;
}

.file-upload-area:hover {
  border-color: rgba(0, 242, 254, 0.35);
  background: rgba(0, 242, 254, 0.03);
}

.file-upload-text {
  font-size: 14px;
  font-weight: 600;
  color: rgba(255, 255, 255, 0.7);
}

.file-upload-hint {
  font-size: 11px;
  color: rgba(255, 255, 255, 0.3);
}

.file-input {
  position: absolute;
  width: 100%;
  height: 100%;
  opacity: 0;
  cursor: pointer;
  top: 0;
  left: 0;
}

.file-preview {
  position: relative;
  display: inline-block;
  margin-top: 8px;
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid rgba(0, 242, 254, 0.15);
}

.file-preview img {
  max-width: 100%;
  max-height: 200px;
  display: block;
  border-radius: 12px;
}

.file-remove {
  position: absolute;
  top: 8px;
  right: 8px;
  width: 28px;
  height: 28px;
  border-radius: 50%;
  background: rgba(255, 59, 48, 0.85);
  color: #fff;
  border: none;
  font-size: 18px;
  line-height: 28px;
  text-align: center;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Bank Cards */
.bank-cards {
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.bank-card {
  background: rgba(255, 255, 255, 0.03);
  border: 1px solid rgba(255, 255, 255, 0.06);
  border-radius: 12px;
  padding: 16px;
  transition: border-color 0.2s;
}

.bank-card:hover {
  border-color: rgba(0, 242, 254, 0.2);
}

.bank-card.empty {
  text-align: center;
  padding: 24px;
  color: rgba(255, 255, 255, 0.3);
  font-size: 14px;
}

.bank-card-header {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 14px;
  padding-bottom: 12px;
  border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

.bank-card-name {
  font-size: 15px;
  font-weight: 700;
  color: #ffffff;
}

.bank-card-detail {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 6px 0;
}

.bank-detail-label {
  font-size: 12px;
  color: rgba(255, 255, 255, 0.4);
  font-weight: 500;
}

.bank-detail-value {
  font-size: 13px;
  color: #00f2fe;
  font-weight: 600;
  text-align: right;
  word-break: break-all;
  max-width: 60%;
}

/* Submit Button */
.recharge-submit-wrap {
  padding: 20px 0 40px;
}

.recharge-submit-btn {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  padding: 16px 24px;
  background: linear-gradient(135deg, #00f2fe 0%, #4facfe 100%);
  color: #07090e;
  border: none;
  border-radius: 14px;
  font-size: 16px;
  font-weight: 700;
  letter-spacing: 0.5px;
  cursor: pointer;
  box-shadow: 0 4px 24px rgba(0, 242, 254, 0.25);
  transition: all 0.3s ease;
}

.recharge-submit-btn:hover {
  box-shadow: 0 6px 32px rgba(0, 242, 254, 0.35);
  transform: translateY(-1px);
}

.recharge-submit-btn:active {
  transform: translateY(0);
  box-shadow: 0 2px 16px rgba(0, 242, 254, 0.2);
}

/* SweetAlert Dark */
.dark-swal {
  background: #0f1320 !important;
  border: 1px solid rgba(0, 242, 254, 0.15);
}

.dark-swal .swal2-title {
  color: #ffffff !important;
}

.dark-swal .swal2-html-container {
  color: rgba(255, 255, 255, 0.7) !important;
}

.dark-swal .swal2-confirm {
  background: linear-gradient(135deg, #00f2fe, #4facfe) !important;
  color: #07090e !important;
  font-weight: 700 !important;
}

/* ============================================
   RESPONSIVE - DESKTOP (> 768px)
   ============================================ */
@media (min-width: 769px) {
  .recharge-page {
    max-width: 560px;
    padding: 0 24px 100px 24px;
  }

  .balance-card {
    padding: 32px;
  }

  .balance-card-amount {
    font-size: 36px;
  }

  .recharge-section {
    padding: 24px;
  }

  .quick-amounts {
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
  }

  .quick-amount-btn {
    padding: 16px 12px;
    font-size: 15px;
  }

  .form-input-wrap {
    height: 52px;
  }

  .bank-cards {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 14px;
  }

  .recharge-submit-btn {
    max-width: 400px;
    margin: 0 auto;
    display: flex;
  }
}

/* ============================================
   RESPONSIVE - SMALL MOBILE (< 400px)
   ============================================ */
@media (max-width: 400px) {
  .recharge-page {
    padding: 0 12px 80px 12px;
  }

  .balance-card {
    padding: 18px;
  }

  .balance-card-amount {
    font-size: 22px;
  }

  .recharge-section {
    padding: 14px;
    border-radius: 12px;
  }

  .quick-amounts {
    grid-template-columns: repeat(2, 1fr);
    gap: 8px;
  }

  .quick-amount-btn {
    padding: 12px 6px;
    font-size: 13px;
    border-radius: 10px;
  }

  .recharge-nav-title {
    font-size: 16px;
  }

  .section-title {
    font-size: 14px;
  }

  .bank-card-detail {
    flex-direction: column;
    align-items: flex-start;
    gap: 2px;
  }

  .bank-detail-value {
    max-width: 100%;
    text-align: left;
  }
}

/* ============================================
   SweetAlert Responsive
   ============================================ */
.swal2-popup {
  width: 40% !important;
  font-size: 14px;
}

@media only screen and (max-width: 768px) {
  .swal2-popup {
    width: 85% !important;
    height: auto !important;
    font-size: 14px;
    padding: 20px 16px !important;
  }
  .swal2-title {
    font-size: 18px !important;
  }
  .swal2-html-container {
    font-size: 13px !important;
  }
}

/* Hide Vant nav bar since we have custom one */
.van-nav-bar {
  display: none !important;
}
</style>
