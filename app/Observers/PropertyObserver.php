<?php

namespace App\Observers;

use App\Models\Property;
use Geocoder\Exception\Exception;
use Geocoder\Provider\Nominatim\Nominatim;
use Geocoder\Query\GeocodeQuery;
use Geocoder\StatefulGeocoder;
use GuzzleHttp\Client;


class PropertyObserver {

    private StatefulGeocoder $geocoder;
    private Nominatim $provider;

    public function __construct() {
        $httpClient = new Client();
        $this->provider = new Nominatim($httpClient, 'https://nominatim.openstreetmap.org/', 'BookingsApp');
        $this->geocoder = new StatefulGeocoder($this->provider, 'en');
    }

    /**
     * @throws Exception
     */
    public function creating(Property $property): void {

        // We also add the owner automatically
        if (auth()->check()) {
            $property->owner_id = auth()->id();
        }

        if (is_null($property->lat) && is_null($property->long)) {
            $fullAddress = $property->address_street . ', '
                . $property->city->name . ', '
                . $property->city->country->name;
            $results = $this->geocoder->geocodeQuery(GeocodeQuery::create($fullAddress));
            if ($results->count() > 0) {
                $coordinates = $results->first()->getCoordinates();
                $property->lat = $coordinates->getLatitude();
                $property->long = $coordinates->getLongitude();
            }
        }
    }
}
