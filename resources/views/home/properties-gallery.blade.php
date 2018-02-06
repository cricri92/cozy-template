<h1 class="section-title" data-animation-direction="from-bottom" data-animation-delay="50">Más Inmuebles</h1>

<div id="property-gallery2" class="property-gallery2">
    {{--<div class="item">
        <h1 class="section-title" data-animation-direction="from-left" data-animation-delay="50">Cozy Gallery</h1>
        <p class="section-text" data-animation-direction="from-left" data-animation-delay="250">Pellentesque elementum libero enim, eget gravida nunc laoreet et. Nullam ac enim auctor, fringilla risus at, imperdiet turpis.</p>
    </div>--}}
    @foreach($nextSixProperties as $prop)
        <div class="item" data-animation-direction="from-bottom" data-animation-delay="{{ 350 + ($loop->index+1) * 100 }}">
            <a href="" data-gal="prettyPhoto[gallery]">
                <h3>{{ $prop['title'] }}</h3>
                <span class="location">{{ $prop['address'] }}</span>
            </a>
            <img src="{{ $prop['galleries'][0][0]['url'] }}"
                 alt="{{ $prop['galleries'][0][0]['description'] }}" />
        </div>
    @endforeach
</div>