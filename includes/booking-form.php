
<!-- ═══════════════════════════════════════════════════════════════════════════
     ASTROLOGER RAAJEEVG – BOOKING FORM SECTION
     Paste anywhere inside your page's <body>. CSS is scoped with .rg- prefix.
     ═══════════════════════════════════════════════════════════════════════════ -->

<style>
/* ── Reset & Scope ─────────────────────────────────────────────── */
.rg-wrap *, .rg-wrap *::before, .rg-wrap *::after { box-sizing: border-box; margin: 0; padding: 0; }

/* ── Palette ───────────────────────────────────────────────────── */
:root {
  --rg-night:    #0d0b1e;
  --rg-deep:     #1a1535;
  --rg-purple:   #2d1b69;
  --rg-violet:   #4a3a7a;
  --rg-lavender: #a78bfa;
  --rg-pale:     #c4b5fd;
  --rg-white:    #f0e6ff;
  --rg-gold:     #d4af37;
  --rg-gold-lt:  #f0d060;
  --rg-error:    #f87171;
  --rg-success:  #4ade80;
  --rg-radius:   12px;
}

/* ── Wrapper ───────────────────────────────────────────────────── */
.rg-wrap {
  background: var(--rg-night);
  /*background: url('assets/images/free_expert.jpg') center center / 100% 100% no-repeat;*/
  min-height: 52vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 40px 16px;
  font-family: 'Georgia', 'Times New Roman', serif;
}

.rg-card {
  background: var(--rg-deep);
  border: 1px solid var(--rg-violet);
  border-radius: 20px;
  width: 100%;
  max-width: 680px;
  overflow: hidden;
  box-shadow: 0 24px 80px rgba(0,0,0,.6), 0 0 0 1px rgba(212,175,55,.1);
}

/* ── Header ────────────────────────────────────────────────────── */
.rg-header {
  background: linear-gradient(160deg, var(--rg-purple), var(--rg-night));
  padding: 36px 40px 28px;
  text-align: center;
  border-bottom: 1px solid var(--rg-violet);
  position: relative;
  overflow: hidden;
}
.rg-header::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 50% 0%, rgba(212,175,55,.15) 0%, transparent 70%);
  pointer-events: none;
}
.rg-header-moon { font-size: 36px; display: block; margin-bottom: 10px; animation: rg-float 4s ease-in-out infinite; }
@keyframes rg-float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-6px)} }
.rg-header h2 {
  color: var(--rg-gold);
  font-size: clamp(18px, 4vw, 24px);
  letter-spacing: 3px;
  font-weight: 400;
  text-transform: uppercase;
}
.rg-header p {
  color: var(--rg-lavender);
  font-size: 13px;
  letter-spacing: 1.5px;
  margin-top: 6px;
}

/* ── Step Progress ─────────────────────────────────────────────── */
.rg-steps {
  display: flex;
  align-items: center;
  padding: 20px 40px;
  background: rgba(0,0,0,.3);
  gap: 0;
}
.rg-step {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 4px;
  flex: 1;
  position: relative;
}
.rg-step::after {
  content: '';
  position: absolute;
  left: 50%;
  top: 14px;
  width: 100%;
  height: 2px;
  background: var(--rg-violet);
  transition: background .4s;
}
.rg-step:last-child::after { display: none; }
.rg-step.done::after { background: var(--rg-gold); }

.rg-step-dot {
  width: 28px; height: 28px;
  border-radius: 50%;
  border: 2px solid var(--rg-violet);
  background: var(--rg-deep);
  display: flex; align-items: center; justify-content: center;
  font-size: 11px;
  color: var(--rg-lavender);
  font-family: monospace;
  transition: all .3s;
  position: relative;
  z-index: 1;
}
.rg-step.active .rg-step-dot  { border-color: var(--rg-gold); background: var(--rg-gold); color: var(--rg-night); font-weight: bold; box-shadow: 0 0 12px rgba(212,175,55,.5); }
.rg-step.done .rg-step-dot    { border-color: var(--rg-gold); background: var(--rg-gold); color: var(--rg-night); }
.rg-step-label { font-size: 10px; color: var(--rg-lavender); letter-spacing: .5px; text-align: center; }
.rg-step.active .rg-step-label { color: var(--rg-gold); }

/* ── Form Body ─────────────────────────────────────────────────── */
.rg-body { padding: 32px 40px 40px; }

.rg-panel { display: none; }
.rg-panel.active { display: block; animation: rg-fadein .35s ease; }
@keyframes rg-fadein { from{opacity:0;transform:translateY(10px)} to{opacity:1;transform:translateY(0)} }

.rg-panel-title {
  color: var(--rg-gold);
  font-size: 17px;
  letter-spacing: 2px;
  text-transform: uppercase;
  margin-bottom: 22px;
  padding-bottom: 10px;
  border-bottom: 1px solid var(--rg-violet);
}

/* ── Fields ────────────────────────────────────────────────────── */
.rg-field { margin-bottom: 18px; }
.rg-field label {
  display: block;
  color: var(--rg-pale);
  font-size: 16px;
  letter-spacing: 1px;
  text-transform: uppercase;
  margin-bottom: 7px;
}
.rg-field label span { color: var(--rg-error); margin-left: 2px; }

.rg-field input,
.rg-field select {
  width: 100%;
  background: var(--rg-night);
  border: 1px solid var(--rg-violet);
  border-radius: 8px;
  color: var(--rg-white);
  padding: 12px 14px;
  font-size: 15px;
  font-family: inherit;
  outline: none;
  transition: border-color .2s, box-shadow .2s;
  appearance: none;
  -webkit-appearance: none;
}
.rg-field select {
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%23a78bfa' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 14px center;
  padding-right: 40px;
  cursor: pointer;
}
.rg-field select option { background: var(--rg-deep); }
.rg-field input:focus,
.rg-field select:focus { border-color: var(--rg-gold); box-shadow: 0 0 0 3px rgba(212,175,55,.15); }
.rg-field input::placeholder { color: var(--rg-violet); }
.rg-field input[type="date"]::-webkit-calendar-picker-indicator { filter: invert(.7) sepia(1) saturate(3) hue-rotate(5deg); cursor: pointer; }

.rg-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
@media(max-width:520px){ .rg-row { grid-template-columns: 1fr; } }

/* ── Phone Row ─────────────────────────────────────────────────── */
.rg-phone-row { display: flex; gap: 10px; }
.rg-phone-row select { width: 145px; flex-shrink: 0; }
.rg-phone-row input  { flex: 1; }

/* ── Radio Cards ───────────────────────────────────────────────── */
.rg-service-card {
  border: 1px solid var(--rg-violet);
  border-radius: var(--rg-radius);
  padding: 18px 20px;
  margin-bottom: 12px;
  cursor: pointer;
  transition: border-color .2s, background .2s;
  position: relative;
}
.rg-service-card:hover { border-color: var(--rg-lavender); background: rgba(74,58,122,.2); }
.rg-service-card input[type="radio"] { position: absolute; opacity: 0; }
.rg-service-card.selected { border-color: var(--rg-gold); background: rgba(212,175,55,.08); }
.rg-service-card.selected .rg-sc-check { opacity: 1;margin-left:10px; }

.rg-sc-top { display: flex; align-items: center; justify-content: space-between; }
.rg-sc-name { color: var(--rg-white); font-size: 15px; }
.rg-sc-check { width: 20px; height: 20px; border-radius: 50%; background: var(--rg-gold); display: flex; align-items: center; justify-content: center; opacity: 0; transition: opacity .2s; flex-shrink: 0; }
.rg-sc-check svg { width: 11px; height: 11px; }

.rg-sc-tiers { display: flex; gap: 10px; margin-top: 12px; flex-wrap: wrap; }
.rg-tier-btn {
  border: 1px solid var(--rg-violet);
  border-radius: 6px;
  padding: 7px 14px;
  background: transparent;
  color: var(--rg-pale);
  font-size: 13px;
  cursor: pointer;
  transition: all .2s;
  font-family: inherit;
}
.rg-tier-btn:hover   { border-color: var(--rg-gold); color: var(--rg-gold); }
.rg-tier-btn.active  { border-color: var(--rg-gold); background: var(--rg-gold); color: var(--rg-night); font-weight: bold; }

/* ── Horoscope Blocks ──────────────────────────────────────────── */
.rg-horo-block {
  background: rgba(0,0,0,.25);
  border: 1px solid var(--rg-violet);
  border-radius: var(--rg-radius);
  padding: 18px 20px;
  margin-bottom: 14px;
}
.rg-horo-block-title {
  color: var(--rg-lavender);
  font-size: 11px;
  letter-spacing: 2px;
  text-transform: uppercase;
  margin-bottom: 14px;
  display: flex;
  align-items: center;
  gap: 8px;
}
.rg-horo-block-title::before {
  content: '';
  display: inline-block;
  width: 6px; height: 6px;
  border-radius: 50%;
  background: var(--rg-gold);
}

/* ── Country Payment ───────────────────────────────────────────── */
.rg-country-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 20px; }
@media(max-width:420px){ .rg-country-grid { grid-template-columns: 1fr; } }
.rg-country-btn {
  border: 1px solid var(--rg-violet);
  border-radius: 10px;
  padding: 14px;
  text-align: center;
  cursor: pointer;
  transition: all .2s;
  background: transparent;
  font-family: inherit;
}
.rg-country-btn:hover  { border-color: var(--rg-lavender); }
.rg-country-btn.active { border-color: var(--rg-gold); background: rgba(212,175,55,.1); }
.rg-country-btn .rg-cb-flag { font-size: 22px; display: block; margin-bottom: 4px; }
.rg-country-btn .rg-cb-name { color: var(--rg-white); font-size: 13px; }

/* ── Amount Display ────────────────────────────────────────────── */
.rg-amount-box {
  background: linear-gradient(135deg, rgba(212,175,55,.15), rgba(45,27,105,.4));
  border: 1px solid var(--rg-gold);
  border-radius: 12px;
  padding: 20px 24px;
  text-align: center;
  margin-bottom: 24px;
}
.rg-amount-box .rg-amount-label { color: var(--rg-pale); font-size: 11px; letter-spacing: 2px; text-transform: uppercase; }
.rg-amount-box .rg-amount-value { color: var(--rg-gold); font-size: 32px; font-weight: bold; margin-top: 4px; }
.rg-amount-box .rg-amount-svc   { color: var(--rg-lavender); font-size: 12px; margin-top: 4px; }

/* ── Buttons ───────────────────────────────────────────────────── */
.rg-btn-row { display: flex; gap: 12px; margin-top: 28px; }
.rg-btn {
  flex: 1;
  padding: 14px 24px;
  border-radius: 10px;
  font-size: 14px;
  letter-spacing: 1.5px;
  font-family: inherit;
  text-transform: uppercase;
  cursor: pointer;
  transition: all .2s;
  border: none;
  font-weight: 600;
}
.rg-btn-back { background: transparent; border: 1px solid var(--rg-violet); color: var(--rg-pale); }
.rg-btn-back:hover { border-color: var(--rg-lavender); color: var(--rg-white); }
.rg-btn-next { background: linear-gradient(135deg, #b8961e, var(--rg-gold)); color: var(--rg-night); box-shadow: 0 4px 20px rgba(212,175,55,.3); }
.rg-btn-next:hover { transform: translateY(-1px); box-shadow: 0 6px 28px rgba(212,175,55,.45); }
.rg-btn-next:disabled { opacity: .5; cursor: not-allowed; transform: none; }
.rg-btn-submit { background: linear-gradient(135deg, #1a6b3c, #25a55a); color: #fff; }
.rg-btn-submit:hover { transform: translateY(-1px); box-shadow: 0 6px 24px rgba(37,165,90,.35); }

/* ── Error msg ─────────────────────────────────────────────────── */
.rg-err { color: var(--rg-error); font-size: 12px; margin-top: 5px; display: none; }
.rg-err.show { display: block; }
.rg-global-err { background: rgba(248,113,113,.1); border: 1px solid var(--rg-error); border-radius: 8px; padding: 12px 16px; color: var(--rg-error); font-size: 13px; margin-bottom: 16px; display: none; }
.rg-global-err.show { display: block; }

/* ── Success Screen ────────────────────────────────────────────── */
.rg-success { text-align: center; padding: 20px 0 10px; display: none; }
.rg-success-icon { font-size: 56px; display: block; margin-bottom: 16px; animation: rg-pop .5s cubic-bezier(.17,.67,.47,1.3); }
@keyframes rg-pop { from{transform:scale(0)} to{transform:scale(1)} }
.rg-success h3 { color: var(--rg-gold); font-size: 20px; letter-spacing: 2px; margin-bottom: 14px; }
.rg-success p  { color: var(--rg-pale); font-size: 14px; line-height: 1.7; margin-bottom: 10px; }
.rg-success .rg-booking-id { background: var(--rg-night); border: 1px solid var(--rg-gold); border-radius: 8px; padding: 10px 20px; display: inline-block; color: var(--rg-gold); font-size: 13px; letter-spacing: 2px; margin: 10px 0 18px; }
.rg-wa-btn { display: inline-flex; align-items: center; gap: 8px; background: #25d366; color: #fff; text-decoration: none; padding: 12px 28px; border-radius: 50px; font-size: 14px; font-weight: bold; transition: transform .2s; }
.rg-wa-btn:hover { transform: translateY(-2px); }

/* ── Loader ────────────────────────────────────────────────────── */
.rg-loader { display: none; flex-direction: column; align-items: center; gap: 14px; padding: 20px 0; }
.rg-loader.show { display: flex; }
.rg-spinner { width: 40px; height: 40px; border: 3px solid var(--rg-violet); border-top-color: var(--rg-gold); border-radius: 50%; animation: rg-spin .8s linear infinite; }
@keyframes rg-spin { to { transform: rotate(360deg); } }
.rg-loader p { color: var(--rg-lavender); font-size: 13px; }

/* ── Divider ───────────────────────────────────────────────────── */
.rg-divider { border: none; border-top: 1px solid var(--rg-violet); margin: 20px 0; }

/* ── Mobile Responsiveness ─────────────────────────────────────── */
@media(max-width:768px) {
  .rg-wrap {
    display: flex;
    min-height: 100vh;
    align-items: flex-start;
    padding: 40px 15px;
  }
  .rg-card {
    margin: 0 auto;
  }
  .rg-phone-row select {
    width: 120px;
  }
}
@media(max-width:480px) {
  .rg-phone-row {
    flex-direction: column;
  }
  .rg-phone-row select {
    width: 100%;
  }
  .rg-btn-row {
    flex-direction: column;
  }
}
</style>

<!-- ─── HTML ──────────────────────────────────────────────────────────────── -->
<section class="rg-wrap">
  <div class="rg-card">

    <!-- Header -->
    <div class="rg-header">
      <!--<span class="rg-header-moon">🌙</span>-->
      <span class="rg-header-moon"><div style='margin-bottom:8px;display:flex;justify-content:center;'>
            <img src='https://shop.astrologerraajeev.com/assets/images/ganesh.png' alt='Lord Ganesh' style='width:50px;height:auto;'>
        </div></span>
      
      <h2>Astrologer RaajeevG</h2>
      <p>Book Your Consultation</p>
    </div>

    <!-- Step Indicators -->
    <div class="rg-steps">
      <div class="rg-step active" id="rg-dot-1">
        <div class="rg-step-dot">1</div>
        <span class="rg-step-label">Your Info</span>
      </div>
      <div class="rg-step" id="rg-dot-2">
        <div class="rg-step-dot">2</div>
        <span class="rg-step-label">Service</span>
      </div>
      <div class="rg-step" id="rg-dot-3">
        <div class="rg-step-dot">3</div>
        <span class="rg-step-label">Details</span>
      </div>
      <div class="rg-step" id="rg-dot-4">
        <div class="rg-step-dot">4</div>
        <span class="rg-step-label">Payment</span>
      </div>
    </div>

    <!-- Form Body -->
    <div class="rg-body">
      <div class="rg-global-err" id="rg-global-err"></div>

      <!-- ── PANEL 1: Contact Info ── -->
      <div class="rg-panel active" id="rg-panel-1">
        <div class="rg-panel-title">✦ Your Contact Details</div>

        <div class="rg-field">
          <label>Full Name <span>*</span></label>
          <input type="text" id="rg-name" placeholder="Enter your full name" autocomplete="name">
          <div class="rg-err" id="rg-err-name">Please enter your name.</div>
        </div>

        <div class="rg-field">
          <label>WhatsApp / Contact Number <span>*</span></label>
          <div class="rg-phone-row">
            <select id="rg-country-code">
              <option value="+91" data-country="India">🇮🇳 +91 India</option>
              <option value="+977" data-country="Nepal">🇳🇵 +977 Nepal</option>
              <option value="+880" data-country="Bangladesh">🇧🇩 +880 Bangladesh</option>
              <option value="+94" data-country="Sri Lanka">🇱🇰 +94 Sri Lanka</option>
              <option value="+1" data-country="USA/Canada">🇺🇸 +1 USA/Canada</option>
              <option value="+44" data-country="UK">🇬🇧 +44 UK</option>
              <option value="+61" data-country="Australia">🇦🇺 +61 Australia</option>
              <option value="+971" data-country="UAE">🇦🇪 +971 UAE</option>
              <option value="+65" data-country="Singapore">🇸🇬 +65 Singapore</option>
              <option value="+60" data-country="Malaysia">🇲🇾 +60 Malaysia</option>
              <option value="+1" data-country="Canada">🇨🇦 +1 Canada</option>
              <option value="+49" data-country="Germany">🇩🇪 +49 Germany</option>
              <option value="+33" data-country="France">🇫🇷 +33 France</option>
              <option value="+other" disabled>── Other ──</option>
            </select>
            <input type="tel" id="rg-phone" placeholder="Phone number" autocomplete="tel"  maxlength="10"
    minlength="10"
    pattern="[0-9]{10}">
          </div>
          <div class="rg-err" id="rg-err-phone">Please enter a valid phone number.</div>
        </div>

        <div class="rg-field">
          <label>Email Address <span>*</span></label>
          <input type="email" id="rg-email" placeholder="your@email.com" autocomplete="email">
          <div class="rg-err" id="rg-err-email">Please enter a valid email address.</div>
        </div>

        <div class="rg-btn-row">
          <button class="rg-btn rg-btn-next" onclick="rgNext(1)">Next →</button>
        </div>
      </div>

      <!-- ── PANEL 2: Service Selection ── -->
      <div class="rg-panel" id="rg-panel-2">
        <div class="rg-panel-title">✦ Choose Your Service</div>

        <!-- Service 1 -->
        <label class="rg-service-card" id="rg-sc-1" onclick="rgSelectService(1)">
          <input type="radio" name="rg_service" value="1">
          <div class="rg-sc-top">
            <span class="rg-sc-name">🔭 Horoscope Analysis</span>
            <div class="rg-sc-check"><svg viewBox="0 0 12 12" fill="none" stroke="#1a1535" stroke-width="2.5"><polyline points="1.5,6 5,9.5 10.5,2.5"/></svg></div>
          </div>
        </label>

        <!-- Service 2 -->
        <label class="rg-service-card" id="rg-sc-2" onclick="rgSelectService(2)">
          <input type="radio" name="rg_service" value="2">
          <div class="rg-sc-top">
            <span class="rg-sc-name">💍 Marriage Consultation</span>
            <div class="rg-sc-check"><svg viewBox="0 0 12 12" fill="none" stroke="#1a1535" stroke-width="2.5"><polyline points="1.5,6 5,9.5 10.5,2.5"/></svg></div>
          </div>
        </label>

        <!-- Service 3 -->
        <label class="rg-service-card" id="rg-sc-3" onclick="rgSelectService(3)">
          <input type="radio" name="rg_service" value="3">
          <div class="rg-sc-top">
            <span class="rg-sc-name">📝 Horoscope Analysis + Name Correction</span>
            <div class="rg-sc-check"><svg viewBox="0 0 12 12" fill="none" stroke="#1a1535" stroke-width="2.5"><polyline points="1.5,6 5,9.5 10.5,2.5"/></svg></div>
          </div>
        </label>

        <div class="rg-err" id="rg-err-service" style="margin-top:-6px;margin-bottom:10px;">Please select a service.</div>

        <!-- Quantity for Svc 1 -->
        <div id="rg-qty-wrap-1" style="display:none;">
          <hr class="rg-divider">
          <div class="rg-field">
            <label>How many horoscopes do you need analysed? <span>*</span></label>
            <select id="rg-qty-1" onchange="rgSetQty(1, this.value)">
              <option value="">Select quantity</option>
              <?php for($i=1;$i<=10;$i++) echo "<option value='$i'>$i</option>"; ?>
            </select>
          </div>
        </div>

        <!-- Quantity for Svc 3 -->
        <div id="rg-qty-wrap-3" style="display:none;">
          <hr class="rg-divider">
          <div class="rg-field">
            <label>How many name corrections and Horoscope analysis do you need? <span>*</span></label>
            <select id="rg-qty-3" onchange="rgSetQty(3, this.value)">
              <option value="">Select quantity</option>
              <?php for($i=1;$i<=10;$i++) echo "<option value='$i'>$i</option>"; ?>
            </select>
          </div>
        </div>

        <div class="rg-btn-row">
          <button class="rg-btn rg-btn-back" onclick="rgGoTo(1)">← Back</button>
          <button class="rg-btn rg-btn-next" onclick="rgNext(2)">Next →</button>
        </div>
      </div>

      <!-- ── PANEL 3: Birth Details ── -->
      <div class="rg-panel" id="rg-panel-3">
        <div class="rg-panel-title" id="rg-p3-title">✦ Birth Details</div>
        <div id="rg-details-container"></div>

        <div class="rg-btn-row">
          <button class="rg-btn rg-btn-back" onclick="rgGoTo(2)">← Back</button>
          <button class="rg-btn rg-btn-next" onclick="rgNext(3)">Next →</button>
        </div>
      </div>

      <!-- ── PANEL 4: Country + Payment ── -->
      <div class="rg-panel" id="rg-panel-4">
        <div class="rg-panel-title">✦ Payment Details</div>

        <div class="rg-amount-box" id="rg-amount-display">
          <div class="rg-amount-label">Amount Due</div>
          <div class="rg-amount-value" id="rg-amount-val">—</div>
          <div class="rg-amount-svc"  id="rg-amount-svc">Select a service to see the amount</div>
        </div>

        <div class="rg-field">


        <!-- Razorpay Script -->
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <div class="rg-loader" id="rg-loader">
          <div class="rg-spinner"></div>
          <p>Confirming your booking…</p>
        </div>

        <div class="rg-btn-row" id="rg-submit-row">
          <button class="rg-btn rg-btn-back" onclick="rgGoTo(3)">← Back</button>
          <button class="rg-btn rg-btn-submit" onclick="rgSubmit()">✓ Confirm Booking</button>
        </div>
      </div>

      <!-- ── SUCCESS ── -->
      <div class="rg-success" id="rg-success">
        <span class="rg-success-icon">🌟</span>
        <h3>Booking Successful!</h3>
        <p><strong>You can check your mail for confirmation.</strong></p>
        <p>Astrologer Raajeev G will contact you shortly.</p>
        <div class="rg-booking-id" id="rg-success-id">Booking ID: —</div>
        <p style="color:var(--rg-pale);font-size:13px;">For any other details, please reach out on WhatsApp:</p>
        <a href="https://wa.me/919811294025" class="rg-wa-btn" target="_blank">
          💬 +91 98112 94025
        </a>
      </div>

    </div><!-- /.rg-body -->
  </div><!-- /.rg-card -->
</section>

<script>
/* ═══════════════════════════════════════════════════════════════════
   ASTROLOGER RAAJEEVG – FORM LOGIC
   ═══════════════════════════════════════════════════════════════════ */

const RG = {
  step: 1,
  selectedService: null,
  selectedTier: null,
  selectedAmount: null,
  qty1: 0,
  qty3: 0,
  selectedCountry: null,
};

const SVC_NAMES = {
  1: 'Horoscope Analysis',
  2: 'Marriage Consultation',
  3: 'Horoscope Analysis + Name Correction',
};

/* ── Navigation ──────────────────────────────────────────────────── */

function rgGoTo(step) {
  document.getElementById('rg-panel-' + RG.step).classList.remove('active');
  RG.step = step;
  document.getElementById('rg-panel-' + step).classList.add('active');
  rgUpdateDots();
  document.querySelector('.rg-card').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

function rgUpdateDots() {
  for (let i = 1; i <= 4; i++) {
    const el = document.getElementById('rg-dot-' + i);
    el.classList.remove('active', 'done');
    if (i < RG.step)       el.classList.add('done');
    else if (i === RG.step) el.classList.add('active');
  }
}

function rgNext(from) {
  rgHideErr();
  if (from === 1 && !rgValidateStep1()) return;
  if (from === 2 && !rgValidateStep2()) return;
  if (from === 3 && !rgValidateStep3()) return;

  if (from === 1) {
    const codeEl = document.getElementById('rg-country-code');
    RG.selectedCountry = codeEl.options[codeEl.selectedIndex].dataset.country || 'Other';
  }

  rgSavePartial();

  if (from === 2) rgBuildDetailsPanel();

  const next = from + 1;
  if (next === 4) rgPopulatePayment();
  rgGoTo(next);
}

function rgSavePartial() {
  const name = document.getElementById('rg-name').value.trim();
  const email = document.getElementById('rg-email').value.trim();
  if (!name || !email) return;

  const codeEl = document.getElementById('rg-country-code');
  const country = codeEl.options[codeEl.selectedIndex].dataset.country || 'Other';

  const payload = {
    astro_form_partial: 1,
    name:          name,
    whatsapp:      codeEl.value + document.getElementById('rg-phone').value.trim(),
    email:         email,
    service:       RG.selectedService ? SVC_NAMES[RG.selectedService] : '',
    service_tier:  '',
    amount:        RG.selectedAmount || '',
    country_group: country,
    payment_ref:   'PENDING_RZP',
    horoscopes:    rgCollectHoroscopes(),
  };

  fetch('process_booking.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(payload),
  }).catch(e => console.error(e));
}

/* ── Validation ──────────────────────────────────────────────────── */

function rgShowErr(id, show) {
  document.getElementById(id).classList.toggle('show', show);
}
function rgHideErr() {
  document.querySelectorAll('.rg-err').forEach(e => e.classList.remove('show'));
  document.getElementById('rg-global-err').classList.remove('show');
}

function rgValidateStep1() {
  let ok = true;
  const name = document.getElementById('rg-name').value.trim();
  const phone = document.getElementById('rg-phone').value.trim();
  const email = document.getElementById('rg-email').value.trim();
  if (!name)                              { rgShowErr('rg-err-name', true);  ok = false; }
  if (!/^\d{6,15}$/.test(phone))         { rgShowErr('rg-err-phone', true); ok = false; }
  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) { rgShowErr('rg-err-email', true); ok = false; }
  return ok;
}

function rgValidateStep2() {
  if (!RG.selectedService) {
    rgShowErr('rg-err-service', true); return false;
  }
  if (RG.selectedService === 1 && !RG.qty1) {
    rgShowErr('rg-err-service', true);
    document.getElementById('rg-err-service').textContent = 'Please select how many horoscopes you need.';
    return false;
  }
  if (RG.selectedService === 3 && !RG.qty3) {
    rgShowErr('rg-err-service', true);
    document.getElementById('rg-err-service').textContent = 'Please select quantity.';
    return false;
  }
  return true;
}

function rgValidateStep3() {
  const blocks = document.querySelectorAll('.rg-horo-block');
  let ok = true;
  blocks.forEach((block, i) => {
    block.querySelectorAll('input[required], select[required]').forEach(inp => {
      if (!inp.value.trim()) { inp.style.borderColor = 'var(--rg-error)'; ok = false; }
      else inp.style.borderColor = '';
    });
  });
  if (!ok) {
    const err = document.getElementById('rg-global-err');
    err.textContent = 'Please fill in all required birth details.';
    err.classList.add('show');
  }
  return ok;
}

/* ── Service Selection ───────────────────────────────────────────── */

function rgSelectService(n) {
  RG.selectedService = n;
  RG.selectedAmount  = null;
  [1,2,3].forEach(i => {
    document.getElementById('rg-sc-' + i).classList.toggle('selected', i === n);
  });
  // Show quantity selectors
  document.getElementById('rg-qty-wrap-1').style.display = (n === 1) ? 'block' : 'none';
  document.getElementById('rg-qty-wrap-3').style.display = (n === 3) ? 'block' : 'none';
  if (n !== 1) { RG.qty1 = 0; document.getElementById('rg-qty-1').value = ''; }
  if (n !== 3) { RG.qty3 = 0; document.getElementById('rg-qty-3').value = ''; }
  // Marriage has fixed single pair
  if (n === 2) RG.qty1 = 0;
  rgShowErr('rg-err-service', false);
}



function rgSetQty(svc, val) {
  if (svc === 1) RG.qty1 = parseInt(val) || 0;
  if (svc === 3) RG.qty3 = parseInt(val) || 0;
}

/* ── Build Details Panel ─────────────────────────────────────────── */

function rgBuildDetailsPanel() {
  const container = document.getElementById('rg-details-container');
  container.innerHTML = '';
  const svc = RG.selectedService;

  if (svc === 1) {
    document.getElementById('rg-p3-title').textContent = '✦ Horoscope Birth Details';
    for (let i = 1; i <= RG.qty1; i++) container.appendChild(rgHoroBlock(i, 'Person ' + i, true, true, true));
  }

  if (svc === 2) {
    document.getElementById('rg-p3-title').textContent = '✦ Birth Details for Compatibility';
    container.appendChild(rgHoroBlock(1, 'Male / Person 1', true, true, true));
    container.appendChild(rgHoroBlock(2, 'Female / Person 2', true, true, true));
  }

  if (svc === 3) {
    document.getElementById('rg-p3-title').textContent = '✦ Birth Details for Name Correction';
    for (let i = 1; i <= RG.qty3; i++) container.appendChild(rgHoroBlock(i, 'Person ' + i, true, false, true));
  }
}

function rgHoroBlock(idx, label, needName, needTime, needPlace) {
  const div = document.createElement('div');
  div.className = 'rg-horo-block';
  div.dataset.idx = idx;

  div.innerHTML = `
    <div class="rg-horo-block-title">${label}</div>
    <div class="rg-field">
      <label>Full Name <span>*</span></label>
      <input type="text" class="rg-hf-name" placeholder="Full name" ${needName ? 'required' : ''}>
    </div>
    <div class="rg-row">
      <div class="rg-field">
        <label>Date of Birth <span>*</span></label>
        <input type="date" class="rg-hf-dob" required>
      </div>
      ${needTime ? `<div class="rg-field">
        <label>Birth Time <span>*</span></label>
        <input type="time" class="rg-hf-time" required>
      </div>` : ''}
    </div>
    ${needPlace ? `<div class="rg-field">
      <label>Birth Place <span>*</span></label>
      <input type="text" class="rg-hf-place" placeholder="City, State, Country" required>
    </div>` : ''}
  `;
  return div;
}

/* ── Payment Panel ───────────────────────────────────────────────── */

function rgPopulatePayment() {
  rgCalculateAmount();
}

function rgCalculateAmount() {
  if (!RG.selectedService || !RG.selectedCountry) {
    document.getElementById('rg-amount-val').textContent = '—';
    return;
  }
  
  let isIndiaPricing = ['India', 'Nepal', 'Bangladesh', 'Sri Lanka'].includes(RG.selectedCountry);
  let price = 0;
  let qty = 1;

  if (RG.selectedService === 1) {
    price = isIndiaPricing ? 1500 : 3100;
    qty = RG.qty1 || 1;
  } else if (RG.selectedService === 2) {
    price = isIndiaPricing ? 2100 : 5100;
    qty = 1;
  } else if (RG.selectedService === 3) {
    price = isIndiaPricing ? 5100 : 11000;
    qty = RG.qty3 || 1;
  }

  let total = price * qty;
  RG.selectedAmount = '₹' + total.toLocaleString('en-IN');
  document.getElementById('rg-amount-val').textContent = RG.selectedAmount;
  
  const svcNames = { 1: 'Horoscope Analysis', 2: 'Marriage Consultation', 3: 'Horoscope Analysis + Name Correction' };
  let breakdown = svcNames[RG.selectedService] || '';
  if (qty > 1) {
    breakdown += ` (₹${price.toLocaleString('en-IN')} x ${qty} persons)`;
  }
  document.getElementById('rg-amount-svc').textContent = breakdown;
}

/* ── Submit ──────────────────────────────────────────────────────── */

function rgCollectHoroscopes() {
  const blocks = document.querySelectorAll('.rg-horo-block');
  const result = [];
  blocks.forEach(block => {
    result.push({
      name:  block.querySelector('.rg-hf-name')?.value  || '',
      dob:   block.querySelector('.rg-hf-dob')?.value   || '',
      time:  block.querySelector('.rg-hf-time')?.value  || '',
      place: block.querySelector('.rg-hf-place')?.value || '',
    });
  });
  return result;
}

async function rgSubmit() {
  rgHideErr();

  // Validated before


  document.getElementById('rg-submit-row').style.display = 'none';
  document.getElementById('rg-loader').classList.add('show');

  const payload = {
    astro_form_submit: 1,
    name:          document.getElementById('rg-name').value.trim(),
    whatsapp:      document.getElementById('rg-country-code').value + document.getElementById('rg-phone').value.trim(),
    email:         document.getElementById('rg-email').value.trim(),
    service:       SVC_NAMES[RG.selectedService],
    service_tier:  '',
    amount:        RG.selectedAmount,
    country_group: RG.selectedCountry,
    payment_ref:   'PENDING_RZP',
    horoscopes:    rgCollectHoroscopes(),
  };

  try {
    const res  = await fetch('process_booking.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(payload),
    });
    const data = await res.json();

    document.getElementById('rg-loader').classList.remove('show');

    if (data.success) {
      const options = {
        key: data.razorpay_key,
        amount: data.amount * 100,
        currency: "INR",
        name: "Astrologer RaajeevG",
        description: "Booking Consultation",
        order_id: data.order_id,
        handler: async function(response) {
            document.getElementById('rg-loader').classList.add('show');
            try {
                const vRes = await fetch('process_booking.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        verify_payment: 1,
                        razorpay_payment_id: response.razorpay_payment_id,
                        razorpay_order_id: response.razorpay_order_id,
                        razorpay_signature: response.razorpay_signature,
                        booking_id: data.booking_id
                    })
                });
                const vData = await vRes.json();
                if (vData && vData.status === 'success') {
                    console.log('Payment verified successfully');
                } else {
                    console.warn('Payment verification returned error, but payment was captured by Razorpay.');
                }
            } catch (err) {
               console.error('Verification request failed:', err);
            }
            
            // Redirect to Success Page
            window.location.href = 'booking_success.php?booking_id=' + data.booking_id;
        },
        prefill: {
            name: payload.name,
            email: payload.email,
            contact: payload.whatsapp
        },
        theme: { color: "#d4af37" },
        modal: {
            ondismiss: function() {
                document.getElementById('rg-submit-row').style.display = 'flex';
            }
        }
      };
      const rzp1 = new Razorpay(options);
      rzp1.open();
    } else {
      throw new Error('Server returned error');
    }
  } catch (err) {
    document.getElementById('rg-loader').classList.remove('show');
    document.getElementById('rg-submit-row').style.display = 'flex';
    const errBox = document.getElementById('rg-global-err');
    errBox.textContent = 'Something went wrong. Please try again or contact us on WhatsApp.';
    errBox.classList.add('show');
  }
}
</script>