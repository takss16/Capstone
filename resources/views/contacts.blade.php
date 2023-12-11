<x-layout>
    <main class="mw-100 col-11">
        <div class="col-md-12 mt-2">
        <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" >Contact</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.team-members') }}">Staff</a>
                </li>
            </ul>
            <div class="card shadow-lg border-0"> <!-- Add the border-0 class to remove the border -->
                <div class="card-header ">
                    <div class="me-5 ms-5">
                        <h1>Manage Contacts</h1>
                        @if ($contactInfos->isNotEmpty())
                        <section class="maternal-details-section mt-2">
                            <h5 class="section-title">Contact Information</h5>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Location</th>
                                        <td> {{ $contactInfos[0]->location }}</td>

                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td> {{ $contactInfos[0]->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Facebook</th>
                                        <td>{{ $contactInfos[0]->facebook ?? 'N/A' }}</p>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{ $contactInfos[0]->phone }}</td>
                                    </tr>

                                </tbody>

                            </table>
                        </section>
                        <div class="row g-3 mt-3 mb-3 text-center">
                            <div class="col-6 mx-auto">
                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <i class="fa-regular fa-square-minus"></i> Delete
                                </a>
                            </div>

                            <div class="col-6 mx-auto">
                                <a href="#" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#updateModal">
                                    <i class="fa-solid fa-pen-to-square"></i> Update
                                </a>
                            </div>
                        </div>
                           <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Delete Contact Information</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this contact information?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form method="POST" action="{{ route('admin.contact.destroy', $contactInfos[0]->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

  
                            <!-- Update Modal -->
                            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateModalLabel">Update Contact Information</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('admin.contact.update', $contactInfos[0]->id) }}">
                                                @csrf
                                                @method('PUT')

                                                <div class="form-group">
                                                    <label for="location">Location</label>
                                                    <input type="text" name="location" class="form-control" value="{{ $contactInfos[0]->location }}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" class="form-control" value="{{ $contactInfos[0]->email }}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="facebook">Facebook</label>
                                                    <input type="text" name="facebook" class="form-control" value="{{ $contactInfos[0]->facebook }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" name="phone" class="form-control" value="{{ $contactInfos[0]->phone }}" required>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @else
                        <h2>Create Contact Information</h2>
                        <form method="POST" action="{{ route('admin.contact.store') }}">
                            @csrf


                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" name="location" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="text" name="facebook" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="contact" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Create Contact Information</button>
                        </form>
                        @endif

                    </div>
                </div>
            </div>
    </main>
</x-layout>