@if ($teamMembers->isNotEmpty())
    <section class="section">
        <div class="wrap">
            <x-section-head eyebrow="Our team" title="The people behind TANDS">
                Two is better than one — meet the team that runs our championships and programs.
            </x-section-head>
            <div class="grid grid--3">
                @foreach ($teamMembers as $index => $member)
                    <article class="card-x card-x--hover person">
                        <div class="person__media">
                            @if ($member->photo_path)
                                <img class="person__photo" src="{{ asset($member->photo_path) }}" alt="{{ $member->name }}" loading="lazy">
                            @else
                                <div class="person__photo d-flex align-items-center justify-content-center"><span class="avatar">{{ collect(explode(' ', $member->name))->map(fn ($w) => mb_substr($w, 0, 1))->take(2)->implode('') }}</span></div>
                            @endif
                        </div>
                        <div class="person__body">
                            <h4>{{ $member->name }}</h4>
                            <div class="person__role">{{ $member->role_title }}</div>
                            @if ($member->bio)
                                <button type="button" class="link-arrow person__more border-0 bg-transparent p-0 stretched-link"
                                    data-bs-toggle="modal" data-bs-target="#teamModal{{ $index }}">Read bio <i class="fas fa-arrow-right" aria-hidden="true"></i></button>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    @foreach ($teamMembers as $index => $member)
        @if ($member->bio)
            <div class="modal fade" id="teamModal{{ $index }}" tabindex="-1" aria-labelledby="teamModalLabel{{ $index }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 id="teamModalLabel{{ $index }}">{{ $member->name }}</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-bio">
                                @if ($member->photo_path)
                                    <img src="{{ asset($member->photo_path) }}" alt="{{ $member->name }}">
                                @endif
                                <div>
                                    <span class="eyebrow">{{ $member->role_title }}</span>
                                    <div class="prose">{!! nl2br(e($member->bio)) !!}</div>
                                </div>
                            </div>
                        </div>
                        @if ($teamMembers->count() > 1)
                            <div class="modal-footer justify-content-between">
                                @php $prev = $teamMembers->keys()->get($loop->index - 1); $next = $teamMembers->keys()->get($loop->index + 1); @endphp
                                <span>
                                    @if (! $loop->first)
                                        <button class="btn-x btn-x--outline btn-x--sm" data-bs-target="#teamModal{{ $prev }}" data-bs-toggle="modal"><i class="fas fa-arrow-left" aria-hidden="true"></i> Previous</button>
                                    @endif
                                </span>
                                <span>
                                    @if (! $loop->last)
                                        <button class="btn-x btn-x--primary btn-x--sm" data-bs-target="#teamModal{{ $next }}" data-bs-toggle="modal">Next <i class="fas fa-arrow-right" aria-hidden="true"></i></button>
                                    @endif
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endif
