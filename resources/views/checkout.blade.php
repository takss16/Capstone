<x-layout>
    <main class="mw-100 col-11">
        <h2>Checkout</h2>
        <form action="{{ route('billing', ['patientId' => $patient->id]) }}" method="post" id="billing-form">
            @csrf
            <div class="row">
                <div class="col-md-8">
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
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#packages">Packages</a>
                        </li>
                    </ul>

                    <div class="card mt-3">
                        <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                            <div class="tab-content mt-3">
                                <!-- Medicine tab content -->
                                <div class="tab-pane fade show active" id="medicine">
                                    <div class="row row-cols-1 row-cols-md-3 g-4">
                                        @foreach($items->where('type', 'medicine') as $item)
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-body">
                                                    <input class="form-check-input" type="checkbox" name="items[]" value="{{ $item->id }}" id="item_{{ $item->id }}" data-name="{{ $item->name }}" data-price="{{ $item->price }}" @if(in_array($item->id, $selectedItemIds)) checked @endif>
                                                    <label class="form-check-label mb-0" for="item_{{ $item->id }}">{{ $item->name }}</label>
                                                    <div class="item-row">
                                                        <input class="item-quantity" type="number" name="item_quantity[{{ $item->id }}]" value="{{ isset($selectedItemQuantities[$item->id]) ? $selectedItemQuantities[$item->id] : 1 }}" min="1">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Item tab content -->
                                <!-- Item tab content -->
                                <div class="tab-pane fade" id="item">
                                    <div class="row row-cols-1 row-cols-md-3 g-4">
                                        @foreach($items->where('type', 'item') as $item)
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-body">
                                                    <input class="form-check-input" type="checkbox" name="items[]" value="{{ $item->id }}" id="item_{{ $item->id }}" data-name="{{ $item->name }}" data-price="{{ $item->price }}" {{ in_array($item->id, $selectedItemIds) ? 'checked' : '' }}>
                                                    <label class="form-check-label mb-0" for="item_{{ $item->id }}">{{ $item->name }}</label>
                                                    <!-- <p class="card-text">₱{{ number_format($item->price, 2, '.', ',') }}</p> -->
                                                    <div class="item-row">
                                                        <input class="item-quantity" type="number" name="item_quantity[{{ $item->id }}]" value="{{ isset($selectedItemQuantities[$item->id]) ? $selectedItemQuantities[$item->id] : 1 }}" min="1">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Service tab content -->
                                <div class="tab-pane fade" id="service">
                                    <div class="row row-cols-1 row-cols-md-3 g-4">
                                        @foreach($items->where('type', 'service') as $item)
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-body">
                                                    <input class="form-check-input" type="checkbox" name="items[]" value="{{ $item->id }}" id="item_{{ $item->id }}" data-name="{{ $item->name }}" data-price="{{ $item->price }}" {{ in_array($item->id, $selectedItemIds) ? 'checked' : '' }}>
                                                    <label class="form-check-label mb-0" for="item_{{ $item->id }}">{{ $item->name }}</label>
                                                    <!-- <p class="card-text">₱{{ number_format($item->price, 2, '.', ',') }}</p> -->
                                                    <div class="item-row">
                                                        <input class="item-quantity" type="number" name="item_quantity[{{ $item->id }}]" value="{{ isset($selectedItemQuantities[$item->id]) ? $selectedItemQuantities[$item->id] : 1 }}" min="1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Packages tab content -->
                                <div class="tab-pane fade" id="packages">
                                    <div class="row row-cols-1 row-cols-md-3 g-4">
                                        @foreach ($packages as $package)
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $package->name }}</h5>
                                                    <input class="form-check-input package-checkbox" type="checkbox" name="packages[]" value="{{ $package->id }}" id="package_{{ $package->id }}" data-name="{{ $package->name }}" data-items="{{ json_encode($package->items) }}" {{ in_array($package->id, $selectedPackageIds) ? 'checked' : '' }}>
                                                    <ul class="list-group list-group-flush package-items" id="package_items_{{ $package->id }}">
                                                        <!-- Add package items here if needed -->
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Generate Bill</button>
        </form>
        </div>

        <div class="col-md-4 mt-5">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-shopping-cart me-1"></i>
                    Current Bills of <b>{{ $patient->firstname }} {{ $patient->lastname }}</b>
                </div>
                <div class="card-body">
                    <ul id="selected-items" class="list-group">
                        <!-- Display selected items here -->
                    </ul>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-peso-sign"></i>
                    Total Amount
                </div>
                <div class="card-body">
                    <p class="card-text" id="total-amount">Total: ₱0.00</p>
                </div>
            </div>
        </div>
        </div>
    </main>
</x-layout>