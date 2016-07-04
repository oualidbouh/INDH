<!DOCTYPE html>
<html>
    <head>
        <title>Ajouter un Marché</title>
            <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
            <link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
            <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
            <style type="text/css">

        body{
            padding : 80px;
        }        
		@media(min-width: 200px){
			.round-button {
				width: 15px;
			}
		}

		@media(min-width: 500px){
			.round-button {
				width:20px;
		}
	}
		@media(min-width: 700px){
			.round-button {
				width:35px;
			}
		}
	

		.round-button-circle {
			width: 100%;
			height:0;
			padding-bottom: 100%;
   			border-radius: 50%;
	  		overflow:hidden;
   		 	background: #4679BD; 
   		 	box-shadow: 0 0 3px gray;
	}
}
		.round-button-circle:hover {
			background:#30588e;
}
		.round-button a {
    		display:block;
			float:left;
			width:100%;
			padding-top:50%;
    		padding-bottom:50%;
			line-height:1em;
			margin-top:-0.5em;
    		text-align:center;
			color:#e2eaf3;
    		font-family:Verdana;
    		font-size:1.2em;
    		font-weight:bold;
    		text-decoration:none;
}

	</style>
        </head>
        <body>
            <div class="container">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="projectTitle">Titre du Marché</label>
                                <input type="text" class="form-control" name="projectTitle" id="projectTitle" placeholder="Titre du projet" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="type">Type du Marché</label>
                                <select class="form-control">
                                    <option>INDH</option>
                                    <option>BP</option>
                                    <option>BG</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="budget">Budget du Marché</label>
                                <input type="number" class="form-control" name="budget" placeholder="Budget du projet" id="budget"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                                <label for="date">Date d'ouverture des plis</label>
                                <div class="bootstrap-iso">
                                    <input class="form-control" id="dateOuverturePlis" name="dateOuverturePlis" placeholder="MM/DD/YYYY" type="text"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                                <div class="bootstrap-iso">
                                    <label>Date De début de travaux</label>
                                    <input class="form-control" id="dateDebutTravaux" name="dateDebutTravaux" placeholder="MM/DD/YYYY" type="text" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                                <label>Date De fin de travaux</label>
                                <input class="form-control" id="delaiFin" name="delaiFin" type="number" placeholder="Délai en jour..." />
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Liste des Architectes</label>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">
                                    <select class="form-control ">
                                        <option>Ayyachi</option>
                                        <option>Oualid</option>
                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                                    <div class="round-button">
                                        <div class="round-button-circle">
                                            <a class="round-button" data-toggle="modal" data-target="#archiModal">
										+
									</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="archiModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Ajouter un Architecte</h4>
                                        </div>
                                        <div class="modal-body"> 
                                            <div class="container">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                            <label class="control-label">Nom de l'architecte</label>
                                                            <input input="text" class="form-control" name="nomArchi"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                            <label class="control-label">Email de l'architecte</label>
                                                            <input type="email" class="form-control" name="emailArchi"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                            <label>Téléphone de l'Architecte</label>
                                                            <input type="number" class="form-control" name="telArchi"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                            <label>FAX de l'Architecte</label>
                                                            <input type="number" class="form-control" name="faxArchi"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                	<div class="row">
                                                		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                			<input type="submit" class="btn btn-success" value="Ajouter"></input>
                                                		</div>
                                                	</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Liste des Laboratoires</label>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <select class="form-control ">
                                        <option>lab1</option>
                                        <option>lab2</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <div class="round-button">
                                        <div class="round-button-circle">
                                            <a href="#" class="round-button" data-toggle="modal" data-target="#labModal">
										+
									</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="labModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Ajouter un Laboratoire</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                            <label class="control-label">Nom du laboratoire</label>
                                                            <input input="text" class="form-control" name="nomLabo"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                            <label class="control-label">Email du laboratoire</label>
                                                            <input type="email" class="form-control" name="emaiLabo"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                            <label>Téléphone du laboratoire</label>
                                                            <input type="number" class="form-control" name="telLabo"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                            <label>FAX du laboratoire</label>
                                                            <input type="number" class="form-control" name="faxLabo"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                	<div class="row">
                                                		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                			<input type="submit" class="btn btn-success" value="Ajouter"></input>
                                                		</div>
                                                	</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Liste des Maitre d'Ouvrage</label>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <select class="form-control ">
                                        <option>Maitre 1</option>
                                        <option>Maitre 2</option>
                                        <option>Maitre 3</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <div class="round-button">
                                        <div class="round-button-circle">
                                            <a href="#" class="round-button" data-toggle="modal" data-target="#MaitreModal">
                                        +
                                    </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="MaitreModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Ajouter un Maitre d'ouvrage</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                            <label class="control-label">Nom du Maitre d'ouvrage</label>
                                                            <input input="text" class="form-control" name="nomMaitre"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                            <label class="control-label">Email du Maitre d'ouvrage</label>
                                                            <input type="email" class="form-control" name="emailMaitre"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                            <label>Téléphone du Maitre d'ouvrage</label>
                                                            <input type="number" class="form-control" name="telMaitre"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                            <label>FAX du Maitre d'ouvrage</label>
                                                            <input type="number" class="form-control" name="faxMaitre"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                            <input type="submit" class="btn btn-success" value="Ajouter"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                                <input type="submit" class="btn btn-success" value="Envoyer"></input>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </body>
		<script>
    		/*Datepicker Date ouverture des plis*/
    		$(document).ready(function(){
        		var date_input=$('input[name="dateOuverturePlis"]'); //our date input has the name "date"
        		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        		date_input.datepicker({
            		format: 'mm/dd/yyyy',
            		container: container,
            		todayHighlight: true,
            		autoclose: true,
        		});

        	/*Datepicker Date debut des travaux*/
        	var date_iput1=$('input[name="dateDebutTravaux"]');
        	var container1=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent : "body";
        	date_iput1.datepicker({
            	format :'mm/dd/yyyy',
            	container:container1,
            	todayHighlight: true,
            	autoclose : true,
        	});
   		 })
</script>
</html>