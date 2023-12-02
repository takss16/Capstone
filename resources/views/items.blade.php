<x-layout>           
    <main class="mw-100 col-11">
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h2>Manage Billables</h2>

    <form action="{{ route('admin.items.store') }}" method="POST">
    @csrf
    <div class="row g-3">
                <div class="mb-3 col-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" oninput="convertToUppercase(this)"required>
                </div>
                <div class="mb-3 col-6">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price"  required>
                </div>

       
                <div class="mb-3 col-6">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-select" id="type" name="type" required>
                        <option value="medicine">Medicine</option>
                        <option value="service">Service</option>
                        <option value="item">Item</option>
                    </select>
                </div>

    </div>

    <div class="text-center mt-5 mb-5">
                <button type="submit" class="btn btn-primary">Add Item</button>
            </div>
</form>


             <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Billables
                            </div>
                            <div class="card-body">
                            <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Type</th>
                                           
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>₱{{ number_format($item->price, 2, '.', ',') }}</td>
                                        <td>{{ $item->type }}</td>

                                        <td>
                                            <div class="text-center">
                                                <button class="btn btn-primary edit" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                                    <i class="fa-regular fa-pen-to-square"></i> Edit
                                                </button>
                                                <button type="button" class="btn btn-danger delete" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
                                                    <i class="fa-solid fa-trash"></i> Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- ... -->

                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('admin.items.destroy', ['item' => $item->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">Confirm Deletion</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this item?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('admin.items.update', ['item' => $item->id]) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Item</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <div class="mb-3">
                                                                    <label for="name" class="form-label">Name</label>
                                                                    <input type="text" name="name" value="{{ $item->name }}" class="form-control">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="price" class="form-label">Price</label>
                                                                    <input type="number" name="price" value="{{ $item->price }}" class="form-control">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="type" class="form-label">Type</label>
                                                                    <select class="form-select" name="type">
                                                                        <option value="medicine" {{ $item->type === 'medicine' ? 'selected' : '' }}>Medicine</option>
                                                                        <option value="service" {{ $item->type === 'service' ? 'selected' : '' }}>Service</option>
                                                                        <option value="item" {{ $item->type === 'item' ? 'selected' : '' }}>Item</option>
                                                                    </select>
                                                                </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
@endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
    </main>
</x-layout>