<x-layout>
    <main class="mw-100 col-11">
        <div class="col-12 mt-3">
            <div class="card shadow-lg col-8 mx-auto"> <!-- Center the card -->
                <div class="card-body">
                    <div class="text-center">
                        <h3>Let's create a new user</h3>
                    </div>
                    <form method="post" action="{{ route('admin.users_store') }}">
                        @csrf
                        <div class="mb-3">
    <label for="first_name" class="form-label">First Name</label>
    <input type="text" class="form-control" id="first_name" name="first_name" required>
</div>
                        <div class="mb-3">
                            <label for="middle_name" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="middle_name" name="middle_name">
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="user_level" class="form-label">User Level</label>
                            <select class="form-select" id="user_level" name="user_level" required>
                                <option>Select</option>
                                <option value="ADMIN">Admin</option>
                                <option value="MIDWIFE">Midwife</option>
                            </select>
                        </div>
  
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-layout>