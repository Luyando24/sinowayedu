<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    @foreach($heroes as $index => $image)
      <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" style="position: relative;">
        <img src="{{ asset('storage/' . $image->hero_image) }}" class="d-block w-100" alt="{{ $image->hero_title }}">
      </div>
    @endforeach
    <!-- Text Overlay -->
<div class="carousel-caption-overlay text-white px-3 px-md-5 py-4" style="background: rgba(0, 0, 0, 0.4);">
  <div class="container">
    <h1 class="mb-2 text-center">Your Trusted Partner for Studying in China</h1>
    <h5 class="mb-4 text-center">From application to arrival, your gateway to top universities.</h5>

    <!-- Search Form -->
    <form action="{{ url('search') }}" method="GET">
      <div class="row g-3 justify-content-center">
        <!-- First row -->
        <div class="col-12 col-md-2">
          <select name="city_id" class="form-select" style="height: 50px; background-color: #f1f1f1;">
            <option value="">Select City</option>
            @foreach($cities as $city)
              <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-12 col-md-2">
          <select name="degree_id" class="form-select" style="height: 50px; background-color: #f1f1f1;">
            <option value="">Select Degree</option>
            @foreach ($degrees as $degree)
              <option value="{{ $degree->id }}">{{ $degree->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-12 col-md-2">
          <select name="language" class="form-select" style="height: 50px; background-color: #f1f1f1;">
            <option value="">Select Language</option>
            <option value="English">English</option>
            <option value="Chinese">Chinese</option>
          </select>
        </div>
        <div class="col-12 col-md-2">
          <select name="duration" class="form-select" style="height: 50px; background-color: #f1f1f1;">
            <option value="">Select Duration</option>
            <option value="6 months">6 Months</option>
            <option value="1 year">1 year</option>
            <option value="2 years">2 years</option>
            <option value="3 years">3 years</option>
            <option value="4 years">4 years</option>
            <option value="5 years">5 years</option>
            <option value="6 years">6 years</option>
          </select>
        </div>
      </div>

      <!-- Second row -->
      <div class="row g-3 justify-content-center mt-2">
        <div class="col-12 col-md-2">
          <select name="scholarship" class="form-select" style="height: 50px; background-color: #f1f1f1;">
            <option value="">Select Scholarship</option>
            <option value="CSC">CSC</option>
            <option value="Chinese Government Scholarship">Chinese Government Scholarship</option>
            <option value="Local Government Scholarship">Local Government Scholarship</option>
            <option value="University Scholarship">University Scholarship</option>
            <option value="International Chinese Language Teacher Scholarship">International Chinese Language Teacher Scholarship</option>
            <option value="None">Self-Funded</option>
          </select>
        </div>
        <div class="col-12 col-md-2">
          <input type="text" name="program" class="form-control" placeholder="Search Programs" style="height: 50px; background-color: #f1f1f1;">
        </div>
        <div class="col-12 col-md-2">
          <select name="intake" class="form-select" style="height: 50px; background-color: #f1f1f1;">
            <option value="">Select Intake</option>
            <option value="Spring">Spring</option>
            <option value="Summer">Autumn</option>
          </select>
        </div>
        <div class="col-12 col-md-2">
          <button type="submit" class="btn btn-primary w-100" style="height: 50px; background: #2A7B7C;">Search</button>
        </div>
      </div>
    </form>
  </div>
</div>

</div>
