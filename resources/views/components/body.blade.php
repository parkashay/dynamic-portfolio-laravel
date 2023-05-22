<div class="body">
    <div class="tab-1">
        {{ $about->content }}
    </div>
    <div class="tab-2">
        <div class="title">Skills</div>
        <ul>
            @foreach ($skills as $skill)
                <li>{{ $skill->content }}</li>
            @endforeach
        </ul>
    </div>
    <div class="tab-3">
        <div class="title">Acedemic Qualifications</div>
        <ul>
            @foreach ($education as $edu)
                <li>{{ $edu->content }}</li>
            @endforeach
        </ul>
    </div>

   @if($projects->count() > 0)
    <div class="tab-4">
        <div class="title">Projects</div>
        <div class="projects">
            @foreach($projects as $project)
            <div class="project">
                <div class="img">
                    <img src="{{asset('uploads/'.$project->image)}}" alt="project image">
                </div>
                <div class="project-info">
                    <div class="project-title">{{$project->title}}</div>
                    <div class="project-description">{{$project->description}}</div>
                    <div class="project-tech"> Tech Used : {{$project->tech}}</div>
                    <div><a href="{{$project->link}}" class="project-link" target="_blank">View Project</a></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
   @endif
</div>
