<header class="header">
			<div class="wrap header-wrap">
				<a href="index.php" class="logo">
					<img src="img/group_2_18.png" alt="" class="img-logo">
					<p class="text-logo">BRAN</p>
					<p class="text-logo text-logo-D">D</p>
				</a>
				<div class="search">
					<div class="browse">
						<h2 class="search-text">Browse</h2>
						<i class="fa fa-caret-down" aria-hidden="true"></i>
						<div class="drop_down">
							<h4 class="drop_down_nav">Women</h4>
							<div class="drop_down_separator"></div>
							<ul class="drop_down_nav">
								<li><a href="" class="drop_down_link">Dresses</a></li>
								<li><a href="" class="drop_down_link">Tops</a></li>
								<li><a href="" class="drop_down_link">Sweaters/Knits</a></li>
								<li><a href="" class="drop_down_link">Jackets/Coats</a></li>
								<li><a href="" class="drop_down_link">Blazers</a></li>
								<li><a href="" class="drop_down_link">Denim</a></li>
								<li><a href="" class="drop_down_link">Leggings/Pants</a></li>
								<li><a href="" class="drop_down_link">Skirts/Shorts</a></li>
								<li><a href="" class="drop_down_link">Accessories </a></li>
							</ul>
							<h4 class="drop_down_nav">men</h4>
							<div class="drop_down_separator"></div>
							<ul class="drop_down_nav">
								<li><a href="" class="drop_down_link">Bags/Purses</a></li>
								<li><a href="" class="drop_down_link">Swimwear/Underwear</a></li>
								<li><a href="" class="drop_down_link">Nightwear</a></li>
								<li><a href="" class="drop_down_link">Shoes</a></li>
								<li><a href="" class="drop_down_link">Beauty</a></li>
							</ul>
						</div>
					</div>
					<form class="for-item">
						<input class="search-field" type="text" required placeholder="Search for Item...">
						<button class="vert" type="submit">
							<i class="fa fa-search" aria-hidden="true"></i>
						</button>
					</form>
				</div>
				<div class="account">
					<a href="shoppingCart.php" >
						<img src="img/forma_1_1113.png" class="account_a" alt="">
					</a>
					<div class="my-acount">
						<h2 class="accout-text">My Account</h2>
						<i class="fa fa-caret-down" aria-hidden="true"></i>
					</div>
					<div id="basket">
						<? include "basket.php"; ?>
					</div>
					
				</div>
			</div>
		</header>