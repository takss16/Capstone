<x-layout>
    <main class="mw-100 col-11">
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-6 text-start mb-3">
                    <a href="{{ route('admin.ViewRecord', ['id' => encrypt($patient->id)]) }}" class="btn btn-primary">
                        <i class="fa-solid fa-circle-chevron-left"></i> Back
                    </a>
                </div>
                <div class="col-md-6 text-end mb-3">
                    @if($checkup)
                    <a href="{{ route('admin.checkupmed', ['id' => encrypt($patient->id)]) }}" class="btn btn-primary">
                        <i class="fa-solid fa-backward"></i> Previews
                    </a>
                    @endif

                    <a href="{{ route('admin.checkupHistory', ['id' => encrypt($patient->id)]) }}" class="btn btn-primary">
                        <i class="fa-solid fa-clock-rotate-left"></i> History
                    </a>
                </div>

            </div>
            <div class="col-12 mt-3">
                <div class="card shadow-lg col-12">
                    <div class="card-body">

                        <form action="{{ route('admin.storeCheckup', ['id' => $patient->id]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="visit-date" class="form-label">Date of Visit</label>
                                    <input type="date" id="visit-date" name="visit-date" class="form-control" readonly><br>
                                </div>
                                <div class="col-md-6">
                                    <label for="visit-time" class="form-label">Time of Visit</label>
                                    <input type="time" id="visit-time" name="visit-time" class="form-control" readonly><br>
                                </div>
                                <div class="col-12">
                                    <label for="reason" class="form-label">Notes*</label>
                                    <textarea id="reason" name="reason" rows="4" class="form-control" oninput="convertToUppercase(this)" required></textarea><br>
                                </div>
                                <div class="col-md-6">
                                    <label for="next-visit" class="form-label">Expected Date of Next Visit</label>
                                    <input type="date" id="next-visit" name="next-visit" class="form-control" min="<?= date('Y-m-d') ?>"><br>
                                </div>
                                <div class="col-md-6">
                                    <label for="bp" class="form-label">Blood Pressure*</label>
                                    <input type="text" id="bp" name="bp" pattern="\d+/\d+" placeholder="e.g., 120/80" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="lmp" class="form-label">Last Menstrual Period*</label>
                                    @if (is_null($checkup))
                                    <input type="date" id="lmp" name="lmp" class="form-control" required onchange="calculateEDCAndAOG()" max="<?php echo date('Y-m-d', strtotime('-1 day')); ?>">
                                    @else
                                    <input type="date" id="lmp" name="lmp" value="{{ $checkup->lmp }}" class="form-control" required onchange="calculateEDCAndValidate()" readonly>
                                    @endif
                                    <span id="lmp-error" class="text-danger"></span> <!-- This is where the error message should appear -->
                                </div>

                                <div class="col-md-4">
                                    <label for="aog" class="form-label">Age of Gestation</label>
                                    <input type="text" id="aog" name="aog" class="form-control" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="edc" class="form-label">Estimated Due Date</label>
                                    <input type="date" id="edc" name="edc" class="form-control" readonly>
                                </div>

                                <div class="col-md-4">
                                    <label for="fht" class="form-label">Fetal Heart Tones*</label>
                                    <input type="text" id="fht" name="fht" class="form-control" required placeholder="e.g., 24bpm" pattern="\d{1,3}bpm">
                                </div>
                                <div class="col-md-4">
                                    <label for="weight" class="form-label">Weight</label>
                                    <input type="text" id="weight" name="weight" class="form-control" placeholder="e.g., 23kg" pattern="\d{1,3}kg">
                                </div>
                                <div class="col-md-4">
                                    <label for="fh" class="form-label">Fundic Height*</label>
                                    <input type="text" id="fh" name="fh" class="form-control" required placeholder="e.g., 120cm" pattern="\d{1,3}cm">
                                </div>

                            </div>
                            <hr>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-download"></i> Save Checkup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </main>
</x-layout>