<?php

namespace App\Domain\Filters;

use App\Contracts\Filter;
use Illuminate\Http\Request;

abstract class BaseFilter implements Filter
{
    protected $query;
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

    protected function brandsQuery()
    {
        if ($brandsArr = $this->request->get('brands', false)) {
            $this->query .= " and watch_make_title in ({$this->implodeAsValuesForQuery($brandsArr)})";
        }
    }

    protected function modelsQuery()
    {
        if ($modelsArr = $this->request->get('models', false)) {
            $this->query .= " and watch_model_title in ({$this->implodeAsValuesForQuery($modelsArr)})";
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
            }
            $this->query .= " and height in ($height) and width in ($width)";
        }
    }

    public function yearsQuery()
    {
        if($yearsArr = $this->request->get('years', false)){
            $this->query .= " and release_year in ({$this->implodeAsIntValueQuery($yearsArr)})";
        }
    }

    public function regionsQuery()
    {
        if($regionsArr = $this->request->get('regions', false)){
            $this->query .= " and region in ({$this->implodeAsValuesForQuery($regionsArr)})";
        }
    }

    public function mechanismTypesQuery()
    {
        if($mechanismTypesArr = $this->request->get('mechanismTypes', false)){
            $this->query .= " and mechanism_type_title in ({$this->implodeAsValuesForQuery($mechanismTypesArr)})";
        }
    }

    public function statesQuery()
    {
        if($statesArr = $this->request->get('states', false)){
            $this->query .= " and watch_state in ({$this->implodeAsValuesForQuery($statesArr)})";
        }
    }

    public function deliveryVolumesQuery()
    {
        if($deliveryVolumesArr = $this->request->get('deliveryVolumes', false)){
            $this->query .= " and delivery_volume in ({$this->implodeAsValuesForQuery($deliveryVolumesArr)})";
        }
    }

    public function sexesQuery()
    {
        if($sexesArr = $this->request->get('sexes', false)){
            $this->query .= " and sex_title in ({$this->implodeAsValuesForQuery($sexesArr)})";
        }
    }

    public function typesQuery()
    {
        if($typesArr = $this->request->get('types', false)){
            $this->query .= " and watch_type_title in ({$this->implodeAsValuesForQuery($typesArr)})";
        }
    }

    public function pricesQuery()
    {
        if($pricesArr = $this->request->get('prices', false)){
            $titleMin = $pricesArr[0];
            $titleMax = $pricesArr[1];
            $this->query .= " and price > $titleMin and price < $titleMax";
        }
    }


    private function implodeAsValuesForQuery(array $arr)
    {
        return "'" . implode("', '", $arr) . "'";
    }

    private function implodeAsIntValueQuery(array $arr){
        return implode(", ", $arr);
    }


}
