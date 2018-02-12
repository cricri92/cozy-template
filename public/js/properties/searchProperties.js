'use strict';

const $searchValue = $('#location');
const $propertyType = $('#search_prop_type');
const $propertyStatus = $('#search_status');
const $minArea = $('#search_minarea');
const $maxArea = $('#search_maxarea');
const $bedroomsQty = $('#search_bedrooms');
const $bathroomsQty = $('#search_bathrooms');
const $minPrice = $('#search_minprice');
const $maxPrice = $('#search_maxprice');
const $searchButton = $('#search_property_action');

$searchButton.on('click', () => {
    let searchValue = $searchValue.val();
    let propertyType = $propertyType.val();
    let propertyStatus = $propertyStatus.val();
    let minArea = $minArea.val();
    let maxArea = $maxArea.val();
    let bedroomsQty = $bedroomsQty.val();
    let bathroomsQty = $bathroomsQty.val();
    let minPrice = $minPrice.val();
    let maxPrice = $maxPrice.val();
    
    let searchParams = {
        'match': searchValue,
        'id_property_type': propertyType,
        'for_sale': propertyStatus === 'Venta' || '',
        'for_rent': propertyStatus === 'Alquiler' || '',
        'bathrooms': bathroomsQty === '4plus' ? 5 : bathroomsQty,
        'min_bedrooms': bedroomsQty === '5plus' ? 6 : bath,
        'min_built_area': minArea,
        'min_area': minArea,
        'max_built_area': maxArea,
        'max_area': maxArea,
        'min_price': minPrice,
        'max_price': maxPrice
    };

    console.log(searchParams);
});
