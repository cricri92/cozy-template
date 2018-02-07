<div id="listing-header" class="clearfix">
    <div class="form-control-small">
        <select id="sort_by" name="sort_by" data-placeholder="Sort">
            <option value=""> </option>
            <option value="data">Sort by Date</option>
            <option value="area">Sort by Area</option>
        </select>
    </div>

    <div class="sort">
        <ul>
            <li class="active"><i data-toggle="tooltip" data-placement="top" title="Sort Descending" class="fa fa-chevron-down"></i></li>
            <li><i data-toggle="tooltip" data-placement="top" title="Sort Ascending" class="fa fa-chevron-up"></i></li>
        </ul>
    </div>

    <div class="view-mode">
        <span>View Mode:</span>
        <ul>
            <li data-view="grid-style1" data-target="property-listing"><i class="fa fa-th"></i></li>
            <li data-view="list-style" data-target="property-listing" class="active"><i class="fa fa-th-list"></i></li>
        </ul>
    </div>
</div>

<!-- BEGIN PROPERTY LISTING -->
<div id="property-listing" class="list-style clearfix">
    @for($i = 0; $i < sizeof($properties) - 2; $i++)
        <div class="row">
            <div class="item col-md-4"><!-- Set width to 4 columns for grid view mode only -->
                <div class="image">
                    <a href="properties-detail.html">
                        <span class="btn btn-default"><i class="fa fa-file-o"></i> Detalles</span>
                    </a>
                    <img src="{{ $properties[$i]['galleries'][0][0]['url'] }}"
                         alt="{{ $properties[$i]['galleries'][0][0]['description'] }}" />
                </div>
                <div class="price">
                    @if($properties[$i]['for_sale'])
                        Venta
                        <span>{{ number_format($properties[$i]['sale_price'], 2).' '.$properties[$i]['iso_currency'] }}</span>
                    @elseif($properties[$i]['for_rent'])
                        Alquiler
                        <span>{{ number_format($properties[$i]['rent_price'], 2).' '.$properties[$i]['iso_currency'] }}</span>
                    @else
                        Transferencia
                        <span>{{ number_format($properties[$i]['sale_price'], 2).' '.$properties[$i]['iso_currency'] }}</span>
                    @endif
                </div>
                <div class="info">
                    <h3>
                        <a href="properties-detail.html">{{ $properties[$i]['title'] }}</a>
                        <small>{{ $properties[$i]['address'] }}</small>
                    </h3>
                    <div class="col-md-12">
                        {!! $properties[$i]['observations'] !!}
                    </div>

                    <ul class="amenities col-md-4">
                        <li><i class="icon-area"></i>{{ $properties[$i]['built_area'].' '.$properties[$i]['unit_area_label'] }}</li>
                        <li><i class="icon-bedrooms"></i> {{ $properties[$i]['bedrooms'] }}</li>
                        <li><i class="icon-bathrooms"></i> {{ $properties[$i]['bathrooms'] }}</li>
                    </ul>
                </div>
            </div>
        </div>
    @endfor
</div>
<!-- END PROPERTY LISTING -->


<!-- BEGIN PAGINATION -->
<div class="pagination">
    <ul id="previous">
        <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
    </ul>
    <ul>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
    </ul>
    <ul id="next">
        <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
    </ul>
</div>
<!-- END PAGINATION -->