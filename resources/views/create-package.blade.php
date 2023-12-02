<x-layout>
    <main class="mw-100 col-11">
        <h2>Add Packages</h2>

        <form action="{{ route('admin.packages.store') }}" method="POST">
            @csrf
            <div class="mb-3 col-8">
                <label for="name">Package Name</label>
                <input type="text" name="name" class="form-control col-8 mx-auto" oninput="convertToUppercase(this)" required><br>

                <label for="description">Package Description</label>
                <input type="text" name="description" class="form-control col-8 mx-auto" oninput="convertToUppercase(this)" required><br>
            </div>

            <!-- Create a navbar to separate items by type -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#medicine">Medicine</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#item">Item</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#service">Service</a>
                </li>
            </ul>

            <!-- Create tab content for each item type -->
            <div class="card mt-3">
                <div class="card-body" style="max-height: 300px; overflow-y: auto;">
                    <div class="tab-content mt-3">
                        <div class="tab-pane fade show active" id="medicine">
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                <input type="text" class="form-control mb-2 search-input" id="medicine-search-input" placeholder="Search for Medicines">

                                <table class="table" id="medicine-table">
                                    <thead>
                                        <tr>
                                            <th>Item Name</th>
                                            <th>Select</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($items->where('type', 'medicine') as $item)
                                        <tr>
                                            <td>
                                                <label class="form-check-label mb-0" for="item_{{ $item->id }}">{{ $item->name }}</label>
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="checkbox" name="items[]" value="{{ $item->id }}" id="item_{{ $item->id }}" data-name="{{ $item->name }}" data-price="{{ $item->price }}">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Item tab content -->
                        <div class="tab-pane fade" id="item">
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                <input type="text" class="form-control mb-2 search-input" id="item-search-input" placeholder="Search for Items">

                                <table class="table" id="item-table">
                                    <thead>
                                        <tr>
                                            <th>Item Name</th>
                                            <th>Select</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($items->where('type', 'item') as $item)
                                        <tr>
                                            <td>
                                                <label class="form-check-label mb-0" for="item_{{ $item->id }}">{{ $item->name }}</label>
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="checkbox" name="items[]" value="{{ $item->id }}" id="item_{{ $item->id }}" data-name="{{ $item->name }}" data-price="{{ $item->price }}">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Service tab content -->
                        <div class="tab-pane fade" id="service">
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                <input type="text" class="form-control mb-2 search-input" id="service-search-input" placeholder="Search for Services">

                                <table class="table" id="service-table">
                                    <thead>
                                        <tr>
                                            <th>Item Name</th>
                                            <th>Select</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($items->where('type', 'item') as $item)
                                        <tr>
                                            <td>
                                                <label class="form-check-label mb-0" for="item_{{ $item->id }}">{{ $item->name }}</label>
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="checkbox" name="items[]" value="{{ $item->id }}" id="item_{{ $item->id }}" data-name="{{ $item->name }}" data-price="{{ $item->price }}">
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mb-5 mt-3">
                <button type="submit" class="btn btn-primary">Add Package</button>
            </div>
        </form>
        <table class="table table-bordered-dark">
            <thead>
                <tr>
                    <th>Package Name</th>
                    <th>Item Name</th>
                    <th>Item Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($packages as $package)
                @foreach ($package->items as $index => $item)
                <tr>
                    @if ($index === 0)
                    <td rowspan="{{ count($package->items) }}">{{ $package->name }}</td>
                    @endif
                    <td>{{ $item->name }}</td>
                    <td>₱{{ number_format($item->price, 2, '.', ',') }}</td>
                    @if ($index === 0)
                    <td rowspan="{{ count($package->items) }}">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $package->id }}">
                            Edit
                        </button>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $package->id }}">
                            Delete
                        </button>
                    </td>
                    @endif
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
        <!-- Edit and Delete Modals -->
        @foreach ($packages as $package)
        <div class="modal fade" id="editModal{{ $package->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $package->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $package->id }}">Edit Package</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.packages.update', $package->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <label for="name">Package Name</label>
                            <input type="text" name="name" value="{{ $package->name }}" required class="form-control">

                            <label>Choose Items</label><br>
                            @foreach($items as $item)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="items[]" value="{{ $item->id }}" @if($package->items->contains($item->id)) checked @endif>
                                <label class="form-check-label">{{ $item->name }}</label>
                            </div>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteModal{{ $package->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $package->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel{{ $package->id }}">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this package?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form action="{{ route('admin.packages.destroy', $package->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </main>
    <script>
        function filterTable(inputId, tableId) {
            const input = document.getElementById(inputId);
            const table = document.getElementById(tableId);
            const rows = table.getElementsByTagName("tr");

            input.addEventListener("input", function() {
                const filter = input.value.toLowerCase();
                for (let i = 1; i < rows.length; i++) {
                    const name = rows[i].getElementsByTagName("td")[0];
                    if (name) {
                        const text = name.textContent || name.innerText;
                        if (text.toLowerCase().indexOf(filter) > -1) {
                            rows[i].style.display = "";
                        } else {
                            rows[i].style.display = "none";
                        }
                    }
                }
            });
        }

        // Add event listeners for each tab's search input and table
        filterTable("medicine-search-input", "medicine-table");
        filterTable("item-search-input", "item-table");
        filterTable("service-search-input", "service-table");
    </script>
</x-layout>