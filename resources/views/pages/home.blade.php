@extends('layouts.master')

@section('content')
	@include('partials.slider')

	<!-- Features -->
	<div class="features">
	    <div class="container">
	        <div class="row">
	            <div class="col">
	                <div class="section_title_container text-center">
	                    <h2 class="section_title">Welcome To Unicat E-Learning</h2>
	                    <div class="section_subtitle"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel gravida arcu. Vestibulum feugiat, sapien ultrices fermentum congue, quam velit venenatis sem</p></div>
	                </div>
	            </div>
	        </div>
	        <div class="row features_row">
	            
	            <!-- Features Item -->
	            <div class="col-lg-3 feature_col">
	                <div class="feature text-center trans_400">
	                    <div class="feature_icon"><img src="{!! asset('assets/images/icon_1.png') !!}" alt=""></div>
	                    <h3 class="feature_title">The Experts</h3>
	                    <div class="feature_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p></div>
	                </div>
	            </div>

	            <!-- Features Item -->
	            <div class="col-lg-3 feature_col">
	                <div class="feature text-center trans_400">
	                    <div class="feature_icon"><img src="{!! asset('assets/images/icon_2.png') !!}" alt=""></div>
	                    <h3 class="feature_title">Book & Library</h3>
	                    <div class="feature_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p></div>
	                </div>
	            </div>

	            <!-- Features Item -->
	            <div class="col-lg-3 feature_col">
	                <div class="feature text-center trans_400">
	                    <div class="feature_icon"><img src="{!! asset('assets/images/icon_3.png') !!}" alt=""></div>
	                    <h3 class="feature_title">Best Courses</h3>
	                    <div class="feature_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p></div>
	                </div>
	            </div>

	            <!-- Features Item -->
	            <div class="col-lg-3 feature_col">
	                <div class="feature text-center trans_400">
	                    <div class="feature_icon"><img src="{!! asset('assets/images/icon_4.png') !!}" alt=""></div>
	                    <h3 class="feature_title">Award & Reward</h3>
	                    <div class="feature_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p></div>
	                </div>
	            </div>

	        </div>
	    </div>
	</div>

	<!-- Popular Courses -->
	<div class="courses">
	    <div class="section_background parallax-window" data-parallax="scroll" data-image-src="{!! asset('assets/images/courses_background.jpg') !!}" data-speed="0.8"></div>
	    <div class="container">
	        <div class="row">
	            <div class="col">
	                <div class="section_title_container text-center">
	                    <h2 class="section_title">Khóa học tại SUNTECH</h2>
	                    <div class="section_subtitle"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel gravida arcu. Vestibulum feugiat, sapien ultrices fermentum congue, quam velit venenatis sem</p></div>
	                </div>
	            </div>
	        </div>
	        <div class="row courses_row">
	            
	            <!-- Course -->
	            @if (!empty($courses))
	            @foreach($courses as $item)
	            <div class="col-lg-4 course_col">
	                <div class="course">
	                    <div class="course_image"><img src="{!! asset($item->image) !!}" alt=""></div>
	                    <div class="course_body">
	                        <h3 class="course_title"><a href="course.html">{!! $item->title !!}</a></h3>
	                        <div class="course_teacher">{!! $item->lecturer->getName() !!}</div>
	                        <div class="course_text">
	                        	{!! $item->content !!}
	                        </div>
	                    </div>
	                    <div class="course_footer">
	                        <div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
	                            <div class="course_info">
	                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
	                                <span>{{ count($item->register_courses) }} Student</span>
	                            </div>
	                            <!-- <div class="course_info">
	                                <i class="fa fa-star" aria-hidden="true"></i>
	                                <span>5 Ratings</span>
	                            </div> -->
	                            @if (!empty($item->origin_price))
	                            <div class="course_price ml-auto"><span>{!! $item->origin_price !!}</span>{!! $item->getPrice() !!}</div>
	                           	@else
	                            <div class="course_price ml-auto">{!! $item->getPrice() !!}</div>
	                            @endif
	                        </div>
	                    </div>
	                </div>
	            </div>
	            @endforeach
	            @endif
	        </div>
	    </div>
	</div>

	<!-- Counter -->
	<div class="counter">
	    <div class="counter_background" style="background-image:url({!! asset('assets/images/counter_background.jpg') !!})"></div>
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-6">
	                <div class="counter_content">
	                    <h2 class="counter_title">Register Now</h2>
	                    <div class="counter_text"><p>Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dumy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p></div>

	                    <!-- Milestones -->

	                    <div class="milestones d-flex flex-md-row flex-column align-items-center justify-content-between">
	                        
	                        <!-- Milestone -->
	                        <div class="milestone">
	                            <div class="milestone_counter" data-end-value="15">0</div>
	                            <div class="milestone_text">years</div>
	                        </div>

	                        <!-- Milestone -->
	                        <div class="milestone">
	                            <div class="milestone_counter" data-end-value="120" data-sign-after="k">0</div>
	                            <div class="milestone_text">years</div>
	                        </div>

	                        <!-- Milestone -->
	                        <div class="milestone">
	                            <div class="milestone_counter" data-end-value="670" data-sign-after="+">0</div>
	                            <div class="milestone_text">years</div>
	                        </div>

	                        <!-- Milestone -->
	                        <div class="milestone">
	                            <div class="milestone_counter" data-end-value="320">0</div>
	                            <div class="milestone_text">years</div>
	                        </div>

	                    </div>
	                </div>

	            </div>
	        </div>

	        <div class="counter_form">
	            <div class="row fill_height">
	                <div class="col fill_height">
	                    <form class="counter_form_content d-flex flex-column align-items-center justify-content-center" action="#">
	                        <div class="counter_form_title">courses now</div>
	                        <input type="text" class="counter_input" placeholder="Your Name:" required="required">
	                        <input type="tel" class="counter_input" placeholder="Phone:" required="required">
	                        <select name="counter_select" id="counter_select" class="counter_input counter_options">
	                            <option>Choose Subject</option>
	                            <option>Subject</option>
	                            <option>Subject</option>
	                            <option>Subject</option>
	                        </select>
	                        <textarea class="counter_input counter_text_input" placeholder="Message:" required="required"></textarea>
	                        <button type="submit" class="counter_form_button">submit now</button>
	                    </form>
	                </div>
	            </div>
	        </div>

	    </div>
	</div>

	<!-- Events -->
	<div class="events">
	    <div class="container">
	        <div class="row">
	            <div class="col">
	                <div class="section_title_container text-center">
	                    <h2 class="section_title">Upcoming events</h2>
	                    <div class="section_subtitle"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel gravida arcu. Vestibulum feugiat, sapien ultrices fermentum congue, quam velit venenatis sem</p></div>
	                </div>
	            </div>
	        </div>
	        <div class="row events_row">

	            <!-- Event -->
	            @if (!empty($events))
	            @foreach ($events as $item)
	            <div class="col-lg-4 event_col">
	                <div class="event event_left">
	                    <div class="event_image"><img src="{!! asset($item->image) !!}" alt=""></div>
	                    <div class="event_body d-flex flex-row align-items-start justify-content-start">
	                        <div class="event_date">
	                            <div class="d-flex flex-column align-items-center justify-content-center trans_200">
	                                <div class="event_day trans_200">{{ $item->event_day }}</div>
	                                <div class="event_month trans_200">{{ $item->event_month }}</div>
	                            </div>
	                        </div>
	                        <div class="event_content">
	                            <div class="event_title"><a href="#">{{ $item->title }}</a></div>
	                            <div class="event_info_container">
	                                <div class="event_info"><i class="fa fa-clock-o" aria-hidden="true"></i><span>{{ $item->start_date_time }} - {{ $item->end_date_time }}</span></div>
	                                <div class="event_info"><i class="fa fa-map-marker" aria-hidden="true"></i><span>{{ $item->address }}</span></div>
	                                <div class="event_text">{{ $item->content }}</div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            @endforeach
	            @endif
	        </div>
	    </div>
	</div>

	<!-- Team -->
	<div class="team">
	    <div class="team_background parallax-window" data-parallax="scroll" data-image-src="{!! asset('assets/images/team_background.jpg') !!}" data-speed="0.8"></div>
	    <div class="container">
	        <div class="row">
	            <div class="col">
	                <div class="section_title_container text-center">
	                    <h2 class="section_title">The Best Tutors in Town</h2>
	                    <div class="section_subtitle"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel gravida arcu. Vestibulum feugiat, sapien ultrices fermentum congue, quam velit venenatis sem</p></div>
	                </div>
	            </div>
	        </div>
	        <div class="row team_row">
	        	@if (!empty($lecturers))
	            @foreach ($lecturers as $item)
	            <!-- Team Item -->
	            <div class="col-lg-3 col-md-6 team_col">
	                <div class="team_item">
	                    <div class="team_image"><img src="{!! asset($item->avatar) !!}" alt=""></div>
	                    <div class="team_body">
	                        <div class="team_title"><a href="#">{!! $item->getName() !!}</a></div>
	                        <div class="team_subtitle">{!! $item->categories()->first()->name !!}</div>
	                        <div class="social_list">
	                            <ul>
	                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
	                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
	                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
	                            </ul>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            @endforeach
	            @endif
	        </div>
	    </div>
	</div>

	<!-- Latest News -->
	<div class="news">
	    <div class="container">
	        <div class="row">
	            <div class="col">
	                <div class="section_title_container text-center">
	                    <h2 class="section_title">Latest News</h2>
	                    <div class="section_subtitle"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel gravida arcu. Vestibulum feugiat, sapien ultrices fermentum congue, quam velit venenatis sem</p></div>
	                </div>
	            </div>
	        </div>
	        <div class="row news_row">
	            <div class="col-lg-7 news_col">
	                
	                <!-- News Post Large -->
	                @if (!empty($large_post))
	                <div class="news_post_large_container">
	                    <div class="news_post_large">
	                        <div class="news_post_image"><img src="{!! asset($large_post->image) !!}" alt=""></div>
	                        <div class="news_post_large_title"><a href="blog_single.html">{!! $large_post->title !!}</a></div>
	                        <div class="news_post_meta">
	                            <ul>
	                                <li><a href="#">{!! $large_post->author->getName() !!}</a></li>
	                                <li><a href="#">{!! $large_post->displayCreatedAt() !!}</a></li>
	                            </ul>
	                        </div>
	                        <div class="news_post_text">{!! $large_post->content !!}</div>
	                        <div class="news_post_link"><a href="blog_single.html">read more</a></div>
	                    </div>
	                </div>
	                @endif
	            </div>

	            <div class="col-lg-5 news_col">
	                <div class="news_posts_small">
	                	@if (!empty($posts))
						@foreach($posts as $item)
	                    <!-- News Posts Small -->
	                    <div class="news_post_small">
	                        <div class="news_post_small_title"><a href="blog_single.html">{!! $item->title !!}</a></div>
	                        <div class="news_post_meta">
	                            <ul>
	                                <li><a href="#">{!! $item->author->getName() !!}</a></li>
	                                <li><a href="#">{!! $item->displayCreatedAt() !!}</a></li>
	                            </ul>
	                        </div>
	                    </div>
	                    @endforeach
	                    @endif
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

	<!-- Newsletter -->
	<div class="newsletter">
	    <div class="newsletter_background parallax-window" data-parallax="scroll" data-image-src="{!! asset('assets/images/newsletter.jpg') !!}" data-speed="0.8"></div>
	    <div class="container">
	        <div class="row">
	            <div class="col">
	                <div class="newsletter_container d-flex flex-lg-row flex-column align-items-center justify-content-start">

	                    <!-- Newsletter Content -->
	                    <div class="newsletter_content text-lg-left text-center">
	                        <div class="newsletter_title">sign up for news and offers</div>
	                        <div class="newsletter_subtitle">Subcribe to lastest smartphones news & great deals we offer</div>
	                    </div>

	                    <!-- Newsletter Form -->
	                    <div class="newsletter_form_container ml-lg-auto">
	                        <form action="#" id="newsletter_form" class="newsletter_form d-flex flex-row align-items-center justify-content-center">
	                            <input type="email" class="newsletter_input" placeholder="Your Email" required="required">
	                            <button type="submit" class="newsletter_button">subscribe</button>
	                        </form>
	                    </div>

	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection