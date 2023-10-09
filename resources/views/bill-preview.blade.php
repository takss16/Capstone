<x-layout>
    <main class="mw-100 col-11">
        <div class="row mt-5">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-shopping-cart me-1"></i>
                        Current Bills of <b>{{ $patient->firstname }} {{ $patient->lastname }}</b>
                    </div>
                    <div class="card-body">
                        <ul id="selected-items" class="list-group">
                            @foreach($processedData['selectedItems'] as $item)
                            <li class="list-group-item">
                                {{ $item->name }} ({{ $processedData['itemQuantities'][$item->id] }}) - ₱{{ number_format($item->price * $processedData['itemQuantities'][$item->id], 2) }}
                            </li>
                            @endforeach

                            @foreach($processedData['selectedPackages'] as $package)
                            <li class="list-group-item">
                                {{ $package->name }} (Package)
                                <ul>
                                    @foreach($package->items as $item)
                                    <li>
                                        {{ $item->name }} - ₱{{ number_format($item->price, 2) }}
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-dollar-sign me-1"></i>
                        Total Amount
                    </div>
                    <div class="card-body">
                        <p class="card-text" id="total-amount">
                            Total: ₱{{ number_format($processedData['totalAmount'], 2) }}<br>
                            Total Discount: ₱{{ number_format($processedData['totalDiscount'], 2) }}<br>
                            Subtotal: ₱{{ number_format($processedData['subtotal'], 2) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('checkout', ['patientId' => $patient->id]) }}" class="btn btn-secondary">Back to Checkout</a>
            </div>
            <div class="col-md-6">
            <form method="POST" action="{{ route('record.dischargeAll', ['id' => $patient->id]) }}">
            @csrf
            <button type="submit" class="btn btn-danger">Discharge All Records</button>
        </form>
            </div>
        </div>



    </main>
</x-layout>