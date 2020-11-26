<?php

namespace App\Domain\filters;

use App\Contracts\Filter;
use Illuminate\Http\Request;

class MainPageFilter implements Filter
{
    protected $query;

    public function make(Request $request)
    {
        $this->query = '1 and vip_status in (1)';
        if (isset($request->brands)) {
            $title = "'".$request->brands[0]."'";
            foreach ($request->brands as $brand) {
                $title .= ", '$brand'";
            }
            $this->query .= " and watch_make_title in ($title)";
        }
        if (isset($request->models)) {
            $title = "'".$request->models[0]."'";
            foreach ($request->models as $model) {
                $title .= ", '$model'";
            }
            $this->query .= " and watch_model_title in ($title)";
        }
        if (isset($request->models)) {
            $title = "'".$request->models[0]."'";
            foreach ($request->models as $model) {
                $title .= ", '$model'";
            }
            $this->query .= " and watch_model_title in ($title)";
        }
        if (isset($request->diameters)) {
            $heightWidth  = explode('/', $request->diameters[0]);
            $height = $heightWidth[0];
            $width = $heightWidth[1];
            foreach ($request->diameters as $diameter) {
                $heightWidth  = explode('/', $diameter);
                $height .= ", $heightWidth[0]";
                $width .= ", $heightWidth[1]";
            }
            $this->query .= " and height in ($height) and width in ($width)";
        }
        if (isset($request->years)) {
            $title = $request->years[0];
            foreach ($request->years as $year) {
                $title .= ", $year";
            }
            $this->query .= " and release_year in ($title)";
        }
        if (isset($request->regions)) {
            $title = "'".$request->regions[0]."'";
            foreach ($request->regions as $region) {
                $title .= ", '$region'";
            }
            $this->query .= " and region in ($title)";
        }
        if (isset($request->mechanismTypes)) {
            $title = "'".$request->mechanismTypes[0]."'";
            foreach ($request->mechanismTypes as $mechanismType) {
                $title .= ", '$mechanismType'";
            }
            $this->query .= " and mechanism_type_title in ($title)";
        }
        if (isset($request->states)) {
            $title = "'".$request->states[0]."'";
            foreach ($request->states as $state) {
                $title .= ", '$state'";
            }
            $this->query .= " and watch_state in ($title)";
        }
        if (isset($request->deliveryVolumes)) {
            $title = "'".$request->deliveryVolumes[0]."'";
            foreach ($request->deliveryVolumes as $deliveryVolume) {
                $title .= ", '$deliveryVolume'";
            }
            $this->query .= " and delivery_volume in ($title)";
        }
        if (isset($request->sexes)) {
            $title = "'".$request->sexes[0]."'";
            foreach ($request->sexes as $sex) {
                $title .= ", '$sex'";
            }
            $this->query .= " and sex_title in ($title)";
        }
        if (isset($request->types)) {
            $title = "'".$request->types[0]."'";
            foreach ($request->types as $type) {
                $title .= ", '$type'";
            }
            $this->query .= " and watch_type_title in ($title)";
        }
        if (isset($request->prices)) {
            $titleMin = $request->prices[0];
            $titleMax = $request->prices[1];
            $this->query .= " and price > $titleMin and price < $titleMax";
        }
    }

    public function getQuery()
    {
        return $this->query;
    }
}
