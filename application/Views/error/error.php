    <!-- Section -->
    <div class="content_section">
        <div class="container row_spacer clearfix">
            <div class="content">
                
                <div class="hm_columns col-md-12">
                    <div class="hm_column_con">
                        <div class="page404">
                            <span>ERROR<span class="face404"></span></span>
                        </div>
					</div>
					
                </div>
                
                <div class="hm_columns col-md-12">
                    <div class="hm_column_con">
						<script>
							let message ={
								FILE: "<?echo $_POST["ERROR"]["FILE"];?>",
								LINE: "<?echo $_POST["ERROR"]["LINE"];?>",
								MESSAGE: "<?echo $_POST["ERROR"]["MESSAGE"];?>"};
							console.error("Ошибка на сервере:", message);
						</script>

						<div class="row">
							<div class="col-6">
							<a href="/" target="_self" class="btn btn-secondary">Вернуться на главную</a>
							</div>
							<div class="col-6">
							<a href="<?=$_SERVER["SCRIPT_URL"]?><?if($_SERVER["QUERY_STRING"]) echo "?".$_SERVER["QUERY_STRING"]; ?>" target="_self" class="btn btn-primary">Вернуться на эту страницу но без запроса.</a>
							</div>
						</div>
                    </div>
					
                </div>
                <!-- End Column --> 
                
            </div>
        </div>
    </div>
    <!-- End Section --> 