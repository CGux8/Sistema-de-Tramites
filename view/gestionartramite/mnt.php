<div id="mnt_detalle" class="modal fade" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <form method="post" id="documento_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="lbltramite"></h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="inhum_id" name="inhum_id">

                        <div class="col-lg-3">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label for="example-text-input" class="form-label">Nombres</label>
                              <input class="form-control" type="text" value="" name="inhum_nom" id="inhum_nom" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="mb-3">
                            <label for="example-text-input" class="form-label">Primer Apellido</label>
                            <input class="form-control" type="text" value="" name="inhum_papell" id="inhum_papell" readonly>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="mb-3">
                            <label for="example-text-input" class="form-label">Segundo Apellido</label>
                            <input class="form-control" type="text" value="" name="inhum_sapell" id="inhum_sapell" readonly>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label class="form-label">Sexo</label>
                              <input class="form-control" type="text" value="" name="inhum_sex" id="inhum_sex" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label class="form-label">Tipo de documento</label>
                              <input class="form-control" type="text" value="" name="inhum_tip_doc" id="inhum_tip_doc" readonly>
                            </div>
                          </div>
                        </div>

                        <div class="col-lg-3">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label for="example-number-input" class="form-label">Número de Documento</label>
                              <input class="form-control" type="number" value="" name="inhum_num_doc" id="inhum_num_doc" readonly>
                            </div>
                          </div>
                        </div>

                        <div class="col-lg-3">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label for="example-text-input" class="form-label">Municipio de fallecimiento</label>
                              <input class="form-control" type="text" value="" name="inhum_mun_fall" id="inhum_mun_fall" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label class="form-label">Manera de Muerte</label>
                              <input class="form-control" type="text" value="" name="inhum_man_muert" id="inhum_man_muert" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label for="example-date-input" class="form-label">Fecha de Defunción</label>
                              <input class="form-control" type="date" value="" name="inhum_fecha_defun" id="inhum_fecha_defun" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label for="example-number-input" class="form-label">Nro. Certificado de Defunción</label>
                              <input class="form-control" type="number" value="" name="inhum_cert_defun" id="inhum_cert_defun" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label for="example-date-input" class="form-label">Fecha nacimiento (Para muerte FETAL, registrar la misma fecha de fallecimiento)</label>
                              <input class="form-control" type="date" value="" name="inhum_fech_nac" id="inhum_fech_nac" readonly>
                            </div>
                          </div>
                        </div>

                        <h5>Destino Final</h5>
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label class="form-label">Nombre del Cementerio o Crematorio</label>
                              <input class="form-control" type="text" value="" name="inhum_cem_crem" id="inhum_cem_crem" readonly>
                            </div>
                          </div>
                        </div>
                        <!-- <div class="col-lg-4">
                          <div class="mb-3">
                            <label for="example-text-input" class="form-label">Otro:</label>
                            <input class="form-control" type="text" value="" name="inhum_cem_crem7" id="inhum_cem_crem7">
                          </div>
                        </div> -->

                        <h5>Datos Funeraria</h5>
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <div class="mb-3">
                              <label class="form-label">Nombre de la Funeraria</label>
                              <input class="form-control" type="text" value="" name="inhum_nom_fun" id="inhum_nom_fun" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="mb-3">
                            <label for="example-text-input" class="form-label">Nombres y Apellidos de quien realiza el trámite</label>
                            <input class="form-control" type="text" value="" name="inhum_nom_real_tram" id="inhum_nom_real_tram" readonly>
                          </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <label for="form-label" class="form-label">Documentos Adjuntos</label>
                            <table id="listado_table_detalle" class="table table-bordered dt-responsive table-sm nowrap w-100">
                                <thead>
                                    <tr>
                                        <!-- <th>Nro. Radicado</th> -->
                                        <th>Fecha Creación</th>
                                        <th>Usuario</th>
                                        <th>Nombre Documento</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div class="col-lg-12">
                            <br>
                            <div class="mb-3">
                                <label for="form-label" class="form-label">Respuesta</label>
                                <textarea class="form-control form-control-sm" placeholder="Ingrese respuesta del tramite" type="text" rows="2" value="" name="doc_respuesta" id="doc_respuesta"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="dropzone">
                                <div class="dz-default dz-message">
                                    <button class="dz-button" type="button">
                                        <img src="../../assets/image/upload.png" alt="">
                                    </button>
                                    <div class="dz-message" data-dz-message><span>Arrastra y suelta archivos aquí o haz click para seleccionar archivos <br> Maximo 5 archivos de tipo *.PDF, y solo de peso maximo de 2MB </span></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" id="btnguardar" class="btn btn-primary waves-effect waves-light">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>