<x-layout-portal>
    <main class="mw-100 col-11 mt-5">
        <div class="d-flex justify-content-center mt-3">
            <div class="col-8 ">
                <div class="card shadow-lg ">
                    <div class="container  col-md-12">
                        <div class="text-center mt-3">
                            <h3>Change Password</h3>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">

                                <div class="card-body">
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
                                    <form method="POST" action="{{ route('account.changePassword') }}" id="change-password-form">
                                        @csrf

                                        <div class="form-group">
                                            <label for="current_password">Current Password</label>
                                            <input type="password" name="current_password" id="current_password" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="new_password">New Password</label>
                                            <input type="password" name="new_password" id="new_password" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="new_password_confirmation">Confirm New Password</label>
                                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
                                            <span id="new_password_confirmation_error" class="text-danger"></span>
                                        </div>
                                      
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
</x-layout-portal>