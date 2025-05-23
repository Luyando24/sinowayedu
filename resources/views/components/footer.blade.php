<footer class="bg-dark text-white py-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4 mb-md-0">
                <h5 class="mb-4">{{ __('messages.about_us') }}</h5>
                <p class="mb-4">{{ __('messages.footer_about') }}</p>
                <div class="social-icons d-flex flex-wrap gap-3 mt-3">
                    <a href="https://www.facebook.com/share/12KBok9k5Hr/" target="_blank" class="text-white social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.tiktok.com/@sinowayedu" target="_blank" class="text-white social-icon">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <a href="https://www.instagram.com/sinowayedu/" target="_blank" class="text-white social-icon">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="javascript:void(0);" class="text-white social-icon wechat-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="WeChat: +8613601965441">
                        <i class="fab fa-weixin"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <h5 class="mb-4">{{ __('messages.quick_links') }}</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ url('about-us') }}" class="text-white text-decoration-none">{{ __('messages.about_us') }}</a></li>
                    <li class="mb-2"><a href="{{ url('programs') }}" class="text-white text-decoration-none">{{ __('messages.programs') }}</a></li>
                    <li class="mb-2"><a href="{{ url('universities') }}" class="text-white text-decoration-none">{{ __('messages.universities') }}</a></li>
                    <li class="mb-2"><a href="{{ url('contact') }}" class="text-white text-decoration-none">{{ __('messages.contact') }}</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5 class="mb-4">{{ __('messages.contact_us') }}</h5>
                <p class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> {{ __('messages.address') }}</p>
                <p class="mb-2"><i class="fas fa-phone me-2"></i> +86 13601965441</p>
                <p class="mb-2"><i class="fas fa-envelope me-2"></i> info@sinowayedu.com</p>
            </div>
        </div>
        <hr class="my-4 bg-secondary">
        <div class="row">
            <div class="col-md-6 mb-3 mb-md-0">
                <p class="mb-0">&copy; {{ date('Y') }} SinoWay Education. {{ __('messages.all_rights_reserved') }}</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="{{ url('privacy-policy') }}" class="text-white text-decoration-none me-3">{{ __('messages.privacy_policy') }}</a>
                <a href="{{ url('terms-of-service') }}" class="text-white text-decoration-none">{{ __('messages.terms_of_service') }}</a>
            </div>
        </div>
    </div>
</footer>

<!-- WhatsApp Floating Button -->
<a href="https://wa.me/8613601965441" class="whatsapp-float text-decoration-none" target="_blank">
    <i class="fab fa-whatsapp"></i>
</a>

<style>
/* Footer Styles */
.social-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
    text-decoration: none !important;
}

.social-icon:hover {
    background-color: #3EA2A4;
    transform: translateY(-3px);
}

/* WhatsApp Floating Button */
.whatsapp-float {
    position: fixed;
    width: 60px;
    height: 60px;
    bottom: 90px;
    right: 20px;
    background-color: #25d366;
    color: #FFF;
    border-radius: 50px;
    text-align: center;
    font-size: 30px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    z-index: 1029;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: pulse 2s infinite;
    transition: all 0.3s ease;
    text-decoration: none !important;
}

.whatsapp-float:hover {
    background-color: #128C7E;
    color: white;
    transform: scale(1.1);
    animation: none;
}

@keyframes pulse {
    0% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
    }
    
    70% {
        transform: scale(1.05);
        box-shadow: 0 0 0 10px rgba(37, 211, 102, 0);
    }
    
    100% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
    }
}

@media (max-width: 767.98px) {
    footer {
        padding-bottom: 100px; /* Add extra padding at the bottom on mobile to account for the nav bar */
    }
    
    .whatsapp-float {
        bottom: 100px; /* Position above the mobile nav */
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
});
</script>


