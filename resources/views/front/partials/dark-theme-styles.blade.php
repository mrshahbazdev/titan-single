<style>
/* ============================================
   SHARED DARK THEME STYLES
   ============================================ */
body {
  background: #07090e !important;
  color: #ffffff;
  font-family: 'Instrument Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
  -webkit-font-smoothing: antialiased;
}

/* Page Container */
.dark-page {
  max-width: 600px;
  margin: 0 auto;
  padding: 0 16px 100px 16px;
  background: #07090e;
  min-height: 100vh;
}

/* Nav Bar */
.dark-nav {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 14px 0;
  margin-bottom: 8px;
  border-bottom: 1px solid rgba(0, 242, 254, 0.08);
}

.dark-nav-back {
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

.dark-nav-back:hover {
  background: rgba(0, 242, 254, 0.15);
}

.dark-nav-title {
  font-size: 18px;
  font-weight: 700;
  color: #ffffff;
  letter-spacing: 0.5px;
}

.dark-nav-action {
  font-size: 13px;
  font-weight: 600;
  color: #00f2fe;
  text-decoration: none;
  padding: 6px 14px;
  border-radius: 8px;
  background: rgba(0, 242, 254, 0.08);
  transition: background 0.2s;
}

.dark-nav-action:hover {
  background: rgba(0, 242, 254, 0.15);
}

/* Section Card */
.dark-section {
  background: linear-gradient(135deg, #0f1320 0%, #0d1018 100%);
  border: 1px solid rgba(255, 255, 255, 0.06);
  border-radius: 16px;
  padding: 20px;
  margin-bottom: 20px;
}

.dark-section-title {
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

.dark-section-title::before {
  content: '';
  display: inline-block;
  width: 3px;
  height: 16px;
  background: linear-gradient(180deg, #00f2fe, #4facfe);
  border-radius: 2px;
}

/* Balance Card */
.dark-balance-card {
  position: relative;
  background: linear-gradient(135deg, #0e1a2e 0%, #0a1628 50%, #0d1f35 100%);
  border: 1px solid rgba(0, 242, 254, 0.15);
  border-radius: 16px;
  padding: 24px;
  margin-bottom: 24px;
  overflow: hidden;
}

.dark-balance-card .glow {
  position: absolute;
  top: -30px;
  right: -30px;
  width: 100px;
  height: 100px;
  background: radial-gradient(circle, rgba(0, 242, 254, 0.12) 0%, transparent 70%);
  border-radius: 50%;
  pointer-events: none;
}

.dark-balance-label {
  font-size: 13px;
  color: rgba(255, 255, 255, 0.5);
  text-transform: uppercase;
  letter-spacing: 1.5px;
  font-weight: 600;
  margin-bottom: 8px;
}

.dark-balance-amount {
  font-size: 28px;
  font-weight: 800;
  background: linear-gradient(135deg, #00f2fe, #4facfe);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

/* Form Groups */
.dark-form-group {
  margin-bottom: 18px;
}

.dark-form-group:last-child {
  margin-bottom: 0;
}

.dark-form-label {
  display: block;
  font-size: 13px;
  font-weight: 600;
  color: rgba(255, 255, 255, 0.6);
  margin-bottom: 8px;
  letter-spacing: 0.3px;
}

.dark-input-wrap {
  display: flex;
  align-items: center;
  background: rgba(255, 255, 255, 0.04);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 12px;
  padding: 0 14px;
  transition: all 0.2s ease;
  height: 48px;
}

.dark-input-wrap:focus-within {
  border-color: #00f2fe;
  box-shadow: 0 0 0 3px rgba(0, 242, 254, 0.08);
  background: rgba(0, 242, 254, 0.03);
}

.dark-input-prefix {
  font-size: 14px;
  font-weight: 700;
  color: #00f2fe;
  margin-right: 10px;
  flex-shrink: 0;
}

.dark-input-icon {
  margin-right: 10px;
  flex-shrink: 0;
  opacity: 0.7;
}

.dark-input {
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

.dark-input::placeholder {
  color: rgba(255, 255, 255, 0.25);
}

/* Select */
.dark-select-wrap {
  padding: 0;
  height: auto;
}

.dark-select {
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

.dark-select option {
  background-color: #0f1320;
  color: #ffffff;
  padding: 12px;
}

/* Submit Button */
.dark-submit-wrap {
  padding: 20px 0 40px;
}

.dark-submit-btn {
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

.dark-submit-btn:hover {
  box-shadow: 0 6px 32px rgba(0, 242, 254, 0.35);
  transform: translateY(-1px);
}

.dark-submit-btn:active {
  transform: translateY(0);
  box-shadow: 0 2px 16px rgba(0, 242, 254, 0.2);
}

/* Info Card */
.dark-info-card {
  background: rgba(255, 255, 255, 0.03);
  border: 1px solid rgba(255, 255, 255, 0.06);
  border-radius: 12px;
  padding: 16px;
  transition: border-color 0.2s;
}

.dark-info-card:hover {
  border-color: rgba(0, 242, 254, 0.2);
}

.dark-info-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 6px 0;
}

.dark-info-label {
  font-size: 12px;
  color: rgba(255, 255, 255, 0.4);
  font-weight: 500;
}

.dark-info-value {
  font-size: 13px;
  color: #00f2fe;
  font-weight: 600;
  text-align: right;
  word-break: break-all;
  max-width: 60%;
}

/* History Item */
.dark-history-item {
  background: rgba(255, 255, 255, 0.03);
  border: 1px solid rgba(255, 255, 255, 0.06);
  border-radius: 12px;
  padding: 16px;
  margin-bottom: 12px;
  transition: border-color 0.2s;
}

.dark-history-item:hover {
  border-color: rgba(0, 242, 254, 0.15);
}

.dark-history-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 10px;
}

.dark-history-amount {
  font-size: 18px;
  font-weight: 700;
  color: #ffffff;
}

.dark-history-detail {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 3px 0;
}

.dark-history-label {
  font-size: 12px;
  color: rgba(255, 255, 255, 0.4);
}

.dark-history-value {
  font-size: 12px;
  color: rgba(255, 255, 255, 0.7);
}

/* Status Badges */
.dark-badge {
  display: inline-block;
  padding: 4px 12px;
  border-radius: 20px;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 0.5px;
  text-transform: uppercase;
}

.dark-badge-pending {
  background: rgba(255, 193, 7, 0.12);
  color: #ffc107;
  border: 1px solid rgba(255, 193, 7, 0.2);
}

.dark-badge-approved {
  background: rgba(0, 178, 94, 0.12);
  color: #00b25e;
  border: 1px solid rgba(0, 178, 94, 0.2);
}

.dark-badge-rejected {
  background: rgba(255, 38, 50, 0.12);
  color: #ff2632;
  border: 1px solid rgba(255, 38, 50, 0.2);
}

/* Alert Messages */
.dark-alert-error {
  background: rgba(255, 38, 50, 0.08);
  border: 1px solid rgba(255, 38, 50, 0.2);
  border-radius: 10px;
  padding: 12px 16px;
  color: #ff6b6b;
  font-size: 13px;
  margin-bottom: 16px;
}

.dark-alert-success {
  background: rgba(0, 178, 94, 0.08);
  border: 1px solid rgba(0, 178, 94, 0.2);
  border-radius: 10px;
  padding: 12px 16px;
  color: #4cdb8f;
  font-size: 13px;
  margin-bottom: 16px;
}

/* Notice/Tip Text */
.dark-notice {
  background: rgba(0, 242, 254, 0.05);
  border: 1px solid rgba(0, 242, 254, 0.1);
  border-radius: 10px;
  padding: 12px 16px;
  color: rgba(255, 255, 255, 0.6);
  font-size: 13px;
  line-height: 1.5;
  margin-bottom: 20px;
}

/* Empty State */
.dark-empty {
  text-align: center;
  padding: 40px 20px;
  color: rgba(255, 255, 255, 0.3);
  font-size: 15px;
}

/* Radio Button Group */
.dark-radio-group {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
}

.dark-radio-item {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 10px 16px;
  background: rgba(255, 255, 255, 0.04);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 10px;
  cursor: pointer;
  transition: all 0.2s;
  color: rgba(255, 255, 255, 0.7);
  font-size: 13px;
  font-weight: 500;
}

.dark-radio-item:hover,
.dark-radio-item.active {
  border-color: #00f2fe;
  background: rgba(0, 242, 254, 0.08);
  color: #00f2fe;
}

.dark-radio-dot {
  width: 16px;
  height: 16px;
  border-radius: 50%;
  border: 2px solid rgba(255, 255, 255, 0.2);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  transition: all 0.2s;
}

.dark-radio-item.active .dark-radio-dot {
  border-color: #00f2fe;
}

.dark-radio-item.active .dark-radio-dot::after {
  content: '';
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: #00f2fe;
}

/* Hide Vant nav bar */
.van-nav-bar { display: none !important; }

/* ============================================
   RESPONSIVE
   ============================================ */
@media (min-width: 769px) {
  .dark-page {
    max-width: 560px;
    padding: 0 24px 100px 24px;
  }
  .dark-balance-card { padding: 32px; }
  .dark-balance-amount { font-size: 36px; }
  .dark-section { padding: 24px; }
  .dark-input-wrap { height: 52px; }
  .dark-submit-btn {
    max-width: 400px;
    margin: 0 auto;
    display: flex;
  }
}

@media (max-width: 400px) {
  .dark-page { padding: 0 12px 80px 12px; }
  .dark-balance-card { padding: 18px; }
  .dark-balance-amount { font-size: 22px; }
  .dark-section { padding: 14px; border-radius: 12px; }
  .dark-nav-title { font-size: 16px; }
  .dark-section-title { font-size: 14px; }
}

/* SweetAlert Dark Theme */
.dark-swal {
  background: #0f1320 !important;
  border: 1px solid rgba(0, 242, 254, 0.15);
}
.dark-swal .swal2-title { color: #ffffff !important; }
.dark-swal .swal2-html-container { color: rgba(255, 255, 255, 0.7) !important; }
.dark-swal .swal2-confirm {
  background: linear-gradient(135deg, #00f2fe, #4facfe) !important;
  color: #07090e !important;
  font-weight: 700 !important;
}

.swal2-popup { width: 40% !important; font-size: 14px; }
@media only screen and (max-width: 768px) {
  .swal2-popup {
    width: 85% !important;
    height: auto !important;
    font-size: 14px;
    padding: 20px 16px !important;
  }
  .swal2-title { font-size: 18px !important; }
  .swal2-html-container { font-size: 13px !important; }
}
</style>
