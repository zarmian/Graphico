@extends('layouts.layout');


@section('title','Home')

@section('content')

<!-- Block Banner -->
<div class="background" id="background_banner" style="background-image: url('/img/fre-bg.png');">
	<div class="bg-content">
		<div class="container">
			<h1 id="title_banner">Find perfect freelancers for your projects or Look for freelance jobs online?</h1>
												<a class="btn primary-bg-color" href="">Hire Freelancer</a>
					<a class="btn primary-bg-color" href="">Apply as Freelancer</a>
				
					</div>
	</div>
</div>
<!-- Block Banner -->
<!-- Block How Work -->
<div class="how-work">
	<div class="container">
		<h2 id="title_work">How Graphico works?</h2>
		<div class="row">
			<div class="col-lg-3 col-sm-6">
				<div class="work-block">
					<span>
						<img src="/img/1.png" id="img_work_1" alt="">
					</span>
					<p id="desc_work_1">Post projects to tell us what you need done</p>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="work-block">
					<span>
						<img src="/img/2.png" id="img_work_2" alt="">
					</span>
					<p id="desc_work_2">First Test then hire your most favorite and start project</p>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="work-block">
					<span>
						<img src="/img/3.png" id="img_work_3" alt="">
					</span>
					<p id="desc_work_3">Use Graphic0 platform to chat</p>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="work-block">
					<span>
						<img src="/img/4.png" id="img_work_4" alt="">
					</span>
					<p id="desc_work_4">With our protection, money is only paid for work you authorize</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Block How Work -->
<!-- List Profiles -->
<div class="perfect-freelancer">
	<div class="container">
		<h2 id="title_freelance">Find perfect freelancers for your projects</h2>
		</div>
</div>
<!-- List Profiles -->
<!-- List Projects -->
<div class="jobs-online">
	<div class="container">
		<h2 id="title_project">Browse numerous freelance jobs online</h2>
		
	</div>
<div class="jobs-online-more">
	<a class="btn-o primary-color" href="">See all jobs</a>
</div>	</div>
</div>
<!-- List Projects -->
<!-- List Testimonials -->
<div class="our-stories">
	<div class="container">
		<h2 id="title_story">Hear what our customers have to say</h2>
</div>
</div>
<!-- List Testimonials -->
<!-- List Pricing Plan -->
	<div class="service">
		<div class="container">
			<h2 id="title_service">
				Select the level of service you need for project bidding			</h2>
			</div>
	</div>
<!-- List Pricing Plan -->
<!-- List Get Started -->
<div class="get-started">
	<div class="container">
		<div class="get-started-content">
							<h2 id="title_start">Need work done? Join FreelanceEngine community!</h2>
								<a class="btn btn primary-bg-color" href="register/index.html">Get Started</a>
							
		</div>
	</div>
</div>
<!-- List Get Started -->
@endsection