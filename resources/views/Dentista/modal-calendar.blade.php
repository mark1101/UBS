
<div class="modal fade" id="modalCalendar" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModal">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEvent">
                    @csrf
                    <div class="form-group ">
                        <label for="title" class="col-sm-4 col-form-label">Titulo</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="title" name="title" disabled>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="start" class="col-sm-4 col-form-label">Data/Hora inicio</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control date-time" id="start" name="start" disabled>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="end" class="col-sm-4 col-form-label">Data/ Hora final</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control date-time" id="end" name="end" disabled>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="color" class="col-sm-4 col-form-label">Cor</label>
                        <div class="col-sm-8">
                            <input type="color" class="form-control" id="color" name="color" disabled>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="description" class="col-sm-4 col-form-label">Descrição</label>
                        <div class="col-sm-8">
                            <textarea name="description" id="description" cols="40" rows="4" disabled></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
               <!-- <button type="button" class="btn btn-danger deleteEvent">Excluir</button> -->
               <!-- <button type="button" class="btn btn-primary saveEvent">Salvar</button> -->
            </div>
        </div>
    </div>
</div>
