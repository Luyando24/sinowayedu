@extends('layouts.app')

@section('title', 'Payment Instructions')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow rounded-4">
                <div class="card-header" style="background-color: #3EA2A4; color: white;">
                    <h4 class="mb-0 heading" style="color: #fff">Payment Instructions</h4>
                </div>
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <i class="fas fa-credit-card fa-4x secondary-color mb-3"></i>
                        <h5 class="heading">Complete Your Premium Subscription</h5>
                        <p class="text-muted">
                            To activate your premium subscription, please make a payment using one of the methods below.
                        </p>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="alert alert-info">
                                <strong>Subscription Fee:</strong> ¥4599 per year
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <h5 class="heading">Payment Methods</h5>
                            
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6 class="card-title"><i class="fas fa-university me-2"></i>Bank Transfer</h6>
                                    <p class="card-text">
                                        <strong>Bank:</strong> Bank of China<br>
                                        <strong>Account Name:</strong> Sinoway Education<br>
                                        <strong>Account Number:</strong> 6217 0001 8888 8888<br>
                                        <strong>Reference:</strong> Your email address
                                    </p>
                                </div>
                            </div>
                            
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6 class="card-title"><i class="fab fa-alipay me-2"></i>Alipay</h6>
                                    <div class="row align-items-center">
                                        <div class="col-md-8">
                                            <p class="card-text">
                                                <strong>Account:</strong> finance@sinowayedu.com<br>
                                                <strong>Name:</strong> Sinoway Education<br>
                                                <strong>Message:</strong> Your email address
                                            </p>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <img src="{{ asset('images/alipay-qr.jpg') }}" alt="Alipay QR Code" class="img-fluid" style="max-width: 120px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6 class="card-title"><i class="fab fa-weixin me-2"></i>WeChat Pay</h6>
                                    <div class="row align-items-center">
                                        <div class="col-md-8">
                                            <p class="card-text">
                                                <strong>Account:</strong> SinowayEdu<br>
                                                <strong>Message:</strong> Your email address
                                            </p>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <img src="{{ asset('images/wechat.png') }}" alt="WeChat QR Code" class="img-fluid" style="max-width: 120px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <h5 class="heading">After Payment</h5>
                            <p>
                                After completing your payment, please contact us to confirm your payment and activate your subscription.
                                Your account will be upgraded within 24 hours after payment confirmation.
                            </p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="heading">Contact Us</h5>
                            <div class="d-flex flex-wrap gap-3 justify-content-center mt-3">
                                <a href="https://wa.me/8614768628270" class="btn btn-outline-success">
                                    <i class="fab fa-whatsapp me-2"></i>WhatsApp
                                </a>
                                <a href="#" class="btn btn-outline-success">
                                    <i class="fab fa-weixin me-2"></i>WeChat ID: SinowayEdu
                                </a>
                                <a href="mailto:info@sinowayedu.com" class="btn btn-outline-primary">
                                    <i class="fas fa-envelope me-2"></i>Email Us
                                </a>
                                <a href="tel:+8614768628270" class="btn btn-outline-primary">
                                    <i class="fas fa-phone me-2"></i>Call Us
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection