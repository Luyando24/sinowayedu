<footer class="bg-dark text-white py-5 mt-5">
  <div class="container">
    <!-- Footer content -->
    <div class="row">
      <div class="col-lg-4 mb-4 mb-lg-0">
        <h5 class="mb-3">About Us</h5>
        <p>SinoWay Education is your trusted partner for studying in China. We connect international students with top Chinese universities and provide comprehensive support throughout your academic journey.</p>
        <div class="social-icons mt-3">
          <a href="#" class="text-white me-2"><i class="bi bi-facebook"></i></a>
          <a href="#" class="text-white me-2"><i class="bi bi-twitter"></i></a>
          <a href="#" class="text-white me-2"><i class="bi bi-instagram"></i></a>
          <a href="#" class="text-white"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
      
      <div class="col-lg-4 mb-4 mb-lg-0">
        <h5 class="mb-3">{{ lang('quick_links') }}</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="{{ url('/') }}" class="text-white text-decoration-none">{{ lang('home') }}</a></li>
          <li class="mb-2"><a href="{{ url('universities') }}" class="text-white text-decoration-none">{{ lang('universities') }}</a></li>
          <li class="mb-2"><a href="{{ url('programs') }}" class="text-white text-decoration-none">{{ lang('programs') }}</a></li>
          <li class="mb-2"><a href="{{ url('about') }}" class="text-white text-decoration-none">{{ lang('about') }}</a></li>
          <li><a href="{{ url('contact') }}" class="text-white text-decoration-none">{{ lang('contact') }}</a></li>
        </ul>
      </div>
      
      <div class="col-lg-4">
        <h5 class="mb-3">Newsletter</h5>
        <p>Subscribe to our newsletter to receive the latest news and updates.</p>
        <form>
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" aria-label="Email">
            <button class="btn primary-button" type="button">Subscribe</button>
          </div>
        </form>
      </div>
    </div>
    
    <hr class="my-4">
    
    <!-- Copyright -->
    <div class="row">
      <div class="col-md-6">
        <p class="mb-md-0">Copyright &copy; {{ date('Y') }} SinoWay Education. All rights reserved.</p>
      </div>
      <div class="col-md-6 text-md-end">
        <a href="#" class="text-white text-decoration-none me-3">Privacy Policy</a>
        <a href="#" class="text-white text-decoration-none">Terms of Service</a>
      </div>
    </div>
  </div>
</footer>


