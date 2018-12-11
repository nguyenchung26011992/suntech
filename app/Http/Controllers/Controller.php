<?php

namespace App\Http\Controllers;

use App\Entities\Course;
use App\Entities\Event;
use App\Entities\Post;
use App\Entities\Slider;
use App\Entities\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getSliders()
    {
        $sliders = Slider::where('status', Slider::STATUS_ACTIVE)->get();
        return $sliders;

    }

    protected function getCourses()
    {
        $courses = Course::with('lecturer')->with('register_courses')->where('status', Course::STATUS_ACTIVE)->latest()->limit(3)->get();
        return $courses;
    }

    protected function getEvents()
    {
        $events = Event::where('status', Event::STATUS_ACTIVE)->latest()->limit(3)->get();

        if (!$events->isEmpty()) {
            foreach ($events as $item) {
                $event_day = new Carbon($item->start_date);
                $event_day = $event_day->format('d');

                $event_month = new Carbon($item->start_date);
                $event_month = $event_month->format('M');

                $start_date_time = new Carbon($item->start_date);
                $start_date_time = $start_date_time->format('H:i');

                $end_date_time = new Carbon($item->end_date);
                $end_date_time = $end_date_time->format('H:i');

                $item['event_day']       = $event_day;
                $item['event_month']     = $event_month;
                $item['start_date_time'] = $start_date_time;
                $item['end_date_time']   = $end_date_time;
            }
        }
        return $events;
    }

    protected function getLecturers()
    {
        $lecturers = User::with('categories')->where('status', User::STATUS_ACTIVE)->whereHas('roles', function ($q) {
            $q->where('slug', 'lecturer');
            return $q;
        })->latest()->limit(4)->get();
        return $lecturers;
    }

    public function getLargePost()
    {
        $post = Post::with('author')->where('status', Post::STATUS_ACTIVE)->latest()->first();

        return $post;
    }

    protected function getPosts($ignore_ids = [])
    {
        $posts = Post::with('author')->where('status', Post::STATUS_ACTIVE)->whereNotIn('id', $ignore_ids)->latest()->limit(4)->get();

        return $posts;
    }
}
