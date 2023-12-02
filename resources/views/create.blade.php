<x-layout>
    <main class="mw-100 col-11">
        <div class="container col-md-12 ">
            <form action="{{ route('admin.store') }}" method="POST">
                @csrf
                <div class="container  col-md-12">
                    <div class="h1">Patient Record</div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastname" oninput="convertToUppercase(this)" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstname" oninput="convertToUppercase(this)" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="middleName" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" id="middleName" name="midlename" oninput="convertToUppercase(this)">
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="birthday" class="form-label">Birthday</label>
                                    <input type="date" class="form-control" id="birthday" name="birthday" required onchange="calculateAge()">
                                    <div id="error-message" style="color: red;"></div>
                                </div>
                             
                                <div class="col-md-4">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="number" class="form-control" id="age" name="age" readonly>
                                </div>

                                <div class="col-md-4">
                                    <label for="civilStatus" class="form-label">Civil Status</label>
                                    <select class="form-select" id="civilStatus" name="civilstatus" required onchange="showSpouse()" required>
                                        <option value="">-- Select --</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Widowed">Widowed</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="contact" class="form-label">Contact</label>
                                    <input type="number" class="form-control" id="contact" name="contact" required maxlength="11">
                                </div>


                                <div class="col-md-4">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" oninput="convertToUppercase(this)" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="philhealthBeneficiary" class="form-label">PhilHealth Beneficiary</label>
                                    <select class="form-select" id="philhealthBeneficiary" name="philhealth_beneficiary">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row mt-5">
                                <div class="col-md-3 mb-3">
                                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Patients
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>

                            <th>Patient ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Midle Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                        <tr>
                            <td>{{ $patient->id }}</td>
                            <td>
                                {{ $patient->firstname }}
                            </td>
                            <td>{{ $patient->lastname }}</td>
                            <td> {{ $patient->midlename }}</td>
                            <td>
                                <div class="text-center">
                                    <a href="{{ route('admin.edit', ['id' => encrypt($patient->id)]) }}" class="btn btn-primary edit">
                                        <i class="fa-regular fa-pen-to-square">edit</i>
                                    </a>

                                    <a href="{{ route('admin.delete', ['id' => encrypt($patient->id)]) }}" class="btn btn-danger delete">
                                        <i class="fa-solid fa-trash">delete</i>
                                    </a>




                                    <a href="{{ route('admin.ViewRecord', ['id' => encrypt($patient->id)]) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-magnifying-glass">view</i>
                                    </a>
                                </div>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>

                    </div>
                </div>
            </form>


        </div>



    </main>
</x-layout>