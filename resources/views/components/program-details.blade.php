<section class="container my-5">
    <a href="{{ route('programs.index') }}" class="btn btn-sm btn-outline-secondary mb-4">
        ← Back to Programs
    </a>

    <div class="card shadow-lg rounded-4 border-0">
        <div class="card-body p-5">
            <h2 class="mb-3">{{ $program->name }}</h2>

            @if($program->degree)
                <h5 class="text-muted mb-4">Degree: {{ $program->degree->name }}</h5>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <!-- Program ID & University -->
                        <tr>
                            <th>Program ID</th>
                            <td>{{ $program->program_id }}</td>
                        </tr>

                        <tr>
                            <th>University</th>
                            <td>{{ $program->university->name ?? 'N/A' }}</td>
                        </tr>

                        <tr>
                            <th>City</th>
                            <td>{{ $program->university->city->name ?? 'N/A' }}</td>
                        </tr>

                        <!-- Language & Duration -->
                        <tr>
                            <th>Language</th>
                            <td>{{ $program->language }}</td>
                        </tr>

                        <tr>
                            <th>Duration</th>
                            <td>{{ $program->duration }}</td>
                        </tr>

                        <!-- Intake -->
                        <tr>
                            <th>Intake</th>
                            <td>{{ $program->intake ?? 'N/A' }}</td>
                        </tr>

                        <!-- Fees -->
                        <tr>
                            <th>Tuition Fee</th>
                            <td>¥{{ number_format($program->tuition_fee) }}</td>
                        </tr>

                        <tr>
                            <th>Registration Fee</th>
                            <td>¥{{ number_format($program->registration_fee) }}</td>
                        </tr>

                        <tr>
                            <th>Room Costs</th>
                            <td>
                                Single: ¥{{ number_format($program->single_room_cost) }}<br>
                                Double: ¥{{ number_format($program->double_room_cost) }}<br>
                                Triple: ¥{{ number_format($program->triple_room_cost) }}<br>
                                Four-share: ¥{{ number_format($program->four_room_cost) }}
                            </td>
                        </tr>

                        <!-- Application Deadline & Scholarship -->
                        <tr>
                            <th>Application Deadline</th>
                            <td>{{ \Carbon\Carbon::parse($program->application_deadline)->format('M d, Y') }}</td>
                        </tr>

                        <tr>
                            <th>Scholarship</th>
                            <td>{{ $program->scholarship->name ?? 'None' }} (ID: {{ $program->scholarship->name ?? 'N/A' }})</td>
                        </tr>

                        <!-- Requirements -->
                        @if(is_array($program->requirements))
                            <tr>
                                <th>Requirements</th>
                                <td>
                                    <ul class="mb-0">
                                        @foreach($program->requirements as $req)
                                            <li>{{ $req }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @elseif(!empty($program->requirements))
                            <tr>
                                <th>Requirements</th>
                                <td>{{ $program->requirements }}</td>
                            </tr>
                        @endif

                        <!-- Application Documents -->
                        @if(is_array($program->application_documents))
                            <tr>
                                <th>Application Documents</th>
                                <td>
                                    <ul class="mb-0">
                                        @foreach($program->application_documents as $doc)
                                            <li>{{ $doc }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @elseif(!empty($program->application_documents))
                            <tr>
                                <th>Application Documents</th>
                                <td>{{ $program->application_documents }}</td>
                            </tr>
                        @endif

                        <!-- Program Description -->
                        @if($program->description)
                            <tr>
                                <th>Program Description</th>
                                <td>{{ $program->description }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
             <!--
            <div class="mt-5">
                <a href="{{ url('apply', $program->id) }}" class="btn btn-primary btn-lg">
                    Apply Now
                </a>
            </div>
        -->
        </div>
    </div>
</section>
