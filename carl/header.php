<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/flexibility.js"></script>
		<?php wp_head(); ?>
			<link href="https://fonts.googleapis.com/css?family=Roboto:400,700|Source+Sans+Pro:300,400,700" rel="stylesheet">
<!--  changes here-->
        <style>
            .tabs-headers-custom-outer {
                max-width: 800px;
                margin: 0 auto;
                margin-bottom: 40px;
            }

            .tabs-headers-custom-item {
                display: flex;
                justify-content: center;

            }

            .tabs-headers-custom-item a {
                outline: none;
                border: none;
            }



            .tabs-headers-custom-item .btn {
                display: inline-block;
                box-sizing: border-box;
                padding: 10px 20px;
                background: #146ac0;
                color: #fff;
                min-width: 185px;
                font-size: 18px;
                text-transform: uppercase;
                margin: 10px 5px;
                cursor: pointer;
            }

            .accordion-section-title {
                cursor: pointer;
            }

            .accordion-section-content {
                display:none;
            }

            .accordion-section .card-header {
                position: relative;
            }

            .accordion-section h5 {
                display: block;
                width: calc(100% + 50px);
                height: 50px;
            }

            .accordion-section h5 a {
                display: flex;
                width: 100%;
                height: 100%;
                align-items: center;
            }

            .accordion-section .plus {
                position: absolute;
                top: 0;
                right: 0;
                pointer-events: none;
            }

            .tab-content {
                display: none;
            }

            .tab-content:first-of-type {
                display: block;
            }

            .tabs-menu li.current a {
                background-color: #fff !important;
                color: #136ac0 !important;
            }

            .collapse-asks .tabs-headers-custom-item.current a {
                background-color: #39485b !important;
                color: #fff !important;
            }
@media (max-width: 900px) {
    #dropdown-navigation .menu .dropdown-sidebar ul li a {
        padding: 2.5px 20px;
        border-radius: 0px;
        font-size: 24px !important;
    }
    #dropdown-navigation .menu .dropdown-content .menu-block .title span,
    #dropdown-navigation .menu .dropdown-content .menu-block ul li a {
        font-size: 26px !important;
    }
	
	.page-template-page-testimonials .hero .hero-content {
		padding-top: 46px;
	}
	.page-template-page-testimonials .hero {
		height: 160px;
	}
}
        </style>
	</head>
<body <?php body_class(); ?>>	
<header class="main-header">
	<?php get_part("header", "top-bar"); ?>
	<div id="header-layout" class="header-layout">
        <?php get_part("header", "search"); ?>
        <div class="header-section header-section--left">
            <div class="box box--navigation-toggle">
                <a id="mobile-navigation-toggle" class="toggle-link" href="#" onclick="toggleMobileNav();">
                    <div id="open-mobile-navigation">
                        <?php inline_svg('menu') ?>
                    </div>
                    <div id="close-mobile-navigation" style="display:none;">
                        <?php inline_svg('close') ?>
                    </div>
                </a>
            </div>
            <div class="logo">
                <a href="/" title="Carl's Place">
                    <?php inline_svg('carlsplace-logo') ?>
                </a>
            </div>
            <div id="navigation" class="header-navigation">
                <nav id="dropdown-links" class="dropdown-links">
                    <ul>
                        <li class="dropdown-link">
                            <a href="#" id="shop-categories-link">Shop Categories</a>
                        </li>
                        <li class="dropdown-link">
                            <a href="#" id="shop-materials-link">Shop By Material</a>
                        </li>
                        <li>
                            <a href="/shop/clearance" id="shop-clearance-link">Shop Clearance</a>
                        </li>
                        <li>
                            <a href="/resources" id="resources-link">Resources</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="header-section header-section--right">
            <div id="search-box">
                <input id="search-input" type="text" placeholder="Search.." />
                <input id="search-submit" type="submit" value="Go" />
            </div>
            <div class="box box--search">
                <a id="search-toggle" class="toggle-link" href="#" onclick="toggleSearch();">
                    <?php inline_svg('search') ?>
                </a>
            </div>
            <div class="box box--account">
                <a class="toggle-link" href="/shop/customer/account/login">
                    <?php inline_svg('user') ?>
                </a>
            </div>
            <div class="box box--cart">
                <a class="toggle-link minicart-toggle" href="/shop/checkout/cart">
                    <?php inline_svg('cart') ?>
                </a>
				
            </div>
        </div>
    </div>
</header>
<?php include('navigation.html'); ?>
<script type="text/javascript">
const dropdownNavigation = document.getElementById('dropdown-navigation');
const shopCategoriesLink = document.getElementById('shop-categories-link');
const shopCategoriesMenu = document.getElementById('shop-categories-menu');
const shopMaterialsLink = document.getElementById('shop-materials-link');
const shopMaterialsMenu = document.getElementById('shop-materials-menu');
const mobileNavToggle = document.getElementById('mobile-navigation-toggle');
const menuLinks = document.querySelectorAll('.menu-link');
/* Hovering over Shop Categories Link */
shopCategoriesLink.addEventListener("mouseover", function( event ) {
	shopMaterialsMenu.style.display = 'none';
	shopCategoriesMenu.style.display = '';   
	shopMaterialsMenu.classList.remove('menu--active');
	shopCategoriesMenu.classList.add('menu--active');
    setTimeout(function() {
	  dropdownNavigation.classList.add('navigation--active');
    }, 500);
}, false);
/* Click on Shop Categories Link */
shopCategoriesLink.addEventListener("click", function( event ) {
	shopMaterialsMenu.style.display = 'none';
	shopMaterialsMenu.classList.remove('menu--active');
	if(shopCategoriesMenu.classList.contains('menu--active')) {
		shopCategoriesMenu.classList.remove('menu--active');
		shopCategoriesMenu.style.display = 'none';   
	} else {
		shopCategoriesMenu.classList.add('menu--active');
		shopCategoriesMenu.style.display = '';   
	}
}, false);
/* Hovering over Shop Materials Link */
shopMaterialsLink.addEventListener("mouseover", function( event ) {
	shopCategoriesMenu.style.display = 'none';
	shopMaterialsMenu.style.display = '';   
	shopCategoriesMenu.classList.remove('menu--active');   
	shopMaterialsMenu.classList.add('menu--active');
    setTimeout(function() {
	  dropdownNavigation.classList.add('navigation--active');
    }, 500);
}, false);
/* Click on Shop Categories Link */
shopMaterialsLink.addEventListener("click", function( event ) {
	shopCategoriesMenu.style.display = 'none';
	shopCategoriesMenu.classList.remove('menu--active');
	if(shopMaterialsMenu.classList.contains('menu--active')) {
		shopMaterialsMenu.classList.remove('menu--active');
		shopMaterialsMenu.style.display = 'none';   
	} else {
		shopMaterialsMenu.classList.add('menu--active');
		shopMaterialsMenu.style.display = '';   
	}
}, false);
/* Mouse Leaves the dropdown menu */
dropdownNavigation.addEventListener("mouseleave", function( event ) {
	shopMaterialsMenu.style.display = 'none';
	shopCategoriesMenu.style.display = 'none';   
	shopMaterialsMenu.classList.remove('menu--active');
	shopCategoriesMenu.classList.remove('menu--active');
}, false);

/* Hovering over Sub Category Link */
menuLinks.forEach(function (link, index) {

	link.addEventListener("mouseover", function( event ) {
		setTimeout(function() {
			console.log('hovering', link);
			showMenu(link);
		}, 500);
	}, false)
});

/* Function to show sub category menu */
function showMenu(link) {
	let linkId = link.id;
	let menuId = linkId.replace("toggle", "content");
	let menuLink = document.getElementById(linkId);
	let menuContent = document.getElementById(menuId);
	let activeMenuLink = menuLink.parentNode.parentNode.querySelector('.menu-link--active');
	let activeMenu = menuContent.parentNode.querySelector('.menu-content--active');
	activeMenuLink.classList.remove('menu-link--active');
	activeMenu.classList.remove('menu-content--active');
	menuLink.classList.add('menu-link--active');
	menuContent.classList.add('menu-content--active');
}
/* Function to show mobile menu */
function showMobileMenu(link) {
	const mobileLinks = document.getElementById('mobile-links');
	let linkId = link.id;
	let menuId = linkId.replace("toggle", "content");
	let menuIdMobile = menuId.replace("target-", "");
	let menuLink = document.getElementById(linkId);
	let menuContent = document.getElementById(menuIdMobile);
	let activeMenuLink = menuLink.parentNode.parentNode.querySelector('.mobile-menu-link--active');
	let activeMenu = menuContent.parentNode.querySelector('.menu--active');
	console.log('showing menu: ', linkId, ' menu id: ', menuIdMobile);
	if(activeMenu){
		activeMenuLink.classList.remove('mobile-menu-link--active');
		activeMenu.classList.remove('menu-content--active');
	}
	if(menuContent){
	menuContent.classList.add('menu--active');
	menuContent.style.display = '';
	}
	menuLink.parentNode.classList.add('mobile-menu-link--active');
	mobileLinks.classList.add('mobile-links--active');

}
/* Function to hide sub category menu */
function hideMobileMenu(link) {
	const mobileLinks = document.getElementById('mobile-links');
	let activeMenu = document.querySelectorAll('.menu--active');
	let activeMenuWrapper = document.querySelectorAll('.mobile-menu-link--active');
	mobileLinks.classList.remove('mobile-links--active');
	if(activeMenuWrapper){
		activeMenuWrapper.forEach(function (menu, index) {
			menu.classList.remove('mobile-menu-link--active');
		});
	}
	if(activeMenu){
		activeMenu.forEach(function (menu, index) {
			menu.classList.remove('menu--active');
		});
	}
}
/* Function to toggle the mobile navigation */
function toggleMobileNav(){
	let openNav = document.getElementById('open-mobile-navigation');
	let closeNav = document.getElementById('close-mobile-navigation');
	console.log('toggling mobile nav!');
	shopCategoriesMenu.style.display = 'none';
	shopMaterialsMenu.style.display = 'none';   
	shopCategoriesMenu.classList.remove('menu--active');   
	shopMaterialsMenu.classList.remove('menu--active');
    setTimeout(function() {
	  dropdownNavigation.classList.toggle('navigation--active');
	  if(closeNav.style.display == 'none'){
		openNav.style.display = 'none';
		closeNav.style.display = '';
	  } else {
		closeNav.style.display = 'none';
		openNav.style.display = '';
	  }
    }, 250);
}
/* Toggle the header search input */
function toggleSearch() {
	const searchBox = document.getElementById('search-box');
	const searchToggle = document.getElementById('search-toggle');
	searchBox.classList.toggle('search-box--active');
	searchToggle.classList.toggle('search-toggle--active');
}

</script>
