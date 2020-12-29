<?php

namespace App\Domain;

use App\Services\ImageMinificationService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class Uploader
{
    protected $filename;
    protected $request;
    protected $nameAttribute;
    protected $directory;

    private function upload()
    {
        $this->filename = $this->request->file($this->nameAttribute)->getClientOriginalName();
        $this->request->file($this->nameAttribute)->storeAs($this->directory, $this->filename, 'public');

        (new ImageMinificationService())->minify($this->filename, ['small'], 'public/'.$this->directory);
    }

    public function uploadImage(Request $request, $nameAttribute, $directory)
    {
        $this->request = $request;
        $this->nameAttribute = $nameAttribute;
        $this->directory = $directory;

        $this->upload();
    }

    public function uploadImageForFormRequest(FormRequest $request, $nameAttribute, $directory)
    {
        $this->request = $request;
        $this->nameAttribute = $nameAttribute;
        $this->directory = $directory;

        $this->upload();
    }

    public function getFilename()
    {
        return $this->filename;
    }
}
