	<footer class="footer">
	<?php generate_navigation_html(); ?>

		<?= generate_footer_navigation_html(); ?>
		<div class="container">
			<?php include('footer-navigation.html'); ?>
			<div class="footer-bottom">
				<div class="copyright">
					<p>&copy; <?= date("Y"); ?> Carl's Place. <span>All Rights Reserved.</span></p>
				</div>
				<div class="social">
					<nav class="social-links">
						<ul>
							<li>
							<a href="https://www.facebook.com/Carls-Place-142519409114082/" title="Facebook">
								<?php inline_svg('facebook'); ?>
							</a>
							</li>
							<li>
							<a href="https://www.pinterest.com/carlofet/" title="Check us out on Pinterest">
								<?php inline_svg('pinterest'); ?>
							</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</footer>
<!--    fix scroll button wordpress2-->
<button id="scroll-to-top">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
        <path d="M84.738 64.906L54.926 35.094h.004l-4.926-4.926h-.008l-4.926 4.926h.004L15.262 64.906l4.926 4.926L50 40.02l29.812 29.812z"/>
    </svg>

</button>
<script type="text/javascript">
// changes here
const scrollTrigger = document.getElementById('scroll-to-top');
const options = {top: 0, left: 0, behavior: 'smooth'};
let lastKnownScrollY = 0;
let currentScrollY = 0;
function onScroll() {
  if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
    currentScrollY = window.pageYOffset;
    if (currentScrollY < lastKnownScrollY) {
        scrollTrigger.classList.add('scroll-to-top--visible-disabled');
    } else if (currentScrollY > lastKnownScrollY) {
        scrollTrigger.classList.remove('scroll-to-top--visible-disabled');
    }
    lastKnownScrollY = currentScrollY;
  } else {
    scrollTrigger.classList.remove('scroll-to-top--visible');
  }
}
window.onload = function() {
scrollTrigger.addEventListener('click', () => { window.scroll(options)});
window.addEventListener('scroll', onScroll, false);
}
/* Toggle Footer Mobile Menu */
let footerMenuToggles = document.querySelectorAll('.menu-block-title');
footerMenuToggles.forEach(function (link, index) {
    link.addEventListener("click", function(event) {
        let menuBlock = link.parentNode;
        if (window.innerWidth < 565) {
            menuBlock.classList.toggle('menu-block--active');
        }
    }, false);
});
/* Live Chat Toggles */
let chatToggles = document.querySelectorAll('.link--live-chat');
chatToggles.forEach(function (toggle, index) {
    toggle.addEventListener("click", function(event) {
		event.preventDefault();
		console.log('toggling live chat', toggle, event);
		Tawk_API.toggle();
    }, false);
});
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5be0f54145840924fe234968/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>

<?php wp_footer(); ?>