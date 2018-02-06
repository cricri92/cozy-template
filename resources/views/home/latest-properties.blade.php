<h1 class="section-title" data-animation-direction="from-bottom" data-animation-delay="50">Últimas Propiedades</h1>

<!-- BEGIN LATEST PROPERTIES SLIDER -->
<div id="latest-properties-slider" class="owl-carousel fullwidthsingle2" data-animation-direction="from-bottom" data-animation-delay="250">
    @foreach($firstFiveProperties as $prop)
        <div class="item">
            <div class="image">
                <a href="properties-detail.html">
                    <img src="{{ $prop['galleries'][0][0]['url'] }}"
                         alt="{{ $prop['galleries'][0][0]['description'] }}" />
                </a>
            </div>
            <div class="price">
                <i class="fa fa-home"></i>
                @if($prop['for_sale'])
                    Venta
                    <span>{{ $prop['sale_price'].' '.$prop['iso_currency'] }}</span>
                @elseif($prop['for_rent'])
                    Alquiler
                    <span>{{ $prop['rent_price'].' '.$prop['iso_currency'] }}</span>
                @else
                    Transferencia
                    <span>{{ $prop['sale_price'].' '.$prop['iso_currency'] }}</span>
                @endif
            </div>
            <div class="info">
                <div class="item-title col-md-8">
                    <h3><a href="properties-detail.html">{{ $prop['title'] }}</a></h3>
                    <span class="location">{{ $prop['address'] }}</span>
                </div>
                <ul class="amenities col-md-4">
                    <li><i class="icon-area"></i>{{ $prop['built_area'].' '.$prop['unit_area_label'] }}</li>
                    <li><i class="icon-bedrooms"></i> {{ $prop['bedrooms'] }}</li>
                    <li><i class="icon-bathrooms"></i> {{ $prop['bathrooms'] }}</li>
                </ul>
                <div class="description">
                    <div class="col-md-12">
                        {!! $prop['observations'] !!}
                    </div>
                    <div class="col-md-3 col-md-push-10" style="position:relative">
                        <a href="properties-detail.html" class="btn btn-default-color">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
