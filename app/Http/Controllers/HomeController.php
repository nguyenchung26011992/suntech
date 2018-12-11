<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $data               = [];
        $data['sliders']    = $this->getSliders();
        $data['courses']    = $this->getCourses();
        $data['events']     = $this->getEvents();
        $data['lecturers']  = $this->getLecturers();
        $data['large_post'] = $this->getLargePost();
        $data['posts']      = $this->getPosts([$data['large_post']->id]);

        return view('pages.home', $data);
    }
}
