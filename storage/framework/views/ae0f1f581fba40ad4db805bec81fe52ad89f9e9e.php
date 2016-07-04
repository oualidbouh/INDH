<!DOCTYPE html>
<html>
	<head>
		<title>Ajouter un Marché</title>
    	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
   	 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    	<link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    	<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular.min.js"></script>
      <script type="text/javascript" src="<?php echo e(url('script/script.js')); ?>"></script>
   	 	<style type="text/css">
   	 	body{
   	 		padding:50px;
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
      <script type="text/javascript">

          var app = angular.module('app',[]);

          app.factory('DataLaboratoires',function($http){
            return {
              get : function(url,callback){
                $http.get(url).success(function(data){
                  callback(data);
                });
              }
            };
          });


          app.controller('addMaitreOuvrage',function($scope,$http){
            /* l'evenements du click sur le boutton ajouté dans le modal Ajouter Maitre d'ouvage*/
           
            $scope.maitre = {};
                  $scope.addMaitreOuvrage=function(){
                 
                 $http.post('/addMaitreOuvrage',$scope.maitre)
              .success(function(res){
                  $scope.maitre={};
                  $('#maitreModal').modal('toggle');
              }).error(function(){

              });
              }
              /*Fin de la fonciton d'ajout d'un maitre d'ouvrage*/
            
          });

         app.controller('labCtrl',function($scope,DataLaboratoires){
            $scope.Laboratoires={};
            DataLaboratoires.get('/getAllLaboratoires',function(data){
                  $scope.laboratoires = data;
             
            });
                //console.log();
          });

      </script> 
	</head>

	<body>
		<div class="container" ng-app="app">
			<form class="form-horizontal" style="background-color: #f9f9f9;">
  				<fieldset>
    				<legend>Ajouter un Marché : </legend>
    				<div class="form-group">
      					<label for="inputEmail" class="col-lg-4 control-label">Titre Du marché</label>
      					<div class="col-lg-6">
        					<input class="form-control" name="name_marche"  placeholder="Titre du marché" type="text">
      					</div>
    				</div>
    				<div class="form-group">
      					<label for="type_marche" class="col-lg-4 control-label">Type du marché</label>
      					<div class="col-lg-6">
        					<select class="form-control">
                                <option>INDH</option>
                                <option>BP</option>
                                <option>BG</option>
                            </select>
      					</div>
    				</div>
    				<div class="form-group">
      					<label for="description_marche" class="col-lg-4 control-label">Description du marché</label>
      					<div class="col-lg-6">
        					<textarea class="form-control" name="description_marche" rows="3" id="textArea"></textarea>
      					</div>
   	 				</div>
    				<div class="form-group">
      				<label for="budget_marche" class="col-lg-4 control-label">Budget Du marché</label>
      				<div class="col-lg-6">
       					<input type="text" class="form-control" name="budget_marche" />
      				</div>
    				</div>
   					<div class="form-group">
   					<div class="col-lg-4 control-label">
   						<label for="dateOuverturePlis">Date d'ouverture Des plis</label>	
   					</div>
   					<div class="col-lg-6">
   						<div class="bootstrap-iso">
                            <input class="form-control" id="dateOuverturePlis" name="dateOuverturePlis" placeholder="MM/DD/YYYY" type="text"/>
                        </div>
   					</div>
   					</div>
   					<div class="form-group">
   					<div class="col-lg-4 control-label">
   						<label for="dateDebutTravaux">Date de début des travaux : </label>
   					</div>
   					<div class="col-lg-6">
   						<div class="bootstrap-iso">
                            <input class="form-control" name="dateDebutTravaux" placeholder="MM/DD/YYYY" type="text"/>
                        </div>
   					</div>
   					</div>
   					<div class="form-group">
   					    <div class="col-lg-4 control-label">
   						    <label for="duree_travaux">Durée des travaux</label>
   					    </div>
   					    <div class="col-lg-6">
   						     <input type="text" class="form-control" name="duree_travaux" />
   					    </div>
   					</div>
   					<div class="form-group">
   					<div class="col-lg-4 control-label">
   						<label for="decompte_marche">Decompte : </label>
   					</div>
   					<div class="col-lg-6">
   						<input type="text" name="decompte_marche" class="form-control"/>
   					</div>
   					</div>
   					<div class="form-group">
   					<div class="col-lg-4 control-label">
   						<label for="liste_maitre_ouvrage">Liste des Maitre d'ouvrage</label>
   					</div>
   					<div class="col-lg-8">
   						 <div class="col-lg-6">
                            <select name="liste_maitre_ouvrage" class="form-control ">
                                <option>Maitre 1</option>
                                <option>Maitre 2</option>
                                <option>Maitre 3</option>
                            </select>
                        </div>
                    	<div class="col-lg-1 col-lg-offset-2">
                        	<div class="round-button">
                            	<div class="round-button-circle">
                                	<a href="#" class="round-button" data-toggle="modal" data-target="#maitreModal">
                                    	+
                                	</a>
                            	</div>
                        	</div>
                     	</div>
   					</div>
   					<div  id="maitreModal" class="modal fade" ng-controller="addMaitreOuvrage">
  						<div class="modal-dialog">
    						<div class="modal-content">
      							<div class="modal-header">
        							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        						<h4 class="modal-title">Ajouter un maitre d'ouvrage</h4>
      							</div>
      							<div class="modal-body">
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="name_maitre_ouvrage">Nom du Maitre d'Ouvrage</label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="text" class="form-control" ng-model="maitre.name_maitre_ouvrage" name="name_maitre_ouvrage" />
        								</div>
        							</div>
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="email_maitre_ouvrage">Adresse Email : </label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="email" class="form-control" ng-model="maitre.email_maitre_ouvrage" name="email_maitre_ouvrage" />
        								</div>
        							</div>
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="tel_maitre_ouvrage">Numéro de téléphone : </label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="text" class="form-control" ng-model="maitre.tel_maitre_ouvrage" name="tel_maitre_ouvrage" />
        								</div>
        							</div>
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="fax_maitre_ouvrage">FAX : </label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="text" class="form-control" ng-model="maitre.fax_maitre_ouvrage" name="fax_maitre_ouvrage" />
        								</div>
        							</div>
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="adresse_maitre_ouvrage">Adresse : </label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="text" class="form-control" ng-model="maitre.adresse_maitre_ouvrage" name="adresse_maitre_ouvrage" />
        								</div>
        							</div>
      							</div>
      							<div class="modal-footer">
        							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        							<button type="button" ng-click="addMaitreOuvrage()"class="btn btn-primary">Save changes</button>
      							</div>
    						</div>
  						</div>
					</div>
   					</div>
   					<div class="form-group" ng-controller="labCtrl">
   					<div class="col-lg-4 control-label">
   						<label for="liste_labo">Liste des Laboratoire : </label>
   					</div>
   					<div class="col-lg-8">
   						 <div class="col-lg-6">
                            <select class="form-control">
                              <option ng-repeat="l in laboratoires">{{l.name}}</option>
                            </select>
                        </div>
                    	<div class="col-lg-1 col-lg-offset-2">
                        	<div class="round-button">
                            	<div class="round-button-circle">
                                	<a href="#" class="round-button" data-toggle="modal" data-target="#labModal">
                                    	+
                                	</a>
                            	</div>
                        	</div>
                     	</div>
   					</div>
   					<div  id="labModal" class="modal fade">
  						<div class="modal-dialog">
    						<div class="modal-content">
      							<div class="modal-header">
        							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        							<h4 class="modal-title">Ajouter un Nouveau Laboratoire</h4>
      							</div>
      							<div class="modal-body">
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="name_lab">Nom du Laboratoire</label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="text" class="form-control" name="name_lab" />
        								</div>
        							</div>
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="tel_lab">Adresse Email : </label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="email" class="form-control" name="email_lab" />
        								</div>
        							</div>
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="tel_lab">Numéro de téléphone : </label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="text" class="form-control" name="tel_lab" />
        								</div>
        							</div>
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="fax_lab">FAX : </label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="text" class="form-control" name="fax_lab" />
        								</div>
        							</div>
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="adresse_lab">Adresse : </label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="text" class="form-control" name="adresse_lab" />
        								</div>
        							</div>
      							</div>
      							<div class="modal-footer">
        							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        							<button type="button" class="btn btn-primary">Save changes</button>
      							</div>
    						</div>
  						</div>
					</div>
   					</div>
   					<div class="form-group">
   					<div class="col-lg-4 control-label">
   						<label for="liste_labo">Liste des Bureaux d'études : </label>
   					</div>
   					<div class="col-lg-8">
   						 <div class="col-lg-6">
                            <select class="form-control ">
                                <option>bet 1</option>
                                <option>bet 2</option>
                                <option>bet 3</option>
                            </select>
                        </div>
                    	<div class="col-lg-1 col-lg-offset-2">
                        	<div class="round-button">
                            	<div class="round-button-circle">
                                	<a href="#" class="round-button" data-toggle="modal" data-target="#betModal">
                                    	+
                                	</a>
                            	</div>
                        	</div>
                     	</div>
   					</div>
   					<div  id="betModal" class="modal fade">
  						<div class="modal-dialog">
    						<div class="modal-content">
      							<div class="modal-header">
        							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        							<h4 class="modal-title">Ajouter un Nouveau Bureau d'études </h4>
      							</div>
      							<div class="modal-body">
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="name_lab">Nom du Bureau d'études : </label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="text" class="form-control" name="name_bet" />
        								</div>
        							</div>
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="tel_lab">Adresse Email : </label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="email" class="form-control" name="email_bet" />
        								</div>
        							</div>
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="tel_bet">Numéro de téléphone : </label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="text" class="form-control" name="tel_bet" />
        								</div>
        							</div>
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="fax_bet">FAX : </label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="text" class="form-control" name="fax_bet" />
        								</div>
        							</div>
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="adresse_bet">Adresse : </label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="text" class="form-control" name="adresse_bet" />
        								</div>
        							</div>
      							</div>
      							<div class="modal-footer">
        							<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        							<button type="button" class="btn btn-primary">Ajouter</button>
      							</div>
    						</div>
  						</div>
					</div>
   					</div>
   					<div class="form-group">
   					<div class="col-lg-4 control-label">
   						<label for="liste_labo">Liste des Architectes : </label>
   					</div>
   					<div class="col-lg-8">
   						 <div class="col-lg-6">
                            <select class="form-control ">
                                <option>Arch 1</option>
                                <option>Arch 2</option>
                                <option>Arch 3</option>
                            </select>
                        </div>
                    	<div class="col-lg-1 col-lg-offset-2">
                        	<div class="round-button">
                            	<div class="round-button-circle">
                                	<a href="#" class="round-button" data-toggle="modal" data-target="#archModal">
                                    	+
                                	</a>
                            	</div>
                        	</div>
                     	</div>
   					</div>
   					<div  id="archModal" class="modal fade">
  						<div class="modal-dialog">
    						<div class="modal-content">
      							<div class="modal-header">
        							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        							<h4 class="modal-title">Ajouter un Nouveau Architecte </h4>
      							</div>
      							<div class="modal-body">
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="name_lab">Nom de l'Architecte : </label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="text" class="form-control" name="name_archi" />
        								</div>
        							</div>
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="tel_lab">Adresse Email : </label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="email" class="form-control" name="email_archi" />
        								</div>
        							</div>
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="tel_bet">Numéro de téléphone : </label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="text" class="form-control" name="tel_archi" />
        								</div>
        							</div>
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="fax_bet">FAX : </label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="text" class="form-control" name="fax_archi" />
        								</div>
        							</div>
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="adresse_bet">Adresse : </label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="text" class="form-control" name="adresse_archi" />
        								</div>
        							</div>
      							</div>
      							<div class="modal-footer">
        							<button type="button" class="btn btn-default" data-dismiss="modal">fermer</button>
        							<button type="button" class="btn btn-primary">Ajouter</button>
      							</div>
    						</div>
  						</div>
					</div>
   					</div>
   					<div class="form-group">
   					<div class="col-lg-4 control-label">
   						<label for="liste_labo">Liste des Sociétés : </label>
   					</div>
   					<div class="col-lg-8">
   						 <div class="col-lg-6">
                            <select class="form-control ">
                                <option>société 1</option>
                                <option>société 2</option>
                                <option>spciété 3</option>
                            </select>
                        </div>
                    	<div class="col-lg-1 col-lg-offset-2">
                        	<div class="round-button">
                            	<div class="round-button-circle">
                                	<a href="#" class="round-button" data-toggle="modal" data-target="#societeModal">
                                    	+
                                	</a>
                            	</div>
                        	</div>
                     	</div>
   					</div>
   					<div  id="societeModal" class="modal fade">
  						<div class="modal-dialog">
    						<div class="modal-content">
      							<div class="modal-header">
        							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        							<h4 class="modal-title">Ajouter une nouvelle Société </h4>
      							</div>
      							<div class="modal-body">
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="name_soc">Nom de la société : </label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="text" class="form-control" name="name_soc" />
        								</div>
        							</div>
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="tel_soc">Adresse Email : </label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="email" class="form-control" name="email_soc" />
        								</div>
        							</div>
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="tel_soc">Numéro de téléphone : </label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="text" class="form-control" name="tel_soc" />
        								</div>
        							</div>
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="fax_soc">FAX : </label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="text" class="form-control" name="fax_soc" />
        								</div>
        							</div>
        							<div class="form-group">
        								<div class="col-lg-4 control-label">
        									<label for="adresse_soc">Adresse : </label>
        								</div>
        								<div class="col-lg-6">
        									<input  type="text" class="form-control" name="adresse_soc" />
        								</div>
        							</div>
      							</div>
      							<div class="modal-footer">
        							<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        							<button type="button" class="btn btn-primary">Ajouter</button>
      							</div>
    						</div>
  						</div>
					</div>
   					</div>
    				<div class="form-group">
      				<div class="col-lg-10 col-lg-offset-2">
        				<button type="reset" class="btn btn-default">Annuler</button>
        				<button type="submit" class="btn btn-primary">Enregister</button>
      				</div>
  				</fieldset>
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