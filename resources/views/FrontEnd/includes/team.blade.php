<style>
    @media (max-width: 578px) {
        .modal-dialog {
            max-height: 90vh; /* Adjust as needed */
            margin: 1.75rem auto; /* Center the modal */
        }

        .modal-content {
            height: 100%; /* Ensure the content takes full height */
        }

        .modal-body {
            max-height: 70vh;
            overflow-y: auto;
        }
    }
</style>

<section class="section4">
    <div class="col-md-12" style="margin-top: 50px">
        <h3>TEAM</h3>
        <p class="pheader">Two is better than One</p>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @foreach ($teamMembers as $index => $member)
                        <div class="col-md-4">
                            <div class="card" data-bs-toggle="modal" data-bs-target="#teamModal{{ $index }}" style="cursor: pointer">
                                <div class="card-body" style="text-align: center">
                                    <div class="d-flex justify-content-center align-items-center" style="flex-direction: column">
                                        @if ($member->photo_path)
                                            <img src="{{ Storage::url($member->photo_path) }}"
                                                style="border-radius: 50%; width: 200px; height: 200px; object-fit: contain;filter:contrast(140%)" alt="{{ $member->name }}">
                                        @endif
                                        <p class="pheader2">{{ $member->name }}</p>
                                        <p>{{ $member->role_title }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Modals -->
        @foreach ($teamMembers as $index => $member)
            <div class="modal fade" id="teamModal{{ $index }}" aria-hidden="true" aria-labelledby="teamModalLabel{{ $index }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="teamModalLabel{{ $index }}">{{ $member->name }}</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @if ($member->photo_path)
                                <img src="{{ Storage::url($member->photo_path) }}" class="img-fluid mb-3" style="filter:contrast(140%)" alt="{{ $member->name }}">
                            @endif
                            <p style="color:dodgerblue">{{ $member->role_title }}</p>
                            <p>{{ $member->bio }}</p>
                        </div>
                        <div class="modal-footer">
                            @if (! $loop->first)
                                <button class="btn btn-primary" data-bs-target="#teamModal{{ $index - 1 }}" data-bs-toggle="modal" data-bs-dismiss="modal">Back</button>
                            @endif
                            @if (! $loop->last)
                                <button class="btn btn-primary" data-bs-target="#teamModal{{ $index + 1 }}" data-bs-toggle="modal" data-bs-dismiss="modal">Next</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
