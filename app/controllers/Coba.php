<?php
class Coba extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data = [
            'title' => 'coba',
            'header' => 'ini header',
            'content' => 'ini content'
        ];

        view('content/index', $data);
    }
}
