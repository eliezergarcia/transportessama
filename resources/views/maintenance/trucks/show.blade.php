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
					<a href="{{ route('tractores.index') }}" class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--home">Tractores</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="" class="kt-subheader__breadcrumbs-link ">Información de tractor</a>
				</div>
			</div>

			<!-- end:: Subheader Title -->


			<!-- begin:: Sub-header toolbar -->
			<div class="kt-subheader__toolbar">
				<div class="kt-subheader__toolbar-wrapper">
					{{-- <button type="button" class="btn btn-default btn-sm btn-bold btn-upper" @click="showCreateModal()">Crear</button> --}}
					<button type="button" class="btn btn-brand btn-md btn-bold btn-upper" @click="showEditModal(truck)">Editar tractor</button>
					{{-- <a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Configuración</a>
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
					</div> --}}
				</div>
			</div>
			<!-- end:: Sub-header toolbar -->
		</div>
	</div>
	<!-- end:: Subheader -->
@endsection

@section('content')
	<!--begin::Portlet-->
		<div class="kt-portlet kt-widget kt-widget--fit kt-widget--general-3">
			<div class="kt-portlet__body">
				<div class="kt-widget__top">
					<div class="kt-widget__wrapper">
						<div class="kt-widget__label">
							<a href="#" class="kt-widget__title">
								Tractor: {{ $truck->trailer }}
							</a>
							<span class="kt-widget__desc">
								Tipo: {{ $truck->type }}
							</span>
						</div>
						<div class="kt-widget__links">
							<div class="kt-widget__cont">
								<div class="kt-widget__link">
									<span>Placas: </span><a href="#">&nbsp;{{ $truck->plates }}</a>
								</div>
								<div class="kt-widget__link">
									<span>Vin: </span><a href="#">&nbsp;{{ $truck->vin }}</a>
								</div>
							</div>
						</div>
						<div class="kt-widget__links">
							<div class="kt-widget__cont">
								<div class="kt-widget__link">
									<span>Kilometraje última inspección: </span><a href="#">&nbsp;{{ $truck->latest_mileage }}</a>
								</div>
								<div class="kt-widget__link">
									<span>Kilometraje actual: </span><a href="#">&nbsp;{{ $truck->actual_mileage }}</a>
								</div>
								<div class="kt-widget__link">
									<span>Fecha de kilometraje: </span><a href="#">&nbsp;{{ $truck->getLatestMileageInspection() }}</a>
								</div>
							</div>
						</div>
						<div class="kt-widget__links">
							<div class="kt-widget__cont">
								<div class="kt-widget__link" style="display:flex;align-items:center;">
									<span>Revisión en kilometraje: </span>&nbsp;&nbsp;
									@if($truck->status_mileage === 1) 
										<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
										style="width: 75px;height:4px;padding:0;background: #388e3c;"></span>
									@endif
									@if($truck->status_mileage === 2) 
										<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
										style="width: 75px;height:4px;padding:0;background: #fbc02d;"></span>
									@endif
									@if($truck->status_mileage === 3) 
										<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
										style="width: 75px;height:4px;padding:0;background: #d32f2f;"></span>
									@endif
									@if($truck->status_mileage === 0) 
										<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
										style="width: 75px;height:4px;padding:0;background: gray;"></span>
									@endif
									@if($truck->status_mileage === null) 
										<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
										style="width: 75px;height:4px;padding:0;background: transparent;"></span>
									@endif
								</div>
								<div class="kt-widget__link">
									<span>Calendario de partes: </span>&nbsp;&nbsp;
									@if($truck->status_parts === 1) 
										<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
										style="width: 75px;height:4px;padding:0;background: #388e3c;"></span>
									@endif
									@if($truck->status_parts === 2) 
										<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
										style="width: 75px;height:4px;padding:0;background: #fbc02d;"></span>
									@endif
									@if($truck->status_parts === 3) 
										<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
										style="width: 75px;height:4px;padding:0;background: #d32f2f;"></span>
									@endif
									@if($truck->status_parts === 0) 
										<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
										style="width: 75px;height:4px;padding:0;background: gray;"></span>
									@endif
									@if($truck->status_parts === null) 
										<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
										style="width: 75px;height:4px;padding:0;background: transparent;"></span>
									@endif
								</div>
							</div>
						</div>

						{{-- <div class="kt-widget__progress">
							<div class="kt-widget__cont">
								<div class="kt-widget__stat">
									<span class="kt-widget__caption">Estado</span>
									<span class="kt-widget__value">{{ $truck->porcentaje() }}%</span>
								</div>
								<div class="progress">

									<!-- Doc: A bootstrap progress bar can be used to show a user how far along it's in a process, see https://getbootstrap.com/docs/4.1/components/progress/ -->
									<div class="progress-bar bg-brand" role="progressbar" style="width: {{ $truck->porcentaje() }}%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
						<div class="kt-widget__stats">
							<div class="kt-widget__stat" href="#">
								<span class="kt-widget__value">{{ $truck->ultimaInspeccion() }}</span>
								<span class="kt-widget__caption">Última inspección</span>
							</div>
							<div class="kt-widget__stat" href="#">
								<span class="kt-widget__value">{{ $truck->proximaInspeccion() }}</span>
								<span class="kt-widget__caption">Próxima inspección</span>
							</div>
						</div> --}}
					</div>
				</div>
			</div>
			{{-- <div class="kt-portlet__foot kt-portlet__foot--fit">
				<div class="kt-widget__nav ">
					<ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-clear nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand kt-portlet__space-x" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#kt_apps_user_edit_tab_2" role="tab">
								<i class="flaticon2-protected"></i> Partes
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#kt_apps_user_edit_tab_2" role="tab">
								<i class="flaticon2-protected"></i> Mantenimiento preventivo
							</a>
						</li>
					</ul>
				</div>
			</div> --}}
		</div>
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label" style="width:100%;display: flex;justify-content:space-between;">
					<h3 class="kt-portlet__head-title">Partes</h3>
					{{-- <button type="button" class="btn btn-brand btn-md btn-bold btn-upper" @click="showCreatePartModal()">Agregar parte</button> --}}
				</div>
			</div>
			<div class="kt-portlet__body">
	
				<!--begin::Section-->
				<div class="kt-section">
					<div class="kt-section__info">
						Información de partes de tractor
					</div>

					<div class="kt_datatable" id="partsTableChild"></div>
					{{-- <div class="kt-section__content">
						<table class="table table-head-noborder" id="partsTable">
							<thead>
								<tr>
									<th width="5%" style="text-align: center;">ID</th>
									<th style="text-align: center;">PARTE</th>
									<th width="10%" style="text-align: center;">STATUS</th>
									<th width="20%" style="text-align: center;"></th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="part in parts">
									<th v-text="part.id" scope="row" style="text-align: center;"></th>
									<td v-text="part.name" style="text-align: center;"></td>								
									<td style="text-align: center;">
										<div v-if="part.inactive_at">
											<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded">Desactivado</span>
										</div>
										<div v-if="part.inactive_at === null" style="display:flex;flex-direction:column;">
											<div v-if="part.status === 1">
												<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
													style="width: 75px;height:4px;padding:0;background: #388e3c;"></span>
											</div>
											<div v-if="part.status === 2">
												<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
													style="width: 75px;height:4px;padding:0;background: #fbc02d;"></span>
											</div>
											<div v-if="part.status === 3">
												<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
													style="width: 75px;height:4px;padding:0;background: #d32f2f;"></span>
											</div>
											<div v-if="part.status === 0">
												<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
													style="width: 75px;height:4px;padding:0;background: gray;"></span>
											</div>
											<div v-if="part.status === null">
												<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded"
													style="width: 75px;height:4px;padding:0;background: transparent;"></span>
											</div>
										</div>
									</td>
									<td>ALERTA CALENDARIO PARTES<td/>
								</tr>
							</tbody>
						</table>
					</div> --}}
				</div>
			</div>
	
			<!--end::Form-->
		</div>
	<!--end::Portlet-->

@endsection

@section('modals')
	<!-- Modal Crear Parte -->
    <div class="modal fade" id="createPartModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Agregar parte de tractor</h5>
                    <button type="button" class="close" @click="closeCreatePartModal()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" v-model="method_field" name="_method" value="PUT">
                    <div class="form-group row">
                    	<div class="col-lg-6">
	                        <label for="name_part" class=" form-control-label">Nombre de la parte:</label>
	                        <input type="text" v-model="name_part" name="name_part" placeholder="Ingrese el nombre" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa el nombre de la parte</span>
                    	</div>
                    </div>
                </div>
                <div class="modal-footer kt-portlet__foot kt-portlet__foot--solid">
                    <button type="button" class="btn btn-outline-brand" @click="closeCreatePartModal()">Cerrar</button>
                    <button type="button" class="btn btn-brand" @click="createPart()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin de Modal Crear Parte -->

	<!-- Modal Editar Parte -->
	<div class="modal fade" id="editPartModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="mediumModalLabel">Editar parte de tractor</h5>
					<button type="button" class="close" @click="closeEditPartModal()" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" v-model="method_field" name="_method" value="PUT">
					<input type="hidden" v-model="id_part" name="id">
					<div class="form-group row">
						<div class="col-lg-6">
							<label for="name_part" class=" form-control-label">Nombre de la parte:</label>
							<input type="text" v-model="name_part" name="name_part" placeholder="Ingrese el nombre" class="form-control">
							<span class="form-text text-muted">Porfavor ingresa el nombre de la parte</span>
						</div>
					</div>
				</div>
				<div class="modal-footer kt-portlet__foot kt-portlet__foot--solid">
					<button type="button" class="btn btn-outline-brand" @click="closeEditPartModal()">Cerrar</button>
					<button type="button" class="btn btn-brand" @click="editPart()">Guardar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Fin de Modal Editar Parte -->

	<!-- Modal Desactivar Parte -->
	<div class="modal fade" id="deactivatePartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Desactivar parte</h5>
				<button type="button" class="close" @click="closeDeactivatePartModal()" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="py-3 text-center">
					<i class="fas fa-exclamation-circle fa-4x"></i>
					<h4 class="heading mt-4">Estás seguro?</h4>
					<p>
						Estás a punto de desactivar esta parte del tractor
					</p>
				</div>
				<input type="hidden" v-model="id_part">
				<input type="hidden" v-model="method_field" name="_method" value="DELETE">
			</div>
			<div class="modal-footer">
				<button type="button" @click="closeDeactivatePartModal()" class="btn btn-outline-danger">Cerrar</button>
				<button type="button" class="btn btn-danger" @click="deactivatePart()">Desactivar</button>
			</div>
			</div>
		</div>
	</div>
	<!-- Fin del Modal Desactivar Parte -->

	<!-- Modal Crear Subparte -->
    <div class="modal fade" id="createSubpartModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Agregar subparte de tractor</h5>
                    <button type="button" class="close" @click="closeCreateSubpartModal()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" v-model="method_field" name="_method" value="PUT">
                    <input type="hidden" v-model="part_id" name="part_id" id="part_id" value="">
                    <div class="form-group row">
                    	<div class="col-lg-8">
	                        <label for="name_subpart" class=" form-control-label">Nombre de la subparte:</label>
	                        <input type="text" v-model="name_subpart" name="name_subpart" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa el nombre de la parte</span>
                    	</div>
						<div class="col-lg-4">
							<label for="instalation_date" class=" form-control-label">Fecha de instalación</label>
							<input type="date" v-model="instalation_date" name="instalation_date" class="form-control">
							<span class="form-text text-muted">Porfavor ingresa la fecha de instalación</span>
						</div>
                    </div>
					<div class="form-group row">
                    	<div class="col-lg-4">
	                        <label for="instalation_mileage" class=" form-control-label">Kilometraje de instalación</label>
	                        <input type="number" v-model="instalation_mileage" name="instalation_mileage" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa el kilometraje de instalación</span>
                    	</div>
                    	<div class="col-lg-4">
	                        <label for="expiration_mileage" class=" form-control-label">Vencimiento de parte en kilometraje</label>
	                        <input type="number" v-model="expiration_mileage" name="expiration_mileage" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa el vencimiento de parte en kilometraje</span>
                    	</div>
                    	<div class="col-lg-4">
	                        <label for="number" class=" form-control-label">No. de parte</label>
	                        <input type="text" v-model="number" name="number" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa el no. de parte</span>
                    	</div>
                    </div>
					<div class="form-group row">
                    	<div class="col-lg-4">
	                        <label for="ubication" class=" form-control-label">Ubicación</label>
	                        <input type="text" v-model="ubication" name="ubication" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa la ubicación</span>
                    	</div>
                    	<div class="col-lg-8">
	                        <label for="notes" class=" form-control-label">Notas</label>
	                        <input type="text" v-model="notes" name="notes" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa las notas necesarias</span>
                    	</div>
                    </div>
                </div>
                <div class="modal-footer kt-portlet__foot kt-portlet__foot--solid">
                    <button type="button" class="btn btn-outline-brand" @click="closeCreateSubpartModal()">Cerrar</button>
                    <button type="button" class="btn btn-brand" @click="createSubpart()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin de Modal Crear Subparte -->

	<!-- Modal Editar Subparte -->
	<div class="modal fade" id="editSubpartModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Editar subparte de tractor</h5>
                    <button type="button" class="close" @click="closeEditSubpartModal()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" v-model="method_field" name="_method" value="PUT">
                    <input type="hidden" v-model="part_id" name="part_id" id="part_id" value="">
                    <div class="form-group row">
                    	<div class="col-lg-8">
	                        <label for="name_subpart" class=" form-control-label">Nombre de la subparte:</label>
	                        <input type="text" v-model="name_subpart" name="name_subpart" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa el nombre de la parte</span>
                    	</div>
						<div class="col-lg-4">
							<label for="instalation_date" class=" form-control-label">Fecha de instalación</label>
							<input type="date" v-model="instalation_date" name="instalation_date" class="form-control">
							<span class="form-text text-muted">Porfavor ingresa la fecha de instalación</span>
						</div>
                    </div>
					<div class="form-group row">
                    	<div class="col-lg-4">
	                        <label for="instalation_mileage" class=" form-control-label">Kilometraje de instalación</label>
	                        <input type="number" v-model="instalation_mileage" name="instalation_mileage" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa el kilometraje de instalación</span>
                    	</div>
                    	<div class="col-lg-4">
	                        <label for="expiration_mileage" class=" form-control-label">Vencimiento de parte en kilometraje</label>
	                        <input type="number" v-model="expiration_mileage" name="expiration_mileage" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa el vencimiento de parte en kilometraje</span>
                    	</div>
                    	<div class="col-lg-4">
	                        <label for="number" class=" form-control-label">No. de parte</label>
	                        <input type="text" v-model="number" name="number" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa el no. de parte</span>
                    	</div>
                    </div>
					<div class="form-group row">
                    	<div class="col-lg-4">
	                        <label for="ubication" class=" form-control-label">Ubicación</label>
	                        <input type="text" v-model="ubication" name="ubication" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa la ubicación</span>
                    	</div>
                    	<div class="col-lg-8">
	                        <label for="notes" class=" form-control-label">Notas</label>
	                        <input type="text" v-model="notes" name="notes" class="form-control">
	                        <span class="form-text text-muted">Porfavor ingresa las notas necesarias</span>
                    	</div>
                    </div>
                </div>
                <div class="modal-footer kt-portlet__foot kt-portlet__foot--solid">
                    <button type="button" class="btn btn-outline-brand" @click="closeEditSubpartModal()">Cerrar</button>
                    <button type="button" class="btn btn-brand" @click="editSubpart()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
	<!-- Fin de Modal Editar Subparte -->

	<!-- Modal Desactivar Subparte -->
	<div class="modal fade" id="deactivateSubpartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Desactivar subparte</h5>
				<button type="button" class="close" @click="closeDeactivateSubpartModal()" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="py-3 text-center">
					<i class="fas fa-exclamation-circle fa-4x"></i>
					<h4 class="heading mt-4">Estás seguro?</h4>
					<p>
						Estás a punto de desactivar esta subparte del tractor
					</p>
				</div>
				<input type="hidden" v-model="id_part">
				<input type="hidden" v-model="method_field" name="_method" value="DELETE">
			</div>
			<div class="modal-footer">
				<button type="button" @click="closeDeactivateSubpartModal()" class="btn btn-outline-danger">Cerrar</button>
				<button type="button" class="btn btn-danger" @click="deactivateSubpart()">Desactivar</button>
			</div>
			</div>
		</div>
	</div>
	<!-- Fin del Modal Desactivar Subparte -->

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
					<form method="POST" action="{{ route('tractores.update', $truck->id) }}" enctype="multipart/form-data" class="pl-2 pr-2">
						{!! csrf_field() !!}
						{!! method_field('PUT') !!}
						<input type="hidden" id="id_truck" name="id_truck" value="{{ $truck->id }}">
						<div class="form-group row">
							<div class="col-lg-3">
								<label for="trailer" class=" form-control-label">Trailer:</label>
								<input type="text" value="{{ $truck->trailer }}" id="trailer" name="trailer" class="form-control">
								<span class="form-text text-muted">Porfavor ingresa el trailer</span>
							</div>
							<div class="col-lg-3">
								<label for="type" class=" form-control-label">Tipo:</label>
								<select class="form-control" name="type" id="type">
									<option value="Transfer" @if($truck->type === "Transfer") selected='selected' @endif >Transfer</option>
									<option value="Foráneo" @if($truck->type === "Foráneo") selected='selected' @endif>Foráneo</option>
									<option>Seleccionar...</option>
								</select>
								<span class="form-text text-muted">Porfavor ingresa el tipo</span>
							</div>
							<div class="col-lg-3">
								<label for="plates" class=" form-control-label">Placas:</label>
								<input type="text" value="{{ $truck->plates }}" id="plates" name="plates" class="form-control">
								<span class="form-text text-muted">Porfavor ingresa las placas</span>
							</div>
							<div class="col-lg-3">
								<label for="vin" class=" form-control-label">Vin:</label>
								<input type="text" value="{{ $truck->vin }}" id="vin" name="vin" class="form-control">
								<span class="form-text text-muted">Porfavor ingresa el vin</span>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-4">
								<label for="latest_mileage" class=" form-control-label">Kilometraje última inspección</label>
								<input type="number" value="{{ $truck->latest_mileage }}" id="latest_mileage" name="latest_mileage" class="form-control">
								<span class="form-text text-muted">Porfavor ingresa el último kilometraje</span>
							</div>
							<div class="col-lg-4">
								<label for="actual_mileage" class=" form-control-label">Kilometraje actual</label>
								<input type="number" value="{{ $truck->actual_mileage }}" id="actual_mileage" name="actual_mileage" class="form-control">
								<span class="form-text text-muted">Porfavor ingresa el kilometraje actual</span>
							</div>
							<div class="col-lg-4">
								<label for="date_mileage" class=" form-control-label">Fecha de kilometraje</label>
								<input type="date" value="{{ $truck->date_mileage }}" id="date_mileage" name="date_mileage" class="form-control">
								<span class="form-text text-muted">Porfavor ingresa la fecha del kilometraje</span>
							</div>
						</div>
					</form>
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
	let datatable
	let subTable
	var app = new Vue({
		el : '#app',
		data : {
			parts : [],
			part : [],
			id_part : 0,
			name_part : '',
			id_subpart : 0,
			name_subpart : '',
			instalation_date: '',
			instalation_mileage: '',
			expiration_mileage: '',
			number: '',
			ubication: '',
			notes: '',
			method_field : '',
			base_url: '<?php echo url('/'); ?>'
		},
		methods: {
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
			getParts(){
				let me = this;
				datatable = $('#partsTableChild').KTDatatable({
					// datasource definition
					data: {
						type: 'remote',
						source: {
							read: {
								url: this.base_url + '/partes/obtenerPartesTractor/' + document.getElementById('id_truck').value,
								method: 'GET'
							},
						},
						pageSize: 10, // display 20 records per page
						serverPaging: true,
						serverFiltering: false,
						serverSorting: true,
					},

					// layout definition
					layout: {
						theme: 'default',
						scroll: false,
						height: null,
						footer: false,
					},

					// column sorting
					sortable: true,

					pagination: true,

					detail: {
						title: 'Load sub table',
						content: subTableInit,
					},

					translate: {
						records: {
							processing: 'Por favor espere...',
							noRecords: 'No se encontraron partes'
						},
					},

					// columns definition
					columns: [
						{
							field: 'id',
							title: '',
							sortable: true,
							width: 100,
							textAlign: 'center',
						},
						{
							field: 'name',
							title: 'Parte',
							sortable: true,
							width: 400,
							textAlign: 'center',
						}, {
							field: 'status',
							title: 'STATUS',
							sortable: true,
							width: 100,
							textAlign: 'center',
							template: function (row) {
								if(row.status === 1){
									return '<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded" style="width: 75px;height:4px;padding:0;background: #388e3c;"></span>';
								}
								if(row.status === 2){
									return '<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded" style="width: 75px;height:4px;padding:0;background: #fbc02d;"></span>';
								}
								if(row.status === 3){
									return '<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded" style="width: 75px;height:4px;padding:0;background: #d32f2f;"></span>';
								}
								if(row.status === 0){
									return '<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded" style="width: 75px;height:4px;padding:0;background: gray;"></span>';
								}
								if(row.status === null){
									return '<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded" style="width: 75px;height:4px;padding:0;background: transparent;"></span>';
								}
							},
						}, 	{
							field: 'alert',
							title: 'ALERTA CALENDARIO PARTES',
							sortable: false,
							width: 200,
							textAlign: 'center',
							template: function (row) {
								return '<p>ALERTA CALENDARIO PARTES</p>';
							},
						},	{
							field: '',
							title: '<a onclick="showCreatePartModal()" class="btn btn-clean btn-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Agregar parte"><i class="flaticon2-plus-1" style="font-size: 1.2rem;"></i></a>',
							sortable: false,
							width: 200,
							textAlign: 'center',
							template: function (row, data, index) {
								// <a onclick="showCreateSubpartModal()" class="btn btn-sm btn-clean btn-icon btn-icon-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Agregar subparte"><i class="flaticon2-plus-1"></i></a>\
								return "<a onclick='showEditPartModal("+data+")' class='btn btn-sm btn-clean btn-icon btn-icon-sm' data-toggle='tooltip' data-placement='top' title='Editar información' data-original-title='Editar información'><i class='flaticon-edit-1'></i></a>\
										<a onclick='showDeactivatePartModal("+data+")' class='btn btn-sm btn-icon btn-clean btn-icon-sm' data-toggle='tooltip' data-placement='top' title='Desactivar parte' data-original-title='Desactivar parte'><i class='flaticon-delete-1'></i></a>";
							},
						}],
				});

				$('#kt_form_status').on('change', function () {
					datatable.search($(this).val().toLowerCase(), 'status');
				});

				$('#kt_form_type').on('change', function () {
					datatable.search($(this).val().toLowerCase(), 'type');
				});

				$('#kt_form_status,#kt_form_type').selectpicker();

				function subTableInit(e) {
					subTable = $('<div/>').attr('id', 'partsTableChild' + e.data.id).appendTo(e.detailCell).KTDatatable({
						data: {
							type: 'remote',
							source: {
								read: {
									url: '/subpartes/obtenerSubpartes/' + e.data.id,
									method: 'GET'
								},
							},
							pageSize: 10,
							serverPaging: true,
							serverFiltering: false,
							serverSorting: true,
						},

						// layout definition
						layout: {
							theme: 'default',
							scroll: true,
							height: 300,
							footer: false,

							// enable/disable datatable spinner.
							spinner: {
								type: 1,
								theme: 'default',
							},
						},

						translate: {
							records: {
								processing: 'Por favor espere...',
								noRecords: 'No se encontraron subpartes'
							},
						},

						sortable: true,

						// columns definition
						columns: [
							{
								field: 'id',
								title: 'ID',
								sortable: true,
								width: 50,
								textAlign: 'center',
							}, {
								field: 'name',
								title: 'PARTE',
								sortable: true,
								width: 100,
								textAlign: 'center',
							}, {
								field: 'instalation_date',
								title: 'FECHA DE INSTALACIÓN',
								sortable: true,
								width: 100,
								textAlign: 'center',
								template: function(row){
									return me.convertDate(row.instalation_date)
								}
							}, {
								field: 'instalation_mileage',
								title: 'KILOMETRAJE DE INSTALACIÓN',
								sortable: true,
								width: 100,
								textAlign: 'center',
								template: function(row){
									return me.checkDecimal(row.instalation_mileage)
								}
							}, {
								field: 'expiration_mileage',
								title: 'VENCIMIENTO DE PARTE EN KILOMETRAJE',
								sortable: true,
								width: 100,
								textAlign: 'center',
								template: function(row){
									return me.checkDecimal(row.expiration_mileage)
								}
							}, {
								field: 'number',
								title: 'NO. DE  PARTE',
								sortable: true,
								width: 100,
								textAlign: 'center',
							},  {
								field: 'ubication',
								title: 'UBICACIÓN',
								sortable: true,
								width: 100,
								textAlign: 'center',
							}, {
								field: 'status',
								title: 'STATUS',
								sortable: true,
								width: 100,
								textAlign: 'center',
								template: function (row) {
									if(row.status === 1){
										return '<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded" style="width: 75px;height:4px;padding:0;background: #388e3c;"></span>';
									}
									if(row.status === 2){
										return '<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded" style="width: 75px;height:4px;padding:0;background: #fbc02d;"></span>';
									}
									if(row.status === 3){
										return '<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded" style="width: 75px;height:4px;padding:0;background: #d32f2f;"></span>';
									}
									if(row.status === 0){
										return '<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded" style="width: 75px;height:4px;padding:0;background: gray;"></span>';
									}
									if(row.status === null){
										return '<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded" style="width: 75px;height:4px;padding:0;background: transparent;"></span>';
									}
								},
							},	{
								field: 'notes',
								title: 'NOTAS',
								sortable: true,
								width: 100,
								textAlign: 'center',
							}, 	{
								field: 'alert',
								title: '<a onclick="showCreateSubpartModal('+e.data.id+')" class="btn btn-clean btn-icon" data-toggle="tooltip" data-placement="top" title="Agregar subparte" data-original-title="Agregar subparte"><i class="flaticon2-plus-1" style="font-size: 1.2rem;"></i></a>',
								sortable: false,
								width: 200,
								textAlign: 'center',
								template: function (row, data, index) {
									// <a onclick="showCreateSubpartModal()" class="btn btn-sm btn-clean btn-icon btn-icon-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Agregar subparte"><i class="flaticon2-plus-1"></i></a>\
									return "<a onclick='showEditSubpartModal("+data+")' class='btn btn-sm btn-clean btn-icon btn-icon-sm' data-toggle='tooltip' data-placement='top' title='Editar subparte' data-original-title='Editar subparte'><i class='flaticon-edit-1'></i></a>\
											<a onclick='showDeactivateSubpartModal("+data+")' class='btn btn-sm btn-icon btn-clean btn-icon-sm' data-toggle='tooltip' data-placement='top' title='Desactivar subparte' data-original-title='Desactivar subparte'><i class='flaticon-delete-1'></i></a>";
								},
							}],
					});
				}
			},		
			saveTruck() {
				let me = this;
				axios.post(this.base_url + '/tractores/' + document.getElementById('id_truck').value, {
					_method: "PUT",
					id_truck: document.getElementById('id_truck').value,
					trailer: document.getElementById('trailer').value,
					type: document.getElementById('type').value,
					plates: document.getElementById('plates').value,
					vin: document.getElementById('vin').value,
					latest_mileage: document.getElementById('latest_mileage').value,
					actual_mileage: document.getElementById('actual_mileage').value,
					date_mileage: document.getElementById('date_mileage').value,
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
					window.location.reload()
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
			showEditModal() {
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
			closeCreatePartModal() {
				$('#createPartModal').modal('hide');
			},
			createPart(){
				let me = this;
				axios.post(this.base_url + '/partes', {
					truck_id: document.getElementById('id_truck').value,
					name: this.name_part,
				})
				.then(function (response) {
					console.log(response);
					me.closeCreatePartModal();
					me.getParts();
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

					toastr.success("La parte se agregó al tractor correctamente.", "Correcto");
					window.location.reload()
				})
				.catch(function (error) {
					console.log(error);
					me.closeCreatePartModal();
					me.getParts();
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
			closeEditPartModal() {
				$('#editPartModal').modal('hide');
			},
			editPart(){
				let me = this;
				axios.post(this.base_url + '/partes/' + me.id_part, {
					_method: "PUT",
					id: me.id_part,
					name: this.name_part,
				})
				.then(function (response) {
					console.log(response);
					me.closeEditPartModal();
					me.getParts();
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

					toastr.success("La parte se modificó correctamente.", "Correcto");
					window.location.reload()
				})
				.catch(function (error) {
					console.log(error);
					me.closeEditPartModal();
					me.getParts();
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
			closeDeactivatePartModal() {
				$('#deactivatePartModal').modal('hide');
			},
			deactivatePart(){
				let me = this;
				axios.post(this.base_url + '/partes/desactivar/' + me.id_part, {
					_method: "DELETE",
					id: me.id_part,
					name: this.name_part,
				})
				.then(function (response) {
					console.log(response);
					me.closeDeactivatePartModal();
					me.getParts();
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

					toastr.success("La parte se desactivó correctamente.", "Correcto");
					window.location.reload()
				})
				.catch(function (error) {
					console.log(error);
					me.closeDeactivatePartModal();
					me.getParts();
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

					toastr.error("Ocurrió un problema al desactivar la parte.", "Incorrecto");
				});
			},
			closeCreateSubpartModal() {
				$('#createSubpartModal').modal('hide');
			},
			createSubpart(){
				let me = this;
				axios.post(this.base_url + '/subpartes', {
					truck_id: document.getElementById('id_truck').value,
					part_id: this.id_part,
					name: this.name_subpart,
					instalation_date: this.instalation_date,
					instalation_mileage: this.instalation_mileage,
					expiration_mileage: this.expiration_mileage,
					number: this.number,
					ubication: this.ubication,
					notes: this.notes,
				})
				.then(function (response) {
					console.log(response);
					me.closeCreateSubpartModal();
					me.getParts();
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

					toastr.success("La subparte se agregó al tractor correctamente.", "Correcto");
					window.location.reload()
				})
				.catch(function (error) {
					console.log(error);
					me.closeCreateSubpartModal();
					me.getParts();
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
			closeEditSubpartModal() {
				$('#editSubpartModal').modal('hide');
			},
			editSubpart(){
				let me = this;
				axios.post(this.base_url + '/subpartes/' + me.id_subpart, {
					_method: "PUT",
					id: me.id_subpart,
					name: this.name_subpart,
					instalation_date: this.instalation_date,
					instalation_mileage: this.instalation_mileage,
					expiration_mileage: this.expiration_mileage,
					number: this.number,
					ubication: this.ubication,
					notes: this.notes
				})
				.then(function (response) {
					console.log(response);
					me.closeEditSubpartModal();
					me.getParts();
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

					toastr.success("La subparte se modificó correctamente.", "Correcto");
					window.location.reload()
				})
				.catch(function (error) {
					console.log(error);
					me.closeEditSubpartModal();
					me.getParts();
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
			closeDeactivateSubpartModal() {
				$('#deactivateSubpartModal').modal('hide');
			},
			deactivateSubpart(){
				let me = this;
				axios.post(this.base_url + '/subpartes/desactivar/' + me.id_subpart, {
					_method: "DELETE",
					id: me.id_subpart,
				})
				.then(function (response) {
					console.log(response);
					me.closeDeactivateSubpartModal();
					me.getParts();
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

					toastr.success("La subparte se desactivó correctamente.", "Correcto");
					window.location.reload()
				})
				.catch(function (error) {
					console.log(error);
					me.closeDeactivateSubpartModal();
					me.getParts();
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

					toastr.error("Ocurrió un problema al desactivar la parte.", "Incorrecto");
				});
			},
			convertDate(date) {
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
		},
		mounted() {
			this.getParts()
		}
	})

	function showCreatePartModal() {
		$('#createPartModal').modal('show');
	}

	function showEditPartModal(index) {
		const data = datatable.lastResponse[index]
		app.id_part = data.id
		app.name_part = data.name
		$('#editPartModal').modal('show');
	}

	function showDeactivatePartModal(index){
		const data = datatable.lastResponse[index]
		app.id_part = data.id
		$('#deactivatePartModal').modal('show');
	}

	function showCreateSubpartModal(id) {
		app.id_part = id
		$('#createSubpartModal').modal('show');
	}

	function showEditSubpartModal(index) {
		const data = subTable.lastResponse[index]
		app.id_subpart = data.id
		app.name_subpart = data.name
		app.instalation_date = data.instalation_date
		app.instalation_mileage = data.instalation_mileage
		app.expiration_mileage = data.expiration_mileage
		app.number = data.number
		app.ubication = data.ubication
		app.notes = data.notes
		$('#editSubpartModal').modal('show');
	}

	function showDeactivateSubpartModal(index){
		const data = subTable.lastResponse[index]
		app.id_subpart = data.id
		$('#deactivateSubpartModal').modal('show');
	}

</script>
@endsection
