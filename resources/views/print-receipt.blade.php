<x-layout-print>
    <main class="mw-100 col-11">
        <div class="row mt-5">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-m1-1 text-center">
                                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 40px;">

                            </div>
                            <div class="col text-center">
                                <h2 class="text-center">Pabustan Birthing Clinic</h2>
                                <span class="fw-bold">0192 RIVERSIDE ST DOLORES CAPAS TARLAC</span> <br>                    
                            </div>
                        </div>

                    </div>
                    <div class="text-center">
                    <span > Official Bills of <b>{{ $patient->firstname }} {{ $patient->lastname }}</b></span>               +
                    </div>
                    <div class="card-body">
                        <ul id="selected-items" class="list-group">
                            @if ($bill->billItems->isNotEmpty())
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bill->billItems as $billItem)
                                    <tr>
                                        <td>{{ $billItem->item->name }}</td>
                                        <td>{{ $billItem->quantity }}</td>
                                        <td>₱{{ number_format($billItem->price, 2) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            {{-- Display something if the bill items are empty --}}
                            <p>No bill items available.</p>
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
        <div class="text-center no-print">
            <button type="button" class="btn btn-primary" onclick="window.print()">
                <i class="fa-solid fa-print"></i> Print
            </button>
        </div>
    </main>
</x-layout-print>