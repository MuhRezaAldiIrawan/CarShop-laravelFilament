@php
    $videoLink = $getRecord()->video_link;

    if (Str::contains($videoLink, 'youtu.be')) {
        $videoId = Str::afterLast($videoLink, '/');
    }
    elseif (Str::contains($videoLink, 'youtube.com')) {
        $videoId = Str::between($videoLink, 'v=', '&') ?: Str::after($videoLink, 'v=');
    }

@endphp

<div>
    {{ $getChildComponentContainer() }}

    <div style="position: relative; padding-bottom: 56.25%; height: 0;">
        <iframe src="https://www.youtube.com/embed/{{ $videoId }}"
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
    </div>
</div>
