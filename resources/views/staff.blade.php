<x-layout>
    <main class="mw-100 col-11">
        <div class="col-md-12 mt-2">
        <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link "href="{{ route('admin.contact-infos') }}">Contact</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.team-members') }}">Staff</a>
                </li>

            </ul>
            <div class="card shadow-lg border-0">
           
                <div class="card-header">
                    <div class="me-5 ms-5">
                        <h1>Manage Staff</h1>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="post" action="{{ route('admin.create-members') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="degrees">Degrees</label>
                                <input type="text" name="degrees" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="text" name="position" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control-file" accept="image/*" required>
                            </div>
                            <div class="mb-5">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card mb-4 mt-3">
                <div class="card-header">
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Degrees</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teamMembers as $member)
                                <tr>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->degrees }}</td>
                                    <td>{{ $member->position }}</td>
                                    <td>
                                        <div class="text-center">
                                            <a href="{{ route('admin.edit-members', ['id' => encrypt($member->id)]) }}" class="btn btn-primary edit">
                                                <i class="fa-regular fa-pen-to-square"></i> Edit
                                            </a>
                                            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $member->id }}">
                                                <i class="fa-regular fa-square-minus"></i> Delete
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @foreach ($teamMembers as $member)
            <div class="modal fade" id="deleteModal{{ $member->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $member->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Team Member</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete {{ $member->name }}?</p>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('admin.destroy-members', ['id' => encrypt($member->id)]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </main>
</x-layout>