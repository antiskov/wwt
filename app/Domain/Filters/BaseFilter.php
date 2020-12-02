<?php

namespace App\Domain\Filters;

use App\Contracts\Filter;
use Illuminate\Http\Request;

abstract class BaseFilter implements Filter
{
    protected $query;
    protected $bindsArr;
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function make(Request $request)
    {
        $this->brandsQuery();
        $this->modelsQuery();
        $this->diametersQuery();
        $this->yearsQuery();
        $this->regionsQuery();
        $this->mechanismTypesQuery();
        $this->statesQuery();
        $this->deliveryVolumesQuery();
        $this->sexesQuery();
        $this->typesQuery();
        $this->pricesQuery();
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function getBindsArr()
    {
        return $this->bindsArr;
    }

    protected function brandsQuery()
    {
        if ($brandsArr = $this->request->get('brands', false)) {
            $this->bindsArr[] = $brandsArr;
            $this->query .= " and watch_make_title in (?)";
        }
    }

    protected function modelsQuery()
    {
        if ($modelsArr = $this->request->get('models', false)) {
            $this->bindsArr[] = $modelsArr;
            $this->query .= " and watch_model_title in (?)";
        }
    }

    public function diametersQuery()
    {
        if ($diametersArr = $this->request->get('diameters', false)) {
            $heightWidth  = explode('/', $diametersArr[0]);
            $height = $heightWidth[0];
            $width = $heightWidth[1];
            foreach ($diametersArr as $diameter) {
                $heightWidth  = explode('/', $diameter);
                $height .= ", $heightWidth[0]";
                $width .= ", $heightWidth[1]";
                $this->bindsArr[] = $height;
                $this->bindsArr[] = $width;
            }
            $this->query .= " and height in (?) and height in (?)";
        }
    }

    public function yearsQuery()
    {
        if($yearsArr = $this->request->get('years', false)){
            $this->bindsArr[] = $yearsArr;
            $this->query .= " and release_year in (?)";
        }
    }

    public function regionsQuery()
    {
        if($regionsArr = $this->request->get('regions', false)){
            $this->bindsArr[] = $regionsArr;
            $this->query .= " and region in (?)";
        }
    }

    public function mechanismTypesQuery()
    {
        if($mechanismTypesArr = $this->request->get('mechanismTypes', false)){
            $this->bindsArr[] = $mechanismTypesArr;
            $this->query .= " and mechanism_type_title in (?})";
        }
    }

    public function statesQuery()
    {
        if($statesArr = $this->request->get('states', false)){
            $this->bindsArr[] = $statesArr;
            $this->query .= " and watch_state in (?)";
        }
    }

    public function deliveryVolumesQuery()
    {
        if($deliveryVolumesArr = $this->request->get('deliveryVolumes', false)){
            $this->bindsArr[] = $deliveryVolumesArr;
            $this->query .= " and delivery_volume in (?)";
        }
    }

    public function sexesQuery()
    {
        if($sexesArr = $this->request->get('sexes', false)){
            $this->bindsArr[] = $sexesArr;
            $this->query .= " and sex_title in (?)";
        }
    }

    public function typesQuery()
    {
        if($typesArr = $this->request->get('types', false)){
            $this->bindsArr[] = $typesArr;
            $this->query .= " and watch_type_title in (?})";
        }
    }

    public function pricesQuery()
    {
        if($pricesArr = $this->request->get('prices', false)){
            $titleMin = $pricesArr[0];
            $titleMax = $pricesArr[1];
            $this->bindsArr[] = $titleMin;
            $this->bindsArr[] = $titleMax;
            $this->query .= " and price > ? and price < ?";
        }
    }


}
