	<section id="sidebar">
		<a href="{{ route('home') }}" class="brand">
			<img src="/images/logo.png" alt="">
			<span class="text">Indramedia</span>
		</a>
		<ul class="side-menu top">
			<li class="{{ Route::currentRouteNamed('dashboard.index') ? 'active' : '' }}">
				<a href="{{ route('dashboard.index') }}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="{{ Route::currentRouteNamed('dashboard.orders') ? 'active' : '' }}">
				<a href="{{ route('dashboard.orders') }}">
					<i class='bx bi-bag-fill' ></i>
					<span class="text">Orders</span>
				</a>
			</li>
			<li class="{{ Route::currentRouteNamed('dashboard.products') ? 'active' : '' }}">
				<a href="{{ route('dashboard.products') }}">
					<i class='bx bi-box-fill' ></i>
					<span class="text">Products</span>
				</a>
			</li>
			<li class="{{ Route::currentRouteNamed('dashboard.products.type') ? 'active' : '' }}">
				<a href="{{ route('dashboard.products.type') }}">
					<i class='bx bi-tag-fill' ></i>
					<span class="text">Products Type</span>
				</a>
			</li>
			<li class="{{ Route::currentRouteNamed('dashboard.products.category') ? 'active' : '' }}">
				<a href="{{ route('dashboard.products.category') }}">
					<i class='bx bi-tags-fill' ></i>
					<span class="text">Products Category</span>
				</a>
			</li>
			<li class="{{ Route::currentRouteNamed('dashboard.popular') ? 'active' : '' }}">
				<a href="{{ route('dashboard.popular') }}">
					<i class='bx bi-fire' ></i>
					<span class="text">Populer</span>
				</a>
			</li>
			<li class="{{ Route::currentRouteNamed('dashboard.promo') ? 'active' : '' }}">
				<a href="{{ route('dashboard.promo') }}">
					<i class='bx bi-ticket-fill' ></i>
					<span class="text">Promo</span>
				</a>
			</li>
			<li class="{{ Route::currentRouteNamed('dashboard.blog') ? 'active' : '' }}">
				<a href="{{ route('dashboard.blog') }}">
					<i class='bx bi-book-fill' ></i>
					<span class="text">Artikel</span>
				</a>
			</li>
			<li class="{{ Route::currentRouteNamed('dashboard.users') ? 'active' : '' }}">
				<a href="{{ route('dashboard.users') }}">
					<i class='bx bi-person-fill' ></i>
					<span class="text">User</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="{{ route('logout') }}" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>