<x-layout-print>
    <div class="container mt-4 col-12">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="border p-4">
                    <div class="row">
                        <div class="col text-center">
                            <h5 class="text-center">Pabustan Birthing Clinic</h5>
                            <span class="fw-bold">0192 RIVERSIDE ST DOLORES CAPAS TARLAC</span>
                        </div>
                    </div>
                    <hr>
                    <h3 class="text-center mt-4">Referral Form</h3>

                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th class="text-start" style="width: 15%; ">Patient Name:</th>
                                <td class="fw-bold">{{ $patient->firstname }} {{ $patient->midlename }} {{ $patient->lastname }}</td>
                                <th class="text-start" style="width: 10%; ">Age:</th>
                                <td class="fw-bold" style="width: 10%; ">{{ $patient->age }}</td>
                                <th class="text-start" style="width: 10%; ">Status:</th>
                                <td class="fw-bold" style="width: 10%; ">{{ $patient->civilstatus }}</td>
                            </tr>
                            <tr>
                                <th class="text-start">Address:</th>
                                <td colspan="3" class="fw-bold">{{ $patient->address }}</td>
                                <th class="text-start">Mobile No.:</th>
                                <td class="fw-bold">{{ $patient->contact }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mb-5">
                        <h6>Brief Clinical History and Physical Examination Findings:</h6>
                        <textarea style="border: 1px dotted #000; width: 100%; min-height: 50px;"></textarea>
                    </div>

                    <!-- Add more spacing here (empty paragraphs with margins) -->
                    <div class="mb-5"></div>
                    <div class="mb-5"></div>
                    <div class="mb-5"></div>

                    <div class="mt-5" style="display: flex; justify-content: space-between;">
                        <div style="text-align: center;">
                            <div style="border-bottom: 1px solid #000; width: 200px; margin: 0 auto;"></div>
                            <p>Patient’s/Relative’s Signature Over Printed Name</p>
                        </div>
                        <div style="text-align: center;">
                            <div style="border-bottom: 1px solid #000; width: 200px; margin: 0 auto;"></div>
                            <p>Midwife on Duty</p>
                        </div>
                    </div>
                    <hr>
                    <h3 class="text-center mt-4"> Return Referral Form</h3>

                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th class="text-start" style="width: 15%; ">Patient Name:</th>
                                <td class="fw-bold">{{ $patient->firstname }} {{ $patient->midlename }} {{ $patient->lastname }}</td>
                                <th class="text-start" style="width: 10%; ">Age:</th>
                                <td class="fw-bold" style="width: 10%; ">{{ $patient->age }}</td>
                                <th class="text-start" style="width: 10%; ">Status:</th>
                                <td class="fw-bold" style="width: 10%; ">{{ $patient->civilstatus }}</td>
                            </tr>
                            <tr>
                                <th class="text-start">Address:</th>
                                <td colspan="3" class="fw-bold">{{ $patient->address }}</td>
                                <th class="text-start">Mobile No.:</th>
                                <td class="fw-bold">{{ $patient->contact }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="col-12">
                        <label for="" class="form-label">Refer Back to: (Name of MW and Clinic)</label>
                        <input type="text" id="" name="" class="form-control" readonly><br>
                    </div>
                    <div class="col-12" style="display: flex;">
                        <label for="" class="form-label">Address</label>
                        <input type="text" id="" name="" class="form-control" readonly>
                    </div>

                  <hr>
                    <div class="col-12">
                        <label for="" class="form-label">From Referral Unit: (Hospital/L-Clinic/Doctor)</label>
                        <input type="text" id="" name="" class="form-control" readonly><br>
                    </div>
                    <div class="col-12" style="display: flex;">
                        <label for="" class="form-label">Address</label>
                        <input type="text" id="" name="" class="form-control" readonly>
                    </div>
                    <div class="mt-5">
                        <h6>Services/Procedures Performed</h6>
                        <textarea style="border: 1px dotted #000; width: 100%; min-height: 50px;"></textarea>
                    </div>
                    <div class="mb-5">
                        <h6>Instruction to Midwife</h6>
                        <textarea style="border: 1px dotted #000; width: 100%; min-height: 50px;"></textarea>
                    </div>
                  


                    <div style="text-align: center;">
                            <div style="border-bottom: 1px solid #000; width: 200px; margin: 0 auto;"></div>
                            <p>Signature of Service Provider Over Printed Name</p>
                        </div>
                    <!-- Your content goes here -->

                    <!-- Print Button outside of the x-layout-print element -->
                    <div class="text-center no-print">
                        <button type="button" class="btn btn-primary" onclick="window.print()">
                            <i class="fa-solid fa-print"></i> Print
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout-print>