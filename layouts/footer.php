<footer>
	<div class="footer-section text-center">
		<ul class="footer-nav">
			<a href="index">
				<li>Home</li>
			</a>
			<a href="aims_and_scopes">
				<li>Aims and Scope</li>
			</a>
			<a href="journal_committee">
				<li>Journal Committee</li>
			</a>
			<a href="guidelines">
				<li>Guidelines</li>
			</a>

		</ul>
		<span class="d-block text-center">
			<p>Copyright © <span class="date"></span> Deerwalk Journal of Computer Science & Technology (DJCST). All Rights Reserved.</p>
		</span>
	</div>
	<script>
		$(document).ready(function() {
			$('.fa-close').hide();

			$(".collapsible-navbar-price").hide();
			$('.fa-chevron-circle-up').hide();

		})

		$(".fa-menu").click(function() {
			$(".fa-close").show();
			$(".fa-menu").hide();
			$(".collapsible-navbar").slideDown();
		});

		$(".fa-close").click(function() {
			$(".fa-menu").show();
			$(".fa-close").hide();
			$(".collapsible-navbar").slideUp();
		});

		$(".toggle-trigger").click(function() {
			$(this).next(".collapsible-navbar-price").slideToggle("0.3s");
			$(this).toggleClass("active-nav");
			$('.fa-chevron-circle-down').toggle();
			$('.fa-chevron-circle-up').toggle();

		});

		document.querySelector(".date").textContent = new Date().getFullYear();
	</script>
</footer>

</body>

</html>