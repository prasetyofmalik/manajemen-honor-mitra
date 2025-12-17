<?php

namespace App\Controllers;

use App\Models\SurveiModel;

class SurveiController extends BaseController
{
    protected $surveiModel;

    public function __construct()
    {
        $this->surveiModel = new SurveiModel();
    }

    public function index()
    {
        $data['survei'] = $this->surveiModel->findAll();
        return view('survei/index', $data);
    }

    public function create()
    {
        return view('survei/create');
    }

    public function store()
    {
        $this->surveiModel->insert($this->request->getPost());
        return redirect()->to('/survei');
    }
}
