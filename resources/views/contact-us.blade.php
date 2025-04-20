@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<section class="container my-5">
  <h2 class="heading text-center mb-4">Get in Touch</h2>

  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <form action="{{ route('contact.submit') }}" method="POST" class="shadow rounded-4 p-4 bg-white">
        @csrf

        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="mb-3">
          <label for="name" class="form-label">Your Name</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
          <label for="subject" class="form-label">Subject</label>
          <input type="text" class="form-control" id="subject" name="subject" required>
        </div>

        <div class="mb-3">
          <label for="message" class="form-label">Your Message</label>
          <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn primary-button w-100">Send Message</button>
      </form>
    </div>
  </div>

  <div class="row justify-content-center mt-5">
    <div class="col-md-6 text-center">
      <h5>Contact Details</h5>
      <p>Email: info@sinoway.com</p>
      <p>Phone: +86 123 456 7890</p>
      <p>Address: Beijing, China</p>
    </div>
  </div>
</section>
@endsection
