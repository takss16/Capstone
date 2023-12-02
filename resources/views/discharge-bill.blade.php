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
                            @if($bill->billItems->isNotEmpty())

                            @foreach($bill->billItems as $billItem)
                            <li class="list-group-item">
                                {{ $billItem->item->name }} - Quantity: {{ $billItem->quantity }} - Price: ₱{{ number_format($billItem->price, 2) }}
                            </li>
                            @endforeach
                            @else
                            @endif
                            @if($bill->billPackages->isNotEmpty())
                            @foreach($bill->billPackages as $billPackage)
                            <li class="list-group-item">
                                {{ $billPackage->packages->name ?? 'Package not available' }}
                                <ul>
                                    @foreach( $billPackage->packages->items as $item)
                                    <li>{{ $item->name }} - Price: ₱{{ number_format($item->price, 2) }}</li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                            @else
                            <p>No bill packages available.</p>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                     
                    ₱ Total Amount
                    </div>
                    <div class="card-body">
                        <p class="card-text" id="total-amount">
                            <li>Total Amount: ₱{{ number_format($bill->total_amount, 2) }}</li>
                            <li>Total Discount: ₱{{ number_format($bill->total_discount, 2) }}</li>
                            <li>Subtotal: ₱{{ number_format($bill->subtotal, 2) }}</li>
                        </p>
                    </div>
                </div>
            </div>
            
        </div>
        <a href="{{ route('admin.printBillPreview', ['patientId' => encrypt($patient->id)]) }}" target="_blank" class="btn btn-primary">Print</a>
    </main>
</x-layout>