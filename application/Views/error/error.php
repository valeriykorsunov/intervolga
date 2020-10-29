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
                        <!-- <div class="error_desc404"><b>Ошибка!</b></div> -->
						<div class="error_desc404">
						<b>Файл: </b><?echo $_POST["ERROR"]["FILE"];?> <br>
						<b>Строка: </b><?echo $_POST["ERROR"]["LINE"];?>
						</div>
						<div class="error_desc404">
							<b>Сообщение: </b><?echo $_POST["ERROR"]["MESSAGE"];?>
						</div>

						<div class="row">
							<div class="col-6">
							<a href="/" target="_self" class="btn btn-secondary">Вернуться на главную</a>
							</div>
							<div class="col-6">
							<a href="<?=$_SERVER["SCRIPT_URL"]?>" target="_self" class="btn btn-primary">Вернуться на эту страницу но без запроса.</a>
							</div>
						</div>
                    </div>
					
                </div>
                <!-- End Column --> 
                
            </div>
        </div>
    </div>
    <!-- End Section --> 

	<?
	//var_dump($_SERVER)
	?>