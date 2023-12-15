<x-layout>
    <main class="mw-100 col-11">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
        <div class="text-end mb-3">
            <a  href="{{ route('admin.create-user') }}" class="btn btn-primary">
                <i class="fa-solid fa-user-plus"></i> Add Users
            </a>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Users
            </div>
            <div class="card-body">
            <table id="datatablesSimple">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th> <!-- Add a new column for actions -->
        </tr>
    </thead>
    <tbody>
        @foreach($adminUsers as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>
                {{ $user->first_name }}
                {{ $user->middle_name }}
                {{ $user->last_name }}
            </td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->user_level }}</td>
            <td>
          
            <a href="{{ route('admin.usersPreview', ['id' => encrypt($user->id)]) }}" class="btn btn-primary">
                        <i class="fa-solid fa-user"></i>Profile
                    </a>

                <!-- Button to trigger the reset password modal -->
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#resetPasswordModal{{ $user->id }}">
                <i class="fa-solid fa-clock-rotate-left"></i> Reset Password
                </button>

                <!-- Reset Password Modal -->
                <div class="modal fade" id="resetPasswordModal{{ $user->id }}" tabindex="-1" aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="resetPasswordModalLabel">Reset Password Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to reset the password for {{ $user->first_name }} {{ $user->last_name }}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form method="post" action="{{ route('admin.reset-password', ['user' => $user->id]) }}">
                    @csrf
                    <!-- Your form fields go here -->
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


            </div>

        </div>
    </main>
</x-layout>