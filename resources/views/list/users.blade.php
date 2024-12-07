@extends('base')

@section('content')
<header>
    <h1>User List</h1>
</header>

<section>

    <div class="d-flex justify-content-center mb-3">
        <button class="btn btn-success me-2" onclick="window.location.href='{{ url('/users/create') }}'">Add New User</button>
        <button class="btn btn-primary" onclick="window.location.href='{{ url('/') }}'">Back</button>
    </div>

    <div class="d-flex justify-content-center">
        <div class="table-responsive" style="max-width: 80%; min-width: 50%; margin: auto;">
            <table id="userTable" class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Referral Code</th>
                        <th>Referral Count</th>
                        <th>Bonus Balance (RM)</th>
                    </tr>
                </thead>
                <tbody>
                    @if($users->count() > 0)
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" style="width: 200px" onclick="window.location.href='{{ url('/referrals/' . $user->id) }}'">
                                        {{ $user->name }}
                                    </button>                            
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->referral_code }}</td>
                                <td>{{ $user->referrals->count() }}</td>
                                <td>{{ number_format($user->bonus_balance, 2) }}</td>
                            </tr>
                        @endforeach
                    {{-- @else
                        <tr>
                            <td colspan="6">No users found</td>
                        </tr> --}}
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
        $('#userTable').DataTable();
    });
</script>
@endpush
