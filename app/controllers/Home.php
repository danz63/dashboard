<?php
class Home extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data = [
            'full_name' => 'Miftah Hamdani',
            'email' => 'hamdan.miftah63@gmail.com',
            'address' => 'Karawang',
            'title' => 'ASUUU'
        ];
        view('admin/coba', $data);
        // echo url('css/style.css');
    }
}
