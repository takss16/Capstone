<x-layout>
    <main class="mw-100 col-11">
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
        <div class="col-12 mt-3">
            <div class="card shadow-lg col-8 mx-auto"> <!-- Center the card -->
                <div class="card-body">
                    <div class="text-center">
                        <h3>User Profile</h3>
                    </div>
                    <form method="post" action="{{ route('admin.updateUser', ['id' => encrypt($user->id)]) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" value="{{ $user->first_name}}" id="first_name" name="first_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="middle_name" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" value="{{ $user->middle_name }}" id="middle_name" name="middle_name">
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" value="{{ $user->last_name }}" id="last_name" name="last_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" id="email" name="email" readonly>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#resetPasswordModal{{ $user->id }}">
                                Delete
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
                                            Are you sure you want to delete this account for {{ $user->first_name }} {{ $user->last_name }}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          
                                            <a href="{{ route('admin.deleteUser', ['id' => encrypt($user->id)]) }}" class="btn btn-danger">Delete</a>
                                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-layout>