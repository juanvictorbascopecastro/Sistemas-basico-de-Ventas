<footer>
    <script type="text/javascript">
    const base_url = "<?= BASE_URL; ?>";
    </script>
	<!-- jQuery -->
    <script src="<?= BASE_URL?>public/js/jquery.js"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= BASE_URL?>public/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <!--<script src="<?= BASE_URL?>public/js/plugins/morris/raphael.min.js"></script>
    <script src="<?= BASE_URL?>public/js/plugins/morris/morris.min.js"></script>
    <script src="<?= BASE_URL?>public/js/plugins/morris/morris-data.js"></script>-->
    
    <script src="<?= BASE_URL?>public/js/utils.min.js"></script>

    <?php if($this->data['id'] == 7 || $this->data['id'] == 1) ?> 
        <script src="<?= BASE_URL?>public/js/highcharts.js"></script>
 
  
    <script src="<?= BASE_URL?>public/js/intlTelInput.min.js"></script>
    <script src="<?= BASE_URL?>public/js/datatables/datatables.min.js"></script>
    <script src="<?= BASE_URL?>public/js/datatables/dataTables.buttons.min.js"></script>
    <script src="<?= BASE_URL?>public/js/datatables/jszip.min.js"></script>
    <script src="<?= BASE_URL?>public/js/datatables/pdfmake.min.js"></script>
    <script src="<?= BASE_URL?>public/js/datatables/vfs_fonts.js"></script>
    <script src="<?= BASE_URL?>public/js/datatables/buttons.html5.min.js"></script>
    <script src="<?= BASE_URL?>public/js/sweetalert2.js"></script>   

    <script src="<?= BASE_URL?>public/js/index.js"></script>
    <script src="<?= BASE_URL?>public<?= $this->data['js']?>"></script>
</footer>