<style>
/* Enhanced Testimonial Section Design */
.testimonials-section {
    background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
    padding: 60px 0;
    overflow: hidden;
}

.testimonial-card {
    background: #ffffff;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid rgba(0, 0, 0, 0.02);
    margin: 15px;
    position: relative;
    z-index: 1;
}

.testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
}

.testimonial-card::before {
    content: '\201C';
    font-size: 80px;
    color: rgba(46, 204, 113, 0.1);
    position: absolute;
    top: 10px;
    right: 20px;
    font-family: serif;
    line-height: 1;
    z-index: -1;
}

.testimonial-stars {
    color: #f39c12;
    margin-bottom: 15px;
    font-size: 14px;
}

.testimonial-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 12px;
}

.testimonial-text {
    font-size: 0.95rem;
    color: #555;
    line-height: 1.6;
    margin-bottom: 20px;
    font-style: italic;
}

.testimonial-author {
    font-weight: 600;
    color: #2ecc71;
    margin-bottom: 25px;
    font-size: 1rem;
}

.testimonial-product {
    display: flex;
    align-items: center;
    padding-top: 20px;
    border-top: 1px solid #eee;
}

.testimonial-product img {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    object-fit: cover;
    margin-right: 15px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.testimonial-product-info p {
    margin: 0;
}

.testimonial-product-name {
    font-weight: 600;
    color: #333;
    font-size: 0.95rem;
}

.testimonial-product-price {
    font-size: 0.9rem;
}

.testimonial-product-price .original {
    text-decoration: line-through;
    color: #999;
    margin-right: 8px;
}

.testimonial-product-price .current {
    color: #e74c3c;
    font-weight: 700;
}
</style>

<section class="testimonials-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <h2 class="section-title fw-bold" style="color: #2c3e50;">What Our Customers Say</h2>
            <p class="text-muted">Discover how Mkelly Biotech is transforming lives with premium organic products.</p>
        </div>
        
        <div class="swiper testimonials-swiper">
            <div class="swiper-wrapper">
                <!-- Testimonial 1 -->
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="testimonial-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4 class="testimonial-title">Energy Boost & Great Quality!</h4>
                        <p class="testimonial-text">"I've been using Mkelly Biotech's Beetroot Powder in my morning smoothies, and the energy boost is incredible! The quality is top-notch, completely organic, and mixes so well. Highly recommended for a healthy lifestyle."</p>
                        <p class="testimonial-author">- Rashi Khanna</p>
                        <div class="testimonial-product">
                            <img src="assets/images/content/720x540/beetroot.jpg" alt="Organic Beetroot Powder">
                            <div class="testimonial-product-info">
                                <p class="testimonial-product-name">Organic Beetroot Powder</p>
                                <p class="testimonial-product-price">
                                    <span class="original">₹1,499</span>
                                    <span class="current">₹899</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="testimonial-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4 class="testimonial-title">Authentic Biotech Supplements</h4>
                        <p class="testimonial-text">"Mkelly Biotech delivers on their promise! The Cordyceps supplement has noticeably improved my stamina and focus throughout the day. It's rare to find such authentic biotech health products. Definitely buying again."</p>
                        <p class="testimonial-author">- Payal Jain</p>
                        <div class="testimonial-product">
                            <img src="assets/images/content/720x540/cordyceps.jpg" alt="Premium Cordyceps">
                            <div class="testimonial-product-info">
                                <p class="testimonial-product-name">Premium Cordyceps</p>
                                <p class="testimonial-product-price">
                                    <span class="original">₹2,999</span>
                                    <span class="current">₹1,899</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="testimonial-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h4 class="testimonial-title">Rich Aroma & Flavor</h4>
                        <p class="testimonial-text">"I ordered the Garlic Powder for cooking, and the aroma and flavor are absolutely rich and fresh. Mkelly Biotech's commitment to natural ingredients is evident. It's lightweight, pure, and a must-have in my kitchen."</p>
                        <p class="testimonial-author">- Amrita Pandey</p>
                        <div class="testimonial-product">
                            <img src="assets/images/content/720x540/garlic.jpg" alt="Pure Garlic Powder">
                            <div class="testimonial-product-info">
                                <p class="testimonial-product-name">Pure Garlic Powder</p>
                                <p class="testimonial-product-price">
                                    <span class="original">₹899</span>
                                    <span class="current">₹599</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 4 -->
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="testimonial-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4 class="testimonial-title">Exceptionally Fresh</h4>
                        <p class="testimonial-text">"After a lot of research for authentic organic products, I found Mkelly Biotech. Their Ginger Powder is exceptionally fresh and potent. I use it for my teas and it works wonders for digestion and immunity."</p>
                        <p class="testimonial-author">- Khushi Shah</p>
                        <div class="testimonial-product">
                             <img src="assets/images/content/720x540/ginger.jpg" alt="Organic Ginger Powder">
                            <div class="testimonial-product-info">
                                <p class="testimonial-product-name">Organic Ginger Powder</p>
                                <p class="testimonial-product-price">
                                    <span class="original">₹999</span>
                                    <span class="current">₹649</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 5 -->
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="testimonial-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4 class="testimonial-title">Natural & Lab-Certified</h4>
                        <p class="testimonial-text">"Got this delivered recently. I bought this because all Mkelly Biotech products are natural and lab-certified. I am definitely happy with the quality & it saves so much time in meal prep without compromising on taste."</p>
                        <p class="testimonial-author">- Saras</p>
                        <div class="testimonial-product">
                            <img src="assets/images/content/720x540/onion.png" alt="Dehydrated Onion Powder">
                            <div class="testimonial-product-info">
                                <p class="testimonial-product-name">Dehydrated Onion Powder</p>
                                <p class="testimonial-product-price">
                                    <span class="original">₹799</span>
                                    <span class="current">₹499</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="swiper-button-next" style="color: #2ecc71;"></div>
            <div class="swiper-button-prev" style="color: #2ecc71;"></div>
        </div>
    </div>
</section>