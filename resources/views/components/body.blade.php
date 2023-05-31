<div class="body">

    {{-- A short self description --}}
    @if (isset($about))
        <div class="tab-1">
            {{ $about->content }}
        </div>
    @else
        <div class="tab-1">
            About self
        </div>
    @endif

    {{-- Skills section --}}
    @if (isset($skills))
        <div class="tab-2">
            <div class="title">Skills and Knowledge</div>
            <ul>
                @foreach ($skills as $skill)
                    <li>{{ $skill->content }}</li>
                @endforeach
            </ul>
        </div>
    @else
        <div class="tab-2">
            Skills Knowledge
        </div>
    @endif

    {{-- Academic Qualifications --}}
    @if (isset($education))
        <div class="tab-3">
            <div class="title">Academic Qualifications</div>
            <ul>
                @foreach ($education as $edu)
                    <li>{{ $edu->content }}</li>
                @endforeach
            </ul>
        </div>
    @else
        <div class="tab-3">
            Academic Qualifications
        </div>
    @endif


    @if (isset($experience))
        <div class="tab-4">
            <div class="title">Experience</div>
            <ul>
                @foreach ($experience as $exp)
                    <li>{{ $exp->content }}</li>
                @endforeach
            </ul>
        </div>
    @else
        <div class="tab-4">
            Experience
        </div>
    @endif

    {{-- Projects and works --}}
    @if (isset($projects))
        <div class="tab-5">
            <div class="title">Projects</div>
            <div class="projects">
                @foreach ($projects as $project)
                    <div class="project">
                        <div class="img">
                            <img src="{{ asset('uploads/' . $project->image) }}" alt="project image">
                        </div>
                        <div class="project-info">
                            <div class="project-title">{{ $project->title }}</div>
                            <div class="project-description">{{ $project->description }}</div>
                            <div class="project-tech"> Tech Used : {{ $project->tech }}</div>
                            <div><a href="{{ $project->link }}" class="project-link" target="_blank">View
                                    Project</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="tab-5">
            Projects
        </div>
    @endif
</div>
