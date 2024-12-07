@extends('base')

@section('content')
    <header>
        <h1>Join Our Personalized Referral</h1>
        <p>Earn RM25 for every friend you refer!</p>
    </header>

    <section>
        <h2>How It Works</h2>
        <p>Sign up and start saving with us. Invite your friends and earn rewards when they join!</p>
        <div class="cta">
            <button onclick="window.location.href='{{ url('/users') }}'">Get Started</button>
        </div>
    </section>
@endsection