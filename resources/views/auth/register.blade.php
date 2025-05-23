@extends('layouts.app')

@section('title', 'Create Account - Sinowayedu')

@section('content')
<section class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="shadow rounded-4 p-4 bg-white">
        <h2 class="heading text-center mb-3">Join the Sinowayedu Network</h2>
        <p class="text-center mb-4 text-muted">
          Sign up to access exclusive resources for international student recruitment and stay ahead in the digital age
        </p>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="row g-3">
            <div class="col-md-6">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label for="country" class="form-label">Country of Residence</label>
              <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" value="{{ old('country') }}" required>
              @error('country')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label for="city" class="form-label">City of Residence</label>
              <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city') }}" required>
              @error('city')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
              @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <label for="password_confirmation" class="form-label">Confirm Your Password</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <div class="col-md-6">
              <label for="usertype" class="form-label">Account Type</label>
              <select id="usertype" name="usertype" class="form-select @error('usertype') is-invalid @enderror" onchange="togglePartnerFields(this.value)">
                <option value="normal" {{ old('usertype') == 'normal' ? 'selected' : '' }}>Student</option>
                <option value="partner" {{ old('usertype') == 'partner' ? 'selected' : '' }}>Agent</option>
              </select>
              @error('usertype')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div id="partner_fields" style="display: {{ old('usertype') == 'partner' ? 'block' : 'none' }};" class="col-md-12 mt-3">
              <label for="partner_company" class="form-label">Company Name</label>
              <input type="text" class="form-control @error('partner_company') is-invalid @enderror" id="partner_company" name="partner_company" value="{{ old('partner_company') }}">
              @error('partner_company')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <script>
                function togglePartnerFields(value) {
                    const partnerFields = document.getElementById('partner_fields');
                    partnerFields.style.display = value === 'partner' ? 'block' : 'none';
                }
            </script>

            <div class="col-12">
              <button type="submit" class="btn primary-button w-100">Create Account</button>
            </div>
          </div>
        </form>

        <p class="text-center mt-3 text-muted">Already have an account? <a href="{{ route('login') }}">Log in here</a></p>
      </div>
    </div>
  </div>
</section>
@endsection


