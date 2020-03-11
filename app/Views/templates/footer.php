<v-footer color="indigo" app >
    <span class="white--text">Grandiose &copy; <?=date('Y')?></span>
</v-footer>
 
</v-app>
</div>   

<script>
	function toggleMenu() {
		var menuItems = document.getElementsByClassName('menu-item');
		for (var i = 0; i < menuItems.length; i++) {
			var menuItem = menuItems[i];
			menuItem.classList.toggle("hidden");
		}
	}
</script>

<!-- -->
<?php echo script_tag('src/bundle.js?v='.$version); ?>
</body>
</html>
