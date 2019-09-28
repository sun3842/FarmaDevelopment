




<div class="row">
	<div class="col-lg-11">
		<div class="panel panel-default">
			<div class="panel-heading">
				Dettagli del prodotto
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12" id="gm_details">
                           <div class="form-group" align="center">
								<img src="<?php echo $product['linkImmagineProdotto'];?>" />
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Codice catena</label>
								<p><?php echo $product['codice_catena'];?></p>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Codice sito</label>
								<p><?php echo $product['codice_sito'];?></p>
							</div>
							<div class="form-group">
								<div class="row row-padding-small">
									<div class="col-sm-6">
										<label for="exampleInputEmail1">Codinterno</label>
										<p><?php echo $product['codinterno'];?></p>
									</div>
									<div class="col-sm-6">
										<label for="exampleInputEmail1">Codminsan</label>
										<p><?php echo $product['codminsan'];?></p>
									</div>
								</div>
							</div>
                            
                            
                            
                            <div class="form-group">
								<div class="row row-padding-small">
									<div class="col-sm-6">
										<label for="exampleInputEmail1">Codean</label>
										<p><?php echo $product['codean'];?></p>
									</div>
									<div class="col-sm-6">
										<label for="exampleInputEmail1">Descrizione ditta</label>
										<p><?php echo $product['descrizione_ditta'];?></p>
									</div>
								</div>
							</div>
                            
                            
                            
                            
                            <div class="form-group">
								
									<div class="col-sm-12">
										<label for="exampleInputEmail1">Descrizione ricerca</label>
										<p><?php echo $product['descrizione_ricerca'];?></p>
									</div>
									
								
							</div>
                            
                            
                            
                            
                            <div class="form-group">
								<div class="row row-padding-small">
									<div class="col-sm-6">
										<label for="exampleInputEmail1">Descrizione ecommerce</label>
										<p><?php echo $product['descrizione_ecommerce'];?></p>
									</div>
									<div class="col-sm-6">
										<label for="exampleInputEmail1">Descrizione sintetica prodotto</label>
										<p><?php echo $product['descrizione_h1'];?></p>
									</div>
								</div>
							</div>
                            
                            
                            
                            
                            <div class="form-group">
								<div class="row row-padding-small">
									<div class="col-sm-6">
										<label for="exampleInputEmail1">Descrizione h2</label>
										<p><?php echo $product['descrizione_h2'];?></p>
									</div>
									<div class="col-sm-6">
										<label for="exampleInputEmail1">prezzo web netto</label>
										<p><?php echo $product['prezzo_web_netto'];?></p>
									</div>
								</div>
							</div>
                            
                            
                            
                            <div class="form-group">
								<div class="row row-padding-small">
									<div class="col-sm-6">
										<label for="exampleInputEmail1">prezzo web lordo</label>
										<p><?php echo $product['prezzo_web_lordo'];?></p>
									</div>
									<div class="col-sm-6">
										<label for="exampleInputEmail1">sconto web</label>
										<p><?php echo $product['sconto_web'];?></p>
									</div>
								</div>
							</div>
                            
                            
                            
                            
                            <div class="form-group">
								<div class="row row-padding-small">
									<div class="col-sm-6">
										<label for="exampleInputEmail1">iva</label>
										<p><?php echo $product['iva'];?></p>
									</div>
									<div class="col-sm-6">
										<label for="exampleInputEmail1">visualizzazione home page</label>
										<p><?php echo $product['visualizzazione_home_page'];?></p>
									</div>
								</div>
							</div>
                            
                            
                            
                            <div class="form-group">
								<div class="row row-padding-small">
									<div class="col-sm-6">
										<label for="exampleInputEmail1">visualizzazione civetta</label>
										<p><?php echo $product['visualizzazione_civetta'];?></p>
									</div>
									<div class="col-sm-6">
										<label for="exampleInputEmail1">codice monografia</label>
										<p><?php echo $product['codice_monografia'];?></p>
									</div>
								</div>
							</div>
                            
                            
                            
                            <div class="form-group">
								<div class="row row-padding-small">
									<div class="col-sm-6">
										<label for="exampleInputEmail1">codice_testo_immagine</label>
										<p><?php echo $product['codice_testo_immagine'];?></p>
									</div>
									<div class="col-sm-6">
										<label for="exampleInputEmail1">link Pagina Prodotto</label>
										<p><a href="<?php echo $product['linkPaginaProdotto'];?>" target="_blank">Pagina</a></p>
									</div>
								</div>
							</div>
                            
                            
                            <div class="form-group">
								<div class="row row-padding-small">
									<div class="col-sm-6">
										<label for="exampleInputEmail1">Categorie</label>
										<p><?php echo $product['tree_label'];?></p>
									</div>
									
								</div>
							</div>
                            
                            
                            
                           
                            
                            
                          
                            
                       
						<div class="form-group">
								<center><a class="btn-send" href="<?php echo site_url('products');?>">Indietro</a></center>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	