</div>
<footer>
    <p class="text-center">Company brand &copy; <?php echo date("Y"); ?></p>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<?php if ($js_load != ""): ?>
	<script src="<?php echo base_url(); ?>assets/js/helpers.js" type="text/javascript"></script>
<?php endif; ?>
</body>
</html>