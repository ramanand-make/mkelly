<div id="checkout-modal" class="checkout-modal-overlay">
    <div class="checkout-modal-content">
        <div class="checkout-header">
            <h3 class="checkout-title">Secure Checkout</h3>
            <button id="checkout-close-btn" class="checkout-close"><i class="fas fa-times"></i></button>
        </div>
        
        <div class="checkout-body">
            <div class="checkout-layout">
                <!-- Left: Form -->
                <div class="checkout-form-section">
                    <h4 class="checkout-section-title">Billing & Shipping Details</h4>
                    <form id="checkout-form">
                        <div class="form-row">
                            <div class="form-group half">
                                <label for="chk-name">Full Name *</label>
                                <input type="text" id="chk-name" name="name" required placeholder="John Doe">
                            </div>
                            <div class="form-group half">
                                <label for="chk-email">Email Address *</label>
                                <input type="email" id="chk-email" name="email" required placeholder="john@example.com">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="chk-phone">Phone Number *</label>
                                <div style="display: flex; gap: 10px;">
                                    <select id="chk-country-code" name="country_code" required
                                        style="width: 35%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; outline: none; background: #fff;">
                                    
                                        <option value="+93">Afghanistan (+93)</option>
                                        <option value="+355">Albania (+355)</option>
                                        <option value="+213">Algeria (+213)</option>
                                        <option value="+376">Andorra (+376)</option>
                                        <option value="+244">Angola (+244)</option>
                                        <option value="+54">Argentina (+54)</option>
                                        <option value="+374">Armenia (+374)</option>
                                        <option value="+61">Australia (+61)</option>
                                        <option value="+43">Austria (+43)</option>
                                        <option value="+994">Azerbaijan (+994)</option>
                                        <option value="+973">Bahrain (+973)</option>
                                        <option value="+880">Bangladesh (+880)</option>
                                        <option value="+375">Belarus (+375)</option>
                                        <option value="+32">Belgium (+32)</option>
                                        <option value="+501">Belize (+501)</option>
                                        <option value="+229">Benin (+229)</option>
                                        <option value="+975">Bhutan (+975)</option>
                                        <option value="+591">Bolivia (+591)</option>
                                        <option value="+387">Bosnia (+387)</option>
                                        <option value="+267">Botswana (+267)</option>
                                        <option value="+55">Brazil (+55)</option>
                                        <option value="+673">Brunei (+673)</option>
                                        <option value="+359">Bulgaria (+359)</option>
                                        <option value="+226">Burkina Faso (+226)</option>
                                        <option value="+257">Burundi (+257)</option>
                                        <option value="+855">Cambodia (+855)</option>
                                        <option value="+237">Cameroon (+237)</option>
                                        <option value="+1">Canada (+1)</option>
                                        <option value="+238">Cape Verde (+238)</option>
                                        <option value="+236">Central African Republic (+236)</option>
                                        <option value="+235">Chad (+235)</option>
                                        <option value="+56">Chile (+56)</option>
                                        <option value="+86">China (+86)</option>
                                        <option value="+57">Colombia (+57)</option>
                                        <option value="+269">Comoros (+269)</option>
                                        <option value="+242">Congo (+242)</option>
                                        <option value="+243">Congo DR (+243)</option>
                                        <option value="+506">Costa Rica (+506)</option>
                                        <option value="+385">Croatia (+385)</option>
                                        <option value="+53">Cuba (+53)</option>
                                        <option value="+357">Cyprus (+357)</option>
                                        <option value="+420">Czech Republic (+420)</option>
                                        <option value="+45">Denmark (+45)</option>
                                        <option value="+253">Djibouti (+253)</option>
                                        <option value="+593">Ecuador (+593)</option>
                                        <option value="+20">Egypt (+20)</option>
                                        <option value="+503">El Salvador (+503)</option>
                                        <option value="+372">Estonia (+372)</option>
                                        <option value="+251">Ethiopia (+251)</option>
                                        <option value="+679">Fiji (+679)</option>
                                        <option value="+358">Finland (+358)</option>
                                        <option value="+33">France (+33)</option>
                                        <option value="+995">Georgia (+995)</option>
                                        <option value="+49">Germany (+49)</option>
                                        <option value="+233">Ghana (+233)</option>
                                        <option value="+30">Greece (+30)</option>
                                        <option value="+299">Greenland (+299)</option>
                                        <option value="+502">Guatemala (+502)</option>
                                        <option value="+224">Guinea (+224)</option>
                                        <option value="+592">Guyana (+592)</option>
                                        <option value="+509">Haiti (+509)</option>
                                        <option value="+504">Honduras (+504)</option>
                                        <option value="+852">Hong Kong (+852)</option>
                                        <option value="+36">Hungary (+36)</option>
                                        <option value="+354">Iceland (+354)</option>
                                        <option value="+91" selected>India (+91)</option>
                                        <option value="+62">Indonesia (+62)</option>
                                        <option value="+98">Iran (+98)</option>
                                        <option value="+964">Iraq (+964)</option>
                                        <option value="+353">Ireland (+353)</option>
                                        <option value="+972">Israel (+972)</option>
                                        <option value="+39">Italy (+39)</option>
                                        <option value="+81">Japan (+81)</option>
                                        <option value="+962">Jordan (+962)</option>
                                        <option value="+7">Kazakhstan (+7)</option>
                                        <option value="+254">Kenya (+254)</option>
                                        <option value="+965">Kuwait (+965)</option>
                                        <option value="+996">Kyrgyzstan (+996)</option>
                                        <option value="+856">Laos (+856)</option>
                                        <option value="+371">Latvia (+371)</option>
                                        <option value="+961">Lebanon (+961)</option>
                                        <option value="+218">Libya (+218)</option>
                                        <option value="+370">Lithuania (+370)</option>
                                        <option value="+352">Luxembourg (+352)</option>
                                        <option value="+853">Macau (+853)</option>
                                        <option value="+389">Macedonia (+389)</option>
                                        <option value="+261">Madagascar (+261)</option>
                                        <option value="+60">Malaysia (+60)</option>
                                        <option value="+960">Maldives (+960)</option>
                                        <option value="+223">Mali (+223)</option>
                                        <option value="+356">Malta (+356)</option>
                                        <option value="+52">Mexico (+52)</option>
                                        <option value="+377">Monaco (+377)</option>
                                        <option value="+976">Mongolia (+976)</option>
                                        <option value="+212">Morocco (+212)</option>
                                        <option value="+95">Myanmar (+95)</option>
                                        <option value="+264">Namibia (+264)</option>
                                        <option value="+977">Nepal (+977)</option>
                                        <option value="+31">Netherlands (+31)</option>
                                        <option value="+64">New Zealand (+64)</option>
                                        <option value="+505">Nicaragua (+505)</option>
                                        <option value="+234">Nigeria (+234)</option>
                                        <option value="+47">Norway (+47)</option>
                                        <option value="+968">Oman (+968)</option>
                                        <option value="+92">Pakistan (+92)</option>
                                        <option value="+970">Palestine (+970)</option>
                                        <option value="+507">Panama (+507)</option>
                                        <option value="+675">Papua New Guinea (+675)</option>
                                        <option value="+595">Paraguay (+595)</option>
                                        <option value="+51">Peru (+51)</option>
                                        <option value="+63">Philippines (+63)</option>
                                        <option value="+48">Poland (+48)</option>
                                        <option value="+351">Portugal (+351)</option>
                                        <option value="+974">Qatar (+974)</option>
                                        <option value="+40">Romania (+40)</option>
                                        <option value="+7">Russia (+7)</option>
                                        <option value="+250">Rwanda (+250)</option>
                                        <option value="+966">Saudi Arabia (+966)</option>
                                        <option value="+221">Senegal (+221)</option>
                                        <option value="+381">Serbia (+381)</option>
                                        <option value="+65">Singapore (+65)</option>
                                        <option value="+421">Slovakia (+421)</option>
                                        <option value="+386">Slovenia (+386)</option>
                                        <option value="+27">South Africa (+27)</option>
                                        <option value="+82">South Korea (+82)</option>
                                        <option value="+34">Spain (+34)</option>
                                        <option value="+94">Sri Lanka (+94)</option>
                                        <option value="+249">Sudan (+249)</option>
                                        <option value="+46">Sweden (+46)</option>
                                        <option value="+41">Switzerland (+41)</option>
                                        <option value="+963">Syria (+963)</option>
                                        <option value="+886">Taiwan (+886)</option>
                                        <option value="+992">Tajikistan (+992)</option>
                                        <option value="+255">Tanzania (+255)</option>
                                        <option value="+66">Thailand (+66)</option>
                                        <option value="+216">Tunisia (+216)</option>
                                        <option value="+90">Turkey (+90)</option>
                                        <option value="+993">Turkmenistan (+993)</option>
                                        <option value="+256">Uganda (+256)</option>
                                        <option value="+380">Ukraine (+380)</option>
                                        <option value="+971">United Arab Emirates (+971)</option>
                                        <option value="+44">United Kingdom (+44)</option>
                                        <option value="+1">United States (+1)</option>
                                        <option value="+598">Uruguay (+598)</option>
                                        <option value="+998">Uzbekistan (+998)</option>
                                        <option value="+58">Venezuela (+58)</option>
                                        <option value="+84">Vietnam (+84)</option>
                                        <option value="+967">Yemen (+967)</option>
                                        <option value="+260">Zambia (+260)</option>
                                        <option value="+263">Zimbabwe (+263)</option>
                                    
                                    </select>
                                    <input type="tel" id="chk-phone" name="phone" required placeholder="9876543210" pattern="\d{10}" title="Phone number must be exactly 10 digits" style="width: 65%;">
                                </div>
                                <span id="phone-error" style="color: red; font-size: 12px; display: none; margin-top: 5px;">Phone number must be exactly 10 digits.</span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="chk-address1">Address Line 1 *</label>
                                <input type="text" id="chk-address1" name="address1" required placeholder="Flat / House No. / Building">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group half">
                                <label for="chk-city">City *</label>
                                <input type="text" id="chk-city" name="city" required placeholder="City">
                            </div>
                            <div class="form-group half">
                                <label for="chk-state">State *</label>
                                <input type="text" id="chk-state" name="state" required placeholder="State">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group half">
                                <label for="chk-country">Country *</label>
                                <select id="chk-country" name="country" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; outline: none; background: #fff;">
                                    <option value="">Select Country</option>
                                    <option value="India" selected>India</option>
                                    <option value="United States">United States</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Australia">Australia</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Germany">Germany</option>
                                    <option value="France">France</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Finland">Finland</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="China">China</option>
                                    <option value="Japan">Japan</option>
                                    <option value="South Korea">South Korea</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Chile">Chile</option>
                                    <option value="Colombia">Colombia</option>
                                </select>
                            </div>
                            <div class="form-group half">
                                <label for="chk-pincode">Pincode *</label>
                                <input type="text" id="chk-pincode" name="pincode" required placeholder="123456">
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Right: Summary -->
                <div class="checkout-summary-section">
                    <h4 class="checkout-section-title">Order Summary</h4>
                    <div id="checkout-items-list" class="checkout-items">
                        <!-- Populated via JS -->
                    </div>
                    <div class="checkout-totals">
                        <div class="tot-row">
                            <span>Subtotal</span>
                            <span id="chk-subtotal">₹0.00</span>
                        </div>
                        <div class="tot-row">
                            <span>Shipping</span>
                            <span>Free</span>
                        </div>
                        <div class="tot-row grand-total">
                            <span>Total</span>
                            <span id="chk-total">₹0.00</span>
                        </div>
                    </div>
                    <button id="chk-pay-btn" class="checkout-pay-btn">Proceed to Pay</button>
                    <div class="checkout-secure-badges">
                        <i class="fas fa-lock"></i> Secure Encrypted Payment
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkoutModal = document.getElementById('checkout-modal');
    const closeBtn = document.getElementById('checkout-close-btn');
    const payBtn = document.getElementById('chk-pay-btn');
    
    // Global variable to store current checkout items
    window.checkoutCartData = null;

    // Attach to Buy Now buttons
    // The Buy Now in Cart Drawer
    const drawerBuyBtn = document.querySelector('.buy-now-btn');
    if(drawerBuyBtn) {
        drawerBuyBtn.addEventListener('click', function(e) {
            e.preventDefault();
            // Fetch cart and open checkout
            fetch('ajax_cart.php', {
                method: 'POST',
                body: new URLSearchParams({ 'action': 'get' })
            })
            .then(res => res.json())
            .then(data => {
                if(data.count > 0) {
                    window.checkoutCartData = data.cart;
                    openCheckoutModal();
                    
                    // Close cart drawer
                    const cartDrawer = document.querySelector('.cart-drawer-wrapper');
                    const cartOverlay = document.querySelector('.cart-overlay');
                    if(cartDrawer) cartDrawer.classList.remove('active');
                    if(cartOverlay) cartOverlay.classList.remove('active');
                } else {
                    alert("Your cart is empty!");
                }
            });
        });
    }

    // The Buy Now in Product Page
    const directBuyBtns = document.querySelectorAll('.buy-now-direct');
    directBuyBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const id = this.dataset.id;
            const name = this.dataset.name;
            const price = this.dataset.price;
            const image = this.dataset.image;
            const ratti = this.dataset.ratti || 0;
            let qty = 1;
            const qtyInput = document.getElementById('quantity');
            if (qtyInput) qty = parseInt(qtyInput.value) || 1;

            // 1. Clear cart
            fetch('ajax_cart.php', {
                method: 'POST',
                body: new URLSearchParams({ 'action': 'clear' })
            })
            .then(res => res.json())
            .then(() => {
                // 2. Add specific product
                const formData = new FormData();
                formData.append('action', 'add');
                formData.append('id', id);
                formData.append('name', name);
                formData.append('price', price);
                formData.append('image', image);
                formData.append('qty', qty);
                if (ratti > 0) {
                    formData.append('ratti', ratti);
                }

                return fetch('ajax_cart.php', {
                    method: 'POST',
                    body: formData
                });
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    window.checkoutCartData = data.cart;
                    
                    // Update UI counters if updateCartUI is available (defined in header.php)
                    if (typeof updateCartUI === 'function') {
                        updateCartUI(data);
                    } else {
                        // Fallback: manually update counts on page
                        const counts = document.querySelectorAll('.cart-count');
                        counts.forEach(el => el.textContent = data.count);
                    }

                    openCheckoutModal();
                }
            })
            .catch(err => {
                console.error("Error modifying cart:", err);
                alert("Could not process Buy Now request. Please try again.");
            });
        });
    });

    closeBtn.addEventListener('click', () => {
        checkoutModal.classList.remove('active');
    });

    const phoneInputElem = document.getElementById('chk-phone');
    if (phoneInputElem) {
        phoneInputElem.addEventListener('input', function(e) {
            // Restrict non-digits and limit to 10 characters max
            this.value = this.value.replace(/\D/g, '').substring(0, 10);
            
            const phoneError = document.getElementById('phone-error');
            if (this.value.length === 10) {
                phoneError.style.display = 'none';
                this.style.borderColor = '#ddd';
            }
        });
    }

    function openCheckoutModal() {
        // Populate summary
        const list = document.getElementById('checkout-items-list');
        list.innerHTML = '';
        let total = 0;
        
        Object.values(window.checkoutCartData).forEach(item => {
            const itemTotal = parseFloat(item.price) * parseInt(item.qty);
            total += itemTotal;
            list.innerHTML += `
                <div class="chk-item">
                    <img src="${item.image}" alt="${item.name}">
                    <div class="chk-item-info">
                        <h5>${item.name}</h5>
                        <p>Qty: ${item.qty} x ₹${item.price}</p>
                    </div>
                    <div class="chk-item-price">₹${itemTotal.toLocaleString()}</div>
                </div>
            `;
        });

        document.getElementById('chk-subtotal').textContent = `₹${total.toLocaleString()}`;
        document.getElementById('chk-total').textContent = `₹${total.toLocaleString()}`;
        
        checkoutModal.classList.add('active');
    }

    payBtn.addEventListener('click', function() {
        const form = document.getElementById('checkout-form');
        const phoneInput = document.getElementById('chk-phone');
        const phoneError = document.getElementById('phone-error');
        
        phoneError.style.display = 'none';
        phoneInput.style.borderColor = '#ddd';

        if(!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        const phoneVal = phoneInput.value.trim();
        const phoneRegex = /^\d{10}$/;
        if (!phoneRegex.test(phoneVal)) {
            phoneError.style.display = 'block';
            phoneInput.style.borderColor = 'red';
            return;
        }

        const formData = new FormData(form);
        const countryCode = document.getElementById('chk-country-code').value;
        formData.set('phone', countryCode + phoneVal);
        formData.append('cart', JSON.stringify(window.checkoutCartData));
        
        payBtn.textContent = 'Processing...';
        payBtn.disabled = true;

        fetch('process_checkout.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if(data.status === 'success') {
                // Initialize Razorpay
                var options = {
                    "key": data.razorpay_key || "rzp_test_YOUR_KEY_HERE", // Dynamic key from backend
                   
                     "amount": Math.round(data.amount * 100),
                    "currency": "INR",
                    "name": "Mkelly",
                    "description": "Order Payment",
                    "handler": function (response){
                        // Verify Payment
                        verifyPayment(response.razorpay_payment_id, response.razorpay_order_id, response.razorpay_signature, data.db_order_id);
                    },
                    "prefill": {
                        "name": formData.get('name'),
                        "email": formData.get('email'),
                        "contact": formData.get('phone')
                    },
                    "theme": {
                        "color": "#054B2C"
                    },
                    "modal": {
                        "ondismiss": function() {
                            payBtn.textContent = 'Proceed to Pay';
                            payBtn.disabled = false;
                        }
                    }
                };
                
                // Only add order_id if it's a valid Razorpay order ID (starts with 'order_')
                if (data.order_id && data.order_id.startsWith('order_')) {
                    options.order_id = data.order_id;
                }
                var rzp1 = new Razorpay(options);
                rzp1.on('payment.failed', function (response){
                    // Use setTimeout to allow Razorpay to gracefully handle its own events
                    setTimeout(function() {
                        window.location.href = "failed.php?error=" + encodeURIComponent(response.error.description);
                    }, 500);
                });
                rzp1.open();
            } else {
                window.location.href = "failed.php?error=" + encodeURIComponent("Error initializing payment: " + data.message);
            }
        })
        .catch(err => {
            console.error(err);
            window.location.href = "failed.php?error=Something+went+wrong";
        });
    });

    function verifyPayment(payment_id, order_id, signature, db_order_id) {
        const fd = new FormData();
        fd.append('payment_id', payment_id);
        fd.append('order_id', order_id);
        fd.append('signature', signature);
        fd.append('db_order_id', db_order_id);

        fetch('verify_payment.php', {
            method: 'POST',
            body: fd
        })
        .then(res => res.json())
        .then(data => {
            if(data.status === 'success') {
                window.location.href = "success.php?order=" + db_order_id;
            } else {
                window.location.href = "failed.php?error=Payment+verification+failed";
            }
        })
        .catch(err => {
            window.location.href = "failed.php?error=Verification+request+failed";
        });
    }
});
</script>
