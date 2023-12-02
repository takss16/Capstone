<x-layout>
<main class="mw-100 col-11">
<div class="text-start">
            <a href="{{ route('admin.child', ['id' => encrypt($patient->id)]) }}" class="btn btn-primary"><i class="fa-solid fa-circle-chevron-left"></i> Back</a>
            </div>
<div class="col-12 mt-5">
    <div class="card shadow-lg col-12">
        <div class="card-body">
            @if ($baby->isNotEmpty())
                @foreach ($baby as $child)
                <h4>Parents Information</h4>
                <table class="table table-bordered">
                        <tr>
                            <th class="text-start">Mother's Name</th>
                            <td class="fw-bold">{{ $patient->firstname }}</td>
                            <td class="fw-bold">{{ $patient->midlename }}</td>
                            <td class="fw-bold">{{ $patient->lastname }}</td>
                        </tr>
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <th class="text-start">Father's Name</th>
                            <td class="fw-bold">{{ $child->fatherFirstName }}</td>
                            <td class="fw-bold">{{ $child->fatherMiddleName }}</td>
                            <td class="fw-bold">{{ $child->fatherLastName }}</td>
                        </tr>
                    </table>
                    <h4>Baby's Information</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th class="text-start">Baby's Name</th>
                            <td class="fw-bold">{{ $child->babyGivenName }}</td>
                            <td class="fw-bold">{{ $child->babyMiddleName }}</td>
                            <td class="fw-bold">{{ $child->babyLastName }}</td>
                        </tr>
                        <tr>
                            <th class="text-start">Date of Birth</th>
                            <td class="fw-bold">{{ $child->babyDOB }}</td>
                            <th class="text-start">Time of Birth</th>
                            <td class="fw-bold">{{ $child->babyTOB }}</td>
                        </tr>
                        <tr>
                            <th class="text-start">Age of Baby</th>
                            <td class="fw-bold">{{ $child->babyAge }}</td>
                            <th class="text-start">Permanent Address</th>
                            <td class="fw-bold">{{ $child->babyAddress }}</td>
                        </tr>
                        <tr>
                            <th class="text-start">Gender</th>
                            <td class="fw-bold">{{ $child->babyGender }}</td>
                            <th class="text-start">Nationality</th>
                            <td class="fw-bold">{{ $child->babyNationality }}</td>
                        </tr>
                    </table>

                @endforeach
            @else
                <p>No child records found.</p>
            @endif
        </div>
    </div>
</main>
</x-layout>