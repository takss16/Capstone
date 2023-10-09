<x-layout-appointment>
    <main class="mw-100 col-11 mt-5">
        <div class="d-flex justify-content-center mt-3">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="container col-md-12">
                        <div class="row mt-3">
                            <div class="col-12">
                                <p>Good Day {{ $appointmentPatient->first_name }}
                                    {{ $appointmentPatient->middle_name }}
                                    {{ $appointmentPatient->last_name }},
                                </p>

                                <p>Thank you for choosing Pabustan Birthing Clinic. This is to confirm your appointment at Pabustan Birthing Clinic.</p>

                                <p><strong>Date:</strong> {{ \Carbon\Carbon::parse( $dateTimeReason->appointment_date)->format('F d, Y') }}</p>
                                <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($dateTimeReason->appointment_time)->format('h:i A') }}</p>

                                <p>If you have any questions or need to reschedule, please contact us at Pabustan Birthing Clinic at your earliest convenience.</p>

                                <p>We look forward to seeing you.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout-appointment>
