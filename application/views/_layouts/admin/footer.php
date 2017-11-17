<script src="<?=base_url();?>assets/admin/js/app.min.js"></script>
<script src="<?=base_url();?>assets/admin/js/custom.min.js"></script>
<script>jQuery('.alets-pop').not('.alert').delay(3000).fadeOut(500);</script>
<style>
.opens {
    background: #e2e2e2;
}
</style>
<script>
function deleteFun(url) {
	jQuery('.getdeleteurl').attr('href', url);
	jQuery('#deleteModel').modal('show');
}
</script>
</body>
</html>