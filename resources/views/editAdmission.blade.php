<!-- editAdmission.blade.php -->

<x-layout>
    <main class="mw-100 col-11">
        <div class="container bg">
            <div>
                <div class="text-center mt-3">
                    <h3>Edit Admission Information</h3>
                </div>
                <div class="bg-dark col-9 mt-3"></div>
                
                <form action="{{ route('updateadmission', ['id' => $patient->id]) }}" method="POST">
                    @csrf
                    <div class="row mb-2 mt-2">
                        <div class="col-md-6">
                            <label for="admission-date" class="form-label">Date of Admission:</label>
                            <input type="date" id="admission-date" value="{{ $admission->admission_date }}" name="admission-date" class="form-control"><br>
                        </div>
                        <div class="col-md-6">
                            <label for="discharge-date" class="form-label">Date of Discharge:</label>
                            <input type="date" id="discharge-date" value="{{ $admission->discharge_date }}" name="discharge-date" class="form-control"><br>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="admission-diagnosis" class="form-label">Admission Diagnosis:</label>
                        <textarea id="admission-diagnosis" name="admission-diagnosis" class="form-control">{{ $admission->admission_diagnosis }}</textarea><br>
                    </div>

                    <div class="col-12">
                        <label for="services-performed" class="form-label">Services Performed:</label>
                        <textarea id="services-performed" name="services-performed" class="form-control">{{ $admission->services_performed }}</textarea><br>
                    </div>

                    <div class="col-12">
                        <label for="final-diagnosis" class="form-label">Final Diagnosis:</label>
                        <textarea id="final-diagnosis" name="final-diagnosis" class="form-control">{{ $admission->final_diagnosis }}</textarea><br>
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Update</button>

                </form>
            </div>
        </div>
    </main>
</x-layout>
