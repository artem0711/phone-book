</div>
<footer>
    <p class="text-center">Company brand &copy;
        <? echo date("Y"); ?>
    </p>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
<script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
<? if (isset($js_load)): ?>
<? if ($js_load != ""): ?>
<script src="/assets/js/helpers.js" type="text/javascript"></script>
<? endif; ?>
<? endif; ?>
</body>

</html>