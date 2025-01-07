<nav>
	<i class='bx bx-menu' ></i>
	<a href="#" class="nav-link">Categories</a>
	<form action="#">
		<div class="form-input">
			<input type="search" placeholder="Search...">
			<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
		</div>
	</form>
	<input type="checkbox" id="switch-mode" hidden>
	<label for="switch-mode" class="switch-mode"></label>
	{{-- <a href="#" class="notification">
		<i class='bx bxs-bell' ></i>
		<span class="num">8</span>
	</a> --}}
	<a href="{{ route('dashboard.index') }}" class="profile d-flex gap-2 align-items-center">
		<img src="https://static.vecteezy.com/system/resources/thumbnails/009/292/244/small/default-avatar-icon-of-social-media-user-vector.jpg">
		<span style="font-size: 12px;text-wrap: nowrap">Hi, {{ Auth::user()->username }} </span>
	</a>
</nav>