@extends('layouts.keen')

@section('subheader')
	<!-- begin:: Subheader -->
	<div id="kt_subheader" class="kt-subheader kt-grid__item ">
		<div class="kt-container  kt-container--fluid ">
			<!-- begin:: Subheader Title -->
			<div class="kt-subheader__title">
				<!-- <button class="kt-subheader__toggler kt-subheader__toggler--left" id="kt_aside_toggler"><span></span></button> -->
				<button class="kt-subheader__toggler kt-subheader__toggler--left" id=""><span></span></button>
				<div class="kt-subheader__breadcrumbs">
					<a href="" class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--home">Mantenimiento</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link ">Tractores</a>
				</div>
			</div>

			<!-- end:: Subheader Title -->


			<!-- begin:: Sub-header toolbar -->
			<div class="kt-subheader__toolbar">
				<div class="kt-subheader__toolbar-wrapper">
					<!-- <a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Editar</a> -->
					<!-- <a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Configuración</a>
					<div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="Quick actions" data-placement="top">
						<a href="#" class="btn btn-icon btn btn-label btn-label-brand btn-bold" data-toggle="dropdown" data-offset="0,5px" aria-haspopup="true" aria-expanded="false">
							<i class="flaticon2-add-1"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-menu-anim">
							<ul class="kt-nav kt-nav--active-bg" id="m_nav_1" role="tablist">
								<li class="kt-nav__item">
									<a href="" class="kt-nav__link">
										<i class="kt-nav__link-icon flaticon2-psd"></i>
										<span class="kt-nav__link-text">Document</span>
									</a>
								</li>
								<li class="kt-nav__item">
									<a class="kt-nav__link" role="tab" id="m_nav_link_1">
										<i class="kt-nav__link-icon flaticon2-supermarket"></i>
										<span class="kt-nav__link-text">Message</span>
									</a>
								</li>
								<li class="kt-nav__item">
									<a href="" class="kt-nav__link">
										<i class="kt-nav__link-icon flaticon2-shopping-cart"></i>
										<span class="kt-nav__link-text">Product</span>
									</a>
								</li>
								<li class="kt-nav__item">
									<a class="kt-nav__link" role="tab" id="m_nav_link_2">
										<i class="kt-nav__link-icon flaticon2-chart2"></i>
										<span class="kt-nav__link-text">Report</span>
										<span class="kt-nav__link-badge">
											<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded">pdf</span>
										</span>
									</a>
								</li>
								<li class="kt-nav__item">
									<a href="" class="kt-nav__link">
										<i class="kt-nav__link-icon flaticon2-sms"></i>
										<span class="kt-nav__link-text">Post</span>
									</a>
								</li>
								<li class="kt-nav__item">
									<a href="" class="kt-nav__link">
										<i class="kt-nav__link-icon flaticon2-avatar"></i>
										<span class="kt-nav__link-text">Customer</span>
									</a>
								</li>
							</ul>
						</div>
					</div> -->
				</div>
			</div>

			<!-- end:: Sub-header toolbar -->
		</div>
	</div>
	<!-- end:: Subheader -->
@endsection

@section('content')
	<!--begin::Portlet-->
	<div class="kt-portlet">
		<div class="kt-portlet__head">
			<div class="kt-portlet__head-label" style="width:100%;display: flex;justify-content:space-between;">
				<h3 class="kt-portlet__head-title">Tractores</h3>
				<button type="button" class="btn btn-brand btn-md btn-bold btn-upper" @click="showCreateModal()">Agregar tractor</button>
			</div>
		</div>
		<div class="kt-portlet__body">

			<!--begin::Section-->
			<div class="kt-section">
				<div class="kt-section__info">
					Información de tractores
				</div>
				<div class="kt-section__content">
					<table class="table table-head-noborder" id="trucksTable">
						<thead>
							<tr>
								<th>ID</th>
								<th>TRACTOR</th>
								<th>TIPO</th>
								<th>PLACAS</th>
								<th width="10%">VIN</th>
								<th width="10%">KILOMETRAJE ÚLTIMA INSPECCIÓN</th>
								<th width="10%">KILOMETRAJE ACTUAL</th>
								<th width="10%">FECHA DE KILOMETRAJE</th>
								<th width="10%">STATUS</th>
								<th>REVISIÓN DE KILOMETRAJE<br/>ALERTA CALENDARIO DE PARTES</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="truck in trucks">
								<th v-text="truck.id" scope="row"></th>
								<td v-text="truck.trailer"></td>								
								<td v-text="truck.type"></td>								
								<td v-text="truck.plates"></td>								
								<td v-text="truck.vin"></td>
								<td>@{{ checkDecimal(truck.latest_mileage) }}</td>
								<td>@{{ checkDecimal(truck.actual_mileage) }}</td>
								<td>@{{ dateMileage(truck.date_mileage) }}</td>
								<td>
									<div v-if="truck.inactive_at">
										<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded">Desactivado</span>
									</div>
									<div v-if="truck.inactive_at === null" style="display:flex;flex-direction:column;">
										<div v-if="truck.status_mileage === 1">
											<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
												style="width: 75px;height:4px;padding:0;background: #388e3c;"></span>
										</div>
										<div v-if="truck.status_mileage === 2">
											<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
												style="width: 75px;height:4px;padding:0;background: #fbc02d;"></span>
										</div>
										<div v-if="truck.status_mileage === 3">
											<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
												style="width: 75px;height:4px;padding:0;background: #d32f2f;"></span>
										</div>
										<div v-if="truck.status_mileage === 0">
											<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
												style="width: 75px;height:4px;padding:0;background: gray;"></span>
										</div>
										<div v-if="truck.status_mileage === null">
											<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
												style="width: 75px;height:4px;padding:0;background: transparent;"></span>
										</div>
										<div v-if="truck.status_parts === 1">
											<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
												style="width: 75px;height:4px;padding:0;background: #388e3c;"></span>
										</div>
										<div v-if="truck.status_parts === 2">
											<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
												style="width: 75px;height:4px;padding:0;background: #fbc02d;"></span>
										</div>
										<div v-if="truck.status_parts === 3">
											<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
												style="width: 75px;height:4px;padding:0;background: #d32f2f;"></span>
										</div>
										<div v-if="truck.status_parts === 0">
											<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
												style="width: 75px;height:4px;padding:0;background: gray;"></span>
										</div>
										<div v-if="truck.status_parts === null">
											<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
												style="width: 75px;height:4px;padding:0;background: transparent;"></span>
										</div>
									</div>
								</td>
								<td>Revisión en kilometraje <br/>Alerta calendario de partes</td>
								<td style="display:flex;">
									<div v-if="truck.inactive_at">
										<a @click="showActivateModal(truck)" class="btn btn-sm btn-clean btn-icon btn-icon-sm" data-toggle="tooltip" data-placement="top" title="Activar tractor" data-original-title="Activar tractor">		
											<i class="flaticon2-refresh-arrow"></i>						
										</a>
									</div>
									<div v-else>
										<a @click="showTruckInformationModal(truck)" class="btn btn-sm btn-clean btn-icon btn-icon-sm" data-toggle="tooltip" data-placement="top" title="Ver detalles" data-original-title="Ver detalles">		
											<i class="flaticon2-expand"></i>						
										</a>
										<a @click="showEditModal(truck)" class="btn btn-sm btn-clean btn-icon btn-icon-sm" data-toggle="tooltip" data-placement="top" title="Editar información" data-original-title="Editar información">		
											<i class="flaticon-edit-1"></i>					
										</a>
										<a @click="showDeactivateModal(truck)" class="btn btn-sm btn-icon btn-clean btn-icon-sm" data-toggle="tooltip" data-placement="top" title="Desactivar tractor" data-original-title="Desactivar tractor">		
											<i class="flaticon-delete-1"></i>						
										</a>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!--end::Form-->
	</div>
	<!--end::Portlet-->

@endsection

@section('modals')
 	<!-- Modal Crear Tractor -->
    <div class="modal fade" id="createTruckModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Crear tractor</h5>
                    <button type="button" class="close" @click="closeCreateModal()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" v-model="id_truck">
                    <input type="hidden" v-model="method_field" name="_method" value="PUT">
                    <div class="form-group row">
                    	<div class="col-lg-3">
	                        <label for="trailer" class=" form-control-label">Trailer:</label>
	                        <input type="text" v-model="trailer" name="trailer" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa el trailer</span>
                    	</div>
                    	<div class="col-lg-3">
	                        <label for="type" class=" form-control-label">Tipo:</label>
	                        <select class="form-control" name="type" id="type_create" v-model="type">
								<option value="Transfer">Transfer</option>
								<option value="Foráneo">Foráneo</option>
								<option selected>Seleccionar...</option>
							</select>
	                        <span class="form-text text-muted">Porfavor ingresa el tipo</span>
                    	</div>
                    	<div class="col-lg-3">
	                        <label for="plates" class=" form-control-label">Placas:</label>
	                        <input type="text" v-model="plates" name="plates" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa las placas</span>
                    	</div>
						<div class="col-lg-3">
	                        <label for="vin" class=" form-control-label">Vin:</label>
	                        <input type="text" v-model="vin" name="vin" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa el vin</span>
                    	</div>
                    </div>
                    <div class="form-group row">
                    	<div class="col-lg-4">
	                        <label for="latest_mileage" class=" form-control-label">Kilometraje última inspección</label>
	                        <input type="number" v-model="latest_mileage" name="latest_mileage" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa el último kilometraje</span>
                    	</div>
                    	<div class="col-lg-4">
	                        <label for="actual_mileage" class=" form-control-label">Kilometraje actual</label>
	                        <input type="number" v-model="actual_mileage" name="actual_mileage" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa el kilometraje actual</span>
                    	</div>
                    	<div class="col-lg-4">
	                        <label for="date_mileage" class=" form-control-label">Fecha de kilometraje</label>
	                        <input type="date" v-model="date_mileage" name="date_mileage" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa la fecha del kilometraje</span>
                    	</div>
                    </div>
                </div>
                <div class="modal-footer kt-portlet__foot kt-portlet__foot--solid">
                    <button type="button" class="btn btn-outline-brand" @click="closeCreateModal()">Cerrar</button>
                    <button type="button" class="btn btn-brand" @click="createTruck()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin de Modal Crear Tractor -->

    <!-- Modal Editar Información de Tractor -->
    <div class="modal fade" id="editTruckModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Editar información de tractor</h5>
                    <button type="button" class="close" @click="closeEditModal()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" v-model="id_truck">
                    <input type="hidden" v-model="method_field" name="_method" value="PUT">
                    <div class="form-group row">
                    	<div class="col-lg-3">
	                        <label for="trailer" class=" form-control-label">Trailer:</label>
	                        <input type="text" v-model="trailer" name="trailer" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa el trailer</span>
                    	</div>
                    	<div class="col-lg-3">
	                        <label for="type" class=" form-control-label">Tipo:</label>
	                        <select class="form-control" name="type" id="type_create" v-model="type">
								<option value="Transfer">Transfer</option>
								<option value="Foráneo">Foráneo</option>
								<option selected>Seleccionar...</option>
							</select>
	                        <span class="form-text text-muted">Porfavor ingresa el tipo</span>
                    	</div>
                    	<div class="col-lg-3">
	                        <label for="plates" class=" form-control-label">Placas:</label>
	                        <input type="text" v-model="plates" name="plates" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa las placas</span>
                    	</div>
						<div class="col-lg-3">
	                        <label for="vin" class=" form-control-label">Vin:</label>
	                        <input type="text" v-model="vin" name="vin" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa el vin</span>
                    	</div>
                    </div>
                    <div class="form-group row">
                    	<div class="col-lg-4">
	                        <label for="latest_mileage" class=" form-control-label">Kilometraje última inspección</label>
	                        <input type="number" v-model="latest_mileage" name="latest_mileage" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa el último kilometraje</span>
                    	</div>
                    	<div class="col-lg-4">
	                        <label for="actual_mileage" class=" form-control-label">Kilometraje actual</label>
	                        <input type="number" v-model="actual_mileage" name="actual_mileage" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa el kilometraje actual</span>
                    	</div>
                    	<div class="col-lg-4">
	                        <label for="date_mileage" class=" form-control-label">Fecha de kilometraje</label>
	                        <input type="date" v-model="date_mileage" name="date_mileage" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa la fecha del kilometraje</span>
                    	</div>
                    </div>
                </div>
                <div class="modal-footer kt-portlet__foot kt-portlet__foot--solid">
                    <button type="button" class="btn btn-outline-brand" @click="closeEditModal()">Cerrar</button>
                    <button type="button" class="btn btn-brand" @click="saveTruck()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin de Modal Editar Información de Tractor -->

    <!-- Modal Activar Tractor -->
    <div class="modal fade" id="activateTruckModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Activar tractor</h5>
            <button type="button" class="close" @click="closeActivateModal()" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="py-3 text-center">
                <i class="fas fa-exclamation-circle fa-4x"></i>
                <h4 class="heading mt-4">Estás seguro?</h4>
                <p>
                    Estás a punto de activar este tractor
                </p>
            </div>
            <input type="hidden" v-model="id_truck">
            <input type="hidden" v-model="method_field" name="_method" value="POST">
          </div>
          <div class="modal-footer">
            <button type="button" @click="closeActivateModal()" class="btn btn-outline-info">Cerrar</button>
            <button type="button" class="btn btn-info" @click="activateTruck()">Activar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin del Modal Activar Tractor -->

	<!-- Modal Desactivar Tractor -->
    <div class="modal fade" id="deactivateTruckModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Desactivar tractor</h5>
            <button type="button" class="close" @click="closeDeactivateModal()" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="py-3 text-center">
                <i class="fas fa-exclamation-circle fa-4x"></i>
                <h4 class="heading mt-4">Estás seguro?</h4>
                <p>
                    Estás a punto de desactivar este tractor
                </p>
            </div>
            <input type="hidden" v-model="id_truck">
            <input type="hidden" v-model="method_field" name="_method" value="DELETE">
          </div>
          <div class="modal-footer">
            <button type="button" @click="closeDeactivateModal()" class="btn btn-outline-danger">Cerrar</button>
            <button type="button" class="btn btn-danger" @click="deactivateTruck()">Desactivar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin del Modal Desactivar Usuario -->
@endsection

@section('scripts')
	<script type="text/javascript">
		var app = new Vue({
		  	el : '#app',
		  	data : {
		    	trucks : [],
		    	truck : [],
		    	id_truck : 0,
		    	trailer : '',
		    	type : '',
		    	plates : '',
		    	vin : '',
		    	latest_mileage : '',
		    	actual_mileage : '',
		    	date_mileage : '',
		    	method_field : '',
		    	base_url: '<?php echo url('/'); ?>'	    	
		    	
		  	},
			methods: {
				truckStatus(truck = []){
					let me = this;
		  			axios.get(this.base_url + '/tractores/status/' + truck.id)
			      	.then(response => {
			      		console.log(response.data);
			      	})
			      	.catch(error => {
			        	console.log(error)
			        	this.errored = true
			      	})
				},
		  		listTrucks(){
		  			let me = this;
					
		  			axios.get(this.base_url + '/tractores/listar')
			      	.then(response => {
			        	me.trucks = response.data;
			      	})
			      	.catch(error => {
			        	console.log(error)
			        	this.errored = true
			      	})
		  		},		
		  		createTruck() {
					let me = this;
					axios.post(this.base_url + '/tractores', {
						id_truck: this.id_truck,
						trailer: this.trailer,
						type: this.type,
						plates: this.plates,
						vin: this.vin,
						latest_mileage: this.latest_mileage,
						actual_mileage: this.actual_mileage,
						date_mileage: this.date_mileage,

					})
				  	.then(function (response) {
					    console.log(response);
					    me.closeCreateModal();
					    me.listTrucks();
					    toastr.options = {
						  "closeButton": true,
						  "debug": true,
						  "newestOnTop": true,
						  "progressBar": true,
						  "positionClass": "toast-top-right",
						  "preventDuplicates": true,
						  "showDuration": "300",
						  "hideDuration": "1000",
						  "timeOut": "5000",
						  "extendedTimeOut": "1000",
						  "showEasing": "swing",
						  "hideEasing": "linear",
						  "showMethod": "fadeIn",
						  "hideMethod": "fadeOut"
						};

						toastr.success("El tractor se registró correctamente.", "Correcto");
					})
					.catch(function (error) {
					    console.log(error);
					    me.closeCreateModal();
					    me.listTrucks();
					    toastr.options = {
						  "closeButton": true,
						  "debug": true,
						  "newestOnTop": true,
						  "progressBar": true,
						  "positionClass": "toast-top-right",
						  "preventDuplicates": true,
						  "showDuration": "300",
						  "hideDuration": "1000",
						  "timeOut": "5000",
						  "extendedTimeOut": "1000",
						  "showEasing": "swing",
						  "hideEasing": "linear",
						  "showMethod": "fadeIn",
						  "hideMethod": "fadeOut"
						};

						toastr.error("Ocurrió un problema al guardar la información.", "Incorrecto");
					});
				},
		  		showCreateModal() {
		  			let me = this;
					$('#createTruckModal').modal('show');
				},
				closeCreateModal() {
					this.id_truck = '';
					this.truck = [];
					this.trailer = '';					
					this.type = '';
					this.plates = '';
					this.vin = '';
					this.latest_mileage = '';					
					this.actual_mileage = '';					
					this.date_mileage = '';					
					$('#createTruckModal').modal('hide');
				},
				saveTruck() {
					let me = this;
					axios.post(this.base_url + '/tractores/' + this.id_truck, {
						_method: "PUT",
						id_truck: this.id_truck,
						trailer: this.trailer,
						type: this.type,
						plates: this.plates,
						vin: this.vin,
						latest_mileage: this.latest_mileage,
						actual_mileage: this.actual_mileage,
						date_mileage: this.date_mileage,
					})
				  	.then(function (response) {
					    console.log(response);
					    me.closeEditModal();
					    me.listTrucks();
					    toastr.options = {
						  "closeButton": true,
						  "debug": true,
						  "newestOnTop": true,
						  "progressBar": true,
						  "positionClass": "toast-top-right",
						  "preventDuplicates": true,
						  "showDuration": "300",
						  "hideDuration": "1000",
						  "timeOut": "5000",
						  "extendedTimeOut": "1000",
						  "showEasing": "swing",
						  "hideEasing": "linear",
						  "showMethod": "fadeIn",
						  "hideMethod": "fadeOut"
						};

						toastr.success("La información del tractor se guardó correctamente.", "Correcto");
					})
					.catch(function (error) {
					    console.log(error);
					    me.closeEditModal();
					    me.listTrucks();
					    toastr.options = {
						  "closeButton": true,
						  "debug": true,
						  "newestOnTop": true,
						  "progressBar": true,
						  "positionClass": "toast-top-right",
						  "preventDuplicates": true,
						  "showDuration": "300",
						  "hideDuration": "1000",
						  "timeOut": "5000",
						  "extendedTimeOut": "1000",
						  "showEasing": "swing",
						  "hideEasing": "linear",
						  "showMethod": "fadeIn",
						  "hideMethod": "fadeOut"
						};

						toastr.error("Ocurrió un problema al guardar la información.", "Incorrecto");
					});
				},
				showEditModal(truck = []) {
					let me = this;
					this.id_truck = truck['id'];
					this.trailer = truck['trailer'];
					this.type = truck['type'];
					this.plates = truck['plates'];
					this.vin = truck['vin'];
					this.latest_mileage = truck['latest_mileage'];
					this.actual_mileage = truck['actual_mileage'];
					this.date_mileage = truck['date_mileage'];
					$('#editTruckModal').modal('show');
				},
				closeEditModal() {
					this.id_truck = '';
					this.truck = [];
					this.trailer = '';					
					this.type = '';
					this.plates = '';
					this.vin = '';
					this.latest_mileage = '';					
					this.actual_mileage = '';					
					this.date_mileage = '';					
					$('#editTruckModal').modal('hide');
				},
				deactivateTruck() {
					let me = this;
					axios.post(this.base_url + '/tractores/desactivar/' + this.id_truck, {
						id_truck: this.id_truck,
						_method: "DELETE",
					})
				  	.then(function (response) {
					    console.log(response);
					    me.closeDeactivateModal();
					    me.listTrucks();
					    toastr.options = {
						  "closeButton": true,
						  "debug": true,
						  "newestOnTop": true,
						  "progressBar": true,
						  "positionClass": "toast-top-right",
						  "preventDuplicates": true,
						  "showDuration": "300",
						  "hideDuration": "1000",
						  "timeOut": "5000",
						  "extendedTimeOut": "1000",
						  "showEasing": "swing",
						  "hideEasing": "linear",
						  "showMethod": "fadeIn",
						  "hideMethod": "fadeOut"
						};

						toastr.success("El tractor se desactivó correctamente.", "Correcto");
					})
					.catch(function (error) {
					    console.log(error);
					    me.closeDeactivateModal();
					    me.listTrucks();
					    toastr.options = {
						  "closeButton": true,
						  "debug": true,
						  "newestOnTop": true,
						  "progressBar": true,
						  "positionClass": "toast-top-right",
						  "preventDuplicates": true,
						  "showDuration": "300",
						  "hideDuration": "1000",
						  "timeOut": "5000",
						  "extendedTimeOut": "1000",
						  "showEasing": "swing",
						  "hideEasing": "linear",
						  "showMethod": "fadeIn",
						  "hideMethod": "fadeOut"
						};

						toastr.error("Ocurrió un problema la guardar la información.", "Incorrecto");
					});
				},
				showDeactivateModal(truck = []) {
					this.id_truck = truck['id'];
					$('#deactivateTruckModal').modal('show');
				},
				closeDeactivateModal() {
					this.id_truck = 0;
					$('#deactivateTruckModal').modal('hide');
				},
				activateTruck() {
					let me = this;
					axios.post(this.base_url + '/tractores/activar/' + this.id_truck, {
						id_truck: this.id_truck,
						_method: "POST",
					})
				  	.then(function (response) {
					    console.log(response);
					    me.closeActivateModal();
					    me.listTrucks();
					    toastr.options = {
						  "closeButton": true,
						  "debug": true,
						  "newestOnTop": true,
						  "progressBar": true,
						  "positionClass": "toast-top-right",
						  "preventDuplicates": true,
						  "showDuration": "300",
						  "hideDuration": "1000",
						  "timeOut": "5000",
						  "extendedTimeOut": "1000",
						  "showEasing": "swing",
						  "hideEasing": "linear",
						  "showMethod": "fadeIn",
						  "hideMethod": "fadeOut"
						};

						toastr.success("El tractor se activó correctamente.", "Correcto");
					})
					.catch(function (error) {
					    console.log(error);
					    me.closeActivateModal();
					    me.listTrucks();
					    toastr.options = {
						  "closeButton": true,
						  "debug": true,
						  "newestOnTop": true,
						  "progressBar": true,
						  "positionClass": "toast-top-right",
						  "preventDuplicates": true,
						  "showDuration": "300",
						  "hideDuration": "1000",
						  "timeOut": "5000",
						  "extendedTimeOut": "1000",
						  "showEasing": "swing",
						  "hideEasing": "linear",
						  "showMethod": "fadeIn",
						  "hideMethod": "fadeOut"
						};

						toastr.error("Ocurrió un problema la guardar la información.", "Incorrecto");
					});
				},
				showActivateModal(truck = []) {
					this.id_truck = truck['id'];
					$('#activateTruckModal').modal('show');
				},
				closeActivateModal() {
					this.id_user = 0;
					$('#activateTruckModal').modal('hide');
				},
				dateMileage(date) {
					const date2 = new Date(date)
					const day = date2.getDate() + 1
					const month = date2.getMonth() + 1
					const year = date2.getFullYear()

					if(month < 10){
						return `${day}/0${month}/${year}`
					}else{
						return `${day}/${month}/${year}`
					}
				},
				checkDecimal(number){
					if (number % 1 == 0) {
						return this.commaSeparateNumber(Math.floor(number))
					} else {
						return this.commaSeparateNumber(number)
					}
				},
				commaSeparateNumber(number){
					while (/(\d+)(\d{3})/.test(number.toString())){
						number = number.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2')
					} 
					return number
				},
				showTruckInformationModal(truck = []){
					this.id_truck = truck['id'];
					window.location = this.base_url + '/tractores/' + this.id_truck;
				}

			},
			mounted() {
			    this.listTrucks();
			}
		})
	</script>
	<script type="text/javascript">
		$(document).ready( function () {
			setTimeout( function(){
			    $('#trucksTable').DataTable({
			    	"language" : {
					    "sProcessing":     "Procesando...",
		                "sLengthMenu":     "Mostrar _MENU_ registros",
		                "sZeroRecords":    "No se encontraron resultados",
		                "sEmptyTable":     "Ningún dato disponible en esta tabla",
		                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
		                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
		                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		                "sInfoPostFix":    "",
		                "sSearch":         "Buscar:",
		                "sUrl":            "",
		                "sInfoThousands":  ",",
		                "sLoadingRecords": "Cargando...",
		                "oPaginate": {
		                    "sFirst":    "Primero",
		                    "sLast":     "Último",
		                    "sNext":     "Siguiente",
		                    "sPrevious": "Anterior"
		                },
		                "oAria": {
		                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
		                },
		                "buttons": {
		                    "copy": "Copiar",
		                    "colvis": "Visibilidad"
		                }
					},
					"dom" : "<'row justify-content-between'<'justify-content-between col-sm-12 col-md-10'l><'justify-content-between col-sm-12 col-md-2'f>>" +
							"<'row'<'col-sm-12'tr>>" +
							"<'row justify-content-between'<'col-sm-12 col-md-9'i><'row justify-content-end col-sm-12 col-md-3'p>>",
			    });
			}, 500);
		} );
		@if(session()->has('success'))
			toastr.options = {
			  "closeButton": true,
			  "debug": true,
			  "newestOnTop": true,
			  "progressBar": true,
			  "positionClass": "toast-top-right",
			  "preventDuplicates": true,
			  "showDuration": "300",
			  "hideDuration": "1000",
			  "timeOut": "5000",
			  "extendedTimeOut": "1000",
			  "showEasing": "swing",
			  "hideEasing": "linear",
			  "showMethod": "fadeIn",
			  "hideMethod": "fadeOut"
			};

			toastr.success("{{ session('success') }}", "Correcto");
        @endif

        @if(session()->has('error'))
			toastr.options = {
			  "closeButton": true,
			  "debug": true,
			  "newestOnTop": true,
			  "progressBar": true,
			  "positionClass": "toast-top-right",
			  "preventDuplicates": true,
			  "showDuration": "300",
			  "hideDuration": "1000",
			  "timeOut": "5000",
			  "extendedTimeOut": "1000",
			  "showEasing": "swing",
			  "hideEasing": "linear",
			  "showMethod": "fadeIn",
			  "hideMethod": "fadeOut"
			};

			toastr.error("{{ session('error') }}", "Incorrecto");
        @endif
	</script>
@endsection
