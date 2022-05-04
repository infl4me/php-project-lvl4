@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('views.auth.email_verification') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('views.auth.verification_link_sent') }}
                        </div>
                    @endif

                    {{ __('views.auth.check_your_email') }}
                    {{ __('views.auth.if_not_received_email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('views.auth.resend_verification') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
