@extends('base')

@section('content')
<header>
    <h1>Referrals List</h1>
    <p>Referer's Name : {{ $user->name }}</p>
</header>

<section>

    <div class="d-flex justify-content-center mb-3">
        <button class="btn btn-primary" onclick="window.location.href='{{ url('/users') }}'">Back</button>
    </div>

    <div class="d-flex justify-content-center">
        <div class="table-responsive" style="max-width: 80%; min-width: 50%; margin: auto;">
            <table id="referralsTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @if($referrals->count() > 0)
                        @foreach($referrals as $referral)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $referral->user->name }}</td>
                                <td>{{ $referral->user->email }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#referralsTable').DataTable();
    });
</script>
@endpush
